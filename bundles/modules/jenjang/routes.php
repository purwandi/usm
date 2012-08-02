<?php

Route::any('jenjang/(:any?)/(:any?)', array(
    'uses' => 'jenjang::jenjang@(:1)',
    'defaults' => array( 'index' ),
));

Route::any('jenjangtopik/(:any?)', array(
    'uses' => 'jenjang::topik@update',
));