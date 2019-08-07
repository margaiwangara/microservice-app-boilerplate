<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;

    protected $guarded = ['average_review'];

    public function category()
    {
        return $this->hasOne('App\ProfileCategory', 'id' ,'category_id');
    }

    public function specialties()
    {
        return $this->hasMany('App\ProfileSpecialty', 'profile_id');
    }

    public function information()
    {
        return $this->hasMany('App\ProfileInformation', 'profile_id');
    }

    public function qualifications()
    {
        return $this->hasMany('App\ProfileQualification', 'profile_id');
    }
}
