<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ball;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BallResource;

class BallController extends Controller
{
    public function __construct()
    {
        parent::__construct('ball', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balls = Ball::latest()->paginate(10);
        return BallResource::collection($balls);
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

        $ball = Ball::create($data);
        return new BallResource($ball);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ball  $ball
     * @return \Illuminate\Http\Response
     */
    public function show(Ball $ball)
    {
        return new BallResource($ball);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ball  $ball
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ball $ball)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $ball->update($request->all());
        return new BallResource($ball);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ball  $ball
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ball $ball)
    {
        $ball->delete();
        return new BallResource($ball);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $balls = Ball::where('title', 'like', '%'.$title.'%')->get();
        return BallResource::collection($balls);
    }
}