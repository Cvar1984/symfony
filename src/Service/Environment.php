<?php

namespace App\Service;

/**
 * Class: Environment get environments variables
 *
 */
class Environment
{
    /**
     * things
     *
     * @var mixed
     */
    private static $things = [];
    /**
     * __construct
     *
     * @param string $appName
     */
    public function __construct(string $appName)
    {
        self::$things['app_name'] = $appName;
    }
    /**
     * get environment variables
     *
     * @param mixed $thing
     */
    public static function get($thing)
    {
        return self::$things[$thing];
    }
    /**
     * getAll environment array
     *
     * @return array
     */
    public static function getAll()
    {
        return self::$things;
    }
}
