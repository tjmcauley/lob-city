<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\City;
use App\Models\Post;
use App\Models\Tag;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::all();
        return view('venues.index', ['venues' => $venues]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('venues.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Venue $venue)
    {
        # Only allow admins to add venues
        if ($request->user()->cannot('create', $venue)) {
            abort(403);
        }

        //Needs to validate that name and city ids exist
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'city_id' => 'required|integer',
        ]);

        $v = new Venue;
        $v->name = $validatedData['name'];
        $v->city_id = $validatedData['city_id'];
        $v->save();

        $t = new Tag;
        $t->name = $validatedData['name'];
        $t->save();

        session()->flash('message', 'venue was created!');
        return redirect()->route('venues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        $posts = Post::all();
        return view('venues.show', ['venue' => $venue, 'posts' => $posts]);
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
    public function destroy(Request $request, Venue $venue)
    {
        {
            # Only allow admins and owners of posts to delete posts
            if ($request->user()->cannot('delete', $venue)) {
                abort(403);
            }
            
                Tag::where('name', $venue->name)->delete();
                $venue->delete();
            
                # Flash message
                return redirect()->route('venues.index')->with('message', 'Venue was deleted.');
        }
    }
}