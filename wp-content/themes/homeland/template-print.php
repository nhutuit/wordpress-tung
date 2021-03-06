<?php
/*
	Template Name: Print
*/

	$homeland_logo = esc_url( get_option('homeland_logo') );
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body class="print-page">

	<!-- Print Page -->
	<section class="print-preview">
		<div class="logo-print inside clearfix">
			<h1>
				<?php if(empty( $homeland_logo )) : ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php esc_attr( bloginfo('name') ); ?>" title="<?php esc_attr( bloginfo('name') ); ?>" />
				<?php else : ?>
					<img src="<?php echo esc_url( $homeland_logo ); ?>" alt="<?php esc_attr( bloginfo('name') ); ?>" title="<?php esc_attr( bloginfo('name') ); ?>" />
				<?php endif; ?>
			</h1>
			<a href="javascript:window.print()" class="print-now"><i class="fa fa-print fa-3x"></i></a>
		</div>
		
		<div class="inside">
			<?php
				$print_id = $_GET['printid'];
				$print_id_array = array( $print_id );

				$args_wp = array( 
					'post_type' => 'homeland_properties', 
					'post__in' => $print_id_array
				);
				$wp_query = new WP_Query( $args_wp );

				if ($wp_query->have_posts()) : 
					while ( $wp_query->have_posts() ) : 
						$wp_query->the_post(); 	

						$homeland_property_status = get_the_term_list ( $post->ID, 'homeland_property_status', ' ', ', ', '' );
						$homeland_property_type = get_the_term_list ( $post->ID, 'homeland_property_type', ' ', ', ', '' );
						$homeland_property_amenities = get_the_term_list($post->ID, 'homeland_property_amenities', ' ', ' ', '');
						$homeland_property_id = esc_attr( get_post_meta($post->ID, 'homeland_property_id', true) );
						$homeland_price = esc_attr( get_post_meta($post->ID, 'homeland_price', true ) );
						$homeland_property_button = esc_attr( get_option('homeland_property_button') );
						$homeland_area = esc_attr( get_post_meta($post->ID, 'homeland_area', true) );
						$homeland_address = esc_attr( get_post_meta( $post->ID, 'homeland_address', true ) );
						$homeland_area_unit = esc_attr( get_post_meta( $post->ID, 'homeland_area_unit', true ) );
						$homeland_floor_area = esc_attr( get_post_meta($post->ID, 'homeland_floor_area', true) );
						$homeland_floor_area_unit = esc_attr( get_post_meta($post->ID, 'homeland_floor_area_unit', true) );
						$homeland_room = esc_attr( get_post_meta($post->ID, 'homeland_room', true) );
						$homeland_bedroom = esc_attr( get_post_meta($post->ID, 'homeland_bedroom', true) );
						$homeland_bathroom = esc_attr( get_post_meta($post->ID, 'homeland_bathroom', true) );
						$homeland_year_built = esc_attr(get_post_meta($post->ID,'homeland_year_built', true));
						$homeland_featured = esc_attr( get_post_meta($post->ID, 'homeland_featured', true) );
						$homeland_property_sold = esc_attr( get_post_meta($post->ID, 'homeland_property_sold', true) );
						$homeland_garage = esc_attr( get_post_meta($post->ID, 'homeland_garage', true) );
						$homeland_stories = esc_attr(get_post_meta($post->ID,'homeland_stories', true) );
						$homeland_basement = esc_attr( get_post_meta($post->ID, 'homeland_basement', true) );
						$homeland_structure_type = esc_attr( get_post_meta($post->ID, 'homeland_structure_type', true) );
						$homeland_roofing = esc_attr( get_post_meta($post->ID, 'homeland_roofing', true) );
						$homeland_zip = esc_attr( get_post_meta($post->ID, 'homeland_zip', true) );
						$homeland_preferred_size = esc_attr( get_option('homeland_preferred_size') );
						$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $wp_query->ID );
						$homeland_agent_id = get_the_author_meta( 'ID' );
						$homeland_agent_fname = get_the_author_meta( 'user_firstname' );
						$homeland_agent_lname = get_the_author_meta( 'user_lastname' );
						$homeland_agent_email = get_the_author_meta( 'user_email' );
						$homeland_agent_mobile = get_the_author_meta( 'homeland_mobile' );
						$homeland_agent_telno = get_the_author_meta( 'homeland_telno' );
						$homeland_agent_fax = get_the_author_meta( 'homeland_fax' );
						$homeland_agent_url = get_the_author_meta( 'url' );
						?>
						<div class="print-title-price clearfix">	
							<div class="print-title">
								<?php the_title( '<h2>', '</h2>' ); ?>
								<h4><?php echo esc_html( $homeland_address ); ?></h4>
							</div>
							
							<div class="print-property-price">
								<?php
									if(!empty($homeland_property_sold)) : ?>
										<h3 style="color: #FF0000;"><?php esc_html_e('Sold', 'homeland'); ?></h3><?php
									else :
										if(!empty($homeland_price)) : ?>
											<h3><?php homeland_property_price_format(); ?></h3><?php
										endif;
									endif;
								?>
							</div>
						</div>

						<div class="print-image-details clearfix">
							<div class="print-image">
								<?php 
									if ( has_post_thumbnail() ) : 
										the_post_thumbnail('homeland_property_2cols'); 
									else : ?>
										<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span><?php
									endif; 
								?>
							</div>
							<div class="print-property-details">
								<ul>
									<?php
										if(!empty($homeland_property_id)) : ?>
											<li>
												<span><?php esc_html_e('Property ID', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_property_id ); ?>
											</li><?php
										endif;

										if(!empty($homeland_property_type)) : ?>
											<li>
												<span><?php esc_html_e('Type', 'homeland'); echo ":"; ?></span>
												<?php echo strip_tags( $homeland_property_type ); ?>
											</li><?php
										endif;

										if(!empty($homeland_property_status)) : ?>
											<li>
												<span><?php esc_html_e('Status', 'homeland'); echo ":"; ?></span>
												<?php echo strip_tags( $homeland_property_status ); ?>
											</li><?php
										endif;

										if(!empty($homeland_area)) : ?>
											<li>
												<span><?php esc_html_e('Lot Area', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_area ) . "&nbsp;"; echo esc_html( $homeland_area_unit ); ?>
											</li><?php
										endif;

										if(!empty($homeland_floor_area)) : ?>
											<li>
												<span><?php esc_html_e('Floor Area', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_floor_area ) . "&nbsp;"; echo esc_html( $homeland_floor_area_unit ); ?>
											</li><?php
										endif;

										if(!empty($homeland_floor_area)) : ?>
											<li>
												<span><?php esc_html_e('Rooms', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_room ); ?>
											</li><?php
										endif;

										if(!empty($homeland_bedroom)) : ?>
											<li>
												<span><?php esc_html_e('Bedrooms', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_bedroom ); ?>
											</li><?php
										endif;

										if(!empty($homeland_bathroom)) : ?>
											<li>
												<span><?php esc_html_e('Bathrooms', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_bathroom ); ?>
											</li><?php
										endif;

										if(!empty($homeland_garage)) : ?>
											<li>
												<span><?php esc_html_e('Garage', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_garage ); ?>
											</li><?php
										endif;

										if(!empty($homeland_year_built)) : ?>
											<li>
												<span><?php esc_html_e('Year Built', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_year_built ); ?>
											</li><?php
										endif;
									?>
								</ul>
								<ul>
									<?php
										if(!empty($homeland_stories)) : ?>
											<li>
												<span><?php esc_html_e('Stories', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_stories ); ?>
											</li><?php
										endif;

										if(!empty($homeland_basement)) : ?>
											<li>
												<span><?php esc_html_e('Basement', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_basement ); ?>
											</li><?php
										endif;

										if(!empty($homeland_structure_type)) : ?>
											<li>
												<span><?php esc_html_e('Structure Type', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_structure_type ); ?>
											</li><?php
										endif;

										if(!empty($homeland_roofing)) : ?>
											<li>
												<span><?php esc_html_e('Roofing', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_roofing ); ?>
											</li><?php
										endif;

										if(!empty($homeland_zip)) : ?>
											<li>
												<span><?php esc_html_e('Zip', 'homeland'); echo ":"; ?></span>
												<?php echo esc_html( $homeland_zip ); ?>
											</li><?php
										endif;
									?>
								</ul>
							</div>
						</div>
						
						<?php if(!empty($homeland_property_amenities)) : ?>
							<div class="print-features">
								<h3><?php esc_html_e('Features', 'homeland'); ?></h3>
								<ul class="clearfix">
									<?php
										$homeland_terms = get_the_terms($post->ID, 'homeland_property_amenities');
										$homeland_count = count($homeland_terms); 
										if ( $homeland_count > 0 ) :
											foreach ( $homeland_terms as $homeland_term ) : 
												?><li><?php echo $homeland_term->name; ?></li><?php
											endforeach;
										endif;
									?>
								</ul>
							</div>
						<?php endif; ?>

						<div class="print-excerpt">
							<?php the_excerpt(); ?>
						</div>

						<div class="print-agents">
							<h3><?php esc_html_e('Agent', 'homeland'); ?></h3>
							<?php if(!empty($homeland_custom_avatar)) : ?>
    							<img src="<?php echo esc_url( $homeland_custom_avatar ); ?>" />
    					<?php else : 
    							echo get_avatar( $homeland_agent_id, 80 );
								endif;
							?>
							<h5><?php echo esc_html( $homeland_agent_fname ) . "&nbsp;" . esc_html( $homeland_agent_lname ); ?></h5>
							<span>
								<?php
									if(!empty($homeland_agent_url)) : ?>
										<strong><?php esc_html_e('Website', 'homeland'); echo ":&nbsp;"; ?></strong><?php 
										echo esc_url( $homeland_agent_url ); 
									endif;	

									if(!empty($homeland_agent_email)) : ?>
										<strong><?php esc_html_e('Email', 'homeland'); echo ":&nbsp;"; ?></strong><?php 
										echo esc_html( $homeland_agent_email ); 
									endif;	
								?>
							</span>
							<span>
								<?php 
									if(!empty($homeland_agent_telno)) : ?>
										<strong><?php esc_html_e('Telephone', 'homeland'); echo ":&nbsp;"; ?></strong><?php 
										echo esc_html( $homeland_agent_telno ) . "&nbsp;/&nbsp;"; 
									endif;	

									if(!empty($homeland_agent_mobile)) : ?>
										<strong><?php esc_html_e('Mobile', 'homeland'); echo ":&nbsp;"; ?></strong><?php 
										echo esc_html( $homeland_agent_mobile ) . "&nbsp;/&nbsp;"; 
									endif;	

									if(!empty($homeland_agent_fax)) : ?>
										<strong><?php esc_html_e('Fax', 'homeland'); echo ":&nbsp;"; ?></strong><?php 
										echo esc_html( $homeland_agent_fax ); 
									endif;	
								?>
							</span>
						</div>

						<div class="site-footer">
							<?php 
								esc_attr( bloginfo('name') ); echo "&nbsp;&dash;&nbsp;";
								esc_html_e('Copyright', 'homeland'); echo "&nbsp;";
								echo date('Y'); 
							?>
						</div>

						<?php	
					endwhile;
				endif;
			?>
		</div>
	</section>

<?php wp_footer(); ?>

</body>
</html>