<?php

namespace App\Http\Controllers;

use App\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function show(Request $request)
    {
        $users = User::all();

        $user = User::find(auth()->id());
        //ddd($user->status);
        //ddd(auth()->id());
        $log_attributes = [
            'employee_id' => auth()->id(),
            'model' => 'employee',
            'action' => 'view employees',
            'date_time' => date('Y-m-d H:i:s'),
            'ip' => $request->ip()
        ];

        Log::create($log_attributes);

        return view('users-show', ['users' => $users]);
    }

    public function create()
    {
        return view('user-create');
    }

    public function store(Request $request)
    {


        $attributes = request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', Rule::unique('users', 'email')],
            'cell_number' => 'required|string',
            'position' => 'required|string',
            'picture' => 'image|nullable',
            'password' => 'required|string',
            'status' => 'nullable'
        ]);

        if (isset($attributes['picture']) && !is_null($attributes['picture'])) {
            $attributes['picture'] = request()->file('picture')->store('pictures');
        }

        //ddd($request->ip());


        User::create($attributes);


        $log_attributes = [
            'employee_id' => auth()->id(),
            'model' => 'employee',
            'action' => 'create employee',
            'date_time' => date('Y-m-d H:i:s'),
            'ip' => $request->ip()
        ];

        Log::create($log_attributes);


        return redirect('/users')->with('success', 'Employee Created!');
    }

    public function update(User $user, Request $request)
    {

        $attributes = request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => ['required', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->id)],
            'cell_number' => 'required|string',
            'position' => 'required|string',
            'picture' => 'image',
            'status' => 'nullable'

        ]);

        if (isset($attributes['picture'])) {
            $attributes['picture'] = request()->file('picture')->store('pictures');
        }

        $user->update($attributes);

        $log_attributes = [
            'employee_id' => auth()->id(),
            'model' => 'employee',
            'action' => 'update employee',
            'date_time' => date('Y-m-d H:i:s'),
            'ip' => $request->ip()
        ];

        Log::create($log_attributes);
        //return response()->json(['status' => 'Client Updated!']);
        return redirect('/users')->with('success', 'Employee Updated!');
    }

    public function destroy(User $user)
    {

        $user->delete();

        return response()->json(['status' => 'Employee Deleted!']);
        //return redirect('/clients')
    }
}
