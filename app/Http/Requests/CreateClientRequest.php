<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
            
            'first_name' => [
                'required'
            ],
            'last_name' => [
                'required'
            ],
            'starting_weight' => [
                'required',
                // Add number validation
                'numeric'
            ],
            'email' => [
                'required',
                // add email validation
                'email'
            ],
            'phone_number' => [
                // add phone number validation that matches with the format we have in the DB
                'required'
            ]
        ];
    }
}
