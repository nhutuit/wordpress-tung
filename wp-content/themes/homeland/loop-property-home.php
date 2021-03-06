<?php 
	global $homeland_class; 

	$homeland_property_status = get_the_terms ( $post->ID, 'homeland_property_status' );
	$homeland_price = get_post_meta($post->ID, 'homeland_price', true);
	$homeland_area = esc_attr( get_post_meta($post->ID, 'homeland_area', true) );
	$homeland_area_unit = get_post_meta( $post->ID, 'homeland_area_unit', true );
	$homeland_floor_area = esc_attr( get_post_meta($post->ID, 'homeland_floor_area', true) );
	$homeland_floor_area_unit = esc_attr( get_post_meta($post->ID, 'homeland_floor_area_unit', true) );
	$homeland_bedroom = esc_attr( get_post_meta($post->ID, 'homeland_bedroom', true) );
	$homeland_bathroom = esc_attr( get_post_meta($post->ID, 'homeland_bathroom', true) );
	$homeland_featured = esc_attr( get_post_meta($post->ID, 'homeland_featured', true) );
	$homeland_property_sold = esc_attr( get_post_meta($post->ID, 'homeland_property_sold', true) );
	$homeland_preferred_size = esc_attr( get_option('homeland_preferred_size') ); 
	$homeland_address = esc_attr( get_post_meta($post->ID, 'homeland_address', true) );
?>

<li id="post-<?php the_ID(); ?>" class="<?php echo esc_attr( $homeland_class ); ?>">
	<div class="property-mask">
		<?php if(!empty($homeland_featured)) : ?>
			<div class="featured-ribbon">
				<i class="fa fa-star" title="<?php esc_html_e('Featured', 'homeland'); ?>"></i>
			</div>
		<?php endif; ?>

		<?php if ( post_password_required() ) : ?>
			<div class="password-protect-thumb"><i class="fa fa-lock fa-2x"></i></div>
		<?php else : ?>
			<figure class="pimage">
				<a href="<?php the_permalink(); ?>">
					<?php 
						if ( has_post_thumbnail() ) : 
							the_post_thumbnail('homeland_property_medium'); 
						else : ?>
							<label class="no-image-fallback image-properties">
								<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span>
							</label><?php
						endif; 
					?>
				</a>
				<figcaption>
					<a href="<?php the_permalink(); ?>"><i class="fa fa-link fa-lg"></i></a>
				</figcaption>
				<?php
					if(!empty($homeland_property_sold)) :
						echo "<h4 class='property-sold'>". esc_html__('Sold', 'homeland') ."</h4>";
					else : 
						if(!empty( $homeland_property_status )) : ?>
							<h4>
								<?php foreach($homeland_property_status as $homeland_sterm) : ?>
									<span class="<?php echo $homeland_sterm->slug; ?>"><?php echo $homeland_sterm->name; ?></span>
								<?php endforeach; ?>
							</h4><?php
						endif; 
					endif;

					if(!empty($homeland_price)) : ?>
						<div class="property-price">
							<?php homeland_property_price_format(); ?>
						</div><?php
					endif;
				?>
			</figure>
		<?php endif; ?>			
	</div>

	<div class="property-info">
		<?php
			if($homeland_preferred_size == "Floor Area") :
				if(!empty($homeland_floor_area)) :
					?><span><i class="fa fa-arrows-alt"></i><?php echo esc_html( $homeland_floor_area ); echo "&nbsp;" . esc_html( $homeland_floor_area_unit ); ?></span><?php
				endif;
			else:
				if(!empty($homeland_area)) :
					?><span><i class="fa fa-expand"></i><?php echo esc_html( $homeland_area ); echo "&nbsp;" . esc_html( $homeland_area_unit ); ?></span><?php
				endif;
			endif;

			if(!empty($homeland_bedroom)) : ?>
				<span>
					<i class="fa fa-bed"></i>
					<?php echo esc_html( $homeland_bedroom ); ?>
					<?php esc_html_e( 'Bedrooms', 'homeland' ); ?>
				</span><?php
			endif;
			if(!empty($homeland_bathroom)) : ?>
				<span>
					<i class="fa fa-bath"></i>
					<?php echo esc_html( $homeland_bathroom ); ?> 
					<?php esc_html_e( 'Bathrooms', 'homeland' ); ?>
				</span><?php
			endif;
		?>
	</div>
	
	<div class="property-desc">
		<?php the_title( '<h4><a href="' . get_permalink() . '">', '</a></h4>' ); ?>	
		<h5><?php echo esc_html( $homeland_address ); ?></h5>
	</div>
</li>