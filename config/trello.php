<?php

return [

    /*
    |--------------------------------------------------------------------------
    | HTTP Driver
    |--------------------------------------------------------------------------
    |
    | Supported: "guzzlehttp"
    */

    'driver' => 'guzzlehttp',

    /*
    |--------------------------------------------------------------------------
    | API Credentials
    |--------------------------------------------------------------------------
    |
    | Enter the unhashed variant of your password if you use 'password' as 'auth_type'
    |
    | Supported auth types': "api", "password"
    |
    */


    'apiurl' => env('TRELLO_API_URL', 'https://api.trello.com/1'),

	'identifier' => env('TRELLO_API_IDENTIFIER', 'YOUR_API_IDENTIFIER'),
	'secret' => env('TRELLO_API_SECRET', 'YOUR_API_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | ResponseType
    |--------------------------------------------------------------------------
    |
    | Supported auth types': "json", "xml"
    |
    */

    'responsetype' => env('TRELLO_RESPONSE_TYPE', 'json'),
];
