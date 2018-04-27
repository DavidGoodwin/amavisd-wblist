<?php


namespace AmavisWblist;


class Flash
{
    /**
     * @param string $type
     * @param string $message
     * @return void
     */
    public static function add($type, $message)
    {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = ['message' => [], 'error' => []];
        }
        $_SESSION['flash'][$type][$message] = $message;
    }

    /**
     * @param string $message
     * @return void
     */
    public static function addMessage($message)
    {
        self::add('message', $message);
    }

    /**
     * @param string $error
     * @return void
     */
    public static function addError($error)
    {
        self::add('error', $error);
    }

    /**
     * @return array
     */
    public static function get()
    {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = ['message' => [], 'error' => []];
        }
        return $_SESSION['flash'];
    }

    /**
     * @return void
     */
    public static function reset()
    {
        $_SESSION['flash'] = ['message' => [], 'error' => []];
    }
}
