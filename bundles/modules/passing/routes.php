<?php

Route::any('passing/(:any?)/(:any?)', array(
    'uses' => 'passing::passing@(:1)',
    'defaults' => array( 'index' ),
));