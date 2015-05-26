<?php
/**
 * Add_action hooks for Theme general features
 *
 * @author  Bob Ulusoy
 * @copyright Copyright (c) Bob Ulusoy
 * @link  http://artbees.net
 * @since  Version 4.0
 * @package  MK Framework
 */



add_action( 'page_title', 'mk_page_title' );
add_action( 'theme_breadcrumbs', 'mk_theme_breadcrumbs' );
add_action( 'quick_contact', 'mk_quick_contact' );
add_action( 'footer_menu', 'mk_footer_menu' );





/**
 */
if ( !function_exists( 'mk_page_title' ) ) {
	function mk_page_title() {
		global $mk_options;

		$post_id = global_get_post_id();

		$page_on_front = get_option( 'page_on_front' );

		if(empty($page_on_front)) return false;

		if ( is_singular( 'product' ) && $mk_options['woocommerce_single_product_title'] == 'false' ) {
			return false;
		}

		if ( $post_id && (get_post_meta( $post_id, '_template', true ) == 'no-title' || get_post_meta( $post_id, '_template', true ) == 'no-header-title' || get_post_meta($post_id, '_template', true ) == 'no-header-title-footer' || get_post_meta( $post_id, '_template', true ) == 'no-footer-title') ) {
			return false;
		}
		if ( (global_get_post_id() && get_post_meta( $post_id, '_enable_slidehsow', true ) == 'true') || is_404() ) {
			return false;
		}



		$align = $title = $subtitle = $shadow_css = '';


		if ( $post_id ) {
			$custom_page_title = get_post_meta( $post_id, '_custom_page_title', true );
				if ( !empty( $custom_page_title ) ) {
					$title = $custom_page_title;
				} else {
					$title = get_the_title( $post_id );
				}
			$subtitle = get_post_meta( $post_id, '_page_introduce_subtitle', true );
			$align = get_post_meta( $post_id, '_introduce_align', true );

		}


		/* Loads Archive Page Headings */
		if ( is_archive() ) {
			$title = $mk_options['archive_page_title'];
			if ( is_category() ) {
				$subtitle = sprintf( __( 'Category Archive for: "%s"', 'mk_framework' ), single_cat_title( '', false ) );
			}
			elseif ( is_tag() ) {
				$subtitle = sprintf( __( 'Tag Archives for: "%s"', 'mk_framework' ), single_tag_title( '', false ) );
			}
			elseif ( is_day() ) {
				$subtitle = sprintf( __( 'Daily Archive for: "%s"', 'mk_framework' ), get_the_time( 'F jS, Y' ) );
			}
			elseif ( is_month() ) {
				$subtitle = sprintf( __( 'Monthly Archive for: "%s"', 'mk_framework' ), get_the_time( 'F, Y' ) );
			}
			elseif ( is_year() ) {
				$subtitle = sprintf( __( 'Yearly Archive for: "%s"', 'mk_framework' ), get_the_time( 'Y' ) );
			}
			elseif ( is_author() ) {
				if ( get_query_var( 'author_name' ) ) {
					$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
				}
				else {
					$curauth = get_userdata( get_query_var( 'author' ) );
				}
				$subtitle = sprintf( __( 'Author Archive for: "%s"' ), $curauth->nickname );
			}
			elseif ( is_tax() ) {
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				$subtitle = sprintf( __( 'Archives for: "%s"', 'mk_framework' ), $term->name );
			}
			if ( $mk_options['archive_disable_subtitle'] == 'false' ) {
				$subtitle = '';
			}

		}

		if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
			if ( bbp_is_forum_archive() ) {
				$title = bbp_get_forum_archive_title();

			} elseif ( bbp_is_topic_archive() ) {
				$title = bbp_get_topic_archive_title();

			} elseif ( bbp_is_single_view() ) {
				$title = bbp_get_view_title();
			} elseif ( bbp_is_single_forum() ) {

				$forum_id = get_queried_object_id();
				$forum_parent_id = bbp_get_forum_parent_id( $forum_id );

				//if ( 0 !== $forum_parent_id )
				//$title = breadcrumbs_plus_get_parents( $forum_parent_id );

				$title = bbp_get_forum_title( $forum_id );
			}
			elseif ( bbp_is_single_topic() ) {
				$topic_id = get_queried_object_id();
				$title = bbp_get_topic_title( $topic_id );
			}

			elseif ( bbp_is_single_user() || bbp_is_single_user_edit() ) {

				$title = bbp_get_displayed_user_field( 'display_name' );
			}
		}


		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() && !empty($post_id)) {
			ob_start();
			woocommerce_page_title();
			$title = ob_get_clean();
		}

		if ( function_exists( 'is_woocommerce' ) && is_woocommerce()) {
			$title = __('Shop', 'mk_framework');
			if(is_archive()) {
				$title = (isset($mk_options['woocommerce_category_page_title']) && !empty($mk_options['woocommerce_category_page_title'])) ? $mk_options['woocommerce_category_page_title'] : __('Shop', 'mk_framework'); 
			}
		}



		/* Loads Search Page Headings */
		if ( is_search() ) {
			$title = $mk_options['search_page_title'];
			$allsearch = new WP_Query( "s=".get_search_query()."&showposts=-1" ); $count = $allsearch->post_count; wp_reset_query();
			$subtitle  = $count .' '. sprintf( __( 'Search Results for: "%s"', 'mk_framework' ), stripslashes( strip_tags( get_search_query() ) ) );

			if ( $mk_options['search_disable_subtitle'] == 'false' ) {
				$subtitle = '';
			}

		}
		if ( $mk_options['page_title_shadow'] == 'true' ) {
			$shadow_css = 'mk-drop-shadow';
		}

		$align = !empty( $align ) ? $align : 'left';


		echo '<section id="mk-page-introduce" class="intro-'.$align.'">';
		echo '<div class="mk-grid">';
		if ( !empty( $title )) {
			echo '<h1 class="page-introduce-title '.$shadow_css.'">' . $title . '</h1>';

		}

		if ( !empty( $subtitle ) ) {
			echo '<div class="page-introduce-subtitle">';
			echo $subtitle;
			echo '</div>';
		}
		if ( $mk_options['disable_breadcrumb'] == 'true' ) {
			if ( get_post_meta( $post_id, '_disable_breadcrumb', true ) != 'false' ) {
				do_action( 'theme_breadcrumbs', $post_id );
			}
		}

		echo '<div class="clearboth"></div></div></section>';

	}
}
/***************************************/



if(!function_exists('mk_theme_breadcrumbs')):
function mk_theme_breadcrumbs() {
        global $mk_options,
        $post;
        	$post_id = global_get_post_id();
        	   if ( $post_id) {
					$local_skining = get_post_meta( $post_id, '_enable_local_backgrounds', true );
					$breadcrumb_skin = get_post_meta( $post_id, '_breadcrumb_skin', true );
					if ( $local_skining == 'true' && !empty( $breadcrumb_skin ) ) {
						$breadcrumb_skin_class = $breadcrumb_skin;
					} else {
						$breadcrumb_skin_class = $mk_options['breadcrumb_skin'];
					}
				} else {
					$breadcrumb_skin_class = $mk_options['breadcrumb_skin'];
				}


		$delimiter =  ' &#47; ';

        echo '<div id="mk-breadcrumbs"><div class="mk-breadcrumbs-inner '.$breadcrumb_skin_class.'-skin">';

         if ( !is_front_page() ) {
	        echo '<a href="';
	        echo home_url();
	        echo '">'.__('Home', 'mk_framework');
	        echo "</a>" . $delimiter;
        }

        if(function_exists('is_woocommerce') && is_woocommerce() && is_archive()) {
        	$shop_page_id = wc_get_page_id( 'shop' );
			$shop_page    = get_post( $shop_page_id );
			$permalinks   = get_option( 'woocommerce_permalinks' );
        	if ( $shop_page_id && $shop_page && get_option( 'page_on_front' ) !== $shop_page_id ) {
				echo '<a href="' . get_permalink( $shop_page ) . '">' . $shop_page->post_title . '</a> ';
			}
        }

        if (is_category() && !is_singular('portfolio')) {
            
            $category = get_the_category();
            $ID = $category[0]->cat_ID;
            echo is_wp_error( $cat_parents = get_category_parents($ID, TRUE, '', FALSE ) ) ? '' : '<span>'.$cat_parents.'</span>';

        } else if(is_singular('news')) {
            echo '<span>'.get_the_title().'</span>';

        } else if ( is_single() && ! is_attachment()) {
		      	
		       if ( get_post_type() == 'product' ) {

					if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {

						$main_term = $terms[0];

						$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );

						$ancestors = array_reverse( $ancestors );

						foreach ( $ancestors as $ancestor ) {
							$ancestor = get_term( $ancestor, 'product_cat' );

							if ( ! is_wp_error( $ancestor ) && $ancestor )
								echo '<a href="' . get_term_link( $ancestor->slug, 'product_cat' ) . '">' . $ancestor->name . '</a>' .  $delimiter;
						}

						echo  '<a href="' . get_term_link( $main_term->slug, 'product_cat' ) . '">' . $main_term->name . '</a>' . $delimiter;

					}

					echo  get_the_title();

				} elseif(is_singular('portfolio')) {
		            $portfolio_category = get_the_term_list($post->ID, 'portfolio_category', '', ' / ');
		            if(!empty($portfolio_category)) {
		            	echo $portfolio_category . $delimiter;
		            }
		            echo '<span>'.get_the_title().'</span>';

		        } elseif ( get_post_type() != 'post') {

		        	if(function_exists( 'is_bbpress' ) && is_bbpress()) {

		        	} else {
		        		$post_type = get_post_type_object( get_post_type() );
						$slug = $post_type->rewrite;
							echo  '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . $post_type->labels->singular_name . '</a>' .$delimiter;
						echo get_the_title();
		        	}

				} else {
						$cat = current( get_the_category() );
						echo get_category_parents( $cat, true, $delimiter );
						echo get_the_title();	
				}
		}  elseif ( is_page() && !$post->post_parent ) {

			echo get_the_title();

		} elseif ( is_page() && $post->post_parent ) {

			$parent_id  = $post->post_parent;
			$breadcrumbs = array();

			while ( $parent_id ) {
				$page = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id  = $page->post_parent;
			}

			$breadcrumbs = array_reverse( $breadcrumbs );

			foreach ( $breadcrumbs as $crumb )
				echo $crumb . '' . $delimiter;

			echo get_the_title();

		} elseif ( is_attachment() ) {

			$parent = get_post( $post->post_parent );
			$cat = get_the_category( $parent->ID );
			$cat = $cat[0];
			 /* admin@innodron.com patch: 
	        Fix for Catchable fatal error: Object of class WP_Error could not be converted to string
	        ref: https://wordpress.org/support/topic/catchable-fatal-error-object-of-class-wp_error-could-not-be-converted-to-string-11
		    */
		    echo is_wp_error( $cat_parents = get_category_parents($cat, TRUE, '' . $delimiter . '') ) ? '' : $cat_parents;
		   /* end admin@innodron.com patch */
			echo '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a>' . $delimiter;
			echo  get_the_title();

		}	elseif ( is_search() ) {

		echo __( 'Search results for &ldquo;', 'mk_framework' ) . get_search_query() . '&rdquo;';

		} elseif ( is_tag() ) {

				echo __( 'Tag &ldquo;', 'mk_framework' ) . single_tag_title('', false) . '&rdquo;';

		} elseif ( is_author() ) {

			$userdata = get_userdata(get_the_author_meta('ID'));
			echo  __( 'Author:', 'mk_framework' ) . ' ' . $userdata->display_name;

		} elseif ( is_day() ) {

			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $delimiter;
			echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a>' . $delimiter;
			echo get_the_time( 'd' );

		} elseif ( is_month() ) {

			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $delimiter;
			echo get_the_time( 'F' );

		} elseif ( is_year() ) {

			echo  get_the_time( 'Y' );

		} 

		if ( get_query_var( 'paged' ) )
			echo ' (' . __( 'Page', 'mk_framework' ) . ' ' . get_query_var( 'paged' ) . ')';
		

        if (is_tax()) {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(function_exists('is_woocommerce') && is_woocommerce() && is_archive()) {
            	echo $delimiter;
            }

            echo '<span>'.$term->name.'</span>';
        }
        
        if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
        	$item = array();

				$post_type_object = get_post_type_object( bbp_get_forum_post_type() );

				if ( !empty( $post_type_object->has_archive ) && !bbp_is_forum_archive() ){
					$item[] = '<a href="' . get_post_type_archive_link( bbp_get_forum_post_type() ) . '">' . bbp_get_forum_archive_title() . '</a>';
				}

				if ( bbp_is_forum_archive() ){
					$item[] = bbp_get_forum_archive_title();
				}

				elseif ( bbp_is_topic_archive() ){
					$item[] = bbp_get_topic_archive_title();
				}

				elseif ( bbp_is_single_view() ){
					$item[] = bbp_get_view_title();
				}

				elseif ( bbp_is_single_topic() ) {

					$topic_id = get_queried_object_id();

					$item = array_merge( $item, mk_breadcrumbs_get_parents( bbp_get_topic_forum_id( $topic_id ) ) );

					if ( bbp_is_topic_split() || bbp_is_topic_merge() || bbp_is_topic_edit() )
						$item[] = '<a href="' . bbp_get_topic_permalink( $topic_id ) . '">' . bbp_get_topic_title( $topic_id ) . '</a>';
					else
						$item[] = bbp_get_topic_title( $topic_id );

					if ( bbp_is_topic_split() )
						$item[] = __( 'Split', 'mk_framework' );

					elseif ( bbp_is_topic_merge() )
						$item[] = __( 'Merge', 'mk_framework' );

					elseif ( bbp_is_topic_edit() )
						$item[] = __( 'Edit', 'mk_framework' );
				}

				elseif ( bbp_is_single_reply() ) {

					$reply_id = get_queried_object_id();

					$item = array_merge( $item, mk_breadcrumbs_get_parents( bbp_get_reply_topic_id( $reply_id ) ) );

					if ( !bbp_is_reply_edit() ) {
						$item[] = bbp_get_reply_title( $reply_id );

					} else {
						$item[] = '<a href="' . bbp_get_reply_url( $reply_id ) . '">' . bbp_get_reply_title( $reply_id ) . '</a>' ; 
						$item[] = __( 'Edit', 'mk_framework' );
					}

				}

				elseif ( bbp_is_single_forum() ) {

					$forum_id = get_queried_object_id();
					$forum_parent_id = bbp_get_forum_parent_id( $forum_id );

					if ( 0 !== $forum_parent_id)
						$item = array_merge( $item, mk_breadcrumbs_get_parents( $forum_parent_id ) );

					$item[] = bbp_get_forum_title( $forum_id );
				}

				elseif ( bbp_is_single_user() || bbp_is_single_user_edit() ) {

					if ( bbp_is_single_user_edit() ) {
						$item[] = '<a href="' . bbp_get_user_profile_url() . '">' . bbp_get_displayed_user_field( 'display_name' ) . '</a>';
						$item[] = __( 'Edit', 'mk_framework'  );
					} else {
						$item[] = bbp_get_displayed_user_field( 'display_name' );
					}
				}

				echo implode($delimiter, $item);


        }
	
        echo "</div></div>";
}
endif;


function mk_breadcrumbs_get_parents( $post_id = '', $separator = '/' ) {

	$parents = array();

	if ( $post_id == 0 )
		return $parents;

	while ( $post_id ) {
		$page = get_page( $post_id );
		$parents[]  = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . get_the_title( $post_id ) . '</a>';
		$post_id = $page->post_parent;
	}

	if ( $parents )
		$parents = array_reverse( $parents );

	return $parents;
}


/**
 */
if ( !function_exists( 'mk_quick_contact' ) ) {
	function mk_quick_contact() {
		global $mk_options;

		if ( $mk_options['disable_quick_contact'] != 'true' ) return false;

		$captcha_quick_contact = isset($mk_options['captcha_quick_contact']) ? $mk_options['captcha_quick_contact'] : 'true';

		$id = mt_rand( 99, 999 );
		$tabindex_1 = $id;
		$tabindex_2 = $id + 1;
		$tabindex_3 = $id + 2;
		$tabindex_4 = $id + 3;
?>
	<div class="mk-quick-contact-wrapper">
		<a href="#" class="mk-quick-contact-link"><i class="mk-icon-envelope"></i></a>
		<div id="mk-quick-contact">
			<div class="mk-quick-contact-title"><?php echo $mk_options['quick_contact_title']; ?></div>
			<p><?php echo $mk_options['quick_contact_desc']; ?></p>
			<form class="mk-contact-form" method="post" novalidate="novalidate">
				<input type="text" placeholder="<?php _e( 'Name*', 'mk_framework' ); ?>" required="required" id="contact_name" name="contact_name" class="text-input" value="" tabindex="<?php echo $tabindex_1; ?>" />
				<input type="email" required="required" placeholder="<?php _e( 'Email*', 'mk_framework' ); ?>" id="contact_email" name="contact_email" class="text-input" value="" tabindex="<?php echo $tabindex_2; ?>"  />
				<textarea placeholder="<?php _e( 'Message*', 'mk_framework' ); ?>" required="required" id="contact_content" name="contact_content" class="textarea" tabindex="<?php echo $tabindex_3; ?>"></textarea>
				
				<?php if($captcha_quick_contact == 'true') { ?>
				<input placeholder="<?php _e( 'Enter Captcha', 'mk_framework' ); ?>" type="text" name="captcha" class="captcha-form text-input full" required="required" autocomplete="off" />
		            <a href="#" class="captcha-change-image"><?php _e( 'Not readable? Change text.', 'mk_framework' ); ?></a>
		            <img src="<?php echo THEME_DIR_URI; ?>/captcha/captcha.php" class="captcha-image" alt="captcha txt"> <br/>
				<?php } ?>

				<div class="btn-cont">
                    <button tabindex="<?php echo $tabindex_4; ?>" class="mk-progress-button mk-contact-button shop-flat-btn shop-skin-btn" data-style="move-up">
                        <span class="mk-progress-button-content"><?php _e( 'Send', 'mk_framework' ); ?></span>
                        <span class="mk-progress">
                            <span class="mk-progress-inner"></span>
                        </span>
                        <span class="state-success"><i class="mk-moon-checkmark"></i></span>
                        <span class="state-error"><i class="mk-moon-close"></i></span>
                    </button>
                </div>
				<input type="hidden" value="<?php echo $mk_options['quick_contact_email']; ?>" name="contact_to"/>
			</form>
			<div class="bottom-arrow"></div>
		</div>
	</div>
	<?php
	}
}
/***************************************/









/**
 */
if ( !function_exists( 'mk_footer_menu' ) ) {
	function mk_footer_menu() {
		wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'container' => 'nav',
				'container_id' => 'mk-footer-navigation',
				'container_class' => 'footer_menu',
				'fallback_cb' => '',
			) );
	}
}
/***************************************/







