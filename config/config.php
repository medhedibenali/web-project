<?php

final class Config
{

    /**
     * $config is an array of configurations.
     * $config['db'] is an array of database configurations.
     * $config['db']['db1'] is the database configuration for db1.
     * $config['db']['db1']['dbname'] is the database name.
     * $config['db']['db1']['username'] is the database username.
     * $config['db']['db1']['password'] is the database password.
     * $config['db']['db1']['host'] is the database host.
     */

    public static $config = array(
        'db' => array(
            'db1' => array(
                'dbname' => 'web_project_db',
                'username' => 'root',
                'password' => '',
                'host' => 'localhost'
            )
        )
    );

    private function __construct()
    {
    }
}

/**
 * Constant for the project root.
 */

defined('PROJECT_PATH')
    or define('PROJECT_PATH', realpath(dirname(__FILE__, 2)));

/**
 * Constant for the public directory.
 */

defined('PUBLIC_PATH')
    or define('PUBLIC_PATH', realpath(PROJECT_PATH . '/public'));

/**
 * Constant for the modules directory.
 */

defined('MODULES_PATH')
    or define('MODULES_PATH', realpath(PROJECT_PATH . '/modules'));

/**
 * Constant for the templates directory.
 */

defined('TEMPLATES_PATH')
    or define('TEMPLATES_PATH', realpath(PROJECT_PATH . '/templates'));

/**
 * Error reporting.
 */

ini_set('error_reporting', 'true');
error_reporting(E_ALL | E_STRICT);
