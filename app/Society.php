<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    // use Notifiable;
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'society_id';

    protected $fillable = [
        'society_name', 'society_address', 'society_registeration_date','number_of_flats','number_of_buildings',
    ];

    protected $hidden = [
        'society_registeration_number',
    ];

    public function members()
    {
        return $this->hasMany(Members::class,'society_id','society_id');
    }

}
