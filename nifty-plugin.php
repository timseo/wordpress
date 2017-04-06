<!-- Plugins are useful...If something seems to be going wrong with your redirects
you don’t have to dig through a large file of functions to find it, you could
just deactivate this one plugin without having an adverse affect on the entire site -->


<!-- HEADER, you can include other things but this is the most basic -->

<?php
/*
Plugin Name: Nifty Plugin
*/


// Redirect a page to a different page whether on the same site or another site entirely

function my_custom_redirect () {
	global $post;
	if ( is_page() || is_object( $post ) ) {
		if ( $redirect = get_post_meta($post->ID, 'redirect', true ) ) {
                        wp_redirect( $redirect );
                        exit;
                }
        }
}
add_action( 'get_header', 'my_custom_redirect' );

// Allows you to add a piece of custom post data to any page (“redirect”) with a URL
// When the page is called and has this custom post data then it’s automatically
// redirected to the new URL
