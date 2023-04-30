<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use App\Models\Company;
use App\Models\CompanyPosition;
use App\Models\Department;
use App\Models\Education;
use App\Models\EducationalInstitution;
use App\Models\JobSeeker;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createBusinessTypes();
        $this->createCompanies();
        $this->createPositions();
        $this->createCompanyPositions();
        $this->createDepartments();
        $this->createEducationalInstitutions();
        $this->createJobSeekers();
        $this->createEducations();
    }

    public function createBusinessTypes()
    {
        BusinessType::create([
            'name' => 'ບໍລິຫານການເງີນ'
        ]);
        BusinessType::create([
            'name' => 'ຈັດຫາວຽກງານ'
        ]);
    }

    public function createCompanies()
    {
        Company::create([
            'business_type_id' => 1,
            'name' => 'Hal Tech',
            'phone' => '020 99999383',
            'email_contract' => 'company@gmail.com',
            'logo' => 'logo.png',
            'address' => 'Nong Nark',
            'latitude' => 109.0029928,
            'longitude' => 102.999382,
            'bank_name' => 'BCEL ONE',
            'bank_account_name' => 'PAOVANG',
            "bank_account_number" => 16009938283712
        ]);

        Company::create([
            'business_type_id' => 2,
            'name' => 'Hal Dev',
            'phone' => '020 99000983',
            'email_contract' => 'company1@gmail.com',
            'logo' => 'logo.png',
            'address' => 'Nong Nark',
            'latitude' => 109.0029928,
            'longitude' => 102.999382,
            'bank_name' => 'BCEL ONE',
            'bank_account_name' => 'ALEX',
            "bank_account_number" => 16009930394812
        ]);
    }

    public function createPositions()
    {
        Position::create(['name' => 'IT Programmer']);
        Position::create(['name' => 'IT Support']);
        Position::create(['name' => 'Marketing']);
    }

    public function createCompanyPositions()
    {
        CompanyPosition::create([
            'position_id' => 1,
            'company_id' => 1
        ]);
        CompanyPosition::create([
            'position_id' => 2,
            'company_id' => 1
        ]);

        CompanyPosition::create([
            'position_id' => 1,
            'company_id' => 2
        ]);

        CompanyPosition::create([
            'position_id' => 2,
            'company_id' => 2
        ]);
    }

    public function createDepartments()
    {
        Department::create(['name' => 'ພັດທະນາເວັບໄຊ']);
        Department::create(['name' => 'ເນັດເວີກ']);
    }

    public function createEducationalInstitutions()
    {
        EducationalInstitution::create(['name' => 'ວິທະຍາໄລ ສຸກສະກະ']);
        EducationalInstitution::create(['name' => 'ວິທະຍາໄລ ຄອນເຊັນເຕີ']);
    }

    public function createJobSeekers()
    {
        JobSeeker::create([
            'name' => 'pao',
            'surname' => 'vang',
            'gender' => 'male',
            'birth_date' => '1992-02-04',
            'address' => 'Nong Nark',
            'file_cv' => 'file_cv.png'
        ]);
        JobSeeker::create([
            'name' => 'alex',
            'surname' => 'vang',
            'gender' => 'male',
            'birth_date' => '1992-04-04',
            'address' => 'Nong Nark',
            'file_cv' => 'file_cv1.png'
        ]);
    }

    public function createEducations()
    {
        Education::create([
            'education_institution_id' => 1,
            'department_id' => 1,
            'job_seeker_id' => 1,
            'start_year' => '2012',
            'end_year' => '2015',
        ]);

        Education::create([
            'education_institution_id' => 2,
            'department_id' => 2,
            'job_seeker_id' => 1,
            'start_year' => '2015',
            'end_year' => '2018',
        ]);

        Education::create([
            'education_institution_id' => 1,
            'department_id' => 1,
            'job_seeker_id' => 2,
            'start_year' => '2012',
            'end_year' => '2015',
        ]);

        Education::create([
            'education_institution_id' => 2,
            'department_id' => 2,
            'job_seeker_id' => 2,
            'start_year' => '2015',
            'end_year' => '2018',
        ]);
    }
}
