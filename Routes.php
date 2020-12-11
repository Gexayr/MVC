<?php

Route::set('index.php', function (){
    Index::CreateView('Index');
});

Route::set('auth', function (){
    Auth::CreateView('Auth');
});

Route::set('contact-us', function (){
    ContactUs::CreateView('ContactUs');
});
