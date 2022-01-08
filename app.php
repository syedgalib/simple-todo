<?php

use SimpleTodo\Controller;
use SimpleTodo\Helper;

final class SimpleTodo {

    private static $instance;

    private function __construct() {

        // Register Controllers
        $controllers = $this->get_controllers();
        Helper\Serve::register_services( $controllers );

    }

    public static function get_instance() {
        if ( self::$instance === null ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function get_controllers() {
        return [
            Controller\Asset\Init::class,
        ];
    }

    public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, __('Cheatin&#8217; huh?', 'simple-todo'), '1.0' );
	}

	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, __('Cheatin&#8217; huh?', 'simple-todo'), '1.0' );
	}

}