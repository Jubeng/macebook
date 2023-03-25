<?php

namespace App\Service;

use App\Models\UserModel;
use App\Library\ConstantsLibrary;

/**
 * Class UserService
 * @package App\Service
 * @author Joven Pajanustan
 * @version 1.0.0
 * @since 2023.03.24
 */
class UserService extends BaseService
{   
    /**
     * UsersModel variable
     * 
     * @var UserModel
     */
    private $oModel;

    /**
     * UsersModel constructor.
     * @param UserModel $oModel
     */
    public function __construct(UserModel $oModel)
    {
        $this->oModel = $oModel;
    }
    
    /**
     * fetch users from the database
     *
     * @return array
     */
    public function getUsers(): array
    {
        $aUsers = json_decode($this->oModel->getUsers(), true);
        return [
            ConstantsLibrary::CODE => ConstantsLibrary::CODE_200,
            ConstantsLibrary::DATA => $this->organizeUserData($aUsers)
        ];
    }
}
