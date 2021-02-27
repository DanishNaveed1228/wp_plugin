<?php

function r_activate_plugin()
{
    if (version_compare(get_bloginfo('version'), '4.0', '<')) {
        wp_die(__("Must Update the Wordpress to use This Plugin", 'Recipe'));
    }



    global $wpdb;
    $createSQL      =   "
    CREATE TABLE `" . $wpdb->prefix . "recipe_ratings` (
        `ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `recipe_id` BIGINT(20) UNSIGNED NOT NULL,
        `rating` FLOAT(3,2) UNSIGNED NOT NULL,
        `user_ip` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB " . $wpdb->get_charset_collate() . ";";

    require(ABSPATH . "/wp-admin/includes/upgrade.php");
    dbDelta($createSQL);
}
