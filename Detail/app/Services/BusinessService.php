<?php

namespace App\Services;

use App\Traits\ResponseAPI;
use App\Models\BusinessType;

class BusinessService
{
    use ResponseAPI;

    
    public function addBusinessType($request)
    {
        $addBusiness = new BusinessType();
        $addBusiness->name = $request['name'];
        $addBusiness->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function editBusinessType($request)
    {
        $editBusiness = BusinessType::find($request['id']);
        $editBusiness->name = $request['name'];
        $editBusiness->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deleteBusinessType($request)
    {
        $deleteBusiness = BusinessType::find($request['id']);
        $deleteBusiness->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listBusinessTypes()
    {
        $listBusiness = BusinessType::orderBy('id', 'desc')->get();
        return response()->json([
            'listBusinessTypes' => $listBusiness
        ]);
    }
}
