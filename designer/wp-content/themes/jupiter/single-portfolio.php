<?php
global $post,
$mk_options;

$single_layout = get_post_meta( $post->ID, '_layout', true );
$padding = get_post_meta( $post->ID, '_padding', true );

if ( $single_layout == 'default' || empty( $single_layout ) ) {
	$single_layout = $mk_options['portfolio_single_layout'];
}


/*
Image dimensions
*/
$image_height = $mk_options['Portfolio_single_image_height'];
$image_width = mk_content_width($single_layout);

$padding = ($padding == 'true') ? 'no-padding' : '';




get_header();




if ( have_posts() ) while ( have_posts() ) : the_post(); ?>




<div id="theme-page">

	<?php
		$post_type = get_post_meta( get_the_id(), '_single_post_type', true );
		$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
		require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
		$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_width, 'height' => $image_height));
		if ( $post_type == '' ) {
			$post_type = 'image';
		}
	?>
	<div class="mk-main-wrapper-holder">
	<div class="theme-page-wrapper <?php echo $single_layout; ?>-layout mk-grid vc_row-fluid <?php echo $padding; ?>">
			<div class="theme-content <?php echo $padding; ?> no-margin-top">

						<?php if ( $mk_options['single_portfolio_cats'] == 'true' ) : ?>
						<span class="portfolio-single-cat"><?php echo implode( ', ', mk_get_portfolio_tax(get_the_id(), true) ); ?></span>
						<?php endif; ?>


						<?php if ( $mk_options['single_portfolio_social'] == 'true' && get_post_meta( $post->ID, '_portfolio_social', true ) != 'false' ) : ?>

						<?php /*   Social Share */ ?>
						<div class="single-social-section portfolio-social-share">

							<div class="mk-love-holder"><?php echo mk_love_this(); ?></div>	
							
							<div class="blog-share-container">
								<div class="blog-single-share mk-toggle-trigger"><i class="mk-moon-share-2"></i></div>
								
								<ul class="single-share-box mk-box-to-trigger">
									<li><a class="facebook-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-facebook"></i></a></li>
									<li><a class="twitter-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-moon-twitter"></i></a></li>
									<li><a class="googleplus-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-googleplus"></i></a></li>
									<li><a class="linkedin-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-linkedin"></i></a></li>
									<li><a class="pinterest-share" data-image="<?php echo $image_src_array[0]; ?>" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-pinterest"></i></a></li>
								</ul>
							</div>
						</div>

						<?php endif; ?>

						<div class="clearboth"></div>
			<?php
	$featured_image = get_post_meta( $post->ID, '_portfolio_featured_image', true ) ? get_post_meta( $post->ID, '_portfolio_featured_image', true ) : 'true';


	if ( $featured_image != 'false' ) {
	if ( $post_type == 'image' ) { ?>
			<div class="single-featured-image">
				<a class="mk-lightbox" data-fancybox-group="portfolio-single-featured" title="<?php the_title(); ?>" href="<?php echo $image_src_array[0]; ?>">
				<img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo mk_thumbnail_image_gen($image_src, $image_width, $image_height); ?>" height="<?php echo $image_height; ?>" width="<?php echo $image_width; ?>" itemprop="image" />
				</a>
			</div>
	<?php } elseif ( $post_type == 'video' ) {
		$skin_color = $mk_options['skin_color'];
		$video_id = get_post_meta( $post->ID, '_single_video_id', true );
		$video_site  = get_post_meta( $post->ID, '_single_video_site', true );


		if ( $video_site =='vimeo' ) {
			echo '<div class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color='.str_replace( "#", "", $skin_color ).'" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
		}


		if ( $video_site =='youtube' ) {
			echo '<div class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://www.youtube.com/embed/'.$video_id.'?showinfo=0" frameborder="0" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
		}

		if ( $video_site =='dailymotion' ) {
			echo '<div  class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://www.dailymotion.com/embed/video/'.$video_id.'?logo=0" frameborder="0" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
		}

	}

} 

	 the_content(); ?>


<?php if ( $mk_options['enable_portfolio_comment'] == 'true' ) : comments_template( '', true ); endif; ?>

	<div class="clearboth"></div>
	</div>
	<?php endwhile; ?>
	<?php  if ( $single_layout != 'full' ) get_sidebar();  ?>
	<div class="clearboth"></div>
	</div>
	</div>

<?php
if ( $mk_options['enable_portfolio_similar_posts'] == 'true' && get_post_meta( $post->ID, '_portfolio_similar', true ) !='false' ) :
	do_action( 'portfolio_similar_posts' );
	
endif;
?>

</div>
<?php get_footer(); ?>
