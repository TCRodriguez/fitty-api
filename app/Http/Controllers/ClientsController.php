<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Resources\ClientCollection;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $clients = Client::paginate(60);

        return new ClientCollection($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        // $user = $request->user();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client = Client::findOrFail($id);

        return new ClientResource($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // return $request->all();
        $request->validate([
            'first_name' => [
                'required'
            ],
            'last_name' => [
                'required'
            ],
            'starting_weight' => [
                'required',
                // Add number validation
                'numeric'
            ],
            'email' => [
                'required',
                // add email validation
                'email'
            ],
            'phone_number' => [
                // add phone number validation that matches with the format we have in the DB

            ]
            
        ]);

        $client = Client::findOrFail($id);

        $client->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'starting_weight' => $request->input('starting_weight'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number')
        ]);

        return new ClientResource($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $client = Client::findOrFail($id);
        $client->delete();

        return new ClientResource($client);

    }
}
