<?php


namespace AmavisWblist;


class Flash
{
    public static function add($type, $message)
    {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = ['message' => [], 'error' => []];
        }
        $_SESSION['flash'][$type][$message] = $message;
    }

    public static function addMessage($message)
    {
        return self::add('message', $message);
    }

    public static function addError($error)
    {
        return self::add('error', $error);
    }

    public static function get()
    {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = ['message' => [], 'error' => []];
        }
        return $_SESSION['flash'];
    }

    public static function reset()
    {
        $_SESSION['flash'] = ['message' => [], 'error' => []];
    }
}