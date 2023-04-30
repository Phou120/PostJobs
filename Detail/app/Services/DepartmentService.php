<?php

namespace App\Services;

use App\Models\Department;
use App\Traits\ResponseAPI;

class DepartmentService
{
    use ResponseAPI;


    public function addDepartment($request)
    {
        $addDepart = new Department();
        $addDepart->name = $request['name'];
        $addDepart->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }

    
    public function editDepartment($request)
    {
        $editDepart = Department::find($request['id']);
        $editDepart->name = $request['name'];
        $editDepart->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deleteDepartment($request)
    {
        $deleteDepart = Department::find($request['id']);
        $deleteDepart->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listDepartments()
    {
        $listDepart = Department::orderBy('id', 'desc')->get();

        return response()->json([
            'listDepartments' => $listDepart
        ]);
    }
}
