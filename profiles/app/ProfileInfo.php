<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ProfileInfo extends Eloquent
{
    protected $connection = 'mongodb';

    protected $collection = 'profiles_info';

    protected $guarded = ['city_id', 'country_id', 'profile_id'];
}
