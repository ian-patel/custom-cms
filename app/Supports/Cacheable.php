<?php

namespace App\Supports;

trait Cacheable
{
    /**
     * @var null
     */
    public static $cache = null;

    /**
     * Get all the locations
     *
     * @return object
     */
    public static function all()
    {
        if (self::$cache) {
            return self::$cache;
        }

        $self = new self();
        self::$cache = $self->get();
        return self::$cache;
    }
}