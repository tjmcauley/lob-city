<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use App\Models\Team;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PlayerStatsContainer;

class PlayerController extends Controller
{
    protected $player_stats_service;

    public function __construct(PlayerStatsContainer $player_stats_service)
    {
        $this->player_stats_service = $player_stats_service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        return view('players.index', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        return view('players.create', ['teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Player $player)
    {

        # Only allow admins to add teams
        if ($request->user()->cannot('create', $player)) {
            abort(403);
        }

        //Needs to validate that name and team id exist
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'team_id' => 'required|integer',
        ]);

        $p = new Player;
        $p->name = $validatedData['name'];
        $p->team_id = $validatedData['team_id'];
        $p->save();

        $t = new Tag;
        $t->name = $validatedData['name'];
        $t->save();

        $this->player_stats_service->player_stats_api($p);

        session()->flash('message', 'player was created!');
        return redirect()->route('players.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        #Count career games, points, assists, blocks, steals
        $career_games = DB::table('stats')->where('player_id', '=', $player->id)->sum('games');
        $career_points = DB::table('stats')->where('player_id', '=', $player->id)->sum('points');
        $career_assists = DB::table('stats')->where('player_id', '=', $player->id)->sum('assists');
        $career_blocks = DB::table('stats')->where('player_id', '=', $player->id)->sum('blocks');
        $career_steals = DB::table('stats')->where('player_id', '=', $player->id)->sum('steals');

        # Get player's most recent year
        $total_years = $player->stats->count();
        $recent_stats = $player->stats[$total_years - 1];

        $posts = Post::all();
        return view('players.show', ['player' => $player, 'posts' => $posts,
        'career_games' => $career_games, 'career_points' => $career_points, 'career_assists' => $career_assists,
        'career_blocks' => $career_blocks, 'career_steals' => $career_steals, 'recent_stats' => $recent_stats]);
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
    public function destroy(Request $request, Player $player)
    {
        {
            # Only allow admins and owners of posts to delete posts
            if ($request->user()->cannot('delete', $player)) {
                abort(403);
            }
                
                Tag::where('name', $player->name)->delete();
                $player->delete();
            
                # Flash message
                return redirect()->route('players.index')->with('message', 'Player was deleted.');
        }
    }
}