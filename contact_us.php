<?php

/**
 * Plugin Name:  FORM 
 * Description: Handle the basics with this plugin.
 */


function app_output_buffer()
{
    ob_start();
} 
add_action('init', 'app_output_buffer');


// ------------------------------ create table ------------------------------ 

 function create_table(){

   global $wpdb;
   $table = $wpdb->prefix.'contactUs';
   $wpdb->query("CREATE TABLE  $table(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, The_Name varchar(255) NOT NULL, Email varchar(55) NOT NULL, The_Subject varchar(55) NOT NULL, The_Message varchar(255) NOT NULL)");
 }
 register_activation_hook(__FILE__,'create_table');


// ------------------------------ delete table ------------------------------

function drop_table(){

   global $wpdb;
   $table = $wpdb->prefix.'contactUs';
   $wpdb->query("DROP TABLE if exists $table");

}
register_uninstall_hook( __FILE__,'Drop_table');


function cf_shortcode()
{
   include_once('form.php');
   return ob_get_clean();
}

add_shortcode('myform', 'cf_shortcode');


// ------------------------------ create menu in dashboard ------------------------------

function dashboard(){

   add_menu_page('Contact_Us', 'Contact', 'manage_options', 'contact-dashbord', 'admin_dashboard', 'dashicons-email',4);

}

add_action('admin_menu','dashboard');


function admin_dashboard(){

   include_once('dashboard.php');
}




// ------------------------------ bootstrap CDN ------------------------------

 add_action( 'wp_print_styles', 'add_my_plugin_stylesheet' );

 function add_my_plugin_stylesheet() {
    wp_register_style('mypluginstylesheet', '/wp-content/plugins/postgrid/style.css');

    wp_register_style('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
    wp_enqueue_style('mypluginstylesheet');
    wp_enqueue_style('prefix_bootstrap');
 }

 add_action('wp_print_scripts','add_my_plugin_js');

 function add_my_plugin_js() {
    wp_register_script('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
    wp_enqueue_script('prefix_bootstrap');
 }


?>
