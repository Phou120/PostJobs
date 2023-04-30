<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function format()
    {
        return [
            'id' =>$this->id,
            'name' =>$this->name,
            'phone' =>$this->phone,
            'email_contract' =>$this->email_contract,
            'address' =>$this->address,
            'logo.url' => config('services.file_path.company_logo') . $this->logo,
            'latitude' =>$this->latitude,
            'longitude' =>$this->longitude,
            'bank_name' =>$this->bank_name,
            'bank_account_number' =>$this->bank_account_number,
            'business_type'=>[
                'name' => $this->business_type->name,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
    

    public function business_type()
    {
        return $this->belongsTo(BusinessType::class);
    }
}
