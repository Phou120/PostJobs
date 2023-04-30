<?php

namespace App\Http\Controllers;

use App\Models\PostJob;
use Illuminate\Http\Request;

class PostJobController extends Controller
{


    public function postJobs(Request $request)
    {
        $addPostJob = new PostJob;
        $addPostJob->position_id = $request['position_id'];
        $addPostJob->experience = $request['experience'];
        $addPostJob->education_level = $request['education_level'];
        $addPostJob->basic_salary = $request['basic_salary'];
        $addPostJob->qty = $request['qty'];
        $addPostJob->start_date = $request['start_date'];
        $addPostJob->end_date = $request['end_date'];
        $addPostJob->description = $request['description'];
        $addPostJob->save();

        return 'success';
    }
}
