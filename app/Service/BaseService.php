<?php

namespace App\Service;

use App\Library\ConstantsLibrary;

/**
 * Class BaseService
 * @package App\Service
 * @author Joven Pajanustan
 * @version 1.0.0
 * @since 2023.03.25
 */
class BaseService
{    
    /**
     * Generate the array response for service
     *
     * @param  int $iCode
     * @param  string $sMessage
     * @return array
     */
    protected function generateResponse(int $iCode, string $sMessage): array
    {
        return [
            ConstantsLibrary::CODE    => $iCode,
            ConstantsLibrary::MESSAGE => $sMessage,
        ];
    }

    /**
     * organize user data based on the required structure
     *
     * @param  array $aUsers
     * @return array
     */
    protected function organizeUserData(array $aUsers): array
    {
        if (is_array($aUsers) === true && count($aUsers) > 0) {
            foreach ($aUsers as $iIndex => $aUser) {
                $aUsers[$iIndex] = [
                    'id'       => $aUser['id'],
                    'name'     => $aUser['name'],
                    'username' => $aUser['username'],
                    'email'    => $aUser['email'],
                    'address'  => [
                        'street'  => $aUser['address_street'],
                        'suite'   => $aUser['address_suite'],
                        'city'    => $aUser['address_city'],
                        'zipcode' => $aUser['address_zipcode'],
                        'geo'     => [
                            'lat' => $aUser['address_geo_lat'],
                            'lng' => $aUser['address_geo_lng'],
                        ]
                    ],
                    'phone'    => $aUser['phone'],
                    'website'  => $aUser['website'],
                    'company'  => [
                        'name'        => $aUser['company_name'],
                        'catchPhrase' => $aUser['company_catchPhrase'],
                        'bs'          => $aUser['company_bs']
                    ]

                ];
            }
        }
        return $aUsers;
    }
}