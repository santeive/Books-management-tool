<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://onlinewebtutorblog.com/
 * @since      1.0.0
 *
 * @package    Books_Mgm_Tool
 * @subpackage Books_Mgm_Tool/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Books_Mgm_Tool
 * @subpackage Books_Mgm_Tool/includes
 * @author     santeive <packo.ive@gmail.com>
 */
class Books_Mgm_Tool_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'books-mgm-tool',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
