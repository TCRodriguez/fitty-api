<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrainerRequest;
use App\Http\Requests\TrainerUpdateRequest;
use App\Http\Resources\TrainerResource;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TrainersController extends Controller
{
    public function show(Request $request, $id)
    {
        $trainer = Trainer::findOrFail($id);

        return new TrainerResource($trainer);
    }

    public function store(CreateTrainerRequest $request)
    {
        $trainer = Trainer::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'user_name' => $request->input('user_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
        ]);
        return new TrainerResource($trainer);
    }

    public function update(TrainerUpdateRequest $request, $trainer)
    {
        // dd($request);
        // return $request;
        $trainer = Trainer::findOrFail($trainer);
        // return $trainer;

        // $this->authorize('update', $trainer);

        $trainer->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'user_name' => $request->input('user_name'),
            'email' => $request->input('email'),
            // 'password' => Hash::make($request->password), 
            // 'password' => $trainer->password,
        ]);

        return $trainer;
        // return $request;
    }

    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);

        $trainer->delete();

        return 'Trainer deleted.';
    }
    
}
