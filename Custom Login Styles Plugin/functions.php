<?php
// change picture
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url("http://devwp.weband.bg/wp-content/uploads/2023/07/weband.gif");
            scale:2;
			padding-bottom: 30px;
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// adjust links and texts for picture

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Weband';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );


// Load external css files for styling the page

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', plugin_dir_url( __FILE__ ) . 'assets/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

//hide links

add_action( 'login_head', 'hide_login_nav' );

function hide_login_nav()
{
    ?><style>#nav,#backtoblog{display:none}</style><?php
}


//hide plugin

function hide_plugins($hideplugins) {
	// To hide active plugins
	if(is_plugin_active('weband-custom-login-plugin/weband-custom-login-plugin.php')) { 
		unset( $hideplugins['weband-custom-login-plugin/weband-custom-login-plugin.php'] );
	}
		return $hideplugins;
}
add_filter( 'all_plugins', 'hide_plugins');