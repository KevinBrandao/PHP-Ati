<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{

    public function store(StoreClientRequest $request)
    {

        $client = Client::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'id_number'=>$request->id_number
        ]);

        return response()->json($client);
    }

    public function name($name)
    {
        $client = Client::where('name', '=', $name)->get();
        return response()->json($client);
    }

    public function text($name)
    {
        $client = Client::where('name', 'LIKE', "%$name%")->get();
        return response()->json($client);
    }

    public function bills($client)
    {
        $client = Bill::where('client_id', '=', $client)->get();
        return response()->json($client);
    }

    public function expensive($valor)
    {
        $valor = Bill::where('value', '>', $valor)->get();
        return response()->json($valor);
    }

    public function between($valor1, $valor2)
    {
        $valor = Bill::where('value', '>', $valor1)->where('value', '<', $valor2)->get();
        return response()->json($valor);


    }
    public function order()
    {
        $client = Client::orderBy('name', 'asc')->limit(2)->get();
        return response()->json($client);
    }

    public function create()
    {
        return view('clients.create');
    }
}
