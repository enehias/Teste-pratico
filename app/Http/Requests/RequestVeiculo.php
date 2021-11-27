<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestVeiculo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()){
            case 'GET':{}
            case "DELETE":{}
            case "PUT":{}
            case "PATCH":{}
            case "POST":{
            return [
                'marca' => 'required|max:255',
                'modelo' => 'required',
                'renavam' => 'required',
                'proprietario' => 'required',
                'placa' => 'required|regex:/^[A-Z]{3}[0-9]{4}$/',
                'ano' => 'numeric|digits:4',
            ];
            }
            default:
                break;
        }
    }
    public function messages()
    {
        return [
            'placa.regex' => 'Formato Invalido, use AAA1111',
        ];
    }
}
