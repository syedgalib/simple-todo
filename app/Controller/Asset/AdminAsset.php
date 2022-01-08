<?php

namespace SimpleTodo\Controller\Asset;

class AdminAsset extends AssetEnqueuer {
	
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

		// $scripts['simple-todo-admin-style'] = [
		// 	'file_name' => 'admin-style',
		// 	'base_path' => SIMPLE_TODO_CSS_PATH,
		// 	'deps'      => [],
		// 	'ver'       => $this->script_version,
		// 	'group'     => 'admin',
		// ];

		$scripts['simple-todo-admin-style'] = [
			'file_name' => 'admin-style',
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

		// $scripts['simple-todo-admin-script'] = [
		// 	'file_name'     => 'admin-script',
		// 	'base_path'     => SIMPLE_TODO_JS_PATH,
		// 	'deps'          => '',
		// 	'ver'           => $this->script_version,
		// 	'group'         => 'admin',
		// ];

		$scripts['simple-todo-admin-script'] = [
			'file_name'     => 'admin-script',
			'base_path'     => SIMPLE_TODO_JS_PATH,
			'deps'          => '',
			'ver'           => $this->script_version,
			'group'         => 'admin',
		];

		$scripts = array_merge( $this->js_scripts, $scripts);
		$this->js_scripts = $scripts;
	}
}