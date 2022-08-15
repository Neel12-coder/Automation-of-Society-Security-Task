<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $primaryKey = 'member_id';

    // use Notifiable;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'society_id', 'name', 'login_password','role','profile_photo','remember_token',
    ];

    protected $hidden = [
        'login_password','remember_token', 
    ];

    public function society()
    {
        return $this->belongsTo(Society::class,'society_id','society_id');
    }

    public function visitorRegular()
    {
        return $this->belongsToMany(VisitorRegular::class, 'members_visitor_regulars');
    }

    public function irregularVisitorLog()
    {
        return $this->belongsToMany(IrregularVisitorLog::class, 'members_irregular_visitor_logs');
    }

    public function getAuthPassword()
    {
     return $this->login_password;
    }

    public function user()
    {
        return $this->hasOne(User::class, 'member_id', 'member_id');
    }
}
