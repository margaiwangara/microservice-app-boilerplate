<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ProfileCategory extends Eloquent
{
    protected $collection = 'profile_categories';

    protected $connection = 'mongodb';

    protected $guarded = [];

    public $timestamps = false;

}
