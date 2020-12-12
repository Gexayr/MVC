<?php

class Index extends Controller {

    public static function CreateView($viewName) {
        $data = self::getData();
        $admin = self::isAdmin();
        require_once './views/' . $viewName . '.php';
    }

    public static function getData(){
        return self::query("SELECT * FROM tasks");
    }

    public static function isAdmin(){
        if(isset($_COOKIE['key'])) {
            $result = self::query("SELECT * FROM users WHERE password LIKE CONCAT(:password, '%')", ['password' => $_COOKIE['key']]);
            if($result[0]['role'] == 'admin'){
                return true;
            }
        }
        return false;
    }

}