<?php

// Configuration minimale RSS-Bridge
return [
    // Type de cache (fichier sur disque)
    'cache' => 'FileCache',

    // Durée de cache en secondes (ici 1h)
    'cache_timeout' => 3600,

    // Mode debug (false en prod)
    'debug' => false,

    // Whitelist : n’autoriser que certains bridges
    'whitelist' => [
        'mode' => 'whitelist',
        'bridges' => [
            'LinkedInPublicBridge',
        ],
    ],
];
