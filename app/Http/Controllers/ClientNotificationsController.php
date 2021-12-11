<?php

namespace App\Http\Controllers;

use App\ClientNotification;
use Illuminate\Http\Request;

class ClientNotificationsController extends Controller
{
    public function show(Request $request)
    {
        $clientnotifications = ClientNotification::all();

        LogsController::createLog($request, 'client event', 'view client events');

        return view('clientnotifications-show', ['clientnotifications' => $clientnotifications]);
    }

    public function create()
    {
        return view('clientnotification-create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'client_id' => 'required|numeric',
            'notification_id' => 'required|numeric',
            'start_time' => 'required|date',
            'frequency' => 'required|numeric',
            'status' => 'nullable'
        ]);

        ClientNotification::create($attributes);
        LogsController::createLog($request, 'client event', 'create client event');

        return redirect('/clientnotifications')->with('success', 'Client Event Created!');
    }

    public function update(ClientNotification $clientnotification, Request $request)
    {

        $attributes = request()->validate([
            'client_id' => 'required|numeric',
            'notification_id' => 'required|numeric',
            'start_time' => 'required|date',
            'frequency' => 'required|numeric',
            'status' => 'nullable'
        ]);

        $clientnotification->update($attributes);
        LogsController::createLog($request, 'client event', 'update client event');


        return redirect('/clientnotifications')->with('success', 'Client Event Updated!');
    }

    public function destroy(ClientNotification $clientnotification)
    {

        $clientnotification->delete();

        return response()->json(['status' => 'Client Event Deleted!']);
        //return redirect('/clients')
    }
}
