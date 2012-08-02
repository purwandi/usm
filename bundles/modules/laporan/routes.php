<?php

Route::any('laporan/(:any?)/(:any?)', array(
    'uses' => 'laporan::laporan@(:1)',
    'defaults' => array( 'index' ),
));