<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;
use App\Http\Resources\WorkoutCollection;
use App\Http\Resources\WorkoutResource;
use App\Models\Client;
use App\Models\Workout;
use Illuminate\Http\Request;

class ClientWorkoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $client)
    {
        // * This wouldn't work without the parantheses ()
        
        $clientWorkouts = $client->workouts()->with('exerciseLogs')->get(); 
        // $clientWorkouts = Workout::with('exerciseLogs')->get();

        // $clientWorkouts = $client->workouts;
        $workouts = Workout::paginate(10);

        return new WorkoutCollection($clientWorkouts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWorkoutRequest $request)
    {
        $clientWorkout = Workout::create([
            'client_id' => $request->input('client_id'),
            'name' => $request->input('name')
        ]);

        return new WorkoutResource($clientWorkout);
    }

    /**
     * Display the specified resource.
     *\
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function show($client, $workout)
    {
        $clientWorkout = Workout::where('client_id', $client)
            ->where('id', $workout)
            ->with('exerciseLogs')
            ->firstOrFail();


        return new WorkoutResource($clientWorkout);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkoutRequest $request, $client, $workout)
    {
        // $workout = Workout::findOrFail($id);
        $clientWorkout = Workout::where('client_id', $client)
            ->where('id', $workout)
            ->firstOrFail();

        // $clientWorkout->update($request->validated());
        $clientWorkout->update([
            'name' => $request->input('name')
        ]);

        return new WorkoutResource($clientWorkout);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function destroy($client, $workout)
    {
        $clientWorkout = Workout::where('client_id', $client)
            ->where('id', $workout)
            ->firstOrFail();

        $clientWorkout->delete();

        return new WorkoutResource($clientWorkout);
    }
}
