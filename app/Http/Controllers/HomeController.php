<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Historique;
use App\Models\History;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients=Client::where("user_id",Auth::id())->get();
        $rooms=Room::where("user_id",Auth::id())->get();
        $reservations=Reservation::where("user_id",Auth::id())->get();
        $history=History::where("user_id",Auth::id())->orderBy('created_at','desc')->paginate(5);

        return view('home',compact("clients","reservations","rooms","history"));
    }
}
