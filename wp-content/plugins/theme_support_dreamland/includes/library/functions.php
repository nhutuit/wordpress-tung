<?php
if( !function_exists('_WSH') ) {
	function _WSH()
	{
		return $GLOBALS['_bunch_base'];
	}
}
function bunch_font_awesome( $code = false )
{
	$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
	$subject = @file_get_contents(BUNCH_TH_ROOT.'/includes/vafpress/public/css/vendor/font-awesome.css');
	if( !$subject ) return array();
	
	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
	$icons = array();
	
	$icons[0] = __('No Icon', BUNCH_NAME);
	
	
	foreach($matches as $match){
		$value = str_replace( 'icon-', '', $match[1] );
		$newcode = $match[1];//str_replace('fa-', '', $match[1]);
		
		if( $code ) $icons[$match[1]] = stripslashes($match[2]);
		else $icons[$newcode] = ucwords(str_replace('fa-', ' ', $newcode));//$match[2];
	}
	
	return $icons;
}
if( !function_exists( 'bunch_theme_color_scheme' ) )
{
	function bunch_theme_color_scheme()
	{	
		$options = _WSH()->option();
		$dir = BUNCH_TH_ROOT;
		include_once($dir.'/includes/thirdparty/lessc.inc.php');
		$styles = _WSH()->option('custom_color_scheme');
		
		if( ! $styles ) return;	
		
		$transient = get_transient( '_bunch_color_scheme' );
		
	
		$update = ( $styles != $transient ) ? true : false;
		if(dreamland_set($options, 'color_scheme') == 'custom') wp_enqueue_style( 'custom_colors', _WSH()->includes( 'assets/css/colors.css', true ) );
		//echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/css/colors.css" />';
		
		//if( !$update ) return;
	
		set_transient( '_bunch_color_scheme', $styles, DAY_IN_SECONDS );
		
		$less = new lessc;
	
		$less->setVariables(array(
		  "bunch_color" => $styles,
		));
		
		// create a new cache object, and compile
		$cache = $less->cachedCompile( _WSH()->includes("/assets/css/color.less" ) );
	
		file_put_contents( _WSH()->includes('/assets/css/colors.css'), $cache["compiled"]);
		
	}
}
function bunch_get_categories($arg = false, $by_slug = false, $show_all = true)
{
	global $wp_taxonomies;
	if( ! empty($arg['taxonomy']) && ! isset($wp_taxonomies[$arg['taxonomy']]))
	{
		
	}
	
	$categories = get_terms(dreamland_set( $arg, 'taxonomy', 'category' ), $arg);
	$cats = array();
	if( $show_all ) $cats[] = esc_html__( 'All Categories', 'meeton' );
	
	if( !is_wp_error( $categories ) ) {
	foreach($categories as $category)
	{
		if( $by_slug ) $cats[$category->slug] = $category->name;
		else $cats[$category->term_id] = $category->name;
	}
	}
	return $cats;
}
function bunch_get_sidebars($multi = false)
{
	global $wp_registered_sidebars;
	$sidebars = !($wp_registered_sidebars) ? get_option('wp_registered_sidebars') : $wp_registered_sidebars;
	if( $multi ) $data[] = array('value'=>'', 'label' => 'No Sidebar');
	else $data = array('' => esc_html__('No Sidebar', 'meeton'));
	foreach( (array)$sidebars as $sidebar)
	{
		if( $multi ) $data[] = array( 'value'=> dreamland_set($sidebar, 'id'), 'label' => dreamland_set( $sidebar, 'name') );
		else $data[dreamland_set($sidebar, 'id')] = dreamland_set($sidebar, 'name');
	}
	return $data;
}
if( !function_exists( 'dreamland_set' ) ) {
	function dreamland_set( $var, $key, $def = '' )
	{
		if( !$var ) return false;
	
		if( is_object( $var ) && isset( $var->$key ) ) return $var->$key;
		elseif( is_array( $var ) && isset( $var[$key] ) ) return $var[$key];
		elseif( $def ) return $def;
		else return false;
	}
}
function dreamland_get_posts_array( $post_type = 'post', $flip = false )
{
	global $wpdb;
	$res = $wpdb->get_results( "SELECT `ID`, `post_title` FROM `" .$wpdb->prefix. "posts` WHERE `post_type` = '$post_type' AND `post_status` = 'publish' ", ARRAY_A );
	
	$return = array();
	foreach( $res as $k => $r) {
		if( $flip ) {
			if( isset( $return[dreamland_set($r, 'post_title')] ) ) $return[dreamland_set($r, 'post_title').$k] = dreamland_set($r, 'ID');
			else $return[dreamland_set($r, 'post_title')] = dreamland_set( $r, 'ID' );
		}
		else $return[dreamland_set($r, 'ID')] = dreamland_set($r, 'post_title');
	}
	return $return;
}
function dreamland_base_decode($string){
	return urldecode(base64_decode($string));
}