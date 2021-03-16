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

	private $table_activator;

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

		require_once BOOKS_MGM_TOOL_PLUGIN_PATH . 'includes/class-books-mgm-tool-activator.php';
		$activator = new Books_Mgm_Tool_Activator();
		$this->table_activator = $activator;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		$valid_pages = array("book-management-tool", "book-management-create-book", "book-management-list-book", "book-management-create-book-self", "book-management-list-book-shelf");

		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

		if(in_array($page, $valid_pages)) {
			wp_enqueue_style( "owt-bootstrap", BOOKS_MGM_TOOL_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), $this->version, 'all' );
			
			wp_enqueue_style( "owt-datatable", BOOKS_MGM_TOOL_PLUGIN_URL . 'assets/css/jquery.dataTables.min.css', array(), $this->version, 'all' );
			
			wp_enqueue_style( "owt-sweetalert", BOOKS_MGM_TOOL_PLUGIN_URL . 'assets/css/sweetalert.css', array(), $this->version, 'all' );
		}


		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/books-mgm-tool-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		$valid_pages = array("book-management-tool", "book-management-create-book", "book-management-list-book", "book-management-create-book-self", "book-management-list-book-shelf");

		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

		if(in_array($page, $valid_pages)) {
			wp_enqueue_script("jquery");

			wp_enqueue_script( "owt-bootstrap-js", BOOKS_MGM_TOOL_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
			
			wp_enqueue_script( "owt-datatable-js", BOOKS_MGM_TOOL_PLUGIN_URL . 'assets/js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, false );
			
			wp_enqueue_script( "owt-validate-js", BOOKS_MGM_TOOL_PLUGIN_URL . 'assets/js/jquery.validate.min.js', array( 'jquery' ), $this->version, false );
			
			wp_enqueue_script( "owt-sweetalert-js", BOOKS_MGM_TOOL_PLUGIN_URL . 'assets/js/sweetalert.min.js', array( 'jquery' ), $this->version, false );
			
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/books-mgm-tool-admin.js', array( 'jquery' ), $this->version, false );

			wp_localize_script($this->plugin_name, "owt_book", array(
				"name" => "Santeive",
				"author" => "Francisco Garcia",
				"ajaxurl" => admin_url("admin-ajax.php")
			));
		}
	}

	//Create menu method
	public function book_management_menu() {
		add_menu_page("Book Management Tool", "Book Management Tool", "manage_options", "book-management-tool", array($this, "book_management_plugin"), "dashicons-book-alt", 22);
		
		// Create plugin submenus
		add_submenu_page("book-management-tool", "Dashboard", "Dashboard", "manage_options", "book-management-tool", array($this, "book_management_plugin"));

		add_submenu_page("book-management-tool", "Create Book", "Create Book", "manage_options", "book-management-create-book", array($this, "book_management_create_book"));
		
		add_submenu_page("book-management-tool", "Create Book Shelf", "Create Book Shelf", "manage_options", "book-management-create-book-self", array($this, "book_management_create_book_shelf"));
		
		add_submenu_page("book-management-tool", "List Book Shelf", "List Book Shelf", "manage_options", "book-management-list-book-shelf", array($this, "book_management_list_book_shelf"));

		add_submenu_page("book-management-tool", "List Book", "List Book", "manage_options", "book-management-list-book", array($this, "book_management_list_book"));
	 
	}

	// menu callback function 
	public function book_management_dashboard() {

		echo "<h3>Welcome to Plugin Dashboard</h3>";
	}

	public function book_management_list_book_shelf(){

		global $wpdb;

		$book_shelf = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM ".$this->table_activator->
					wp_owt_tbl_book_shelf(), ""
			)
		);

		//echo "<pre>";
		//print_r($book_shelf);

		ob_start(); //started buffer

		//Included template file
		include_once(BOOKS_MGM_TOOL_PLUGIN_PATH."admin/partials/tmpl-list-books-shelf.php");

		$template = ob_get_contents(); //reading content

		ob_end_clean(); //closing and cleaning buffer
		
		echo $template;
	}

	// create book shelf layout
	public function book_management_create_book_shelf(){

		ob_start(); //started buffer

		//Included template file
		include_once(BOOKS_MGM_TOOL_PLUGIN_PATH."admin/partials/tmpl-create-book-shelf.php");

		$template = ob_get_contents(); //reading content

		ob_end_clean(); //closing and cleaning buffer
		
		echo $template;
		 
	}

	public function book_management_create_book() {
		ob_start(); //started buffer

		//Included template file
		include_once(BOOKS_MGM_TOOL_PLUGIN_PATH."admin/partials/tmpl-create-book.php");

		$template = ob_get_contents(); //reading content

		ob_end_clean(); //closing and cleaning buffer
		
		echo $template;
	}

	public function book_management_list_book() {
		ob_start(); //started buffer

		//Included template file
		include_once(BOOKS_MGM_TOOL_PLUGIN_PATH."admin/partials/tmpl-list-books.php");

		$template = ob_get_contents(); //reading content

		ob_end_clean(); //closing and cleaning buffer
		
		echo $template;
	}

	public function book_management_plugin() {
		global $wpdb;

		//$user_email = $wpdb->get_var("SELECT user_email from wp_users WHERE ID = 1");
		//echo $user_email;
		#-----------------------------------------
		/*$user_data = $wpdb->get_row("SELECT * from wp_users WHERE ID=1", ARRAY_A);
		echo "<pre>";
		print_r($user_data);*/
		#-----------------------------------------
		/*$post_titles = $wpdb->get_col("SELECT post_title from wp_posts");
		echo "<pre>";
		print_r($post_titles);*/
		#-----------------------------------------
		/*$all_posts = $wpdb->get_results("SELECT ID, post_title from wp_posts", ARRAY_A);
		echo "<pre>";
		print_r($all_posts);*/
		#-----------------------------------------
		# prepare just to prevent sql injection when you need data from an input
		$post_row = $wpdb->get_row(
			$wpdb->prepare("SELECT * from wp_posts WHERE ID = %d", 1)
		);
		echo "<pre>";
		print_r($post_row);
		
		#-----------------------------------------
		##### Insert, Update, Delete Methods ans raw queries
		
		//$wpdb->insert("");

	}

	public function handle_ajax_requests_admin(){

		global $wpdb;

		// handles all ajax request of admin
		$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";
		
		if(!empty($param)) {
			if($param == "first_simple_ajax"){
				echo json_encode(array(
					"status" => 1,
					"message" => "First Ajax Request",
					"data" => array(
						"name" => "Online Web Tutorial",
						"author" => "Santeive"
					)
				));
			} elseif($param == "create_book_shelf"){
				
				// gett all data from form
				$name = isset($_REQUEST['txt_name']) ? $_REQUEST['txt_name'] : "";
				$capacity = isset($_REQUEST['txt_capacity']) ? $_REQUEST['txt_capacity'] : "";
				$location = isset($_REQUEST['txt_location']) ? $_REQUEST['txt_location'] : "";
				$status = isset($_REQUEST['dd_status']) ? $_REQUEST['dd_status'] : "";
				//print_r($_REQUEST);

				$wpdb->insert($this->table_activator->wp_owt_tbl_book_shelf(), array(
					"shelf_name" => $name,
					"capacity" => $capacity,
					"shelf_location" => $location,
					"status" => $status
				));

				if($wpdb->insert_id > 0) {
					echo json_encode(array(
						"status" => 1,
						"message" => "Book SHelf created successfully"
					));
				}else {
					echo json_encode(array(
						"status" => 0,
						"message" => "Failed to create book shelf"
					));
				}
			}elseif($param == "delete_book_shelf") {
				$shelf_id = isset($_REQUEST['shelf_id']) ? intval($_REQUEST['shelf_id']) : 0;

				if($shelf_id > 0) {

					$wpdb->delete($this->table_activator->wp_owt_tbl_book_shelf(), array(
						"id" => $shelf_id
					));

					echo json_encode(array(
						"status" => 1,
						"message" => "Book shelf deleted successfully"
					));

				}else{
					echo json_encode(array(
						"status" => 0,
						"message" => "Book shelf is not valid"
					));
				}
			}
		}

		wp_die();
		
	}

}
