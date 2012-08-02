<?php

Route::any('topik/(:any?)/(:any?)', array(
    'uses' => 'topik::topik@(:1)',
    'defaults' => array( 'index' ),
));