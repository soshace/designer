<?php
global $post,
$mk_options;

get_header();


if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php 


$style = get_post_meta( $post->ID, '_employees_single_layout', true );
$header_hero_skin = get_post_meta( $post->ID, '_header_hero_skin', true );
$header_hero_bg_color = get_post_meta( $post->ID, '_header_hero_bg_color', true );
$header_hero_bg_image = get_post_meta( $post->ID, '_header_hero_bg_image', true );

if ($style != 'style3') {
	$image_width = 270;
	$image_height = 270;	
}else {
	$image_width = 150;
	$image_height = 150;
}

?>


<div id="theme-page">
	<div class="mk-main-wrapper-holder">
		<div class="theme-page-wrapper mk-single-employee layout-<?php echo $style; ?> ">
			<?php if ($style == 'style1'): ?>
				<div class="mk-grid vc_row-fluid">
					<div class="theme-content">
						<div class="single-employee-sidebar">
							<?php mk_post_type_featured_image('employees', $image_width, $image_height); ?>
							<?php mk_employees_meta_information(); ?>
						</div>
						<div class="single-employee-content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php elseif ($style == 'style2'): ?>
				<div class="mk-grid vc_row-fluid">
					<div class="theme-content">
						<div class="single-employee-sidebar">
							<?php mk_post_type_featured_image('employees', $image_width, $image_height); ?>
						</div>
						<div class="single-employee-content">
							<?php mk_employees_meta_information(); ?>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="single-employee-hero-title skin-<?php echo $header_hero_skin ?>" style="background-color:<?php echo $header_hero_bg_color ?>; background-image:url(<?php echo $header_hero_bg_image ?>); background-repeat: cover; background-position: center center;">
					<?php mk_post_type_featured_image('employees', $image_width, $image_height); ?>
					<?php mk_employees_meta_information(); ?>
				</div>
				<div class="mk-grid vc_row-fluid">
					<div class="theme-content">
						<div class="single-employee-content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>		
	</div>
<?php endwhile;?>
<?php get_footer(); ?>
