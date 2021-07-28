<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutResource extends JsonResource
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
            'id' => $this->resource->id,
            'date' => $this->resource->created_at,
            'client_id' => $this->resource->client_id,
            'name' => $this->resource->name,
            'logs' => new ExerciseLogCollection($this->resource->exerciseLogs)
        ];
    }
}
