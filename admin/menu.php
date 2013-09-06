<?php
if ( is_admin() )
{

	add_action('admin_menu', 'xyz_fbap_menu');
	//add_action('admin_print_styles', 'xyz_fbap_admin_style');
	
	wp_enqueue_script('jquery');
	wp_register_script( 'xyz_notice_script', plugins_url('facebook-auto-publish/js/notice.js') );
	wp_enqueue_script( 'xyz_notice_script' );
	
	wp_register_style('xyz_fbap_style', plugins_url('facebook-auto-publish/admin/style.css'));
	wp_enqueue_style('xyz_fbap_style');

}

function xyz_fbap_menu()
{
	add_menu_page('Facebook Auto Publish - Manage settings', 'Facebook Auto Publish', 'manage_options', 'facebook-auto-publish-settings', 'xyz_fbap_settings');
	$page=add_submenu_page('facebook-auto-publish-settings', 'Facebook Auto Publish - Manage settings', ' Settings', 'manage_options', 'facebook-auto-publish-settings' ,'xyz_fbap_settings'); // 8 for admin
	add_submenu_page('facebook-auto-publish-settings', 'Facebook Auto Publish - About', 'About', 'manage_options', 'facebook-auto-publish-about' ,'xyz_fbap_about'); // 8 for admin
}


function xyz_fbap_settings()
{
	$_POST = stripslashes_deep($_POST);
	$_GET = stripslashes_deep($_GET);	
	$_POST = xyz_trim_deep($_POST);
	$_GET = xyz_trim_deep($_GET);
	
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}



function xyz_fbap_about()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/about.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}

?>