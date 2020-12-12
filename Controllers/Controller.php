<?php

class Controller extends Database {

    public static function CreateView($viewName) {
        require_once './views/' . $viewName . '.php';
    }

    public static function render($ex)
    {
        if($ex === 'js'){
            $scripts = array_filter(scandir('./views/scripts/'), function ($item) {
                return !is_dir('./views/scripts/' . $item);
            });
            foreach ($scripts as $script) {
                echo "<script src='./views/scripts/$script'></script>";
            }
        } elseif($ex === 'css') {
            $styles = array_filter(scandir('./views/css/'), function ($item) {
                return !is_dir('./views/css/' . $item);
            });
            foreach ($styles as $style) {
                echo "<link rel='stylesheet' type='text/css' href='./views/css/$style'>";
            }
        }
    }
}