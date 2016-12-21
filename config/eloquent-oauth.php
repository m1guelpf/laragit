<?php

use App\User;

return [
    'model'     => User::class,
    'table'     => 'oauth_identities',
    'providers' => [
      'github' => [
          'client_id'     => env('GITHUB_ID'),
          'client_secret' => env('GITHUB_SECRET'),
          'redirect_uri'  => 'http://github.local.dev/callback',
          'scope'         => ['notifications'],
      ],
    ],
];
