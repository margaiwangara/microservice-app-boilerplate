<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileCategory extends Model
{
   public $timestamps = false;

   protected $fillable = ['name'];
   
   public function profile()
   {
       return $this->belongsTo('App\Profile');
   }
}
