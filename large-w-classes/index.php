<?php
/**
 * Filedescription
 *
 * PHP version 5.3
 *
 * @category   PHP
 * @package    WordPress
 * @subpackage [pluginname]
 * @author     Ralf Albert <me@neun12.de>
 * @license    GPLv3 http://www.gnu.org/licenses/gpl-3.0.txt
 * @version    0.1
 * @link       http://wordpress.com
 */

/**
 * Plugin Name:	[pluginname]
 * Plugin URI:	http://yoda.neun12.de
 * Description:	[description]
 * Version: 	[version]
 * Author: 		Ralf Albert
 * Author URI: 	http://yoda.neun12.de
 * Text Domain:
 * Domain Path:
 * Network:
 * License:		GPLv3
 */

! defined( 'ABSPATH' ) and die( "Cheetin' uh!?" );

add_action( 'plugins_loaded', array( '[classname]', 'plugin_start' ) );

register_activation_hook(	__FILE__, array( '[classname]', 'activate_plugin' ) );
register_deactivation_hook(	__FILE__, array( '[classname]', 'deactivate_plugin' ) );
register_uninstall_hook(	__FILE__, array( '[classname]', 'uninstall_plugin' ) );


if( ! class_exists( '[classname]' ) ){
	
	class [classname]
	{
		
		/**
		 * 
		 * Initialize a instance of the main-class
		 * @access public static
		 * @since 0.1
		 */
		public static function plugin_start(){
			new self();
		}
		
		/**
		 * 
		 * Constructor
		 * Add hooks&filters
		 * @access public
		 * @since 0.1
		 */
		public function __construct(){
			
			// initialize the autoloader
			self::init_autoloader();
			
			// enqueue scripts&styles
//			add_action( 'admin_init',	array( &$this, 'enqueue_scripts' ) );
//			add_action( 'admin_init',	array( &$this, 'enqueue_styles' ) );
			
			/*
			 * Ajax Routines
			 */
			if ( defined( 'DOING_AJAX' ) && DOING_AJAX ){
//				$ajax = new [classname]_Ajax;
//				add_action( 'wp_ajax_method_name', array( &$ajax, 'ajax_method_name' ) );
			}

		}
				
		/**
		 * 
		 * Initialize the autoloader
		 * @access protected
		 * @since 0.1
		 */
		protected static function init_autoloader( $config = array() ){
			
			// get the class if it was not already loaded
			if( ! class_exists( 'WP_Autoloader' ) )
				require_once dirname( __FILE__ ) . '/classes/class-wp_autoloader.php';
			
			// setup the default values
			$defaults = array(  
					'abspath'			=> __FILE__,
					'include_path' 		=> array( 'classes', ),
					'class_extension'	=> '.php',
					'class_prefix' 		=> array( 'class-', ),
			);
			
			$config = array_merge( $config, $defaults );
			
			new WP_Autoloader( $config );
			
		}
		
		/**
		 * 
		 * Things to do on plugin-activation
		 * @access public static
		 * @since 0.1
		 */
		public static function activate_plugin(){

			// need the autoloader
			self::init_autoloader();
			
			// check environment
			$v = new stdClass();
			$v->wp = '3.0';
			$v->php = '5.2';
			
			new WP_Environment_Check( $v );
			
		}
		
		/**
		 * 
		 * Things to do on plugin-deactivation
		 * @access public static
		 * @since 0.1
		 */
		public static function deactivate_plugin(){
		}
		
		/**
		 * 
		 * Things to do on plugin-uninstall
		 * @access public static
		 * @since 0.1
		 */
		public static function uninstall_plugin(){
		} 
		
		/**
		 * 
		 * Enqueue javascripts
		 * @access public
		 * @since 0.1
		 * @internal hooked by 'admin_init' in ::__construct()
		 */
		public function enqueue_scripts(){			
		}
		
		/**
		 * 
		 * Enqueue stylesheets
		 * @access public
		 * @since 0.1
		 * @internal hooked by 'admin_init' in ::__construct()
		 */
		public function enqueue_styles(){
		}
	
	} // .end class [classname]
	
} //.end if-class-exists [classname]