<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
        return [
            'name'          => "required|unique:clients,name,{$this->client->id}",
            'email'         => "required|unique:clients,email,{$this->client->id}",
            'join_date'     => 'required|date',
            'sub_end_date'  => 'required|date|after:join_date',
            'bundle_name'   => 'required'
        ];
    }
}
