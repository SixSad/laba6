<?php



class Session
{
    static public function set($name, $value): void
    {
        $_SESSION[$name] = $value;
    }

    static public function get($name)
    {
        return $_SESSION[$name] ?? null;
    }

    static public function clear($name)
    {
        unset($_SESSION[$name]);
    }
}
