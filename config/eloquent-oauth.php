<?php

use App\User;

return [
    'model'     => User::class,
    'table'     => 'oauth_identities',
    'providers' => [
      'github' => [
          'client_id'     => '3661674a3b8566c1e51b',
          'client_secret' => 'f422ba9c553f3a93950f17937d10b0f8ac9d7faf',
          'redirect_uri'  => 'http://github.local.dev/callback',
          'scope'         => ['notifications'],
      ],
    ],
];
