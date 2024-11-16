<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\City;
use App\Models\Venue;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', ['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $venues = Venue::all();
        return view('teams.create', ['cities' => $cities, 'venues' => $venues]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Needs to validate that city and venue ids exist
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'city_id' => 'required|integer',
            'venue_id' => 'required|integer',
        ]);

        $a = new Team;
        $a->name = $validatedData['name'];
        $a->city_id = $validatedData['city_id'];
        $a->venue_id = $validatedData['venue_id'];
        $a->save();

        session()->flash('message', 'team was created!');
        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('teams.show', ['team' => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        # Flash message
        return redirect()->route('teams.index')->with('message', 'Team was deleted.');
    }
}
