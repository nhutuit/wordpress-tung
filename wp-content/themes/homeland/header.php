<?php/** * The header for our theme * * This is the template that displays all of the <head> section and everything up * * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials * * @package WordPress * @subpackage homeland * @since 1.0 * @version 3.1.0 */	$homeland_site_layout = esc_attr( get_option('homeland_site_layout') );?><!DOCTYPE html><html <?php language_attributes(); ?> class="no-js no-svg"><head><meta charset="<?php bloginfo( 'charset' ); ?>"><?php if(empty($homeland_site_layout)) : ?><meta name="viewport" content="width=device-width, initial-scale=1"><?php endif; ?><link rel="profile" href="http://gmpg.org/xfn/11"><?php wp_head(); ?></head><?php	$homeland_enable_slide_bar = esc_attr( get_option('homeland_enable_slide_bar') );	$homeland_theme_layout = esc_attr( get_option('homeland_theme_layout') );	$homeland_sticky_header = esc_attr( get_option('homeland_sticky_header') );	$homeland_theme_header = esc_attr( get_option('homeland_theme_header') );	$homeland_disable_preloader = esc_attr( get_option('homeland_disable_preloader') );	$homeland_hide_header_image = esc_attr( get_option('homeland_hide_header_image') );	$homeland_contact_address = strip_tags( get_option('homeland_contact_address') );	$homeland_top_slide_class = "";	if($homeland_theme_layout == "Boxed") : 		$homeland_theme_class_main = "container-boxed";	elseif($homeland_theme_layout == "Boxed Left") :		$homeland_theme_class_main = "container-boxed-left";		$homeland_top_slide_class = "sliding-bar-left";	else :		$homeland_theme_class_main = "container";	endif;	$homeland_theme_class_header = "";	$homeland_theme_class_header_container = "";	$homeland_theme_class_hide_header_image = "";?><body <?php body_class($homeland_theme_class_main); ?>>	<?php 		if(!empty($homeland_sticky_header)) : 			$homeland_theme_class_header_container = "sticky-header";			if($homeland_theme_header == "Header 2") : 				$homeland_theme_class_header = "sticky-header2-container";			else :				$homeland_theme_class_header = "sticky-header-container";			endif;			if($homeland_theme_header == "Header 6") : 				$homeland_theme_class_header = "sticky-header-container sticky-header-six";			endif;			if($homeland_theme_header == "Header 9") : 				$homeland_theme_class_header = "sticky-header-container sticky-header-nine";			endif;			if($homeland_theme_header == "Header 10") : 				$homeland_theme_class_header = "sticky-header-container sticky-header-ten";			endif;		endif;		if($homeland_theme_header == "Header 4") : 			$homeland_theme_class_header = "transparent-header";			$homeland_theme_class_header_container = "sticky-header";		elseif($homeland_theme_header == "Header 7") : 			$homeland_theme_class_header_container = "header-seven";		endif;		if(!empty($homeland_hide_header_image)) :			$homeland_theme_class_hide_header_image = "hidden-header-image";		endif;		if(empty($homeland_disable_preloader)) : 			echo "<div id='preloader'><div id='status'>&nbsp;</div></div>";		endif; 		if(!empty( $homeland_enable_slide_bar )) : ?>			<div class="top-toggle">				<div class="sliding-bar <?php echo esc_attr( $homeland_top_slide_class ); ?>">					<div class="inside clearfix">						<div class="header-widgets">							<?php								if ( is_active_sidebar( 'homeland_sliding_bar' ) ) : 									dynamic_sidebar( 'homeland_sliding_bar' );								else : esc_html_e( 'Please add sliding bar widget here...', 'homeland' );								endif;							?>							</div>					</div>				</div>				<a href="#" class="slide-toggle">&nbsp;</a>			</div><?php		endif;		homeland_template_page_link(); 	?>		<!-- Main Container -->	<div id="<?php echo esc_attr( $homeland_theme_class_main ); ?>" class="<?php echo esc_attr( $homeland_theme_class_header ); ?>">		<header class="<?php echo esc_attr( $homeland_theme_class_header_container ); ?> <?php echo esc_attr( $homeland_theme_class_hide_header_image ); ?>">					<?php if($homeland_theme_header == "Header 2") : ?>									<div class="inside clearfix">					<?php 						homeland_theme_logo(); 						homeland_theme_menu();					?>								</div>			<?php	elseif($homeland_theme_header == "Header 3") : ?>									<div class="inside clearfix">					<?php 						homeland_theme_logo(); 						homeland_theme_menu(); 					?>								</div>				<section class="header-block header-three">					<div class="inside clearfix">						<?php 							homeland_social_share_header();							homeland_call_info_header(); 													?>													</div>				</section>			<?php	elseif($homeland_theme_header == "Header 4") : ?>				<div class="inside clearfix">					<?php						homeland_theme_logo(); 						homeland_theme_menu(); 					?>								</div>			<?php	elseif($homeland_theme_header == "Header 5") : ?>							<section class="header-block header-five">					<div class="inside clearfix">						<?php							homeland_call_info_header(); 							homeland_social_share_header(); 						?>													</div>				</section>						<div class="inside clearfix">					<?php 						homeland_theme_logo(); 						homeland_theme_menu(); 					?>								</div>			<?php	elseif($homeland_theme_header == "Header 6") : ?>				<div class="header-six">					<section class="header-block">						<div class="inside clearfix">							<?php 								homeland_call_info_header(); 								homeland_social_share_header(); 							?>														</div>					</section>					<?php 						homeland_theme_logo(); 						homeland_theme_menu(); 					?>				</div>			<?php	elseif($homeland_theme_header == "Header 7") : ?>				<section class="header-block">					<div class="inside clearfix">						<?php 							echo "<span class='add-email'><i class='fa fa-map-pin'></i>" . wp_kses_post( $homeland_contact_address ) . "</span>";							homeland_call_info_header();						?>													</div>				</section>				<div class="inside clearfix">					<?php 						homeland_theme_logo();  						homeland_theme_menu(); 					?>				</div>			<?php elseif($homeland_theme_header == "Header 8") : ?>									<div class="header-block inside-fullwidth clearfix">					<?php						homeland_social_share_header(); 						homeland_call_info_header();					?>					</div>				<div class="inside-fullwidth clearfix">					<?php						homeland_theme_logo();  						homeland_theme_menu(); 					?>								</div>			<?php	elseif($homeland_theme_header == "Header 9") : ?>				<div class="header-nine">					<div class="inside clearfix">						<?php 							homeland_theme_logo(); 							homeland_theme_menu(); 						?>					</div>				</div>			<?php	elseif($homeland_theme_header == "Header 10") : ?>				<div class="header-ten">					<div class="inside clearfix">						<?php 							homeland_theme_logo();  							homeland_theme_contact_info(); 						?>					</div>					<div class="inside"><?php homeland_theme_menu(); ?></div>				</div>			<?php	else : ?>				<section class="header-block">					<div class="inside clearfix">						<?php							homeland_social_share_header(); 							homeland_call_info_header();						?>													</div>				</section>				<div class="inside clearfix">					<?php						homeland_theme_logo();  						homeland_theme_menu(); 					?>								</div>			<?php	endif; ?>		</header>		<!-- Header Images -->		<?php			if(empty($homeland_hide_header_image)) : homeland_header_image(); 			else : 				if(is_home() || is_front_page() || is_page_template('template-homepage.php') || is_page_template('template-homepage2.php') || is_page_template('template-homepage3.php') || is_page_template('template-homepage4.php') || is_page_template('template-homepage-gmap-large.php') || is_page_template('template-homepage-gmap.php') || is_page_template('template-homepage-revslider.php') || is_page_template('template-homepage-video.php') || is_page_template('template-page-builder.php')) : 				else : ?>					<section class="plain-header-title">						<div class="inside"><?php homeland_get_page_title(); ?></div>					</section><?php				endif;			endif; 			homeland_property_terms(); 		?>