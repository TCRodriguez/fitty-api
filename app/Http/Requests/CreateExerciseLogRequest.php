<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExerciseLogRequest extends FormRequest
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
                'string'
            ],
            'sets' => [
                'numeric'
            ],
            'reps' => [
                'numeric'
            ],
            'weight' => [
                'numeric'
            ],
            'duration' => [
                'numeric',
                'nullable'
            ]
        ];
    }
}
