<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    //The controllers are where the logic is held for most of the application.
    //each controller is almost identical and performs almost the exact same CRUD tasks.
    //In each of the CRUD tasks, an associated LOG is attached to it so that whenever a task is made
    //it gets stored in the log file

    //The show method takes all of the clients from the client model, passes them to a view and returns that view
    public function show(Request $request)
    {

        $clients = Client::all();


        LogsController::createLog($request, 'client', 'view clients');

        return view('clients-show', ['clients' => $clients]);
    }

    //The create method simply returns the create view
    public function create()
    {
        return view('client-create');
    }

    //The update method validates all of the attributes sent in the request from the form and runs the update method on the client, finally
    //it returns to the clients page
    public function update(Client $client, Request $request)
    {

        $attributes = request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'required|string',
            'business_number' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'cell_number' => 'required|numeric',
            'carrier' => 'required|string',
            'hst_number' => 'nullable|numeric',
            'website' => 'nullable|string',
            'status' => 'nullable'

        ]);

        $client->update($attributes);

        LogsController::createLog($request, 'client', 'update client');

        return redirect('/clients')->with('success', 'Client Updated!');
    }
    //The destroy method simply runs the delete method from the Model class, which in turn deletes the associated client model
    public function destroy(Client $client)
    {

        $client->delete();

        return response()->json(['status' => 'Client Deleted!']);
        //return redirect('/clients')
    }

    //The store method validates the attributes sent to the request and runs the create method from the Client model class 
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'required|string',
            'business_number' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'cell_number' => 'required|numeric',
            'carrier' => 'required|string',
            'hst_number' => 'nullable|numeric',
            'website' => 'nullable|string',
            'status' => 'nullable'

        ]);

        Client::create($attributes);

        LogsController::createLog($request, 'client', 'create client');

        //session()->flash('success', 'Client Created!');

        return redirect('/clients')->with('success', 'Client Created!');
    }
}
