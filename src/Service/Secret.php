<?php

namespace App\Service;

/**
 * Class: Secret
 *
 */
class Secret
{
    /**
     * key
     *
     * @var mixed
     */
    private static $key;
    /**
     * __construct
     *
     * @param mixed $secretKey
     */
    public function __construct($secretKey)
    {
        self::$key = $secretKey;
    }
    /**
     * get
     *
     */
    public static function get()
    {
        return self::$key;
    }
}
