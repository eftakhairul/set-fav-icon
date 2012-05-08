<?php

global $wpdb;

$favIconTable = $wpdb->prefix . "fav_icon_link";
settings_fields('set-fav-icon');

if(!empty($_POST['link'])) {
    $wpdb->update($favIconTable, array('link' => $_POST['link']), array('id' => 1));
}

// Define form value
$result = $wpdb->get_results("SELECT * FROM $favIconTable WHERE id = 1");
$link    = (!empty($_POST['link'])) ? $_POST['link'] : $result[0]->link;
?>

<div class="wrap">
<!--    --><?php ////echo __FILE__?><!--<br/>-->
<!--    --><?php //if (count($error) > 0) {
//    foreach ($error as $e) {
//        echo '<strong>' . $e . '</strong><br>';
//    }
//}
//    ?>
    <h2>Set Favicon URL</h2>

    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']?>">
        <?php wp_nonce_field('update-options'); ?>

        <label>
            Fav Icon Url:
        </label>
        <input type="text" name="link" id='link' value="<?php echo $link; ?>">
        <input type="submit" class="button-primary" name="save-fav-icon"
                           value="<?php _e('Save Changes') ?>"/>
        <input type="hidden" name="action" value="update"/>


    </form>
</div>