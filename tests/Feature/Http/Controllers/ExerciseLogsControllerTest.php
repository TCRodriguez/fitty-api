<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Exercise;
use App\Models\ExerciseLog;
use App\Models\Trainer;
use App\Models\Workout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExerciseLogsControllerTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function trainer_can_view_logs()
    {
        $this->seed();

        $trainer = Trainer::where('id', 1)->firstOrFail();

        $workouts = Workout::where('client_id', 1)->get();
        $workoutIds = $workouts->pluck('id');
        $randomWorkoutId = $workoutIds->random();

        $response = $this->actingAs($trainer)
            ->getJson('api/clients/' . 1 . '/workouts/' . $randomWorkoutId . '/exercise-logs');

        $response->dump()
            ->assertStatus(200);

    }

    /** @test */
    public function trainer_can_create_log()
    {
        $this->seed();

        $trainer = Trainer::where('id', 1)->firstOrFail();

        $workouts = Workout::where('client_id', 1)->get();
        $workoutIds = $workouts->pluck('id');
        $randomWorkoutId = $workoutIds->random();

        $exercises = Exercise::all();
        $exerciseIds = $exercises->pluck('id');
        $randomExerciseId = $exerciseIds->random();

        $exerciseName = Exercise::where('id', $randomExerciseId)->get()->pluck('exercise_name');

        $response = $this->actingAs($trainer)
            ->postJson('api/clients/' . 1 . '/workouts/' . $randomWorkoutId . '/exercise-logs', [
                'workout_id' => $randomWorkoutId,
                'exercise_id' => $randomExerciseId,
                'exercise_name' => $exerciseName[0],
                'sets' => 5,
                'reps' => 5,
                'weight' => 135,
                'duration' => null,
                'completed_at' => null
            ]);

        $response->dump()
            ->assertStatus(201);
    }

    /** @test */
    public function trainer_can_edit_log()
    {
        $this->seed();

        $trainer = Trainer::where('id', 1)->firstOrFail();

        $workouts = Workout::where('client_id', 1)->get();
        $workoutIds = $workouts->pluck('id');
        $randomWorkoutId = $workoutIds->random();

        $exerciseLogs = ExerciseLog::where('workout_id', $randomWorkoutId)->get();
        $exerciseLogIds = $exerciseLogs->pluck('id');
        $randomExerciseLogId = $exerciseLogIds->random();

        $exercises = Exercise::all();
        $exerciseIds = $exercises->pluck('id');
        $randomExerciseId = $exerciseIds->random();

        $exerciseName = Exercise::where('id', $randomExerciseId)->get()->pluck('exercise_name');

        $response = $this->actingAs($trainer)
            ->putJson('api/clients/' . 1 . '/workouts/' . $randomWorkoutId . '/exercise-logs/' . $randomExerciseLogId, [
                'workout_id' => $randomWorkoutId,
                'exercise_id' => $randomExerciseId,
                'exercise_name' => $exerciseName[0],
                'sets' => 5,
                'reps' => 5,
                'weight' => 225,
                'duration' => null,
                'completed_at' => null
            ]); 

        $response->dump()
            ->assertStatus(200); 
    }

    /** @test */
    public function trainer_can_delete_log()
    {
        $this->seed();

        $trainer = Trainer::where('id', 1)->firstOrFail();

        $workouts = Workout::where('client_id', 1)->get();
        $workoutIds = $workouts->pluck('id');
        $randomWorkoutId = $workoutIds->random();

        $exerciseLogs = ExerciseLog::where('workout_id', $randomWorkoutId)->get();
        $exerciseLogIds = $exerciseLogs->pluck('id');
        $randomExerciseLogId = $exerciseLogIds->random();
        
        $response = $this->actingAs($trainer)
            ->deleteJson('api/clients/' . 1 . '/workouts/' . $randomWorkoutId . '/exercise-logs/' . $randomExerciseLogId);

        $response->dump()
            ->assertStatus(200);
    }
}
