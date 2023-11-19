<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
                    case 'getRegister':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|unique:users',
                            'password' => 'required',
                            're-password' => 'required|same:password'
                        ];
                        break;
                    case 'getLogin':
                        $rules = [
                            'email' => 'required',
                            'password' => 'required',
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
