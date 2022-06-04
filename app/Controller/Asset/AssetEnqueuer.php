<?php

namespace SimpleTodo\Controller\Asset;

use SimpleTodo\Utility\Enqueuer;

abstract class AssetEnqueuer extends Enqueuer {

	public $asset_group = 'public';

	/**
	 * Load Scripts
	 *
	 * @return void
	 */
	abstract public function load_scripts();

	public function __construct() {

		add_action( 'script_loader_tag', [ $this, 'add_script_attributes' ], 20, 3 );

	}

	/**
	 * Add Sscript Attributes
	 * 
	 * @return string
	 */
	public function add_script_attributes( $tag, $handle, $src ) {

		if ( ! SIMPLE_TODO_IN_DEVELOPMENT ) {
			return $tag;
		}

        if ( ! preg_match( '/^(simple-todo-).+/',  $handle ) ) {
            return $tag;
        }

        $tag = str_replace( 'src=', "type='module' src=", $tag );

        return $tag;
    }

	/**
	 * Enqueue Scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts( $page = '' ) {

		// Set Script Version
		$this->setup_load_min_files();

		// Set Script Version
		$this->setup_script_version();

		// Load Script
		$this->load_scripts();

		// Apply Hook to Scripts
		$this->apply_hook_to_scripts();

		// CSS
		$this->register_css_scripts();
		$this->enqueue_css_scripts_by_group( [ 'group' => $this->asset_group, 'page' => $page ] );

		// JS
		$this->register_js_scripts();
		$this->enqueue_js_scripts_by_group( [ 'group' => $this->asset_group, 'page' => $page ] );
	}

	/**
	 * Load min files
	 *
	 * @return void
	 */
	public function setup_load_min_files() {
		$this->load_min = apply_filters( 'simple_todo_load_min_files',  SIMPLE_TODO_LOAD_MIN_FILES );
	}

	/**
	 * Set Script Version
	 *
	 * @return void
	 */
	public function setup_script_version() {
		$script_version = ( $this->load_min ) ? SIMPLE_TODO_SCRIPT_VERSION : md5( time() );
		$this->script_version = apply_filters( 'simple_todo_script_version', $script_version );
	}

	/**
	 * Apply Hook to Scripts
	 *
	 * @return void
	 */
	public function apply_hook_to_scripts() {
		$this->css_scripts = apply_filters( 'simple_todo_css_scripts', $this->css_scripts );
		$this->js_scripts = apply_filters( 'simple_todo_js_scripts', $this->js_scripts );
	}
}