<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileSpecialty extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'description'];

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
