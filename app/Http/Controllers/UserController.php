<?php

namespace App\Http\Controllers;

use App\Library\ConstantsLibrary;
use App\Library\ResponseLibrary;
use Illuminate\Routing\Controller;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers
 * @author Joven Pajanustan
 * @version 1.0.0
 * @since 2023.03.24
 */
class UserController extends Controller
{    
    /**
     * @var UserService
     */
    private $oService;

    /**
     * @var ResponseLibrary
     */
    private $oResponseLibrary;

    /**
     * UserService constructor.
     * @param UserService $oService
     */
    public function __construct(UserService $oService, ResponseLibrary $oResponseLibrary)
    {
        $this->oService = $oService;
        $this->oResponseLibrary = $oResponseLibrary;
    }

    /**
     * Retrieves a list of users from the service layer and returns a JSON response.
     * 
     * @return JsonResponse
     */
    public function getUsers(): JsonResponse
    {
        $mResponse = $this->oService->getUsers();
        return $this->oResponseLibrary->buildResponse($mResponse);
    }
}
