<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show(Request $request)
    {
        $users = User::all();

        //$user = User::find(auth()->id());
        // ddd($user->status);
        // //ddd(auth()->id());
        // $log_attributes = [
        //     'employee_id' => auth()->id(),
        //     'model' => 'employee',
        //     'action' => 'view employees',
        //     'date_time' => date('Y-m-d H:i:s'),
        //     'ip' => $request->ip()
        // ];

        // Log::create($log_attributes);

        return view('users-show', ['users' => $users]);
    }
}
