<?php

namespace App\Services;

use App\Models\Experience;
use App\Traits\ResponseAPI;


class ExperienceService
{
    use ResponseAPI;

    
    public function addExperience($request)
    {
        $addExpe = new Experience();
        $addExpe->job_seeker_id = $request['job_seeker_id'];
        $addExpe->position_id = $request['position_id'];
        $addExpe->company_name = $request['company_name'];
        $addExpe->experience = $request['experience'];
        $addExpe->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function editExperience($request)
    {
        $editExpe = Experience::find($request['id']);
        $editExpe->job_seeker_id = $request['job_seeker_id'];
        $editExpe->position_id = $request['position_id'];
        $editExpe->company_name = $request['company_name'];
        $editExpe->experience = $request['experience'];
        $editExpe->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deleteExperience($request)
    {
        $deleteExpe = Experience::find($request['id']);
        $deleteExpe->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listExperiences()
    {
        $masters = Experience::select(
            'experiences.*',
            'job_s.name as job_s_name',
            'job_s.surname as job_s_surname',
            'job_s.gender as job_s_gender',
            'job_s.birth_date as job_s_birth_date',
            'job_s.address as job_s_address',
            'job_s.file_cv as job_s_file_cv',
            'posit.name as posit_name',
            'posit.company_id as posit_company_id',

        )->join(

            'job_seekers as job_s',
            'job_s.id', '=', 'experiences.job_seeker_id',

        )->join(

            'positions as posit',
            'posit.id', '=', 'experiences.position_id',

        )
        ->orderBy('id', 'desc')->get();

        return response()->json([
            'listEducations' => $masters
        ]);
    }
}
