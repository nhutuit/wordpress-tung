<?php
/*
	Template Name: Properties - Left Sidebar
*/
?>

<?php 
	get_header(); 

	$homeland_advance_search = esc_attr( get_post_meta( $post->ID, 'homeland_advance_search', true ) );
	$homeland_hide_map_list = esc_attr( get_option('homeland_hide_map_list') );
	$homeland_num_properties = esc_attr( get_option('homeland_num_properties') );
	$homeland_page_nav = esc_attr( get_option('homeland_pnav') );
	$homeland_filter_ordering = esc_attr( get_option('homeland_filter_order') );
	$homeland_filter_default = esc_attr( get_option('homeland_filter_default') );

	if(empty($homeland_advance_search)) : homeland_advance_search(); endif;
?>

	<!-- Property List -->
	<section class="theme-pages">
		<div class="inside clearfix">		
			<div class="left-container right">		
				<?php homeland_property_sort_order(); // modify in functions.php ?>
				<div class="agent-properties property-list clearfix">
					<?php
						homeland_get_home_pagination(); // modify in functions.php
						$homeland_filter_order_result = $homeland_filter_ordering == "ASC" ? 'ASC' : 'DESC';

						// displays page contents
						if (have_posts()) : 
							while (have_posts()) : the_post(); 
								the_content(); 								
							endwhile; 
						endif;
						
						// displays property map
						if(empty($homeland_hide_map_list)) :
							?><section id="map-homepage"></section><?php
						endif;

						if($homeland_filter_default == "Price") :
							$args_wp = array( 
								'post_type' => 'homeland_properties', 
								'orderby' => 'meta_value_num', 
								'order' => $homeland_filter_order_result, 
								'posts_per_page' => $homeland_num_properties, 
								'paged' => $paged,
								'meta_query' => array( 'relation' => 'OR',
					        array( 'key' => 'homeland_price', 'compare' => 'EXISTS' ),
					        array( 'key' => 'homeland_price', 'compare' => 'NOT EXISTS' )
						    )
							);
						elseif($homeland_filter_default == "Name") :
							$args_wp = array( 
								'post_type' => 'homeland_properties', 
								'orderby' => 'title', 
								'order' => $homeland_filter_order_result, 
								'posts_per_page' => $homeland_num_properties, 
								'paged' => $paged
							);
						elseif($homeland_filter_default == "Random") :
							$args_wp = array( 
								'post_type' => 'homeland_properties', 
								'orderby' => 'rand', 
								'order' => $homeland_filter_order_result, 
								'posts_per_page' => $homeland_num_properties, 
								'paged' => $paged
							);
						else :
							$args_wp = array( 
								'post_type' => 'homeland_properties', 
								'orderby' => 'date', 
								'order' => $homeland_filter_order_result, 
								'posts_per_page' => $homeland_num_properties, 
								'paged' => $paged
							);
						endif;
							
						$args = apply_filters('homeland_properties_parameters', $args_wp);
						$wp_query = new WP_Query( $args );	

						if ( $wp_query->have_posts() ) : ?>	
							<!-- Search Count -->
							<div class="search-count">
        				<?php echo $wp_query->found_posts . "&nbsp;"; esc_html_e( 'Properties Found', 'homeland' ); ?>
        			</div>

            	<!-- Property List -->
							<div class="grid cs-style-3">
								<ul class="clearfix">
									<?php
										while ( $wp_query->have_posts() ) : 
											$wp_query->the_post(); 
											get_template_part( 'loop', 'properties' );
								    endwhile; 
								  ?>
					    	</ul>
					    </div><?php
					  endif;		
					?>
				</div>
				<?php 
					if( $homeland_page_nav == "Next Previous Link" ) : 
						homeland_next_previous(); // modify in functions.php
					else : homeland_pagination(); // modify in functions.php
					endif; 
				?>
			</div>

			<!-- Sidebar -->
			<div class="sidebar left"><?php get_sidebar(); ?></div>
		</div>
	</section>

<?php get_footer(); ?>