<?php

Route::get('hasil', array(
    'uses' => 'jawab::hasil@index'
));

Route::get('api/jawab', array(
    'uses' => 'jawab::jawab@index'
));

Route::post('api/jawab', array(
    'uses' => 'jawab::jawab@update'
));