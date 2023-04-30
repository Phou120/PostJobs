<?php

namespace App\Services;

use App\Models\Position;
use App\Models\JobSeeker;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\Storage;


class JobSeekerService
{
    use ResponseAPI;

    public function addJobSeeker($request)
    {
        $file_name = $this->saveImage($request);

        $addJobSeeker = new JobSeeker();
        $addJobSeeker->name = $request['name'];
        $addJobSeeker->surname = $request['surname'];
        $addJobSeeker->gender = $request['gender'];
        $addJobSeeker->birth_date = $request['birth_date'];
        $addJobSeeker->address = $request['address'];
        $addJobSeeker->file_cv = $file_name;
        $addJobSeeker->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function saveImage($request)
    {
        if($request->hasFile('file_cv')){
            $master_path = '/images/JobSeeker/File_cv';
            $imageFile = $request->file('file_cv');

            //get just text
            $extension = $imageFile->getClientOriginalExtension();
            //Filename to storage
            $filename = 'jobSeeker_file_cv' . '_' . time() . '.' . $extension;
            Storage::disk('public')->putFileAs($master_path, $imageFile, $filename);

            return $filename;

        }
    }


    public function editJobSeeker($request)
    {
        $editJobSeeker = JobSeeker::find($request['id']);
        $editJobSeeker->name = $request['name'];
        $editJobSeeker->surname = $request['surname'];
        $editJobSeeker->gender = $request['gender'];
        $editJobSeeker->birth_date = $request['birth_date'];
        $editJobSeeker->address = $request['address'];

        if (isset($request['file_cv'])) {
            //Upload File
            $fileName = $this->saveImage($request);

            //Move for old File in folder
            if (isset($editJobSeeker->file_cv)) {
                $master_path = 'images/JobSeeker/File_cv/' . $editJobSeeker->file_cv;
                if (Storage::disk('public')->exists($master_path)) {
                    Storage::disk('public')->delete($master_path);
                }
            }
            $editJobSeeker->file_cv = $fileName;
        }
        $editJobSeeker->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deleteJobSeeker($request)
    {
        $deleteJobSeeker = JobSeeker::find($request['id']);

            //Delete File in folder
            if (isset($deleteJobSeeker->file_cv)) {
                $master_path = 'images/JobSeeker/File_cv/' . $deleteJobSeeker->file_cv;
                if (Storage::disk('public')->exists($master_path)) {
                    Storage::disk('public')->delete($master_path);
                }
            }
        $deleteJobSeeker->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listJobSeekers()
    {
        $listJobSeeker = JobSeeker::orderBy('id', 'desc')->get();

        $listJobSeeker->transform(function($item){
            return $item->format();
        });

        return response()->json([
            'listJobSeekers' => $listJobSeeker
        ]);

    }
}
