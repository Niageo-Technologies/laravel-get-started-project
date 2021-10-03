<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Models\Player;
use Exception;


class GameController extends Controller
{
    public function __construct()
    {
        parent::__construct('game');
    }

    public function index()
    {
        $data['games'] = Game::latest()->paginate(10);
        return view('admin.game.index', $data);
    }

    public function create()
    {
        $options = $this->fetch_options_from_database(Player::class, 'name', 'created_at');

        return view('admin.game.create', ['options' => $options]);
    }

    public function store(GameRequest $request)
    {
        try{
            $game = Game::create($request->all());

            $notification = array(
                'message' => 'Game saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.games.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.games.index')->with($notification);
        }
    }

    public function show(Game $game)
    {
        //dd($game->points);
        
        return view('admin.game.show', [
        'game' => $game, 
        'index' => 1,
        'strokes' => config('app.table_tennis_stroke')
        ]);
    }

    public function edit(Game $game)
    {
        $data['game'] = $game;
        return view('admin.game.edit', $data);
    }

    public function update(GameRequest $request, Game $game)
    {
        try {
            $game = $game->update($request->all());

            $notification = array(
                'message' => 'Game saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.games.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.games.index')->with($notification);
        }
    }

    public function destroy(Game $game)
    {
        try{
            Game::find($game->id)->delete();

            $notification = array(
                'message' => 'Game deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.games.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.games.index')->with($notification);
        }
    }
}
