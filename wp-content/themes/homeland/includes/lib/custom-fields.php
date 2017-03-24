<?php
	// Posts Custom Fields

	if ( ! function_exists( 'homeland_post_menu' ) ) :
		function homeland_post_menu() {
			global $post;

			$homeland_advance_search = sanitize_text_field( get_post_meta($post->ID, 'homeland_advance_search', true) );
			$homeland_video = sanitize_text_field( get_post_meta($post->ID, 'homeland_video', true) );
			$homeland_video_host = sanitize_text_field( get_post_meta($post->ID, 'homeland_video_host', true) );
			$homeland_hdimage = sanitize_text_field( get_post_meta($post->ID, 'homeland_hdimage', true) );		
			$homeland_bgimage =  sanitize_text_field( get_post_meta($post->ID, 'homeland_bgimage', true) );		
			$homeland_audio =  get_post_meta($post->ID, 'homeland_audio', true);		
			$homeland_rev_slider = sanitize_text_field( get_post_meta($post->ID, 'homeland_rev_slider', true ) );
			?>
				<div class="mabuc-form-wrap">

					<!-- Tabs -->
					<ul class="mabuc-tabs">
						<li class="mabuc-tab-link current" data-tab="tab-1">
							<i class="fa fa-home"></i><?php esc_html_e( 'Main Settings', 'homeland' ); ?>
						</li>
						<li class="mabuc-tab-link" data-tab="tab-2">
							<i class="fa fa-image"></i><?php esc_html_e( 'Images', 'homeland' ); ?>
						</li>
						<li class="mabuc-tab-link" data-tab="tab-3">
							<i class="fa fa-video-camera"></i></i><?php esc_html_e( 'Video', 'homeland' ); ?>
						</li>
						<li class="mabuc-tab-link" data-tab="tab-4">
							<i class="fa fa-volume-up"></i></i><?php esc_html_e( 'Audio', 'homeland' ); ?>
						</li>
						<li class="mabuc-tab-link" data-tab="tab-5">
							<i class="fa fa-sliders"></i><?php esc_html_e( 'Slider', 'homeland' ); ?>
						</li>
					</ul>

					<!-- Main Settings -->
					<div id="tab-1" class="mabuc-tab-content current">
						<ul>
							<li>
								<label for="homeland_advance_search">
									<?php esc_html_e( 'Hide Search', 'homeland' ); ?>
								</label>
								<input name="homeland_advance_search" type="checkbox" id="homeland_advance_search" <?php if( $homeland_advance_search == true ) { ?>checked="checked"<?php } ?> /><br>
								<span class="desc"><?php esc_html_e( 'Tick the box to hide advance search in this post', 'homeland' ); ?></span>
							</li>
						</ul>
					</div>

					<!-- Images -->
					<div id="tab-2" class="mabuc-tab-content">
						<ul>
							<li>
								<label for="homeland_hdimage">
									<?php esc_html_e( 'Header Image', 'homeland' ); ?>
								</label>
								<input name="homeland_hdimage" type="text" id="homeland_hdimage" value="<?php echo esc_attr( $homeland_hdimage ); ?>" /> <input id="upload_image_button_homeland_hdimage" type="button" value="<?php esc_html_e( 'Upload', 'homeland' ); ?>" class="button-secondary" /><br>
								<span class="desc"><?php esc_html_e( 'Please upload header image. Otherwise default header image from theme options will be displayed', 'homeland' ); ?></span>
							</li>
							<li>
								<label for="homeland_bgimage">
									<?php esc_html_e( 'Background Image', 'homeland' ); ?>
								</label>
								<input name="homeland_bgimage" type="text" id="homeland_bgimage" value="<?php echo esc_attr( $homeland_bgimage ); ?>" /> <input id="upload_image_button_homeland_bgimage" type="button" value="<?php esc_html_e( 'Upload', 'homeland' ); ?>" class="button-secondary" /><br>
								<span class="desc"><?php esc_html_e( 'Please upload background image. Otherwise default background image from theme options will be displayed', 'homeland' ); ?></span>
							</li>
						</ul>
					</div>

					<!-- Video -->
					<div id="tab-3" class="mabuc-tab-content">
						<ul>
							<li>
								<label for="homeland_video_host">
									<?php esc_html_e( 'Self Hosted Video', 'homeland' ); ?>
								</label>
								<input name="homeland_video_host" type="checkbox" id="homeland_video_host" <?php if( $homeland_video_host == true ) { ?>checked="checked"<?php } ?> /><br>
								<span class="desc"><?php esc_html_e( 'Check this checkbox option if you want to use self hosted video', 'homeland' ); ?></span>
							</li>
							<li>
								<label for="homeland_video">
									<?php esc_html_e( 'Video', 'homeland' ); ?>
								</label>
								<input name="homeland_video" type="text" class="newtag" id="homeland_video" value="<?php echo esc_attr( $homeland_video ); ?>" /> <input id="upload_image_button_homeland_svideo" type="button" value="<?php esc_html_e( 'Upload', 'homeland' ); ?>" class="button-secondary" /><br>
								<span class="desc"><?php esc_html_e( 'Add your video URL or just click upload for self hosted video', 'homeland' ); ?></span>
							</li>
						</ul>
					</div>
						
					<!-- Audio -->
					<div id="tab-4" class="mabuc-tab-content">
						<ul>
							<li>
								<label for="homeland_audio">
									<?php esc_html_e( 'Audio', 'homeland' ); ?>
								</label>
								<input name="homeland_audio" type="text" class="newtag" id="homeland_audio" value="<?php echo esc_attr( $homeland_audio ); ?>" /><br>
								<span class="desc">
									<?php esc_html_e( 'Add your audio URL', 'homeland' ); ?>
								</span>
							</li>
						</ul>
					</div>

					<!-- Slider -->
					<div id="tab-5" class="mabuc-tab-content">
						<ul>
							<?php
								if(shortcode_exists("rev_slider")) : ?>
								  <li>
								   	<label for="homeland_rev_slider">
								   		<?php esc_html_e( 'Revolution Slider', 'homeland' ); ?>
								   	</label>
								   	<select name="homeland_rev_slider" id="homeland_rev_slider">
									   	<?php
												$slider = new RevSlider();
												$revolution_sliders = $slider->getArrSliders();
												 
												echo "<option value=''>Select</option>";
												foreach ( $revolution_sliders as $revolution_slider ) {
										      $checked="";
													$alias = $revolution_slider->getAlias();
													$title = $revolution_slider->getTitle();
													if($alias==$homeland_rev_slider) $checked="selected";
													echo "<option value='".$alias."' $checked>".$title."</option>";
												}
											?>
										</select><br>
										<span class="desc"><?php esc_html_e( 'Select your slider if you want to use revolution slider in blog single page', 'homeland' ); ?></span>
								  </li><?php
								else :
									esc_html_e('Plugin is Deactivated', 'homeland');
								endif;
							?>
						</ul>
					</div>						
				</div>	
			<?php
		}	
	endif;
	

	// Page Custom Fields

	if ( ! function_exists( 'homeland_page_menu' ) ) :
		function homeland_page_menu() {
			global $post;

			$homeland_advance_search = sanitize_text_field( get_post_meta($post->ID, 'homeland_advance_search', true ) );
			$homeland_ptitle = sanitize_text_field( get_post_meta($post->ID, 'homeland_ptitle', true) );
			$homeland_subtitle = sanitize_text_field( get_post_meta($post->ID, 'homeland_subtitle', true) );
			$homeland_bgimage = sanitize_text_field( get_post_meta($post->ID, 'homeland_bgimage', true) );			
			$homeland_hdimage = sanitize_text_field( get_post_meta($post->ID, 'homeland_hdimage', true) );		

			?>
				<div class="mabuc-form-wrap">

					<!-- Tabs -->
					<ul class="mabuc-tabs">
						<li class="mabuc-tab-link current" data-tab="tab-1">
							<i class="fa fa-home"></i><?php esc_html_e( 'Main Settings', 'homeland' ); ?>
						</li>
						<li class="mabuc-tab-link" data-tab="tab-2">
							<i class="fa fa-image"></i><?php esc_html_e( 'Images', 'homeland' ); ?>
						</li>
					</ul>

					<!-- Main Information -->
					<div id="tab-1" class="mabuc-tab-content current">
						<ul>
							<li>
								<label for="homeland_advance_search">
									<?php esc_html_e( 'Hide Search', 'homeland' ); ?>
								</label>
								<input name="homeland_advance_search" type="checkbox" id="homeland_advance_search" <?php if( $homeland_advance_search == true ) { ?>checked="checked"<?php } ?> /><br>
								<span class="desc"><?php esc_html_e( 'Tick the box to hide advance search in this page', 'homeland' ); ?></span>
							</li>
							<li>
								<label for="homeland_ptitle">
									<?php esc_html_e( 'Page Title', 'homeland' ); ?>
								</label>	
								<input name="homeland_ptitle" type="text" id="homeland_ptitle" value="<?php echo esc_attr( $homeland_ptitle ); ?>" /><br>
								<span class="desc"><?php esc_html_e( 'Provide your page title here, this will replace your default page title', 'homeland' ); ?></span>
							</li>
							<li>
								<label for="homeland_subtitle">
									<?php esc_html_e( 'Page Subtitle', 'homeland' ); ?>
								</label>
								<input name="homeland_subtitle" type="text" id="homeland_subtitle" value="<?php echo esc_attr( $homeland_subtitle ); ?>" /><br>
								<span class="desc"><?php esc_html_e( 'Provide your page subtitle here, this will be added at the bottom of your page title', 'homeland' ); ?></span>
							</li>
						</ul>
					</div>

					<!-- Images -->
					<div id="tab-2" class="mabuc-tab-content">
						<ul>
							<li>
								<label for="homeland_hdimage">
									<?php esc_html_e( 'Header Image', 'homeland' ); ?>
								</label>
								<input name="homeland_hdimage" type="text" id="homeland_hdimage" value="<?php echo esc_attr( $homeland_hdimage ); ?>" /> <input id="upload_image_button_homeland_hdimage" type="button" value="<?php esc_html_e( 'Upload', 'homeland' ); ?>" class="button-secondary" /><br>
								<span class="desc"><?php esc_html_e( 'Please upload header image. Otherwise default header image from theme options will be displayed', 'homeland' ); ?></span>
							</li>
							<li>
								<label for="homeland_bgimage">
									<?php esc_html_e( 'Background Image', 'homeland' ); ?>
								</label>
								<input name="homeland_bgimage" type="text" id="homeland_bgimage" value="<?php echo esc_attr( $homeland_bgimage ); ?>" /> <input id="upload_image_button_homeland_bgimage" type="button" value="<?php esc_html_e( 'Upload', 'homeland' ); ?>" class="button-secondary" /><br>
								<span class="desc"><?php esc_html_e( 'Please upload background image. Otherwise default background image from theme options will be displayed', 'homeland' ); ?></span>
							</li>
						</ul>
					</div>										
				</div>	
			<?php
		}
	endif;


	// Add and Save Custom Fields

	if ( ! function_exists( 'homeland_custom_fields_box' ) ) :
		function homeland_custom_fields_box(){
			add_meta_box(
				"homeland_post_menu", 
				esc_html__( 'Post Options', 'homeland' ), 
				"homeland_post_menu", 
				"post", 
				"normal", 
				"low"
			);
			add_meta_box(
				"homeland_page_menu", 
				esc_html__( 'Page Options', 'homeland' ), 
				"homeland_page_menu", 
				"page", 
				"normal", 
				"low"
			);		
		}	
	endif;
	add_action( 'add_meta_boxes', 'homeland_custom_fields_box' );

	
	if ( ! function_exists( 'homeland_custom_fields_save' ) ) :	
		function homeland_custom_fields_save( $post_id ){
			if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX)) return;
			if ( 'page' == isset($_POST['post_type']) ) { if ( !current_user_can( 'edit_page', $post_id ) ) return;
			} else { if ( !current_user_can( 'edit_post', $post_id ) ) return; }

			$homeland_fields = array( 
				'homeland_advance_search',
				'homeland_ptitle', 
				'homeland_subtitle', 
				'homeland_hdimage', 
				'homeland_bgimage', 
				'homeland_audio', 
				'homeland_video', 
				'homeland_video_host',
				'homeland_rev_slider' 
			);

			foreach ($homeland_fields as $homeland_value) {
				if( isset($homeland_value) ) :

				  $homeland_new = false;
				  $homeland_old = get_post_meta( $post_id, $homeland_value, true );

				  if ( isset( $_POST[$homeland_value] ) ) :
				    $homeland_new = $_POST[$homeland_value];
				 	endif;

				  if ( isset( $homeland_new ) && '' == $homeland_new && $homeland_old ) :
				    delete_post_meta( $post_id, $homeland_value, $homeland_old );
				  elseif ( ! $homeland_new || !isset( $homeland_new ) ) :
				  	delete_post_meta( $post_id, $homeland_value, $homeland_old );
				  elseif ( isset( $homeland_new ) && $homeland_new != $homeland_old ) :
				  	update_post_meta( $post_id, $homeland_value, $homeland_new );
				 	elseif ( ! isset( $homeland_old ) && isset( $homeland_new ) ) :
				    add_post_meta( $post_id, $homeland_value, $homeland_new );
				  endif;

				endif;
			}
		}	
	endif;
	add_action('save_post', 'homeland_custom_fields_save');
?>