<?php

/*
 * Add my new menu to the Admin Control Panel
 */
 
// Hook the 'admin_menu' action hook, run the function named 'mfp_Add_My_Admin_Link()'
add_action( 'admin_menu', 'custom_AddMenu' );
 
// Add a new top level menu link to the ACP
function custom_AddMenu()
{
      add_menu_page(
        'My First Page', // Title of the page
        'My Custom Plugin', // Text to show on the menu link
        4, // The capability required for this menu to be displayed to the user
        'custom-page', // The 'slug'
        'customPlugin' // The function to be called to output the content for this pag
    );
}

function customPlugin()
{
  global $wpdb;
  $table_name = $wpdb->prefix . "users";
  $user = $wpdb->get_results( "SELECT * FROM $table_name" );
  echo "<h2>";
  echo $user[0]->user_email;
  echo "</h2>";
}