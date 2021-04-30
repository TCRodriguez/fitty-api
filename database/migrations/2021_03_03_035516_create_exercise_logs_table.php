<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('workout_id')->index();
            $table->unsignedBigInteger('exercise_id')->index();
            $table->string('exercise_name')->nullable();
            $table->unsignedInteger('sets')->nullable();
            $table->unsignedInteger('reps')->nullable();
            $table->string('weight')->nullable();
            $table->string('duration')->nullable();
            $table->date('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('workout_id')->references('id')->on('workouts')
                ->onDelete('cascade');

            $table->foreign('exercise_id')->references('id')->on('exercises')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_logs');
    }
}
