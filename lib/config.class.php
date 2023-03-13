<?php
/* It's a class that allows you to set and get configuration settings */
class Config
{
    protected static $settings = [];

    public static function set($key, $value)
    {
        self::$settings[$key] = $value;
    }

    /**
     * It returns the value of the key in the settings array if it exists, otherwise it returns null
     * 
     * @param key The key of the setting you want to get.
     */
    public static function get($key)
    {
        return self::$settings[$key] ?? null;
    }
}
