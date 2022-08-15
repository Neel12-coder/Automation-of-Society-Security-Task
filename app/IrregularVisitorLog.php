<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IrregularVisitorLog extends Model
{
    protected $primaryKey = 'irregular_visitor_log_id';

    // use Notifiable;

    protected $fillable = [
        'temperature', 'reason_for_visit', 'email','name','phone_number','identification_photo','blob_image','added_to_collection',
    ];

    public function members()
    {
        return $this->belongsToMany(Members::class, 'members_irregular_visitor_logs');
    }
}
