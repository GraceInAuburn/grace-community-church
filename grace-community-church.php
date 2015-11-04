<?php
/*
Plugin Name: Grace Community Church
Plugin URI: https://github.com/GraceInAuburn/grace-community-church/
Description: Code Snippets we use at GCC.
Version: 0.0.1
Author: Eric Johnson
Author URI: @wormeyman
License: GPL
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
*/

/*Alert on Staging Site*/
/*http://stackoverflow.com/questions/6522023/php-if-domain*/
$host = $_SERVER['HTTP_HOST'];
if ($host === 'graceinauburn.staging.wpengine.com') {
    function gcc_admin_error_notice() {
        $class = "error";
        $message = "You are on the staging site.";
            echo"<div class=\"$class\"> <h1>$message</h1></div>";
    }
    add_action( 'admin_notices', 'gcc_admin_error_notice' );
}
/*End Alert on Staging Site*/

/*Add Favicon to Admin Area*/
function pa_admin_area_favicon() {
$favicon_url = get_bloginfo('url') . '/favicon.ico';
echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action('admin_head', 'pa_admin_area_favicon');
/*End of adding favicon to admin area*/

/*Custom Menu http://codex.wordpress.org/Function_Reference/add_node*/
add_action( 'admin_bar_menu', 'toolbar_link_to_backup_points', 1000 );

function toolbar_link_to_backup_points( $wp_admin_bar ) {
    $args = array(
        'id'    => 'backup-points',
        'title' => 'Backup Points',
        'href'  => 'https://my.wpengine.com/installs/graceinauburn/backup_points',
        'meta'  => array( 'class' => 'backup-points' )
    );
    $wp_admin_bar->add_node( $args );
}/*End Custom Menu*/
