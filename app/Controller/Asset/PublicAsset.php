<?php

namespace SimpleTodo\Controller\Asset;

use SimpleTodo\Utility\Enqueuer\Enqueuer;

class PublicAsset extends Enqueuer {
	
	/**
	 * Constuctor
	 * 
	 */
	function __construct() {
		$this->asset_group = 'public';
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		parent::__construct();
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

		// $scripts['simple-todo-public-main-style'] = [
		// 	'file_name' => 'public-main',
		// 	'base_path' => SIMPLE_TODO_CSS_PATH,
		// 	'deps'      => [],
		// 	'ver'       => $this->script_version,
		// 	'group'     => 'public',
		// ];

		$scripts['simple-todo-public-main-style'] = [
			'file_name' => 'main',
			'base_path' => SIMPLE_TODO_CSS_PATH,
			'deps'      => [],
			'ver'       => $this->script_version,
			'group'     => 'public',
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

		// $scripts['simple-todo-public-script'] = [
		// 	'file_name'     => 'public-main',
		// 	'base_path'     => SIMPLE_TODO_JS_PATH,
		// 	'deps'          => '',
		// 	'ver'           => $this->script_version,
		// 	'group'         => 'public',
		// ];

		$scripts['simple-todo-react-refresh'] = [
			'file_name' => 'react-refresh',
			'src_path'  => SIMPLE_TODO_VENDOR_JS_SRC_PATH,
			'src_ext'   => 'js',
			'base_path' => SIMPLE_TODO_VENDOR_JS_PATH,
			'deps'      => [],
			'ver'       => null,
			'group'     => 'global',
			'enable'    => SIMPLE_TODO_IN_DEVELOPMENT,
		];

		$scripts['simple-todo-public-script'] = [
			'file_name' => 'main',
			'src_ext'   => 'jsx',
			'src_path'  => SIMPLE_TODO_SRC_PATH . 'js/',
			'base_path' => SIMPLE_TODO_JS_PATH,
			'deps'      => '',
			'ver'       => $this->script_version,
			'group'     => 'public',
		];

		$scripts = array_merge( $this->js_scripts, $scripts);
		$this->js_scripts = $scripts;
	}
}