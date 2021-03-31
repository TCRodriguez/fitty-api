<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientUpdateRequest;
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
        // ? It's through $user that we know which trainer_id to give the new client? It's foreign key?

        // $trainer = $request->user();

        // $trainer->clients()->create($request->validated());

        // $trainer->clients()->create([
        //     'first_name' => $request->input('first_name'),
        //     'last_name' => $request->input('last_name'),
        //     'starting_weight' => $request->input('starting_weight'),
        //     'email' => $request->input('email'),
        //     'phone_number' => $request->input('phone_number'),    
        // ]);

        $client = Client::create([
            'trainer_id' => 1,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'starting_weight' => $request->input('starting_weight'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),            
        ]);

        return new ClientResource($client);
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
    public function update(ClientUpdateRequest $request, $id)
    {
        //
        // return $request->validated();

        $client = Client::findOrFail($id);

        $client->update([
            'trainer_id' => 1,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'starting_weight' => $request->input('starting_weight'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),            
        ]);

        return new ClientResource($client);
        // return $client;
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
