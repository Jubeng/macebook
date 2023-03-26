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
            $aValidateResponse = $this->validateFollowData($aFollowDetails, 'follow');
            if ($aValidateResponse[ConstantsLibrary::CODE] !== ConstantsLibrary::CODE_200) {
                return $aValidateResponse;
            }

            $bFollowed = $this->checkIfUserIsFollowed($aFollowDetails);
            if ($bFollowed === true) {
                return $this->generateResponse(ConstantsLibrary::CODE_200, 'You already followed this user.');
            }

            $oInsertResponse = $this->oFollowModel->addFollowing($aFollowDetails);
            if ($oInsertResponse !== 1) {
                return $this->generateResponse(ConstantsLibrary::CODE_400, ConstantsLibrary::GENERIC_ERROR_MESSAGE);
            }

            return $this->generateResponse(ConstantsLibrary::CODE_200,'You are now following this user.');
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
            $aValidateResponse = $this->validateFollowData($aFollowDetails, 'unfollow');
            if ($aValidateResponse[ConstantsLibrary::CODE] !== ConstantsLibrary::CODE_200) {
                return $aValidateResponse;
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
            $isValidFollowedId = $this->checkIfUserExist($aSearchDetails['followed_id']);
            if ($isValidFollowedId !== true) {
                return $this->generateResponse(ConstantsLibrary::CODE_400, 'User doesn\'t exist.');
            }

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
     * Common validations of follow and unfollow methods
     *
     * @param  array $aFollowDetails
     * @param  string $sMethod
     * @return array
     */
    private function validateFollowData(array $aFollowDetails, string $sMethod): array
    {
        $isValidFollowerId = $this->checkIfUserExist($aFollowDetails['follower_id']);
        $isValidFollowedId = $this->checkIfUserExist($aFollowDetails['followed_id']);
        if ($isValidFollowerId !== true || $isValidFollowedId !== true) {
            return $this->generateResponse(ConstantsLibrary::CODE_400, 'User doesn\'t exist.');
        }

        if ($aFollowDetails['follower_id'] === $aFollowDetails['followed_id']) {
            return $this->generateResponse(ConstantsLibrary::CODE_400, 'You cannot ' . $sMethod . ' yourself.');
        }
        return $this->generateResponse(ConstantsLibrary::CODE_200, 'Data is valid.');
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
     * Check if the user id exist in the database
     *
     * @param  string $sId
     * @return bool
     */
    private function checkIfUserExist(string $sId): bool
    {
        return $this->oUserModel->checkIfUserExist($sId);
    }
}