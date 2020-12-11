<?php

class Auth extends Controller {

        public static function doSomeThing() {
            print_r(self::query("SELECT * FROM users"));
        }
}