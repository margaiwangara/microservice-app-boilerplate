<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ProfileSpecialty extends Eloquent
{
    protected $connection = 'mongodb';

    protected $collection = 'profile_specialties';

    protected $guarded = ['profile_id'];
}
