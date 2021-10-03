<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PointRequest;
use App\Models\Point;
use App\Models\Game;
use Exception;

class PointController extends Controller
{
    public function __construct()
    {
        parent::__construct('point');
    }

    public function index()
    {
        $data['points'] = Point::latest()->paginate(10);
        return view('admin.point.index', $data);
    }

    public function create()
    {
        return view('admin.point.create');
    }

    public function store(PointRequest $request)
    {
        try{
            $point = Point::create($request->all());

            $notification = array(
                'message' => 'Point saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.points.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.games.show', ['game' => Point::find($request->point_id)->game->id])->with($notification);
        }
    }

    public function show(Point $point)
    {
        //
    }

    public function edit(Point $point)
    {
        $data['point'] = $point;
        return view('admin.point.edit', $data);
    }

    public function update(PointRequest $request, Point $point)
    {
        try {
            $point = $point->update($request->all());

            $notification = array(
                'message' => 'Point saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.points.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.points.index')->with($notification);
        }
    }

    public function destroy(Point $point)
    {
        try{
            Point::find($point->id)->delete();

            $notification = array(
                'message' => 'Point deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.points.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.points.index')->with($notification);
        }
    }

    public function get_points(Game $game){   //to develop html options array given the Model
        $points = $game->points;
        return $points;
    }

    public function point_finished(Point $point){ //to develop html options array given the Model
        
        foreach($point->balls as $ball){
            if($ball->winner == true){
                return true;
            }
            return false;
        }
    }
}