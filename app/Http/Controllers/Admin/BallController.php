<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BallRequest;
use App\Models\Ball;
use App\Models\point;
use Exception;

class BallController extends Controller
{
    public function __construct()
    {
        parent::__construct('ball');
    }

    public function index()
    {
        $data['balls'] = Ball::latest()->paginate(10);
        return view('admin.ball.index', $data);
    }

    public function create()
    {
        return view('admin.ball.create');
    }

    public function store(BallRequest $request)
    {
        try{
            $ball = Ball::create($request->all());
            //dd($request->all());
            $notification = array(
                'message' => 'Ball added!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.games.show', ['game' => Point::find($request->point_id)->game->id])->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            //dd(Point::find($request->point_id)->game);
            return redirect()->route('admin.games.show', ['game' => Point::find($request->point_id)->game->id])->with($notification);
        }
    }

    public function show(Ball $ball)
    {
        //
    }

    public function edit(Ball $ball)
    {
        $data['ball'] = $ball;
        return view('admin.ball.edit', $data);
    }

    public function update(BallRequest $request, Ball $ball)
    {
        try {
            $ball = $ball->update($request->all());

            $notification = array(
                'message' => 'Ball saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.balls.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.balls.index')->with($notification);
        }
    }

    public function destroy(Ball $ball)
    {
        try{
            Ball::find($ball->id)->delete();

            $notification = array(
                'message' => 'Ball deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.balls.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.balls.index')->with($notification);
        }
    }
}
