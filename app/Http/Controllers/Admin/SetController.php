<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetRequest;
use App\Models\Set;
use App\Models\Player;
use Exception;

class SetController extends Controller
{
    public function __construct()
    {
        parent::__construct('set');
    }

    public function index()
    {
        $data['sets'] = Set::latest()->paginate(10);
        return view('admin.set.index', $data);
    }

    public function create()
    {
        $options = $this->fetch_options_from_database(Player::class, 'name');
        // dd($options);
        return view('admin.set.create', ['options' => $options]);
    }

    public function store(SetRequest $request)
    {
        try{
            $set = Set::create($request->all());

            $notification = array(
                'message' => 'Set saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.sets.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.sets.index')->with($notification);
        }
    }

    public function show(Set $set)
    {
        //
    }

    public function edit(Set $set)
    {
        $data['set'] = $set;
        return view('admin.set.edit', $data);
    }

    public function update(SetRequest $request, Set $set)
    {
        try {
            $set = $set->update($request->all());

            $notification = array(
                'message' => 'Set saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.sets.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.sets.index')->with($notification);
        }
    }

    public function destroy(Set $set)
    {
        try{
            Set::find($set->id)->delete();

            $notification = array(
                'message' => 'Set deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.sets.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.sets.index')->with($notification);
        }
    }
}
