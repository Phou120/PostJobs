<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class JobSeekerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('api')->user()->hasRole('superadmin|admin');
    }

    public function prepareForValidation()
    {
        if($this->isMethod('post') && $this->routeIs('edit.jobSeeker')
             ||$this->isMethod('delete') && $this->routeIs('delete.jobSeeker')

        ){
            $this->merge([
                'id' => $this->route()->parameters['id'],

            ]);
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if($this->isMethod('delete') && $this->routeIs('delete.jobSeeker')){
            return [
                'id' =>[
                    'required',
                    'numeric',
                    Rule::exists('job_seekers', 'id')
                ],
            ];
        }


        if($this->isMethod('post') && $this->routeIs('edit.jobSeeker')){
            return [
                'id'=>[
                    'required',
                    'numeric',
                    Rule::exists('job_seekers', 'id')
                ],
                'name'=>[
                    'required',
                    'min:2',
                    'max:60',
                    Rule::unique('job_seekers', 'name')
                    ->ignore($this->id)
                ],
                'surname'=>[
                    'required',
                    'min:2',
                    'max:50',
                    Rule::unique('job_seekers', 'name')
                    ->ignore($this->id)
                ],
                'gender'=>[
                    'required',
                ],
                'birth_date'=>[
                    'required',
                    'date',
                ],
                'address'=>[
                    'required',
                ],
                'file_cv'=>[
                    'required',
                    'mimes:jpg,png,jpeg,gif,raw,tiff',
                    'max:2048',
                ]
            ];
        }


        if($this->isMethod('post') && $this->routeIs('add.jobSeeker')){
            return [
                'name'=>[
                    'required',
                    'min:2',
                    'max:60',
                    Rule::unique('job_seekers', 'name')
                ],
                'surname'=>[
                    'required',
                    'min:2',
                    'max:50',
                    Rule::unique('job_seekers', 'name')
                ],
                'gender'=>[
                    'required',
                ],
                'birth_date'=>[
                    'required',
                    'date',
                ],
                'address'=>[
                    'required',
                ],
                'file_cv'=>[
                    'required',
                    'mimes:jpg,png,jpeg,gif,raw,tiff',
                    'max:2048',
                ]
            ];
        }


    }
}
