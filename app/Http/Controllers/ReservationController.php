<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use App\Models\Client;
use App\Models\History;
use App\Models\Reservation;
use App\Models\Room;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::where("user_id", Auth::id())->where("done", false)->paginate(10);

        return view('reservations.reservations', compact("reservations"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = \request('id');
        $clients = Client::where("user_id", Auth::id())->get();
        return view("rooms.add_reservation", compact("id", "clients"));
    }

    /**
     * Store a newly created resource in storage.
     */

    public  function  mark($id){
        $res=Reservation::where("id",$id)->first();
        $res->update(["done"=>true]);
        $room = Room::where('id', $res->room_id)->first();
        $room->update([
            'state' => true,


        ]);

        $reservations = Reservation::where("user_id", Auth::id())->where("done", false)->paginate(10);

        return view('reservations.reservations', compact("reservations"));
    }

    public  function  factures(){
        $reservations = Reservation::where("user_id", Auth::id())->where("done", true)->paginate(10);

        return view('reservations.factures', compact("reservations"));
    }
    public function store(Request $request)
    {


        Reservation::create([
            'user_id' => Auth::id(),
            'extra' => $request->extra,
            'consumption' => $request->consumption,
            'start' => $request->start,
            'end' => $request->end,
            'client_id' => $request->client_id,
            'room_id' => $request->room_id,
            'done' => false,


        ]);

        $room = Room::where('id', $request->room_id)->first();
        $room->update([
            'state' => false,


        ]);
        return redirect()->route('reservations.index')->with("success", "Rservation " . "  a été ajouté(e) avec succès");

    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $room = Room::where('id', $reservation->room_id)->first();
        $room->update([
            'state' => true,


        ]);
        $reservation->delete();

        $historique = History::create([

            'subject' => "vous avez supprimé une reservation ",
            'type' => "danger",
            'user_id' => Auth::id(),


        ]);
        return redirect()->route('reservations.index')->with("delete", "Reservation " . "  a été supprimé.");
    }

    public  function generatePdf(){

        $id=\request("id");
        $data = Reservation::where('id',$id)->get()->first();
        $room = Room::where('id',$data->room_id)->get()->first();
        view()->share('data',$data);
        $date = Carbon::now()->format('Y-m-d');
        view()->share('date',$date);
        $startDate = \Carbon\Carbon::parse($data->start);
        $endDate = \Carbon\Carbon::parse($data->end);
        $diffInDays = $endDate->diffInDays($startDate)+1;
        $extra=$data->extra+$data->consumption;
        $ttc=$diffInDays*$room->price + $extra;
        view()->share('ttc',$ttc);

        $client=Client::where("id",$data->client_id)->first();



        $pdf=PDF::loadView('pdf');
        return $pdf->download($client->name." ".$client->lastname.".pdf");

    }
}
