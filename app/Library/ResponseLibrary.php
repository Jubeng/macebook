<?php

namespace App\Library;

use Illuminate\Http\JsonResponse;
use App\Library\ConstantsLibrary;

/**
 * Class ResponseLibrary
 * @package App\Library
 * @author Joven Pajanustan
 * @version 1.0.0
 * @since 2023.03.24
 */
class ResponseLibrary
{
    /**
     * Response builder for all the requests
     *
     * @param  array $aResponse
     * @return JsonResponse
     */
    public function buildResponse(array $aResponse): JsonResponse
    {
        $aData = (array_key_exists('data', $aResponse) === true) ? $aResponse['data'] : [
            'code' => $aResponse['code'],
            'message' => $aResponse['message']
        ];
        return response()->json(
            $aData,
            $aResponse['code'],
            ConstantsLibrary::DEFAULT_HEADERS,
            JSON_PRETTY_PRINT);
    }
}