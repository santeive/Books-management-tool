<?php

/**
 * Fired during plugin activation
 *
 * @link       https://onlinewebtutorblog.com/
 * @since      1.0.0
 *
 * @package    Books_Mgm_Tool
 * @subpackage Books_Mgm_Tool/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Books_Mgm_Tool
 * @subpackage Books_Mgm_Tool/includes
 * @author     santeive <packo.ive@gmail.com>
 */
class Books_Mgm_Tool_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {

		global $wpdb;
		
		if($wpdb->get_var("SHOW tables like '".$this->wp_owt_tbl_books()."'") !=  $this->wp_owt_tbl_books()) {
			$table_query = "CREATE TABLE `".$this->wp_owt_tbl_books()."` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`name` varchar(150) DEFAULT NULL,
				`amount` text DEFAULT NULL,
				`description` int(11) DEFAULT NULL,
				`book_image` varchar(200) DEFAULT NULL,
				`language` varchar(150) DEFAULT NULL,
				`shelf_id` INT NULL,
				`status` int(11) NOT NULL DEFAULT 1,
				`created_at` timestamp NOT NULL DEFAULT current_timestamp(),
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"; 
		   //table query

			require_once (ABSPATH.'wp-admin/includes/upgrade.php');
			dbDelta($table_query);
		}
		// table for create shelf
		if($wpdb->get_var("SHOW tables like '".$this->wp_owt_tbl_book_shelf()."' ") != $this->wp_owt_tbl_book_shelf()) {
			$shelf_table = "CREATE TABLE `".$this->wp_owt_tbl_book_shelf()."` (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`shelf_name` varchar(150) NOT NULL,
							`capacity` int(11) NOT NULL,
							`shelf_location` varchar(200) NOT NULL,
							`status` int(11) NOT NULL DEFAULT 1,
							`created_at` timestamp NOT NULL DEFAULT current_timestamp(),
							PRIMARY KEY (`id`)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
			
			require_once (ABSPATH.'wp-admin/includes/upgrade.php');
			dbDelta("$shelf_table");

			$insert_query = "INSERT into ".$this->wp_owt_tbl_book_shelf()." (
				shelf_name, capacity, shelf_location, status) VALUES 
				('Shelf 1', 230, 'Left Corner', 1), 
				('Shelf 2', 300, 'Right Corner', 1),
				('Shelf 3', 100, 'Center Top', 1)";

			$wpdb->query($insert_query);
		}

		// create page on plugin activation
		$get_data =$wpdb->get_row(
			$wpdb->prepare(
				"SELECT * from ".$wpdb->prefix."posts WHERE post_name = %s", 'book-tool'
			)
		);

		if(!empty($get_data)){
			// already we have data with this post name
		}else {
			// create page (wp_insert_post)
			$post_arr_data = array(
				"post_title" => "Book Tool",
				"post_name" => "book_tool",
				"post_status" => "publish",
				"post_author" => 1,
				"post_content" => "Simple page content of book tool",
				"post_type" => "page"
			);
			wp_insert_post($post_arr_data);
		}

	}

	public function wp_owt_tbl_books() {
		global $wpdb;
		return $wpdb->prefix."owt_tbl_books";
	}

	// This table returns the table name
	public function wp_owt_tbl_book_shelf(){
		global $wpdb;
		return $wpdb->prefix."owt_tbl_book_shelf";
	}

}


   
