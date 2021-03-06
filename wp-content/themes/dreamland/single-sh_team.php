<?php $options = _WSH()->option();
get_header(); 
$count = 1;
$column_count = 1;

$settings  = dreamland_set(dreamland_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
$meta = _WSH()->get_meta('_bunch_layout_settings');
$meta1 = _WSH()->get_meta('_bunch_header_settings');
$meta2 = _WSH()->get_meta();

_WSH()->page_settings = $meta;
if(dreamland_set($_GET, 'layout_style')) $layout = dreamland_set($_GET, 'layout_style'); else
$layout = dreamland_set( $meta, 'layout', 'full' );
if( !$layout || $layout == 'full' || dreamland_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
$sidebar = dreamland_set( $meta, 'sidebar', 'blog-sidebar' );
$classes = ( !$layout || $layout == 'full' || dreamland_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12';
if($layout == 'both') $classes = ' col-lg-6 col-md-6 col-sm-6 col-xs-12 ';  
/** Update the post views counter */
_WSH()->post_views( true );

$title = dreamland_set($meta1, 'page_title');
$bg = dreamland_set($meta1, 'page_bg');
?>


<!-- Page Banner -->
<section class="page-banner" <?php if($bg):?>style="background-image:url('<?php echo esc_url($bg);?>');"<?php endif;?>>
	<div class="auto-container">
		<h1><?php if($title) echo balanceTags($title); else wp_title('');?></h1>
	</div>
</section>

<?php while( have_posts() ): the_post(); 
	  $teams_meta = _WSH()->get_meta(); //dreamland_printr($post_meta);
?>

<div id="single-speakers">
<div class="auto-container">
	<div class="row">
		<div class="col-lg-3">
			<div class="info-wrap">
				
				<?php the_post_thumbnail('dreamland_size2', array('class' => 'img-responsive'));?>
				
				<h2><?php the_title();?></h2>
				<p class="position"><?php echo dreamland_set($teams_meta, 'designation')?></p>
				<?php if($socials = dreamland_set($teams_meta, 'bunch_team_social')):?>
				<div class="social-links wow fadeInRight" data-wow-delay="1000ms" data-wow-duration="1500ms">
				
					<?php foreach($socials as $key => $value):?>
					<a href="<?php echo esc_url(dreamland_set($value, 'social_link'));?>"><span class="fa <?php echo dreamland_set($value, 'social_icon');?>"></span></a>
					<?php endforeach;?>
					
				</div>
				<?php endif;?>
				<ul>
					<li><i class="fa fa-phone"></i> <?php echo dreamland_set($teams_meta, 'speaker_phone')?></li>
					<li><i class="fa fa-envelope"></i> <a href="mailto:<?php echo sanitize_email(dreamland_set($teams_meta, 'speaker_email'));?>"><?php echo dreamland_set($teams_meta, 'speaker_email')?></a></li>
					<li><i class="fa fa-globe"></i> <a href="<?php echo esc_url(dreamland_set($teams_meta, 'speaker_website'));?>"><?php echo dreamland_set($teams_meta, 'speaker_website')?></a></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-9">
			<h2><?php esc_html_e('Biography', 'dreamland');?></h2>
			<?php the_content();?>
			<h4><?php esc_html_e('All session by Laurence Francis', 'dreamland');?></h4>

			<!--Schedule Box-->
			<div class="schedule-box clearfix wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
				<?php if($columns = dreamland_set($teams_meta, 'bunch_columns')):?>
				<!--Tab Buttons-->
				<ul class="tab-buttons clearfix">
					<?php foreach($columns as $key => $value):?>
					<li class="tab-btn <?php if($count == 1) echo "active";?>" data-id="#<?php echo dreamland_set($value, 'column_title');?>"><span class="day"><?php echo dreamland_set($value, 'column_title');?></span><span class="date"><?php echo dreamland_set($value, 'column_date');?></span><span class="curve"></span></li>
					<?php $count++; endforeach;?>
				</ul>
				<?php endif;?>
				<!--Tabs Box-->
				<div class="tabs-box">
					<?php if($days = dreamland_set($teams_meta, 'bunch_columns')):?>
					<?php foreach($days as $key => $value):
						$hour_count = 1;
   					?>
					<!--Tab / Current / Monday-->
					<div class="tab <?php if($column_count == 1) echo "current";?>" id="<?php echo dreamland_set($value, 'column_title');?>">
						<?php if($hours = dreamland_set($value, 'sorting_events')): //dreamland_printr($hours);?>
						<?php foreach($hours as $key => $hour):
						  $hour_meta = get_post_meta($hour, '_bunch_bunch_events_settings', true); //dreamland_printr($hour_meta);
						  $content_post = get_post($hour);
						  $content = $content_post->post_content;
						  $content = apply_filters('the_content', $content);
						  $content = str_replace(']]>', ']]&gt;', $content);
						  
						  $speakers = dreamland_set($hour_meta, 'sorting_speakers');
						  
						?>
						<div class="hour-box <?php if($hour_count == 1) echo "active-box";?>">
							<div class="hour"><?php echo dreamland_set($hour_meta, 'start_time');?></div>
							<div class="img-circle circle"><span></span></div>
							<div class="toggle-btn <?php if($hour_count == 1) echo "active";?>"><h3><?php echo get_the_title($hour);?></h3></div>
							<div class="content-box <?php if($hour_count == 1) echo "collapsed";?>">
								<div class="content"><p><?php echo get_the_excerpt();?> </p></div>
								<br>
								<div class="row professional clearfix">
								<?php if($speakers):
									foreach($speakers as $key => $speaker):
									$speaker_meta = get_post_meta($speaker, '_bunch_bunch_team_settings', true); //dreamland_printr($hour_meta);
								?>
									<div class="col-md-6 col-sm-6 col-xs-12 info">
										<figure class="img-circle image"><?php echo get_the_post_thumbnail($speaker, 'dreamland_size6', array('class' => 'img-responsive img-circle'));?></figure>
										<h5 class="prof-title"><?php echo get_the_title($speaker);?></h5>
										<h6 class="prof-occup"><?php echo dreamland_set($speaker_meta, 'designation');?></h6>
									</div>
									<?php endforeach; endif;?>
									<div class="col-md-6 col-sm-6 col-xs-12 text-right">
										
										<a href="<?php echo esc_url(get_permalink($hour));?>" class="theme-btn btn-style-one hvr-bounce-to-right dull"><?php echo dreamland_set($hour_meta, 'start_time');?><?php if(dreamland_set($hour_meta, 'end_time')) echo ' - '; echo dreamland_set($hour_meta, 'end_time');?></a>
										<a href="<?php echo esc_url(get_permalink($hour));?>" class="theme-btn btn-style-one hvr-bounce-to-right"><span class="fa fa-play"></span><?php esc_html_e('DETAILS ABOUT THE EVENT', 'dreamland');?></a>
									</div>
								</div>
							</div>
						</div>
						
						<?php $hour_count++; endforeach;?>
						<?php endif;?>
						
					</div>
					<?php $column_count++; endforeach;?>
				
					<?php endif;?>
					
				</div>
				<!--Tabs Box End-->
				
			</div>
			<!--Schedule Box End-->
			
			<br>
			<div class="text-right">
				<a href="<?php echo esc_url(dreamland_set($teams_meta, 'speaker_schedule_pdf'));?>" class="download-btn theme-btn"><span class="fa fa-file-pdf-o"></span> <?php esc_html_e('DOWNLOAD .PDF schedule', 'dreamland');?></a>
			</div>

		</div>
	</div>
</div>
</div>

<?php endwhile;?>

<?php get_footer(); ?>