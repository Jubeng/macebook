<?php

namespace App\Service;

use App\Library\ConstantsLibrary;
use App\Models\FollowModel;
use App\Models\UserModel;
use App\Service\BaseService;
use Exception;

/**
 * Class FollowService
 * @package App\Service
 * @author Joven Pajanustan
 * @version 1.0.0
 * @since 2023.03.25
 */
class FollowService extends BaseService
{  
    /**
     * FollowModel variable
     * 
     * @var FollowModel
     */
    private $oFollowModel;

    /**
     * UserModel variable
     * 
     * @var UserModel
     */
    private $oUserModel;

    /**
     * FollowModel constructor.
     * @param FollowModel $oModel
     */
    public function __construct(FollowModel $oFollowModel, UserModel $oUserModel)
    {
        $this->oFollowModel = $oFollowModel;
        $this->oUserModel = $oUserModel;
    }
        
    /**
     * Follows the followed_id by the respective user
     *
     * @param  array $aFollowDetails
     * @return array
     */
    public function followUser(array $aFollowDetails): array
    {
        try {
            $aValidIds = $this->checkIfUserExist($aFollowDetails);

            if ($aValidIds['code'] === ConstantsLibrary::CODE_400) {
                return $aValidIds;
            }

            $bFollowed = $this->checkIfUserIsFollowed($aFollowDetails);
            if ($bFollowed === true) {
                return $this->generateResponse(ConstantsLibrary::CODE_200, 'You already followed this user.');
            }
            $oInsertResponse = $this->oFollowModel->addFollowing($aFollowDetails);
            if ($oInsertResponse !== 1) {
                return $this->generateResponse(ConstantsLibrary::CODE_400, ConstantsLibrary::GENERIC_ERROR_MESSAGE);
            }
            return $this->generateResponse(ConstantsLibrary::CODE_200,'You are now following the user.');
        } catch (Exception $oException) {
            return $this->generateResponse(ConstantsLibrary::CODE_400, ConstantsLibrary::GENERIC_ERROR_MESSAGE);
        }
    }
    
    /**
     * Unfollows the followed_id by the respective user
     *
     * @param  mixed $aFollowDetails
     * @return array
     */
    public function unfollowUser(array $aFollowDetails): array
    {
        try {
            $aValidIds = $this->checkIfUserExist($aFollowDetails);

            if ($aValidIds['code'] === ConstantsLibrary::CODE_400) {
                return $aValidIds;
            }
            $oDeleteResponse = $this->oFollowModel->deleteFollowing($aFollowDetails);
            if ($oDeleteResponse === "0") {
                return $this->generateResponse(ConstantsLibrary::CODE_200, 'You are not following this user.');
            }
            return $this->generateResponse(ConstantsLibrary::CODE_200, 'You now unfollowed this user.');
        } catch  (Exception $oException) {
            return $this->generateResponse(ConstantsLibrary::CODE_400, ConstantsLibrary::GENERIC_ERROR_MESSAGE);
        }
    }

    /**
     * Fetch all the followers filtered by name from Model
     *
     * @param  mixed $aFollowDetails
     * @return array
     */
    public function searchFollowerByName(array $aSearchDetails): array
    {
        try {
            $aUserDetails = json_decode($this->oFollowModel->getAllFollowersByName($aSearchDetails), true);
            if (count($aUserDetails) < 1) {
                return $this->generateResponse(ConstantsLibrary::CODE_200, 'No results found.');
            }
            
            return [
                ConstantsLibrary::CODE => ConstantsLibrary::CODE_200,
                ConstantsLibrary::DATA => $this->organizeUserData($aUserDetails)
            ];
        } catch  (Exception $oException) {
            return $this->generateResponse(ConstantsLibrary::CODE_400, ConstantsLibrary::GENERIC_ERROR_MESSAGE);
        }
    }
    
    /**
     * Returns bool to check if user is following the given id
     *
     * @param  array $aFollowDetails
     * @return bool
     */
    private function checkIfUserIsFollowed(array $aFollowDetails): bool
    {
        return $this->oFollowModel->checkIfFollowed($aFollowDetails);
    }

        
    /**
     * Check if the user ids exist in the database
     *
     * @param  array $aFollowDetails
     * @return array
     */
    private function checkIfUserExist(array $aFollowDetails): array
    {
        $isValidFollowerId = $this->oUserModel->checkIfUserExist($aFollowDetails['follower_id']);
        $isValidFollowedId = $this->oUserModel->checkIfUserExist($aFollowDetails['followed_id']);
        if ($isValidFollowerId !== true || $isValidFollowedId !== true) {
            return $this->generateResponse(ConstantsLibrary::CODE_400, 'User doesn\'t exist.');
        }

        return $this->generateResponse(ConstantsLibrary::CODE_200, 'User exist.');
    }
}