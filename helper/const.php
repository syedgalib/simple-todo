<?php

if ( ! defined( 'SIMPLE_TODO_VERSION' ) ) {
    define( 'SIMPLE_TODO_VERSION', '1.0.0' );
}

if ( ! defined( 'SIMPLE_TODO_DB_TABLE_PREFIX' ) ) {
    define( 'SIMPLE_TODO_DB_TABLE_PREFIX', 'wpwax_cs' );
}

if ( ! defined( 'SIMPLE_TODO_PORT' ) ) {
    define( 'SIMPLE_TODO_PORT', 3000 );
}

if ( ! defined( 'SIMPLE_TODO_HOST' ) ) {
    define( 'SIMPLE_TODO_HOST', 'http://localhost:' . SIMPLE_TODO_PORT . '/' );
}

if ( ! defined( 'SIMPLE_TODO_HOST_BASE' ) ) {
    define( 'SIMPLE_TODO_HOST_BASE', SIMPLE_TODO_HOST . 'wp-content/plugins/simple-todo/' );
}

if ( ! defined( 'SIMPLE_TODO_IN_DEVELOPMENT' ) ) {
    define( 'SIMPLE_TODO_IN_DEVELOPMENT', SCRIPT_DEBUG );
}

if ( ! defined( 'SIMPLE_TODO_SCRIPT_VERSION' ) ) {
    define( 'SIMPLE_TODO_SCRIPT_VERSION', SIMPLE_TODO_VERSION );
}

if ( ! defined( 'SIMPLE_TODO_FILE' ) ) {
    define( 'SIMPLE_TODO_FILE', dirname( dirname( __FILE__ ) ) . '/simple-todo.php' );
}

if ( ! defined( 'SIMPLE_TODO_BASE' ) ) {
    define( 'SIMPLE_TODO_BASE', dirname( dirname( __FILE__ ) ) . '/' );
}

if ( ! defined( 'SIMPLE_TODO_LANGUAGES' ) ) {
    define( 'SIMPLE_TODO_LANGUAGES', SIMPLE_TODO_BASE . 'languages' );
}

if ( ! defined( 'SIMPLE_TODO_POST_TYPE' ) ) {
    define( 'SIMPLE_TODO_POST_TYPE', 'simple-todo' );
}

if ( ! defined( 'SIMPLE_TODO_TEMPLATE_PATH' ) ) {
    define( 'SIMPLE_TODO_TEMPLATE_PATH', SIMPLE_TODO_BASE . 'template/' );
}

if ( ! defined( 'SIMPLE_TODO_VIEW_PATH' ) ) {
    define( 'SIMPLE_TODO_VIEW_PATH', SIMPLE_TODO_BASE . 'view/' );
}

if ( ! defined( 'SIMPLE_TODO_URL' ) ) {
    define( 'SIMPLE_TODO_URL', plugin_dir_url( SIMPLE_TODO_FILE ) );
}

if ( ! defined( 'SIMPLE_TODO_ASSET_URL' ) ) {
    define( 'SIMPLE_TODO_ASSET_URL', SIMPLE_TODO_URL . 'assets/' );
}

if ( ! defined( 'SIMPLE_TODO_SRC_PATH' ) ) {
    define( 'SIMPLE_TODO_SRC_PATH', 'src/' );
}

if ( ! defined( 'SIMPLE_TODO_JS_PATH' ) ) {
    define( 'SIMPLE_TODO_JS_PATH',  SIMPLE_TODO_ASSET_URL . 'js/' );
}

if ( ! defined( 'SIMPLE_TODO_VENDOR_JS_PATH' ) ) {
    define( 'SIMPLE_TODO_VENDOR_JS_PATH',  SIMPLE_TODO_ASSET_URL . 'js/vendor-js' );
}

if ( ! defined( 'SIMPLE_TODO_VENDOR_JS_SRC_PATH' ) ) {
    define( 'SIMPLE_TODO_VENDOR_JS_SRC_PATH', 'assets/vendor-js/' );
}

if ( ! defined( 'SIMPLE_TODO_CSS_PATH' ) ) {
    define( 'SIMPLE_TODO_CSS_PATH', SIMPLE_TODO_ASSET_URL . 'css/' );
}

if ( ! defined( 'SIMPLE_TODO_LOAD_MIN_FILES' ) ) {
    define( 'SIMPLE_TODO_LOAD_MIN_FILES', ! SCRIPT_DEBUG );
}