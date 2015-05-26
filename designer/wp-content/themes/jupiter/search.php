<?php

global $mk_options;


get_header(); ?>
<div id="theme-page">
	<div class="mk-main-wrapper-holder">
		<div class="theme-page-wrapper <?php echo $mk_options['search_page_layout'] ?>-layout  mk-grid vc_row-fluid row-fluid">
			<div class="theme-content">
				<section class="mk-search-loop">

					<section class="widget widget_search"><p><?php _e('Not so happy with results? Search for a new keyword ', 'mk_framework'); ?></p>
					<form class="mk-searchform" method="get" id="searchform" action="<?php echo home_url(); ?>">
					<input type="text" class="text-input" placeholder="<?php _e('Search site', 'mk_framework'); ?>" value="" name="s" id="s" />
					<i class="mk-icon-search"><input value="" class="search-button" type="submit" /></i>
					</form>
					</section>
				<?php

					if ( have_posts() ):
					while ( have_posts() ) :
						the_post();

					$post_type =  get_post_type();
					?>

						<article class="search-result-item">
							<h4 class="the-title">
								<?php if($post_type == 'employees') { ?>
									<?php the_title(); ?>
								<?php } else{ ?>
									<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
								<?php }	?>
							</h4>
							<div class="search-loop-meta">
								<div class="mk-blog-author">By <?php the_author_posts_link(); ?></div>
								<time datetime="<?php the_time( 'F, j' ); ?>">
									<?php _e('In', 'mk_framework'); ?> <a href="<?php echo get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ); ?>"><?php the_time( 'M. t, h:i A' ); ?></a>
								</time>
								<?php if($post_type == 'post') { ?>
								<span class="mk-search-cats"><?php _e('On', 'mk_framework'); ?> <?php echo get_the_category_list( ', ' ); ?></span>

							<?php } elseif ($post_type == 'portfolio') { 
									$terms = get_the_terms(get_the_id(), 'portfolio_category');
									$terms_slug = array();
									$terms_name = array();
									if (is_array($terms)) {
										foreach($terms as $term) {
											$terms_name[] = $term->name;
												}
									}

								?>	

								<span class="mk-search-cats"><?php _e('On', 'mk_framework'); ?> <?php echo implode(', ', $terms_name); ?></span>
								<?php } elseif($post_type == 'news'){
									$terms = get_the_terms(get_the_id(), 'news_category');
									$terms_slug = array();
									$terms_name = array();
									if (is_array($terms)) {
										foreach($terms as $term) {
											$terms_name[] = $term->name;
												}
									}
									?>
									<span class="mk-search-cats">On <?php echo implode(', ', $terms_name); ?></span>
								<?php }	?>


								
							</div>
							<div class="the-excerpt"><p><?php the_excerpt_max_charlength(200) ?></p></div>
						</article>

					

					<?php
					$post_type = '';
					endwhile;
					mk_theme_blog_pagenavi($before = '', $after = '', NULL, $paged);
					wp_reset_query();
					endif;
					

					
				?>

			</section>
			</div>

		<?php if ( $mk_options['search_page_layout'] != 'full' ) get_sidebar(); ?>
		<div class="clearboth"></div>
		</div>
	</div>	
</div>
<?php get_footer(); ?>
