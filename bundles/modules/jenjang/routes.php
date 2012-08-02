<?php

Route::any('jenjang/(:any?)/(:any?)', array(
    'uses' => 'jenjang::jenjang@(:1)',
    'defaults' => array( 'index' ),
));

Route::any('jenjangtopik/(:any?)/(:any?)', array(
    'uses' => 'jenjang::topik@(:1)',
    'defaults' => array( 'update' )
));