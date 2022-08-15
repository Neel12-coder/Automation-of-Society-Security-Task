<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembersVisitorRegular extends Model
{
    // use Notifiable;

    protected $fillable = [
        'qr_id', 'member_id', 
    ];

    protected $hidden = [
        'qr_id',
    ];

}
