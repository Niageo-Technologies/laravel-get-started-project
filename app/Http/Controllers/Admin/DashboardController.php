<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ball;
use App\Models\Point;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:dashboard view")->only('index');
    }
    
    public function index()
    {
        $balls = Ball::all();
        $points = Point::all();
        //dd('stop');
        $data = ['balls' => $balls, 'points' => $points];
        return view('admin.dashboard.index', $data);
    }
}
