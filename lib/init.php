<?php
/* Starting a session. */
session_start();

/**
 * It prints the array in a readable format and then exits the script.
 * 
 * @param array The array to be sorted.
 */
function dd($array)
{
    // laravel => dd => debug and die
    echo "<pre>";
    print_r($array);
    exit;
}

/* A function that is called when a class is instantiated. It checks if the class exists and if it
does, it includes it. */
spl_autoload_register(function ($class_name) {
    $class_name = strtolower($class_name);

    $lib_path = ROOT . DS . 'lib' . DS . $class_name . '.class.php';
    $model_path = ROOT . DS . 'models' . DS . $class_name . '.php';
    $controller_path = ROOT . DS . 'controllers' . DS . str_replace('controller', '.controller', $class_name) . '.php';

    if (file_exists($lib_path)) {
        require $lib_path;
    } elseif (file_exists($model_path)) {
        require $model_path;
    } elseif (file_exists($controller_path)) {
        require $controller_path;
    } else {
        die($class_name . ' классыг autoload хийж чадсангүй!');
    }
});

require_once ROOT . DS . 'config' . DS . 'config.php';

/**
 * If the key exists in the language file, return the value, otherwise return the default value
 * 
 * @param key The key of the language item.
 * @param default_value The default value to return if the key is not found.
 * 
 * @return The value of the key if it exists, otherwise the default value.
 */
function __($key, $default_value = '')
{
    return Lang::get($key) ?? $default_value;
}
