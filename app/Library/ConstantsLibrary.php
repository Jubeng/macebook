<?php

namespace App\Library;

/**
 * Class ConstantsLibrary
 * @package App\Library
 * @author Joven Pajanustan
 * @version 1.0.0
 * @since 2023.03.25
 */
class ConstantsLibrary
{
    /**
     * Constant for users table
     */
    const USERS_TABLE = 'users';

    /**
     * Constant for follow table
     */
    const FOLLOW_TABLE = 'follow';

    /**
     * Constant for the alias of follow table
     */
    const FOLLOW_TABLE_ALIAS = 'F';

    /**
     * Constant for the alias of users table
     */
    const USERS_TABLE_ALIAS = 'U';

    /**
     * Constant for default headers for responses
     */
    const DEFAULT_HEADERS = [
        'Content-Type'  => 'application/json',
        'Cache-Control' => 'no-cache',
        'Server'        => 'macebook/1.0',
    ];

    /**
     * Constant for generic error message
     */
    const GENERIC_ERROR_MESSAGE = 'Error occured during this process, try again later';

    /**
     * Constant for code key
     */
    const CODE = 'code';

    /**
     * Constant for message key
     */
    const MESSAGE = 'message';

    /**
     * Constant for data key
     */
    const DATA = 'data';

    /**
     * Constants for HTTP response status
     */
    const CODE_200 = 200;
    const CODE_400 = 400;
    const CODE_403 = 403;
    const CODE_422 = 422;
}