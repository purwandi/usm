<?php

Route::any('login', array(
    'uses' => 'users::login@(:1)',
    'defaults' => array( 'index' ),
));

Route::any('kaprodi/(:any?)/(:any?)', array(
    'uses' => 'users::kaprodi@(:1)',
    'defaults' => array( 'index' ),
));

Route::any('tatausaha/(:any?)/(:any?)', array(
    'uses' => 'users::tatausaha@(:1)',
    'defaults' => array( 'index' ),
));

Route::any('dosen/(:any?)/(:any?)', array(
    'uses' => 'users::dosen@(:1)',
    'defaults' => array( 'index' ),
));

Route::any('caba/(:any?)/(:any?)', array(
    'uses' => 'users::caba@(:1)',
    'defaults' => array( 'index' ),
));