<?php


global $version;
$version = "3.0";

// Installation Function
function es_favicon_install()
{
    global $version, $wpdb;

	if (!version_compare($version, '3.0', '>=')) {

        error_log('Please install version greater than 3.0');
        echo 'Please install version greater than 3.0';
    }

    $favIconTable   = $wpdb->prefix . "fav_icon_link";
    $createTableSql = "CREATE TABLE `{$favIconTable}` (`id` TINYINT NOT NULL, `link` TEXT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci";
    $insertSql      = "INSERT INTO `{$favIconTable}` (`id`, `link`) VALUES ('1', '')";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($createTableSql);
    dbDelta($insertSql);
}

// Un-installation function
function es_favicon_uninstall()
{
    global $wpdb;
    $favIconTable = $wpdb->prefix . "fav_icon_link";

    if ($wpdb->get_var("show tables like '$favIconTable'") == $favIconTable) {
        $sql = "DROP TABLE {$favIconTable}";
        $wpdb->query($sql);
    }
}


