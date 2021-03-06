<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function notifications()
    {
        //The client model defines the relationship between notifications and clients

        return $this->belongsToMany(Notification::class)->using(ClientNotification::class);
    }
}
