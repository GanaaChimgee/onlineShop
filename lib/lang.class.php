<?php
class Lang
{
    /**
     * It loads the language file and stores the data in the  variable
     * 
     * @param language The language to load.
     */

    protected static $data;

    public static function load($language)
    {
        $path = ROOT . DS . 'lang' . DS . strtolower($language) . '.php';

        if (file_exists($path)) {
            self::$data = include $path;
        }
    }

    /**
     * It returns the value of the key if it exists, otherwise it returns null.
     * 
     * @param key The key to store the value under.
     * 
     * @return The value of the key in the array.
     */
    public static function get($key)
    {
        return self::$data[$key] ?? null;
    }
}
