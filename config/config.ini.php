<?php
return [
  'cache' => 'FileCache',
  'cache_timeout' => 3600, // 1h
  'debug' => false,
  'whitelist' => [
    'mode' => 'whitelist',
    'bridges' => [
      'LinkedInPublicBridge', // autorise ton bridge
    ]
  ],
];
