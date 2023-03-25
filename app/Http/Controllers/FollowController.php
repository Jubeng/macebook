<?php

namespace App\Http\Controllers;

use App\Http\Requests\FollowRequest;
use App\Library\ResponseLibrary;
use Illuminate\Routing\Controller;
use App\Service\FollowService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class FollowController
 * @package App\Http\Controllers
 * @author Joven Pajanustan
 * @version 1.0.0
 * @since 2023.03.25
 */
class FollowController extends Controller
{
    /**
     * oService
     * 
     * @var FollowService
     */
    private $oService;
    
    /**
     * oResponse
     *
     * @var ResponseLibrary
     */
    private $oResponse;

    /**
     * FollowService constructor.
     * @param UserService $oService
     */
    public function __construct(FollowService $oService, ResponseLibrary $oResponse)
    {
        $this->oService = $oService;
        $this->oResponse = $oResponse;
    } 

    /**
     * Follow a user
     * 
     * Send the request data to follow a user to service layer and returns a JSON response.
     * 
     * @param  object $oRequest
     * @return JsonResponse
     */
    public function followUser(FollowRequest $oRequest): JsonResponse
    {
        $aResponse = $this->oService->followUser($oRequest->all());
        return $this->oResponse->buildResponse($aResponse);
    }
    
    /**
     * Unfollow a user
     * 
     * Send the request data to unfollow a user to service layer and returns a JSON response.
     *
     * @param  object $oRequest
     * @return Illuminate\Http\JsonResponse
     */
    public function unfollowUser(FollowRequest $oRequest): JsonResponse
    {
        $aResponse = $this->oService->unfollowUser($oRequest->all());
        return $this->oResponse->buildResponse($aResponse);
    }
    
    /**
     * searchFollowerByName
     *
     * @param  mixed $oRequest
     * @return JsonResponse
     */
    public function searchFollowerByName(Request $oRequest): JsonResponse
    {
        $aResponse = $this->oService->searchFollowerByName($oRequest->all());
        return $this->oResponse->buildResponse($aResponse);
    }
}