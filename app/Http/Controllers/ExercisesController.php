<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExerciseRequest;
use App\Http\Resources\ExerciseCollection;
use App\Http\Resources\ExerciseResource;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $exercises = Exercise::where('trainer_id', $request->user()->id)->paginate(5);

        return new ExerciseCollection($exercises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(CreateExerciseRequest $request)
    {
        
        $exercise = Exercise::create([
            'trainer_id' => $request->user()->id,
            'exercise_name' => $request->input('exercise_name')
        ]);

        return new ExerciseResource($exercise);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise, $id)
    {
        $exercise = Exercise::find($id);

        return new ExerciseResource($exercise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $exercise)
    {
        // return $exercise;
        $exercise = Exercise::findOrFail($exercise);

        // return $exercise;

        $this->authorize('view', $exercise);

        // return $exercise;
        $exercise->update([
            'trainer_id' => $request->user()->id,
            'exercise_name' => $request->input('exercise_name')
        ]);

        return new ExerciseResource($exercise);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy($exercise)
    {
        
        $exercise = Exercise::findOrFail($exercise);

        $this->authorize('view', $exercise);

        
        $exercise->delete();

        return new ExerciseResource($exercise);
    }
}
