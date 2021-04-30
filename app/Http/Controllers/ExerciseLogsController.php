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
    public function index($client, $workout)
    {
        // $exercise = Exercise::with('logs')->get();

        // return $exercise;

        // DB::connection()->enableQueryLog();
        // $exerciseLogs = Workout::where('client_id', $client)
        //     ->where('id', $workout)
        //     ->with('exerciseLogs')
        //     ->pluck('exerciseLogs')
        //     ->firstOrFail();
        // $clientWorkout = $client->workouts()->where('client_id', $client)->with('exerciseLogs')->get();
        $clientWorkout = Workout::where('client_id', $client)
            ->where('id', $workout)
            ->with('exerciseLogs.exercise')
            ->firstOrFail();

        // $clientWorkout = $client->workouts()->with('exerciseLogs')->get();
        // $clientWorkout = Workout::where('client_id', $client)
        //     ->where('id', $workout)
        //     // ->with('exerciseLogs')
        //     ->get();
        // return $clientWorkout;

        $clientExerciseLogs = $clientWorkout->exerciseLogs;
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

        // $exerciseLogs = $workout->exerciseLogs;

        
        // return $clientExerciseLogs;
        return new ExerciseLogCollection($clientExerciseLogs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExerciseLogRequest $request)
    {
        $exercise = Exercise::findOrFail($request->input('exercise_id'));
        $exerciseLog = ExerciseLog::create([
            // 'client_id' => 12,
            'workout_id' => 24,
            'exercise_id' => $exercise->id,
            'exercise_name' => $exercise->exercise_name,
            'sets' => $request->input('sets'),
            'reps' => $request->input('reps'),
            'weight' => $request->input('weight'),
            'duration' => $request->input('duration'),
            'completed_at' => $request->input('completed_at')
        ]);

        return new ExerciseLogResource($exerciseLog);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return \Illuminate\Http\Response
     */
    public function show($client, $workout, $exerciseLog)
    {
        // $clientWorkout = Workout::where('client_id', $client)
        //     ->where('id', $workout)
        //     ->with('exerciseLogs')
        //     // ->where('id', $exerciseLog)
        //     ->firstOrFail();
        // return $exerciseLog;
        $clientExerciseLog = ExerciseLog::where('workout_id', $workout)
            ->where('id', $exerciseLog)
            ->firstOrFail();
        // return $clientExerciseLog;
        // $exerciseLog = ExerciseLog::findOrFail($id);

        return new ExerciseLogResource($clientExerciseLog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExerciseLogRequest $request, $client, $workout, $exerciseLogId)
    {


        $workout = Workout::where('client_id', $client)
            ->where('id', $workout)
            ->firstOrFail();

        $exerciseLog = $workout->exerciseLogs()->where('id', $exerciseLogId)
            ->firstOrFail();
        // ! Why doesn't this work?
        // $exerciseLog->update($request->validated());

        // $exerciseLog = ExerciseLog::where('workout_id', $workout)
        //     ->where('id', $id);

        $exerciseLog->update([
            'sets' => $request->input('sets'),
            'reps' => $request->input('reps'),
            'weight' => $request->input('weight'),
            'duration' => $request->input('duration'),
            'completed_at' => $request->input('completed_at')
        ]);

        return new ExerciseLogResource($exerciseLog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($workout, $id)
    {
        // $exerciseLog = ExerciseLog::findOrFail($id);
        $exerciseLog = ExerciseLog::where('workout_id', $workout)
            ->where('id', $id)
            ->firstOrFail();

        $exerciseLog->delete();

        return new ExerciseLogResource($exerciseLog);
    }
}
