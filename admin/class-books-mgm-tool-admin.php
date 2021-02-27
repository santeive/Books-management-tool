<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://onlinewebtutorblog.com/
 * @since      1.0.0
 *
 * @package    Books_Mgm_Tool
 * @subpackage Books_Mgm_Tool/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Books_Mgm_Tool
 * @subpackage Books_Mgm_Tool/admin
 * @author     santeive <packo.ive@gmail.com>
 */
class Books_Mgm_Tool_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Books_Mgm_Tool_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Books_Mgm_Tool_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/books-mgm-tool-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Books_Mgm_Tool_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Books_Mgm_Tool_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/books-mgm-tool-admin.js', array( 'jquery' ), $this->version, false );

	}

	//Create menu method
	public function book_management_menu() {
		add_menu_page("Book Management Tool", "Book Management Tool", "manage_options", "book-management-tool", array($this, "book_management_plugin"), "dashicons-book-alt", 22);
		
		// Create plugin submenus
		add_submenu_page("book-management-tool", "Dashboard", "Dashboard", "manage_options", "book-management-tool", array($this, "book_management_plugin"));

		add_submenu_page("book-management-tool", "Create Book", "Create Book", "manage_options", "book-management-create-book", array($this, "book_management_create_book"));

		add_submenu_page("book-management-tool", "List Book", "List Book", "manage_options", "book-management-list-book", array($this, "book_management_list_book"));
	 
	}

	// menu callback function 
	public function book_management_dashboard() {
		echo "<h3>Welcome to Plugin Dashboard</h3>";
	}

	public function book_management_create_book() {
		echo "<h3>Welcome to Create Book Page</h3>";
	}

	public function book_management_list_book() {
		echo "<h3>Welcome to List Book Page</h3>";
	}

	public function book_management_plugin() {
		echo "<h3>Welcome to Plugin Menu </h3>";
	}

}
