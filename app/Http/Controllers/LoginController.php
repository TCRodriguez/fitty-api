<?php

namespace App\Http\Controllers;

use App\Http\Resources\TokenResource;
use App\Http\Resources\TrainerResource;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //

    public function store (Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            // 'device_name' => 'required',
        ]);
    
        $trainer = Trainer::where('email', $request->email)->first();
    
        if (! $trainer || ! Hash::check($request->password, $trainer->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        $token = $trainer->createToken('mobile app')->plainTextToken;

        $loggedInTrainer = [
            'token' => new TokenResource($token),
            'trainer' => new TrainerResource($trainer)
        ];
        // return new TokenResource($token);
        return $loggedInTrainer;
    }
}
