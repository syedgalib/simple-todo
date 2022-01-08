<?php
/**
 * SimpleTodo
 *
 * @package           SimpleTodo
 * @author            Syed Galib Ahmed
 * @copyright         2022 Syed Galib Ahmed
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Todo
 * Plugin URI:        
 * Description:       A simple todo plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Syed Galib Ahmed
 * Author URI:        https://github.com/syedgalib
 * Text Domain:       simple-todo
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        
 */

require dirname( __FILE__ ) . '/vendor/autoload.php';
require dirname( __FILE__ ) . '/app.php';

if ( ! function_exists( 'SimpleTodo' ) ) {
    function SimpleTodo() {
        return SimpleTodo::get_instance();
    }
}

SimpleTodo();

