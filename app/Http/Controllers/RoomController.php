<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\History;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::where("user_id", Auth::id())->where("state",true)->orderBy('created_at')->paginate(10);
        return view("rooms.rooms", compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {


        Room::create([
            'user_id' => Auth::id(),
            'number' => $request->number,
            'floor' => $request->floor,
            'state' => true,
            'price' => $request->price,
            'type' => $request->type,


        ]);
        $historique = History::create([

            'subject' => "vous avez ajouté la chambre " . $request->number,
            'type' => "success",
            'user_id' => Auth::id(),


        ]);

        return redirect()->route('rooms.index')->with("success", "Chambre " . strtoupper($request->number) . "  a été ajouté(e) avec succès");

    }


    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {

        return view("rooms.room_details", compact('room'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {

        return view("rooms.edit_room", compact("room"));// redirection et compact d l'utilisateur courant
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)//request yjo mel formulaire
    {


        $room->update([
            'floor' => $request->floor,
            'number' => $request->number,
            'price' => $request->price,
            'type' => $request->type,


        ]);
        $historique = History::create([

            'subject' => "vous avez modifié  le chambre " . $request->number,
            'type' => "info",
            'user_id' => Auth::id(),


        ]);
        return redirect()->route('rooms.index')->with("update", "Chambre " . strtoupper($room->number) . "  a été modifié(e) avec succès.");;

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        $historique = History::create([

            'subject' => "vous avez supprimé la chambre " . $room->number,
            'type' => "danger",
            'user_id' => Auth::id(),


        ]);
        return redirect()->route('rooms.index')->with("delete", "Chambre " . strtoupper($room->number) . "  a été supprimé(e).");
    }
}
