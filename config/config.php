<?php

return array(
    'cache' => 'FileCache',

    'cache_timeout' => 3600,

    'debug' => false,

    'whitelist' => array(
        'mode' => 'whitelist',
        'bridges' => array(
            'LinkedInPublicBridge',
        ),
    ),
);
