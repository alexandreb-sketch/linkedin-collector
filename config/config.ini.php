<?php

// Configuration minimale RSS-Bridge
return array(
    // Type de cache (fichier sur disque)
    'cache' => 'FileCache',

    // Durée de cache en secondes (ici 1h)
    'cache_timeout' => 3600,

    // Mode debug (false en prod)
    'debug' => false,

    // Whitelist : n’autoriser que certains bridges
    'whitelist' => array(
        'mode' => 'whitelist',
        'bridges' => array(
            'LinkedInPublicBridge',
        ),
    ),
);
