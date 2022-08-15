<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitorRegular extends Model
{
    protected $primaryKey = 'visitor_regular_id';

    // use Notifiable;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'registered_by', 'reason_for_visit', 'name','identification_photo','blob_image','added_to_collection',
    ];

    protected $hidden = [
        'qr_id',
    ];

    public function regularVisitorLog()
    {
        return $this->hasMany(regularVisitorLog::class,'qr_id','qr_id');
    }

    public function members()
    {
        return $this->belongsToMany(Members::class, 'members_visitor_regulars');
    }
}
