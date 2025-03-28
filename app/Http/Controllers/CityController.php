<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Post;
use App\Models\Tag;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('cities.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, City $city)
    {

        # Only allow admins to add cities
        if ($request->user()->cannot('create', $city)) {
            abort(403);
        }

        //Needs to validate that name exists
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $c = new City;
        $c->name = $validatedData['name'];
        $c->save();

        $t = new Tag;
        $t->name = $validatedData['name'];
        $t->save();

        session()->flash('message', 'city was created!');
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        $posts = Post::all();
        return view('cities.show', ['city' => $city, 'posts' => $posts]);
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
    public function destroy(Request $request, City $city)
    {
        {
            # Only allow admins and owners of posts to delete posts
            if ($request->user()->cannot('delete', $city)) {
                abort(403);
            }
            
                Tag::where('name', $city->name)->delete();
                $city->delete();
                
            
                # Flash message
                return redirect()->route('cities.index')->with('message', 'City was deleted.');
        }
    }
}