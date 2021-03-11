<?php

namespace App\Http\Controllers;

use App\Models\Traveler;
use Illuminate\Http\Request;
use Hash;

class TravelerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'print' => 'required',
            'name' => 'sometimes|string',
        ]);

        $payload = array_merge($validated, [
            'uuid' => guid(),
            'secret' => Hash::make('secret'),
        ]);

        $traveler = Traveler::create($payload);

        return response($traveler->uuid, 201)
            // ->withCookie(cookie('secret', $payload['secret'], 180, null, '.chat-bout-api.test', false, true));
            ->withCookie(cookie('secret', $payload['secret'], 180));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traveler  $traveler
     * @return \Illuminate\Http\Response
     */
    public function show(Traveler $traveler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Traveler  $traveler
     * @return \Illuminate\Http\Response
     */
    public function edit(Traveler $traveler)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traveler  $traveler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $travelerUuid)
    {
        $traveler = Traveler::firstOrFail('uuid', $travelerUuid);
        $validated = $request->validate([
            'name' => 'string',
        ]);

        $traveler->update($validated);

        return response($traveler, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traveler  $traveler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traveler $traveler)
    {
        //
    }
}
