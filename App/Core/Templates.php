<?php

namespace App\Core;

class Templates
{
    public static function Page($page): void
    {
        if (file_exists(ROOT_DIR . DS . 'Templates' . DS . TEMPLATE . DS . $page . '.php')) {
            include ROOT_DIR . DS . 'Templates' . DS . TEMPLATE . DS . $page . '.php';
        }
    }

    public static function Http_Response_Code(): void
    {
        if (file_exists(ROOT_DIR . '/Templates/http_response_code'))
        {
            if (http_response_code(404)) {
                include ROOT_DIR . '/Templates/http_response_code/404.php';
            }
        }
    }
}