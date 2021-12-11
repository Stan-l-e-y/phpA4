<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientNotification extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public $incrementing = true;
}
