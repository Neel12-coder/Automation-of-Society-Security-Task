<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembersIrregularVisitorLog extends Model
{
    // use Notifiable;

    protected $fillable = [
        'member_id', 'irregular_visitor_log_id',
    ];

}
