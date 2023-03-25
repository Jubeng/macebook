<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\ConstantsLibrary;

/**
 * Class FollowModel
 * @package App\Models
 * @author Joven Pajanustan
 * @version 1.0.0
 * @since 2023.03.24
 */
class FollowModel extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'follower_id',
        'followed_id'
    ];
    
        
    /**
     * Insert the follow details to database and returns the inserted id
     *
     * @param  array $aFollowDetails
     * @return int
     */
    public function addFollowing(array $aFollowDetails): int
    {
        return DB::table(ConstantsLibrary::FOLLOW_TABLE)->insert([
            'follower_id' => $aFollowDetails['follower_id'],
            'followed_id' => $aFollowDetails['followed_id']
        ]);
    }
    
    /**
     * Delete follow details by the respective follower and followed id's
     * from database
     *
     * @param  array $aFollowDetails
     * @return object|string
     */
    public function deleteFollowing(array $aFollowDetails): object|string
    {
        return DB::table(ConstantsLibrary::FOLLOW_TABLE)
            ->where('follower_id', '=', $aFollowDetails['follower_id'])
            ->where('followed_id', '=', $aFollowDetails['followed_id'])
            ->delete();
    }
    
    /**
     * Verifying if the user already followed the given followed id
     *
     * @param  array $aFollowDetails
     * @return bool
     */
    public function checkIfFollowed(array $aFollowDetails): bool
    {
        return DB::table(ConstantsLibrary::FOLLOW_TABLE)
            ->where('follower_id', '=', $aFollowDetails['follower_id'])
            ->where('followed_id', '=', $aFollowDetails['followed_id'])
            ->exists();
    }
    
    /**
     * Return all the followers information that is filtered by name
     *
     * @param  mixed $aSearchDetails
     * @return object|string
     */
    public function getAllFollowersByName(array $aSearchDetails): object|string
    {
        return DB::table('follow')
            ->leftJoin('users', 'follow.follower_id', '=', 'users.id')
            ->where('follow.followed_id', $aSearchDetails['followed_id'])
            ->where('users.name', 'LIKE', '%' . $aSearchDetails['name'] . '%')
            ->get();
    }
}