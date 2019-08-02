<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Country extends Model
{
    /*
    *   countries table model
    *
    */

    protected $table = 'countries';

    public $timestamps = false;

    protected $guarded = ['uuid'];

    // default uuid generation
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }
}
