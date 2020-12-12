<?php

class Auth extends Controller {


    public static function Action($request){

        if(trim($request['login']) == '' || $request['password'] == '') {
            die('incorrect params');
        }
        $params['login'] = trim($request['login']);
        $params['password'] = hash('sha256', $request['password']);

        $user = self::GetUser($params);
        if(!empty($user)) {

            $cookie_name = 'key';
            $cookie_value = substr($params['password'], 0, 5);;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            header('Location: /');
        } else {
            die('Incorrect login details');
        }
    }

    public static function GetUser($params) {
        return self::query("SELECT * FROM users WHERE login=:login AND password=:password", $params);
    }

    public static function Logout()
    {
        if (isset($_COOKIE['key'])) {
            unset($_COOKIE['key']);
            setcookie('key', null, -1, '/');
            header('Location: /');
        } else {
            die('Something went wrong..');
        }
    }
}