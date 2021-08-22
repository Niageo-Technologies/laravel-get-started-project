<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerHasAttributeRequest;
use App\Models\PlayerHasAttribute;
use Exception;

class PlayerHasAttributeController extends Controller
{
    public function __construct()
    {
        parent::__construct('player_has_attribute');
    }

    public function index()
    {
        $data['playerHasAttributes'] = PlayerHasAttribute::latest()->paginate(10);
        return view('admin.player_has_attribute.index', $data);
    }

    public function create()
    {
        return view('admin.player_has_attribute.create');
    }

    public function store(PlayerHasAttributeRequest $request)
    {
        try{
            $playerHasAttribute = PlayerHasAttribute::create($request->all());

            $notification = array(
                'message' => 'PlayerHasAttribute saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.player-has-attributes.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.player-has-attributes.index')->with($notification);
        }
    }

    public function show(PlayerHasAttribute $playerHasAttribute)
    {
        //
    }

    public function edit(PlayerHasAttribute $playerHasAttribute)
    {
        $data['playerHasAttribute'] = $playerHasAttribute;
        return view('admin.player_has_attribute.edit', $data);
    }

    public function update(PlayerHasAttributeRequest $request, PlayerHasAttribute $playerHasAttribute)
    {
        try {
            $playerHasAttribute = $playerHasAttribute->update($request->all());

            $notification = array(
                'message' => 'PlayerHasAttribute saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.player-has-attributes.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.player-has-attributes.index')->with($notification);
        }
    }

    public function destroy(PlayerHasAttribute $playerHasAttribute)
    {
        try{
            PlayerHasAttribute::find($playerHasAttribute->id)->delete();

            $notification = array(
                'message' => 'PlayerHasAttribute deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.player-has-attributes.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.player-has-attributes.index')->with($notification);
        }
    }
}
