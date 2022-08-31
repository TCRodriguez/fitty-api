<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
                // Add number validation
                'numeric',
                'nullable'
            ],
            'email' => [
                // add email validation
                'email',
                'nullable'
            ],
            'phone_number' => [
                // add phone number validation that matches with the format we have in the DB
               'nullable', 
            ]
        ];
    }
}
