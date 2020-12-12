<?php

Route::set('index.php', function (){
    Index::CreateView('Index');
});

Route::set('auth', function (){
    Auth::CreateView('Auth');
});

Route::set('login', function () {
    Auth::Action($_POST);
});

Route::set('logout', function () {
    Auth::Logout();
});

Route::set('add', function () {
    Task::Add($_POST);
});

Route::set('update', function () {
    Task::Update($_POST);
});


