<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\ConstantsLibrary;

/**
 * Class UsersModel
 * @package App\Models
 * @author Joven Pajanustan
 * @version 1.0.0
 * @since 2023.03.24
 */
class UserModel extends Model
{   
    /**
     * fillable
     *
     * @var array
     */
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
   
    /**
     * fetch all users information from database
     *
     * @return object|string
     */
    public function getUsers(): object|string
    {
        return DB::table(ConstantsLibrary::USERS_TABLE)->get();
    }
    
    /**
     * Get user information by ID
     *
     * @param  int $iUserId
     * @return object|string
     */
    public function searchUsers(string $iUserId): object|string
    {
        return DB::table(ConstantsLibrary::USERS_TABLE)
                ->where('id', '=', $iUserId)
                ->get();
    }
    
    /**
     * Verfying if the provided id is a valid user
     *
     * @param  string $sId
     * @return bool
     */
    public function checkIfUserExist(string $sId): bool
    {
        return DB::table('users')->where('id', $sId)->exists();
    }
}
