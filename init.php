<?php 
/*
Plugin Name: Upfunnel integration
Plugin URI: upfunnel.io
Description: Sends notifications to Upfunnel.
Author: Upfunnel Team
Text Domain: Upfunnel
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Author URI: upfunnel.io
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! defined( 'UPFL_URL' ) ) {
define( 'UPFL_URL', plugins_url( '/', __FILE__ ) );
}

if ( ! defined( 'UPFL_URL_ASSETS_URL' ) ) {
define( 'UPFL_URL_ASSETS_URL', UPFL_URL . 'assets/' );
}

if ( ! defined( 'UPFL_PATH' ) ) {
$dir = plugin_dir_path( __FILE__ );
define( 'UPFL_PATH', $dir );
}
/*Load UPFL_Manager class  */
include( UPFL_PATH.'class/UPFL_Manager.php');
?>