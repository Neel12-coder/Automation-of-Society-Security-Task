<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegularVisitorLog extends Model
{
    protected $primaryKey = 'regular_visitor_log_id';

    // use Notifiable;

    protected $fillable = [
        'qr_id', 'temperature', 
    ];

    protected $hidden = [
        'qr_id',
    ];

    public function visitorRegular()
    {
        return $this->belongsTo(Society::class,'qr_id','qr_id');
    }
}
