<?php

class Session 
{
    public static function set($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        return $_SESSION[$name];
    }

    public static function exists($name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function delete($name)
    {
        if (self::exists($name))
            unset($_SESSION[$name]);
    }

    public static function addMessage($type, $message)
    {
        $sessionName = 'alert-' . $type;
        self::set($sessionName, $msg);
    }

    public static function displayMessage()
    {
        $alerts = ['alert-info', 'alert-success', 'alert-warning', 'alert-danger'];
        $html = '';

        foreach($alerts as $alert) {
            if (self::exists($alert)) {
                $html .= '<div class="alert '. $alert .' alert-dismissible" role="alert">';
                $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                $html .= self::get($alert);
                $html .= '</div>';
                self::delete($alert);
            }
        }

        return $html;
    }
}