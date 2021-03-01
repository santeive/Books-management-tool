<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://onlinewebtutorblog.com/
 * @since      1.0.0
 *
 * @package    Books_Mgm_Tool
 * @subpackage Books_Mgm_Tool/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Books_Mgm_Tool
 * @subpackage Books_Mgm_Tool/includes
 * @author     santeive <packo.ive@gmail.com>
 */
class Books_Mgm_Tool_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	private $table_activator;

	public function __construct($activator){
		$this->table_activator = $activator;
	}

	public function deactivate() {
		global $wpdb;

		// Dropping tbales on plugin uninstall
		$wpdb->query("DROP TABLE if exists ".$this->table_activator->wp_owt_tbl_books());
		$wpdb->query("DROP TABLE if exists ".$this->table_activator->wp_owt_tbl_book_shelf());
	}

}
