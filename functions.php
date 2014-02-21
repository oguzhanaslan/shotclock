<?php 

/**
 * ====================================================
 * Help Contact Form 7 Play Nice With Twitter Bootstrap
 * ==================================================== 
 * Add a Twitter Bootstrap-friendly class to the "Contact Form 7" form
 */


//attach our function to the wp_pagenavi filter
add_filter( 'wp_pagenavi', 'ik_pagination', 10, 2 );
  
//customize the PageNavi HTML before it is output
function ik_pagination($html) {
    $out = '';
  
    //wrap a's and span's in li's
    $out = str_replace("<div","",$html);
    $out = str_replace("class='wp-pagenavi'>","",$out);
    $out = str_replace("<a","<li><a",$out);
    $out = str_replace("</a>","</a></li>",$out);
    $out = str_replace("<span","<li><span",$out);  
    $out = str_replace("</span>","</span></li>",$out);
    $out = str_replace("</div>","",$out);
  
	return '<ul  class="pagination pagination-centered">'.$out.'</ul>';;
}

	//remove meta code
	remove_action('wp_head','feed_links_extra');
	remove_action('wp_head','feed_links');
	remove_action('wp_head','rsd_link');
	remove_action('wp_head','wlwmanifest_link');
	remove_action('wp_head','index_rel_link');
	remove_action('wp_head','parent_post_rel_link');
	remove_action('wp_head','start_post_rel_link');
	remove_action('wp_head','adjacent_posts_rel_link');
	remove_action('wp_head','wp_generator');
	remove_action('wp_head','noindex', 1);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10,0);	

	// Deactivate Widgets
	function unregister_default_wp_widgets() {
	    unregister_widget('WP_Widget_Calendar'); // takvimi kaldırır
	    unregister_widget('WP_Widget_Meta'); // meta bilgilerini kaldırır
	    unregister_widget('WP_Widget_Search'); // arama bileşenini kaldırır
	    unregister_widget('WP_Widget_Recent_Comments'); // son yorumları kaldırır
	    unregister_widget('WP_Widget_RSS'); // rss bileşenini kaldırır

	}
	add_action('widgets_init', 'unregister_default_wp_widgets', 1);

	/* ##############   GEREKSIZ PROFIL SEYLERINI SILELIM */
	add_filter('user_contactmethods','hide_profile_fields',10,1);

	function hide_profile_fields( $contactmethods ) {
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	return $contactmethods;
	}

	add_filter('user_contactmethods','my_new_contactmethods',10,1);


	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 400, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	function register_my_menus() {
	  register_nav_menus(
	    array( 'header-menu' => __( 'Header Menu' ), 'footer-menu' => __( 'Footer Menu' )     )

	  );
	}
	add_action( 'init', 'register_my_menus' );	




    /**
     * Add stylesheet to the page
     */
	function add_stylesheet()
	{

		$time = time(); //random time
		wp_register_style( 'style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), "$time", 'all' );
		wp_register_style( 'style1', get_template_directory_uri() . '/css/main.css', array(), "$time" );
		// For either a plugin or a theme, you can then enqueue the style:
		wp_enqueue_style( 'style' );
		wp_enqueue_style( 'style1' );

	}
	add_action( 'wp_enqueue_scripts', 'add_stylesheet' );


	function wptuts_scripts_load_cdn()

	{
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', array(), null, true );
		
		// Register the script like this for a theme:
		wp_register_script( 'custom-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array( 'jquery' ) );
		wp_register_script( 'custom-script1', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );

		// For either a plugin or a theme, you can then enqueue the script:
		wp_enqueue_script( 'custom-script' );
		wp_enqueue_script( 'custom-script1' );
		

	}
	add_action( 'wp_enqueue_scripts', 'wptuts_scripts_load_cdn' );




?>