<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'created_at' => $this->resource->created_at,
            'workout_id' => $this->resource->workout_id,
            'exercise_name' => $this->resource->exercise_name,
            'sets' => $this->resource->sets,
            'reps' => $this->resource->reps,
            'weight' => $this->resource->weight,
            'duration' => $this->resource->duration,
            'notes' => $this->resource->notes
        ];
    }
}
