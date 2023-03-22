<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 */
class UsersModel extends Model
{
    /**
     * The primary key of users table.
     *
     * @var string
     */
    protected $table = 'users';

    protected $fillable = [
        'name',
        'username',
        'email',
        'address_street',
        'address_suite',
        'address_city',
        'address_zipcode',
        'address_geo_lat',
        'address_geo_lng',
        'phone',
        'website',
        'company_name',
        'company_catchPhrase',
        'company_bs'
    ];
}
