<?php
class Lang
{
    protected static $data;

    public static function load($language)
    {
        $path = ROOT . DS . 'lang' . DS . strtolower($language) . '.php';

        if (file_exists($path)) {
            self::$data = include $path;
        }
    }

    public static function get($key)
    {
        return self::$data[$key] ?? null;
    }
}