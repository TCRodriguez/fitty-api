<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExerciseLogRequest extends FormRequest
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
            'exercise_name' => [
                'required',
                'string'
            ],
            'sets' => [
                'required',
                'numeric'
            ],
            'reps' => [
                'required',
                'numeric'
            ],
            'weight' => [
                'required',
                'numeric'
            ],
            'duration' => [
                'numeric',
                'nullable'
            ],
            'notes' => [
                'string',
                'nullable'
            ]
        ];
    }
}
