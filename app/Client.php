<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function notifications()
    {
        // return $this->belongsToMany(Notification::class, 'client_notifications', 'client_id', 'notification_id')
        //     ->withPivot(['start_time', 'frequency', 'status']);

        return $this->belongsToMany(Notification::class)->using(ClientNotification::class);
    }
}
