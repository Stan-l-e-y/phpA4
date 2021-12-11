<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function show(Request $request)
    {
        $notifications = Notification::all();

        LogsController::createLog($request, 'notification', 'view notifications');
        return view('notifications-show', ['notifications' => $notifications]);
    }

    public function create()
    {
        return view('notification-create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|string',
            'type' => 'required',
            'status' => 'string'
        ]);

        Notification::create($attributes);
        LogsController::createLog($request, 'notification', 'create notification');

        return redirect('/notifications')->with('success', 'Notification Created!');
    }

    public function update(Notification $notification, Request $request)
    {

        $attributes = request()->validate([
            'name' => 'required|string',
            'type' => 'required',
            'status' => 'string'
        ]);

        $notification->update($attributes);
        LogsController::createLog($request, 'notification', 'update notification');

        //return response()->json(['status' => 'Client Updated!']);
        return redirect('/notifications')->with('success', 'Notification Updated!');
    }

    public function destroy(Notification $notification)
    {

        $notification->delete();

        return response()->json(['status' => 'Notification Deleted!']);
        //return redirect('/clients')
    }
}
