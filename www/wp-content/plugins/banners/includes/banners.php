<?php
/*
 * Add my new menu to the Admin Control Panel
 */
 
// Hook the 'admin_menu' action hook, run the function named 'mfp_Add_My_Admin_Link()'
add_action( 'admin_menu', 'banners_AddMenu' );
 
// Add a new top level menu link to the ACP
function banners_AddMenu()
{
      add_menu_page(
        'My First Page', // Title of the page
        'Banners Plugin', // Text to show on the menu link
        'manage_options', // The capability required for this menu to be displayed to the user
        'banners-admin-page', // The 'slug'
        'bannersPlugin' // The function to be called to output the content for this pag
    );
}

function bannersPlugin()
{
  global $wpdb;
  $table_name = $wpdb->prefix . "banners_groups";
	$data = $wpdb->get_results( "SELECT * FROM $table_name" );
	$options = $wpdb->get_results( "SELECT DISTINCT group_id FROM $table_name ORDER BY group_id" );

	$post = isset( $_POST['group'] ) ? (array) $_POST['group'] : array();
	if($post){
		$rows = [];
		foreach($post as $group){
			foreach($group as $id => $name){
				if (!is_int($id) && $id > 0)
					die;
				
				$name = sanitize_text_field($name);
				$wpdb->update( $table_name, array( 'group_id' => $name),array('id'=>$id));
			}
		}
		$data = $wpdb->get_results( "SELECT * FROM $table_name" );
	}

	echo "<h1>Banners</h1>";
	
	echo '<p><form method="POST" action="">';
	echo '<table style="width:100%">';
	echo '<tr style="height:80px; font-weight: bold;">
	<td style="width:50px">ID</td>
	<td style="width:200px">Banner</td>
	<td style="width:200px">Image</td>
	<td style="width:300px">Group</td>
	</tr>';
	foreach($data as $d){
		echo '<tr>';
		echo '<td>'.$d->id.'</td>';
		echo '<td>'.$d->banner_id.'</td>';
		echo '<td><img style="max-width:80px" src="'.get_template_directory_uri().'/assets/images/2020-landscape-2.png'.'"></td>';
		echo '<td>';
		echo '<select name="group[]['.$d->id.']">';
		foreach($options as $g){
			if($d->group_id === $g->group_id){
				$selected = 'selected';
			} else {
				$selected = '';
			}
			echo '<option '.$selected.' value="'.$g->group_id.'">'.$g->group_id.'</option>';
		}
		echo '</td>';
		echo '</select>';
		echo '</tr>';
	}
	echo '</table>';
	echo '<p><input type="submit" value="Submit"></p>';
	echo '</form></p>';

}
