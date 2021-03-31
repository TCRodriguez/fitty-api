<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExerciseLogRequest;
use App\Http\Requests\UpdateExerciseLogRequest;
use App\Http\Resources\ExerciseLogCollection;
use App\Http\Resources\ExerciseLogResource;
use App\Models\Client;
use App\Models\Exercise;
use App\Models\ExerciseLog;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExerciseLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Client $client, Workout $workout)
    {
        // $exercise = Exercise::with('logs')->get();

        // return $exercise;

        // DB::connection()->enableQueryLog();
        $client = Client::find(1);

        // $client->load('workouts.exerciseLogs.exercise');

        // // $clientWorkouts = $client->workouts()->get();

        // $clientWorkouts = $client->workouts;

        // foreach($clientWorkouts as $clientWorkout) {
        //     foreach($clientWorkout->exerciseLogs as $exerciseLogs) {
        //         $exerciseLogs->exercise; 
        //     }
        // }
        // $queries = DB::getQueryLog();
        // print_r($queries);

        $exerciseLogs = $workout->exerciseLogs;

        return $exerciseLogs;

        return new ExerciseLogCollection($exerciseLogs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExerciseLogRequest $request)
    {
        $exerciseLog = ExerciseLog::create([
            'client_id' => 11,
            // ''
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exerciseLog = ExerciseLog::findOrFail($id);

        return new ExerciseLogResource($exerciseLog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExerciseLogRequest $request, $id)
    {
        $exerciseLog = ExerciseLog::findOrFail($id);
        $exerciseLog->update($request->validated());

        return new ExerciseLogResource($exerciseLog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exerciseLog = ExerciseLog::findOrFail($id);
        $exerciseLog->delete();

        return new ExerciseLogResource($exerciseLog);
    }
}
