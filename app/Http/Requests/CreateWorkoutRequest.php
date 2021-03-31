<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkoutRequest extends FormRequest
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
            // ? Since there is only the id and client_id column, what would we put here?
            'client_id' => [
                'required'
                // ? How do we check if the client given exists? Hm, the user would choose
                // ? from a dropdown (or start typing the name in the input field to filter)
            ]
        ];
    }
}
