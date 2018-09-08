DROP TABLE IF EXISTS `sktd_oauth_clients` ;
CREATE TABLE sktd_oauth_clients (
    client_id VARCHAR(80) NOT NULL,
    client_secret VARCHAR(80) NOT NULL,
    redirect_uri VARCHAR(255) NOT NULL,
    grant_types VARCHAR(80),
    scope VARCHAR(255),
    user_id VARCHAR(255),
    CONSTRAINT clients_client_id_pk PRIMARY KEY (client_id)
);

DROP TABLE IF EXISTS `sktd_oauth_access_tokens` ;
CREATE TABLE sktd_oauth_access_tokens (
    access_token VARCHAR(40) NOT NULL,
    client_id VARCHAR(80) NOT NULL,
    user_id VARCHAR(255),
    expires TIMESTAMP NOT NULL,
    scope VARCHAR(255),
    CONSTRAINT access_token_pk PRIMARY KEY (access_token)
);

DROP TABLE IF EXISTS `sktd_oauth_authorization_codes` ;
CREATE TABLE sktd_oauth_authorization_codes (
    authorization_code VARCHAR(40) NOT NULL,
    client_id VARCHAR(80) NOT NULL,
    user_id VARCHAR(255),
    redirect_uri VARCHAR(255),
    expires TIMESTAMP NOT NULL,
    scope VARCHAR(255),
    id_token VARCHAR(255),
    CONSTRAINT auth_code_pk PRIMARY KEY (authorization_code)
);

DROP TABLE IF EXISTS `sktd_oauth_refresh_tokens` ;
CREATE TABLE sktd_oauth_refresh_tokens (
    refresh_token VARCHAR(40) NOT NULL,
    client_id VARCHAR(80) NOT NULL,
    user_id VARCHAR(255),
    expires TIMESTAMP NOT NULL,
    scope VARCHAR(255),
    CONSTRAINT refresh_token_pk PRIMARY KEY (refresh_token)
);

DROP TABLE IF EXISTS `sktd_oauth_users` ;
CREATE TABLE sktd_oauth_users (
    username VARCHAR(254) NOT NULL,
    password VARCHAR(254),
    first_name VARCHAR(254),
    last_name VARCHAR(254),
    CONSTRAINT username_pk PRIMARY KEY (username)
);

DROP TABLE IF EXISTS `sktd_oauth_scopes` ;
CREATE TABLE sktd_oauth_scopes (
    `type` VARCHAR(255) NOT NULL DEFAULT "supported",
    scope VARCHAR(255),
    client_id VARCHAR (80),
    is_default SMALLINT DEFAULT NULL
);

DROP TABLE IF EXISTS `sktd_oauth_jwt` ;
CREATE TABLE sktd_oauth_jwt (
    client_id VARCHAR(80) NOT NULL,
    subject VARCHAR(80),
    public_key VARCHAR(255),
    CONSTRAINT jwt_client_id_pk PRIMARY KEY (client_id)
);