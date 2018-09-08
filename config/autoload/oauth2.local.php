<?php

return [
    'zf-oauth2' => [
        'db' => [
            'dsn' => 'mysql:dbname=zend_comics;host=localhost', // for example "mysql:dbname=oauth2_db;host=localhost"
            'username' => 'root',
            'password' => '',
        ],
        'storage' => 'ZF\OAuth2\Adapter\PdoAdapter', // service name for the OAuth2 storage adapter
        'storage_settings' => [
            'client_table' => 'sktd_oauth_clients',
            'access_token_table' => 'sktd_oauth_access_tokens',
            'refresh_token_table' => 'sktd_oauth_refresh_tokens',
            'code_table' => 'sktd_oauth_authorization_codes',
            'user_table' => 'sktd_oauth_users',
            'jwt_table' => 'sktd_oauth_jwt',
            'jti_table' => 'sktd_oauth_jti',
            'scope_table' => 'sktd_oauth_scopes',
            'public_key_table' => 'sktd_oauth_public_keys',
        ],
        'grant_types' => [
            'client_credentials' => true,
            'authorization_code' => true,
            'password' => true,
            'refresh_token' => true,
            'jwt' => true,
        ],
        /**
         * These special OAuth2Server options are parsed outside the options array
         */
        'allow_implicit' => true, // default (set to true when you need to support browser-based or mobile apps)
        'access_lifetime' => 3600, // default (set a value in seconds for access tokens lifetime)
        'enforce_state' => true, // default

        /**
         * These are all OAuth2Server options with their default values
         */
        'options' => [
            'use_jwt_access_tokens' => true,
            'store_encrypted_token_string' => true,
            'use_openid_connect' => false,
            'id_lifetime' => 3600,
            'www_realm' => 'Service',
            'token_param_name' => 'access_token',
            'token_bearer_header_name' => 'Bearer',
            'require_exact_redirect_uri' => true,
            'allow_credentials_in_request_body' => true,
            'allow_public_clients' => true,
            'always_issue_new_refresh_token' => false,
            'unset_refresh_token_after_use' => true,
        ],
    ],
];
