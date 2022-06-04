<?php

namespace SimpleTodo\Controller\Rest_API;

use SimpleTodo\Helper;

class Init {

    /**
	 * Constuctor
	 * 
     * @return void
	 */
	public function __construct() {

		// Register Controllers
        $controllers = $this->get_controllers();
        Helper\Serve::register_services( $controllers );

	}

    /**
	 * Controllers
	 * 
     * @return array Controllers
	 */
	protected function get_controllers() {
        return [
            
        ];
    }

}