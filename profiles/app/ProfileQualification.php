<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ProfileInfo extends Eloquent
{
    protected $connection = 'mongodb';

    protected $collection = 'profile_qualifications';

    protected $guarded = ['profile_id'];
}
