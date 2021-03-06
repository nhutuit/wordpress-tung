<?php
/*
	Template Name: Homepage 4
*/
?>

<?php 
	get_header();

	$homeland_advance_search = esc_attr( get_post_meta( $post->ID, 'homeland_advance_search', true ) );
	$homeland_hide_three_cols = esc_attr( get_option('homeland_hide_three_cols') );	
	$homeland_hide_two_cols = esc_attr( get_option('homeland_hide_two_cols') );	
	$homeland_hide_welcome = esc_attr( get_option('homeland_hide_welcome') );	
	$homeland_hide_properties = esc_attr( get_option('homeland_hide_properties') );	
	$homeland_hide_services = esc_attr( get_option('homeland_hide_services') );	
	$homeland_hide_testimonials = esc_attr( get_option('homeland_hide_testimonials') );	
	$homeland_hide_partners = esc_attr( get_option('homeland_hide_partners') );	
	$homeland_hide_portfolio = esc_attr( get_option('homeland_hide_portfolio') );	
	$homeland_hide_cta = esc_attr( get_option('homeland_hide_cta') );	

	homeland_slider_thumb(); 

	if(empty($homeland_advance_search)) : homeland_advance_search(); endif; 
	if(empty($homeland_hide_services)) : homeland_services_list_two(); endif;
	if(empty($homeland_hide_properties)) : homeland_property_list(); endif; 
	if(empty($homeland_hide_cta)) : homeland_call_to_action_button(); endif; 
	if(empty($homeland_hide_portfolio)) : homeland_portfolio_list_grid();	endif;
	if(empty($homeland_hide_testimonials)) : homeland_testimonials(); endif; 

	if(empty($homeland_hide_two_cols)) : ?>
		<!-- 2 Columns -->
		<section class="three-columns-block">
			<div class="inside clearfix">
				<?php 
					homeland_featured_list_large(); 
					homeland_blog_latest(); 
				?>
			</div>
		</section><?php
	endif;

	if(empty($homeland_hide_partners)) : homeland_partners_list(); endif;

	get_footer(); 
?>