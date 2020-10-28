<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Banners_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		global $plugin_version;

		$table_name = $wpdb->prefix . 'banners_groups';
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE `".$table_name."` (
			`id` int(11) NOT NULL,
			`banner_id` varchar(100) NOT NULL,
			`group_id` varchar(100) NOT NULL,
			`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
		) $charset_collate;";

		$sql .= "ALTER TABLE `".$table_name."` ADD PRIMARY KEY(`id`)";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		add_option( 'plugin_version', $plugin_version );

		$banner_id = 'banner1';
		$group_id = 'Destacados';

		$wpdb->insert( 
			$table_name, 
			array( 
				'created_at' => current_time( 'mysql' ), 
				'banner_id' => $banner_id, 
				'group_id' => $group_id, 
			) 
		);
	}

}
