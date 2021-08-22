<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlayerHasAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PlayerHasAttributeResource;

class PlayerHasAttributeController extends Controller
{
    public function __construct()
    {
        parent::__construct('player_has_attribute', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playerHasAttributes = PlayerHasAttribute::latest()->paginate(10);
        return PlayerHasAttributeResource::collection($playerHasAttributes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $playerHasAttribute = PlayerHasAttribute::create($data);
        return new PlayerHasAttributeResource($playerHasAttribute);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlayerHasAttribute  $playerHasAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(PlayerHasAttribute $playerHasAttribute)
    {
        return new PlayerHasAttributeResource($playerHasAttribute);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlayerHasAttribute  $playerHasAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlayerHasAttribute $playerHasAttribute)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $playerHasAttribute->update($request->all());
        return new PlayerHasAttributeResource($playerHasAttribute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlayerHasAttribute  $playerHasAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlayerHasAttribute $playerHasAttribute)
    {
        $playerHasAttribute->delete();
        return new PlayerHasAttributeResource($playerHasAttribute);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $playerHasAttributes = PlayerHasAttribute::where('title', 'like', '%'.$title.'%')->get();
        return PlayerHasAttributeResource::collection($playerHasAttributes);
    }
}