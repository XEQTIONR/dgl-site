<?php
return
[
  'steam_url'       =>  env('STEAM_USERINFO_URL'),
  'steam_api_key'   =>  env('STEAM_API_KEY'),

  'owapi_url'       =>  env('OW_API_URL'),
  'owapi_suffix'    =>  env('OW_API_SUFFIX'),

  'discord_client_id' => env('DISCORD_CLIENT_ID'),
  'discord_client_secret' => env('DISCORD_CLIENT_SECRET'),
  'discord_redirect_url' => env('DISCORD_REDIRECT_URI'),

  'battlenet_slug' => env('BATTLENET_SLUG', 'battlenet'),
  'steam_slug' => env('STEAM_SLUG', 'steam')
];