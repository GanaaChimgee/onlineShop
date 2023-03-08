<?php

class Session
{
    public static function setMessage($message)
    {
        $_SESSION['message'] = $message;
    }

    public static function hasMessage()
    {
        return !is_null($_SESSION['message']);
    }

    public static function flash()
    {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
        return $message;
    }

    // Session руу утга хадгалах
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    // Session оос өгөгдөл авах
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }

    // Session дээрээс өгөгдлийг устгах
    public static function delete($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    // Session-ийг logout үед устгаж өгнө
    public static function destroy()
    {
        session_destroy();
    }
}
