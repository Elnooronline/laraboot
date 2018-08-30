<?php

namespace Laraboot\Localization;

class Locale
{
    public $properties = [];

    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    /**
     * Get a list of language representations.
     *
     * @return static[]
     */
    public static function all()
    {
        $locales = app('laraboot.locales');

        foreach ($locales as $locale) {
            $instances[] = new static($locale);
        }

        return $instances;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->properties[$name];
    }
}
