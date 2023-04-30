<?php

namespace App\Services;

use App\Models\Position;
use App\Traits\ResponseAPI;


class PositionService
{
    use ResponseAPI;

    public function addPosition($request)
    {
        $addPosition = new Position();
        $addPosition->company_id = $request['company_id'];
        $addPosition->name = $request['name'];
        $addPosition->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function editPosition($request)
    {
        $editPosition = Position::find($request['id']);
        $editPosition->company_id = $request['company_id'];
        $editPosition->name = $request['name'];
        $editPosition->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deletePosition($request)
    {
        $deletePosition = Position::find($request['id']);
        $deletePosition->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listPositions()
    {
        $listPosition = Position::select(
            'positions.*',
            'com.name as com_name',
            'com.phone as com_phone',
            'com.email_contract as com_email_contract',
            'com.latitude as com_latitude',
            'com.longitude as com_longitude',
            'com.bank_name as com_bank_name',
            'com.bank_account_number as com_bank_account_number',
            'com.logo as com_logo',

        )->join(

            'companies as com',
            'com.id', '=', 'positions.company_id',

        )->orderBy('id', 'desc')->get();


        return response()->json([
            'listPosition' => $listPosition
        ]);
    }
}
