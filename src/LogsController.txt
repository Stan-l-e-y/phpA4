<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public static function createLog($request, $model, $action)
    {
        $log_attributes = [
            'employee_id' => auth()->id(),
            'model' => $model,
            'action' => $action,
            'date_time' => date('Y-m-d H:i:s'),
            'ip' => $request->ip()
        ];

        Log::create($log_attributes);
    }

    public function show()
    {
        $logs = Log::all();

        return view('logs-show', ['logs' => $logs]);
    }
}
