<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;

    public function format()
    {
        return [
            'id' =>$this->id,
            'name' =>$this->name,
            'surname' =>$this->surname,
            'gender' =>$this->gender,
            'birth_date' =>$this->birth_date,
            'address' =>$this->address,
            'file_cv.url' => config('services.master_path.jobSeeker_file_cv') . $this->file_cv,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
