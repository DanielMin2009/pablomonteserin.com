<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );
// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );


/******************* PAM ********************/
/********************************************/
/********************************************/
/********************************************/
/********************************************/
/********************************************/
$stylesheet_directory = get_stylesheet_directory_uri();
$current_url =  $_SERVER["REQUEST_URI"];

add_filter( 'genesis_pre_load_favicon', 'custom_favicon' );
function custom_favicon( $favicon_url ) {
	global $stylesheet_directory;
	return $stylesheet_directory.'/miCara.jpg';
}


add_theme_support( 'genesis-footer-widgets', 3 );
////////////////////////////////////////////////////////////////////////
/// ELIMINAR EXTRA <p>
///////////////////////////////////////////////////////
//remove_filter('the_content', 'wpautop');

////////////////////////////////////////////////////////////////////////
/// ELIMINAR COPYRIGHT FOOTER
///////////////////////////////////////////////////////


add_action( 'genesis_before', function(){

//remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
	remove_action('genesis_footer', 'genesis_do_footer');
	remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
	remove_action('genesis_footer', 'genesis_footer_markup_close', 15); 
} );


////////////////////////////////////////////////////////////////////////
/// CARGA DE LIBRERÍAS VARIAS
///////////////////////////////////////////////////////


add_action( 'genesis_meta', 'child_stylesheet_cdn' );
function child_stylesheet_cdn() {
	global $stylesheet_directory;
	wp_register_style( 'font', $stylesheet_directory."/css/font-awesome.min.css");
	wp_enqueue_style('font');
}


add_filter('language_attributes', 'custom_lang_attr');
function custom_lang_attr() {
	return 'lang="es"';
}


// Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );


//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer'
	) );

// To disable in a child theme, use wp_dequeue_style()
function mytheme_dequeue_fonts() {
	wp_dequeue_style( 'twentytwelve-fonts' );
}
add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );

// Changes the excerpt length to a custom value
function custom_excerpt_length( $length ) {
return 50; // Change this to the number of characters you wish to have in your excerpt
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
remove_action( 'genesis_site_description', 'genesis_seo_site_description');

add_theme_support( 'genesis-connect-woocommerce' );



remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
add_action( 'genesis_site_description', function(){
	echo '<a href="https://pablomonteserin.com/" class="logo">Pablo Monteserín</a>';

} );




remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
//remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// QUITAR LAS FECHAS DE YOAST
add_filter( 'wpseo_og_article_published_time', '__return_false' );
add_filter( 'wpseo_og_article_modified_time', '__return_false' );
add_filter( 'wpseo_og_og_updated_time', '__return_false' );


//////////////////////////////////////////////////////
/* CUSTOM POST TYPE*/
 // Our custom post type function
function create_posttype() {

	register_post_type( 'testimonios',
  // CPT Options
		array(
			'labels' => array(
				'name' => __( 'Testimonio' ),
				'singular_name' => __( 'Testimonio' )
				),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'movies'),
			)
		);
}

 // Add page title to blog page template
add_action( 'genesis_before', 'wsm_blog_page_title' ); 
function wsm_blog_page_title() {
	if ( is_home()  ) {
		add_action( 'genesis_before_content', function(){
			echo '<h1 class="entry-title">Blog</h1>';

		}, 2 );
	}
}


genesis_register_sidebar( array(
	'id'            =>'menu-intranet',
	'name'      =>__('Menú intranet','monteserin'),
	'description'   =>__('Este es el widget que aparecerá en la intranet','monteserin'),
	)); 

/* Generate Quote Ticket */
function genTicketString() {
	global $wpdb;

	$wpdb->insert( 'contact_form_7_id_auto_incerement', array( 'relleno' => 'foo' ), array( '%s' ) );

	$id = $wpdb->get_results( "SELECT max(id) as n FROM contact_form_7_id_auto_incerement" );

	return "#".$id[0]->n;

}
add_shortcode('quoteticket', 'genTicketString');



add_action('genesis_before_content', function(){

	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('
			<p style="padding-left:15px; padding-top:15px"id="breadcrumbs">','</p>
			');
	}

});





//EVITAR QUE WORDPRESS TOQUE EL HTML AL SALVAR

function schema_TinyMCE_init($in)
{
    /**
     *   Edit extended_valid_elements as needed. For syntax, see
     *   http://www.tinymce.com/wiki.php/Configuration:valid_elements
     *
     *   NOTE: Adding an element to extended_valid_elements will cause TinyMCE to ignore
     *   default attributes for that element.
     *   Eg. a[title] would remove href unless included in new rule: a[title|href]
     */
    if(!empty($in['extended_valid_elements']))
    	$in['extended_valid_elements'] .= ',';

    $in['extended_valid_elements'] .= '@[id|class|style|title|itemscope|itemtype|itemprop|datetime|rel],div,dl,ul,ol,dt,dd,li,span,a|rev|charset|href|lang|tabindex|accesskey|type|name|href|target|title|class|onfocus|onblur]|p|br';

    return $in;
}
add_filter('tiny_mce_before_init', 'schema_TinyMCE_init' );

function _remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );



function wpse_media_extra_column( $cols ) {
    $cols["alt"] = "ALT";
    return $cols;
}
function wpse_media_extra_column_value( $column_name, $id ) {
    if( $column_name == 'alt' )
        echo get_post_meta( $id, '_wp_attachment_image_alt', true);
}
add_filter( 'manage_media_columns', 'wpse_media_extra_column' );
add_action( 'manage_media_custom_column', 'wpse_media_extra_column_value', 10, 2 );




add_filter('tiny_mce_before_init', function($init )
{
    // html elements being stripped
    $init['extended_valid_elements'] = 'div[*], article[*], meta[*]';

    // don't remove line breaks
    $init['remove_linebreaks'] = false;

    // convert newline characters to BR
    $init['convert_newlines_to_brs'] = true;

    // don't remove redundant BR
    $init['remove_redundant_brs'] = false;

    // pass back to wordpress
    return $init;
});
/*
// LOGOUT LINK IN MENU
function diww_menu_logout_link( $nav, $args ) {
	$logoutlink = '<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="'.wp_logout_url().'">Salir</a></li>';
	if( $args->theme_location == 'primary' && is_user_logged_in() ) {
		return $nav.$logoutlink ;
	} else {
	return $nav;
	}
}
add_filter('wp_nav_menu_items','diww_menu_logout_link', 10, 2);



//Código para hacer el logout directamente
add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result)
{
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : '';
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));;
        header("Location: $location");
        die;
    }
}
*/
function jp_rcp_user_registration_data( $user ) {
	rcp_errors()->remove( 'username_empty' );
	$user['login'] = $user['email'];
	return $user;
}

add_filter( 'rcp_user_registration_data', 'jp_rcp_user_registration_data' );


//Cambiar el orden de la featured image en el blog
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );


/**
 * This will remove the "password again" requirement on the registration form.
 */
function ag_rcp_remove_password_mismatch( $posted ) {
	rcp_errors()->remove( 'password_mismatch' );
}

add_action( 'rcp_form_errors', 'ag_rcp_remove_password_mismatch' );



/***************************************************/
// Mostrar la imagen destacada en el rss
function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '<div>' . get_the_post_thumbnail( $post->ID, 'medium', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
}
return $content;
}
 
add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');


//Pixel de facebook
add_action('genesis_header', function(){
/*

	echo '<!-- Cargar el curso ranimado--><script>Result
	 var playground = document.querySelector("body");
	
	var cursorArray = ["url(https://pablomonteserin.com/wp-content/themes/m/images/supermano1.png), auto",
					   "url(https://pablomonteserin.com/wp-content/themes/m/images/supermano2.png), auto",
					  "url(https://pablomonteserin.com/wp-content/themes/m/images/supermano1.png), auto";
	i = 0;
	(function cursor(){
	  playground.style.cursor  = cursorArray[i];
	  i++;
	  if(i == cursorArray.length){
		i = 0; 
	  }
	   setTimeout(cursor, 50);
	})();
	</script>';*/
	echo '<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version="2.0";n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,"script","https://connect.facebook.net/en_US/fbevents.js");
fbq("init", "475378676006696"); // Insert your pixel ID here.
fbq("track", "PageView");
</script>
<noscript><img height="1" alt="" width="1" style="display:none"
src="https://www.facebook.com/tr?id=475378676006696&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->';
});


// OPTIMIZACIONES
/*
Remove TYPE attribute form style and script tag.
*/

add_filter('style_loader_tag', 'charitable_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'charitable_remove_type_attr', 10, 2);

function charitable_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}


//eliminar jQuery migrate
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );
function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}

//eliminar dash icons
add_action( 'wp_print_styles','my_deregister_styles', 100 );
function my_deregister_styles()    { 
   wp_deregister_style( 'amethyst-dashicons-style' ); 
 //  wp_deregister_style( 'dashicons' ); 
	wp_dequeue_style( 'genesis-sample-fonts' );
}

//Eliminar emojis
function grd_remove_emoji() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	// Remove from TinyMCE
	//add_filter( 'tiny_mce_plugins', 'grd_remove_tinymce_emoji' );
}
add_action( 'init', 'grd_remove_emoji' );



?>