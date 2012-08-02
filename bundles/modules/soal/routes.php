<?php

Route::any('soal/(:any?)/(:any?)/(:any?)/(:any?)', array(
    'uses' => 'soal::soal@(:1)',
    'defaults' => array( 'index' ),
));