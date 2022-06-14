<?php

namespace SimpleTodo\Controller\Asset;

use SimpleTodo\Utility\Enqueuer\Enqueuer;

class AdminAsset extends Enqueuer {
	
	/**
	 * Constuctor
	 * 
	 */
	function __construct() {
		$this->asset_group = 'admin';
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

    /**
	 * Load Admin CSS Scripts
	 *
	 * @return void
	 */
	public function load_scripts() {
        $this->add_css_scripts();
        $this->add_js_scripts();
    }

	/**
	 * Load Admin CSS Scripts
	 *
	 * @return void
	 */
	public function add_css_scripts() {
		$scripts = [];

		// $scripts['simple-todo-admin-main-style'] = [
		// 	'file_name' => 'admin-main',
		// 	'base_path' => SIMPLE_TODO_CSS_PATH,
		// 	'deps'      => [],
		// 	'ver'       => $this->script_version,
		// 	'group'     => 'admin',
		// ];

		$scripts['simple-todo-admin-main-style'] = [
			'file_name' => 'admin-main',
			'base_path' => SIMPLE_TODO_CSS_PATH,
			'deps'      => [],
			'ver'       => $this->script_version,
			'group'     => 'admin',
		];

		$scripts = array_merge( $this->css_scripts, $scripts);
		$this->css_scripts = $scripts;
	}

	/**
	 * Load Admin JS Scripts
	 *
	 * @return void
	 */
	public function add_js_scripts() {
		$scripts = [];

		// $scripts['simple-todo-admin-main-script'] = [
		// 	'file_name'     => 'admin-main',
		// 	'base_path'     => SIMPLE_TODO_JS_PATH,
		// 	'deps'          => '',
		// 	'ver'           => $this->script_version,
		// 	'group'         => 'admin',
		// ];

		$scripts['simple-todo-admin-main-script'] = [
			'file_name'     => 'admin-main',
			'base_path'     => SIMPLE_TODO_JS_PATH,
			'deps'          => '',
			'ver'           => $this->script_version,
			'group'         => 'admin',
		];

		$scripts = array_merge( $this->js_scripts, $scripts);
		$this->js_scripts = $scripts;
	}
}