<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'memberID',
        'birthdate',
        'firstname',
        'lastname',
        'street',
        'city',
        'zip',
        'phone',
        'email',
        'password',
        'role',
        'driverslicense',
        'profileimage'
    ];
}
