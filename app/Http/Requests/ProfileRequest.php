<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];

        $curAction = $this->route()->getActionMethod();

        switch($this->method()){
            case 'POST':
                switch($curAction){
                    case 'updateProfile':
                        $rules = [
                            'name' => 'required',
                            'user_city' => 'required',
                            'user_district' => 'required',
                            'user_commune' => 'required',
                            'user_village' => 'required',
                            'has_address' => 'required',
                            'phone_number' => 'required|numeric|min:10|regex:/^0\d{9}$/|'
                        ];
                        break;
                    case '':
                        $rules = [

                        ];
                        break;
                }
                break;
            case 'GET':

                break;
        }

        return $rules;
    }
}
