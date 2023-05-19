<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Shopify API credentials
    |--------------------------------------------------------------------------
    |
    | These are the API credentials used for identifying your app during
    | the authorization process.
    |
    */

    'api_key'     => env('SHOPIFY_API_KEY', ''),
    'api_secret'  => env('SHOPIFY_API_SECRET', ''),

    /*
    |--------------------------------------------------------------------------
    | Shopify API Version
    |--------------------------------------------------------------------------
    |
    | This option is for the app's API version string.
    | Use "YYYY-MM", "unstable" or "legacy". Refer to Shopify documentation
    | at https://shopify.dev/api/usage/versioning#release-schedule
    | for the current stable version.
    |
    */
    'api_version' => env('SHOPIFY_API_VERSION', 'legacy'),

    /*
    |--------------------------------------------------------------------------
    | Shopify API configuration
    |--------------------------------------------------------------------------
    |
    | The timeout will be used to specify the maximum number of
    | seconds to wait for a response.
    |
    */

    'api_timeout' => 60,

    /*
    |--------------------------------------------------------------------------
    | Shopify API Scopes
    |--------------------------------------------------------------------------
    |
    | This option is for the scopes your application needs in the API.
    |
    */

    'api_scopes' => [
        'read_script_tags',
        'write_script_tags',
    ],

    /*
    |--------------------------------------------------------------------------
    | Disable routes
    |--------------------------------------------------------------------------
    |
    | Specify whether the OAuth routes should be disabled or not
    | OAuth callback.
    |
    */

    'disable_routes' => false,

    /*
    |--------------------------------------------------------------------------
    | Shopify OAuth Redirect
    |--------------------------------------------------------------------------
    |
    | This is the path the User will be redirected to after a successful
    | OAuth callback.
    |
    */

    'oauth_redirect_path' => env('SHOPIFY_OAUTH_REDIRECT_PATH', 'oauth/done'),

    /*
    |--------------------------------------------------------------------------
    | Token time tolerance
    |--------------------------------------------------------------------------
    |
    | This is the amount of time in second the "exp", "nbf" and "iat" are
    | allowed to be out by. This feature is primarily meant to used for
    | local development only.
    |
    */

    'token_time_tolerance' => env('SHOPIFY_TOKEN_TOLERANCE', 0),

    /**
     * Store-level app credentials - required for private apps
     */

    /*
    |--------------------------------------------------------------------------
    | Store-level app credentials
    |--------------------------------------------------------------------------
    |
    | These credentials are required for private apps.
    |
    */

    'shop_domain' => env('SHOPIFY_SHOP_DOMAIN'),

    'access_token' => env('SHOPIFY_ACCESS_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Shopify Webhooks
    |--------------------------------------------------------------------------
    |
    | Define webhooks for your application e.g.
    | [
    |     "topic"   => "orders/create",
    |     "address" => "https://example.hostname.com/",
    |     "format"  => "json",
    |     "fields"  => ["id", "note"]
    | ]
    |
    */

    'webhooks' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Shopify ScriptTags
    |--------------------------------------------------------------------------
    |
    | Define scriptTags for your application e.g.
    | https://example.com/path-to-your-script.js
    |
    */

    'script_tags' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Shop Model
    |--------------------------------------------------------------------------
    |
    | The Shop model implementation should be used.
    |
    */
    'shop_model'  => \Esc\Shopify\Models\Shop::class,
];
