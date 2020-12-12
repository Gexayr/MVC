<?php

class Task extends Controller {


    public static function Add($request) {

        if(strip_tags(htmlspecialchars(trim($request['name']))) == ''
            || strip_tags(htmlspecialchars(trim($request['desc']))) == ''
            || strip_tags(htmlspecialchars(trim($request['email']))) == ''
            || !filter_var(strip_tags(htmlspecialchars(trim($request['email']))),FILTER_VALIDATE_EMAIL)
        ) {
            die('incorrect params');
        }
        $params['author'] = strip_tags(htmlspecialchars(trim($request['name'])));
        $params['email'] = strip_tags(htmlspecialchars(trim($request['email'])));
        $params['description'] = strip_tags(htmlspecialchars(trim($request['desc'])));
        $result = self::SetTask($params);

        if($result == '1') {
            header('Location: /');
        } else {
            die($result);
        }
    }

    public static function SetTask($params) {
        return self::query("INSERT INTO tasks (author, email, description) VALUES (:author, :email, :description)", $params);
    }

    public static function Update($request) {
        $params['id'] = strip_tags(htmlspecialchars(trim($request['id'])));

        if(!empty(trim($request['content']))) {

            $params['description'] = trim($request['content']);
            $result = self::query("UPDATE tasks SET description=:description WHERE id=:id", $params);

        } elseif (!empty($request['completed'])) {
            $params['status'] = $request['completed'];
            $result = self::query("UPDATE tasks SET status=:status WHERE id=:id", $params);
        }
        if($result == '1') {
            echo 'success';
        } else {
            die($result);
        }
    }
}