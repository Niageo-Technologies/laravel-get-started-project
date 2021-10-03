<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use Exception;

class PlayerController extends Controller
{
    public function __construct()
    {
        parent::__construct('player');
    }

    public function index()
    {
        $data['players'] = Player::latest()->paginate(10);
        return view('admin.player.index', $data);
    }

    public function create()
    {
        return view('admin.player.create');
    }

    public function store(PlayerRequest $request)
    {
        
        try{
            $player = Player::create($request->all());

            $notification = array(
                'message' => 'Player saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.players.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.players.index')->with($notification);
        }
    }

    public function show(Player $player)
    {
        //
    }

    public function edit(Player $player)
    {
        $data['player'] = $player;
        return view('admin.player.edit', $data);
    }

    public function update(PlayerRequest $request, Player $player)
    {
        try {
            $player = $player->update($request->all());

            $notification = array(
                'message' => 'Player saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.players.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.players.index')->with($notification);
        }
    }

    public function destroy(Player $player)
    {
        try{
            Player::find($player->id)->delete();

            $notification = array(
                'message' => 'Player deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.players.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.players.index')->with($notification);
        }
    }
}
