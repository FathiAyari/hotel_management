<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Historique;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // recuperer l'ensemble de clients
    public function index()
    {


        $clients = Client::where("user_id",Auth::id())->orderBy('created_at')->paginate(10);
        return view("clients.clients", compact('clients'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([// fonction de validation pour le contenu de requete http Request $request
            'name' => 'required',
            'lastname' => 'required',
            'nationality' => 'required',
            'ville' => 'required',
            'document_type' => 'required',

            'document_number' => 'required',
        ]);

        Client::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'lastname' => $request->lastname,
            'nationality' => $request->nationality,
            'ville' => $request->ville,
            'document_type' => $request->document_type,
            'gsm' => $request->gsm,
            'sexe' => $request->sexe,

            'document_number' => $request->document_number,
        ]); //creer un objet de la classe client
        $historique = History::create([

            'subject' => "vous avez ajouté le client " . $request->name . " " . $request->lastname,
            'type' => "success",
            'user_id' => Auth::id(),


        ]);

        return redirect()->route('clients.index')->with("success", "Client " . strtoupper($request->lastname) . " " . ucfirst($request->name) . "  a été ajouté(e) avec succès");

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {

        return view("clients.client_details", compact('client'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {

        return view("clients.edit_client", compact("client"));// redirection et compact d l'utilisateur courant
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)//request yjo mel formulaire
    {
        $request->validate([// fonction de validation pour le contenu de requete http Request $request
            'name' => 'required',
            'lastname' => 'required',
            'nationality' => 'required',
            'ville' => 'required',
            'document_type' => 'required',
            'document_number' => 'required',
        ]);

        $client->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'nationality' => $request->nationality,
            'ville' => $request->ville,
            'document_type' => $request->document_type,
            'document_number' => $request->document_number,
        ]);
        $historique = History::create([

            'subject' => "vous avez modifié  le client " . $request->name . " " . $request->lastname,
            'type' => "info",
            'user_id' => Auth::id(),


        ]);
        return redirect()->route('clients.index')->with("update", "Client " . strtoupper($client->lastname) . " " . ucfirst($client->name) . "  a été modifié(e) avec succès.");;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        $historique = History::create([

            'subject' => "vous avez supprimé le client " . $client->name . " " . $client->lastname . " avec tous ces vehicules",
            'type' => "danger",
            'user_id' => Auth::id(),


        ]);
        return redirect()->route('clients.index')->with("delete", "Client " . strtoupper($client->lastname) . " " . ucfirst($client->name) . "  a été supprimé(e).");
    }
}
