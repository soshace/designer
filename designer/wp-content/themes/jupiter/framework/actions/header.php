<?php
/**
 * Add_action hooks for header toolbar elements.
 *
 * @author  Bob Ulusoy
 * @copyright Copyright (c) Bob Ulusoy
 * @link  http://artbees.net
 * @since  Version 3.5
 * @package  MK Framework
 */

add_action('header_toolbar_date', 'mk_header_toolbar_date');
add_action('header_toolbar_menu', 'mk_header_toolbar_menu');
add_action('header_toolbar_contact', 'mk_header_toolbar_contact');
add_action('header_social', 'mk_header_social');
add_action('header_toolbar_tagline', 'mk_header_toolbar_tagline');
add_action('header_toolbar_login', 'mk_header_toolbar_login');
add_action('header_toolbar_subscribe', 'mk_header_toolbar_subscribe');
add_action('header_checkout', 'mk_header_checkout');
add_action('header_search', 'mk_header_search');
add_action('header_copyright', 'mk_header_copyright');

add_action('header_banner_video', 'mk_header_banner_video');
add_action('start_tour_link', 'mk_start_tour_link');
add_action('header_logo', 'mk_header_logo');
add_action('header_main_navigation', 'mk_header_main_navigation');
add_action('full_screen_search_form', 'mk_full_screen_search_form');
add_action('vertical_navigation', 'mk_vertical_navigation');
add_action('responsive_search', 'mk_responsive_search');
add_action('side_dashboard', 'mk_side_dashboard');

/**
 */
if (!function_exists('mk_header_toolbar_date')) {
	function mk_header_toolbar_date() {
		global $mk_options;
		if ($mk_options['enable_header_date'] == 'true') {
			echo '<span class="mk-header-date"><i class="mk-moon-clock"></i>' . date_i18n("F j, Y") . '</span>';
		}
	}
}

/***************************************/

/**
 */
if (!function_exists('mk_header_toolbar_menu')) {
	function mk_header_toolbar_menu() {

		$output = wp_nav_menu(array(
			'theme_location' => 'toolbar-menu',
			'container' => 'nav',
			'container_id' => 'mk-toolbar-navigation',
			'container_class' => 'mk_toolbar_menu',
			'fallback_cb' => '',
		));
		echo $output;

	}
}

/***************************************/

/**
 */
if (!function_exists('mk_header_toolbar_contact')) {
	function mk_header_toolbar_contact() {
		global $mk_options;

		if (!empty($mk_options['header_toolbar_phone'])) {
			echo '<span class="header-toolbar-contact"><i class="mk-moon-phone-3"></i>' . stripslashes($mk_options['header_toolbar_phone']) . '</span>';
		}
		if (!empty($mk_options['header_toolbar_email'])) {
			echo '<span class="header-toolbar-contact"><i class="mk-moon-envelop"></i><a href="mailto:' . antispambot($mk_options['header_toolbar_email']) . '">' . antispambot($mk_options['header_toolbar_email']) . '</a></span>';
		}

	}
}

/***************************************/

/**
 */
if (!function_exists('mk_header_social')) {
	function mk_header_social($section) {

		global $mk_options;

		$location = isset($mk_options['header_social_location']) ? $mk_options['header_social_location'] : 'toolbar';

		if ($location == 'disable') {
			return false;
		} else if ($location != $section) {
			return false;
		}

		$icon_style_css = '';

		switch ($mk_options['header_social_networks_style']) {
			case 'rounded':
				$icon_style = 'mk-jupiter-icon-square-';
				break;
			case 'simple':
				$icon_style = 'mk-jupiter-icon-simple-';
				break;
			case 'circle':
				$icon_style = 'mk-jupiter-icon-';
				break;
			case 'simple-rounded':
				$icon_style = 'mk-jupiter-icon-simple-';
				$icon_style_css = 'mk-simple-rounded ';
				break;
			case 'square-rounded':
				$icon_style_css = 'mk-square-rounded ';
				$icon_style = 'mk-jupiter-icon-simple-';
				break;
			case 'square-pointed':
				$icon_style_css = 'mk-square-pointed ';
				$icon_style = 'mk-jupiter-icon-simple-';
				break;

			default:
				$icon_style = 'mk-jupiter-icon-';
		}
		$names = explode(",", $mk_options['header_social_networks_site']);
		$urls = explode(",", $mk_options['header_social_networks_url']);

		$header_social_style = $mk_options['header_social_networks_style'];
		if (($header_social_style == 'square-pointed' || $header_social_style == 'square-rounded' || $header_social_style == 'simple-rounded') && $location == 'header') {
			$header_icon_size = $mk_options['header_icon_size'];
		} else {
			$header_icon_size = '';
		}

		$output = '';
		if (strlen(implode('', $urls)) != 0) {
			$output = '<div id="mk-header-social" class="' . $location . '-section">';
			$output .= '<ul>';
			foreach (array_combine($urls, $names) as $url => $name) {
				$output .= '<li><a class="' . $icon_style_css . $name . '-hover ' . $header_icon_size . '" target="_blank" href="' . $url . '"><i class="' . $icon_style . $name . '" alt="' . $name . '" title="' . $name . '"></i></a></li>';
			}
			$output .= '</ul>';

			$output .= '<div class="clearboth"></div></div>';
		}

		echo $output;

	}
}

/***************************************/

/**
 */
if (!function_exists('mk_header_toolbar_tagline')) {
	function mk_header_toolbar_tagline() {

		global $mk_options;

		if (!empty($mk_options['header_toolbar_tagline'])) {

			echo '<span class="mk-header-tagline">' . stripslashes($mk_options['header_toolbar_tagline']) . '</span>';
		}

	}
}

/***************************************/

/**
 */
if (!function_exists('mk_header_toolbar_login')) {
	function mk_header_toolbar_login() {
		global $wp,
		$mk_options;

		if ($mk_options['header_toolbar_login'] != 'true') {
			return false;
		}

		$current_url = home_url($wp->request);
		if (is_user_logged_in()) {
			global $current_user;
			get_currentuserinfo();
			?>
			<div class="mk-header-login">
    		<a href="#" id="mk-header-login-button" class="mk-login-link mk-toggle-trigger"><i class="mk-moon-user-8"></i><?php echo $current_user->display_name;?></a>
    		<div class="mk-login-register mk-box-to-trigger user-profile-box">
<?php
$user_ID = get_current_user_id();
			echo get_avatar($user_ID, 48);?>
    			<a href="<?php echo get_edit_user_link();?>"><?php _e('Edit Profile', 'mk_framework');?></a>
    			<a href="<?php echo wp_logout_url(mk_current_page_url());?>" title="Logout"><?php _e('Logout', 'mk_framework');?></a>
    		</div>
    		</div>
<?php } else {
			?>
	<div class="mk-header-login">
    <a href="#" id="mk-header-login-button" class="mk-login-link mk-toggle-trigger"><i class="mk-moon-user-8"></i><?php _e('Login', 'mk_framework');?></a>
	<div class="mk-login-register mk-box-to-trigger">

		<div id="mk-login-panel">
				<form id="mk_login_form" name="mk_login_form" method="post" class="mk-login-form" action="<?php echo site_url('wp-login.php', 'login_post')?>">
					<span class="form-section">
					<label for="log"><?php _e('Username', 'mk_framework');?></label>
					<input type="text" id="username" name="log" class="text-input">
					</span>
					<span class="form-section">
						<label for="pwd"><?php _e('Password', 'mk_framework');?></label>
						<input type="password" id="password" name="pwd" class="text-input">
					</span>
<?php do_action('login_form');?>
					<label class="mk-login-remember">
						<input type="checkbox" name="rememberme" id="rememberme" value="forever"><?php _e(" Remember Me", 'mk_framework');?>
					</label>

					<input type="submit" id="login" name="submit_button" class="shop-flat-btn shop-skin-btn" value="<?php _e("LOG IN", 'mk_framework');?>">
<?php wp_nonce_field('ajax-login-nonce', 'security');?>

					<div class="register-login-links">
							<a href="#" class="mk-forget-password"><?php _e("Forget?", 'mk_framework');?></a>
<?php if (get_option('users_can_register')) {?>
							<a href="#" class="mk-create-account"><?php _e("Register", 'mk_framework');?></a>
<?php }?>
</div>
					<div class="clearboth"></div>
					<p class="mk-login-status"></p>
				</form>
		</div>

<?php if (get_option('users_can_register')) {?>
			<div id="mk-register-panel">
					<div class="mk-login-title"><?php _e("Create Account", 'mk_framework');?></div>

					<form id="register_form" name="login_form" method="post" class="mk-form-regsiter" action="<?php echo site_url('wp-login.php?action=register', 'login_post')?>">
						<span class="form-section">
							<label for="log"><?php _e('Username', 'mk_framework');?></label>
							<input type="text" id="reg-username" name="user_login" class="text-input">
						</span>
						<span class="form-section">
							<label for="user_email"><?php _e('Your email', 'mk_framework');?></label>
							<input type="text" id="reg-email" name="user_email" class="text-input">
						</span>
						<span class="form-section">
							<input type="submit" id="signup" name="submit" class="shop-flat-btn shop-skin-btn" value="<?php _e("Create Account", 'mk_framework');?>">
						</span>
<?php do_action('register_form');?>
						<input type="hidden" name="user-cookie" value="1" />
						<input type="hidden" name="redirect_to" value="<?php echo $current_url;?>?register=true" />
						<div class="register-login-links">
							<a class="mk-return-login" href="#"><?php _e("Already have an account?", 'mk_framework');?></a>
						</div>
					</form>
			</div>
<?php }?>

		<div id="mk-forget-panel">
				<span class="mk-login-title"><?php _e("Forget your password?", 'mk_framework');?></span>
				<form id="forgot_form" name="login_form" method="post" class="mk-forget-password-form" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post')?>">
					<span class="form-section">
							<label for="user_login"><?php _e('Username or E-mail', 'mk_framework');?></label>
						<input type="text" id="forgot-email" name="user_login" class="text-input">
					</span>
					<span class="form-section">
						<input type="submit" id="recover" name="submit" class="shop-flat-btn shop-skin-btn" value="<?php _e("Get New Password", 'mk_framework');?>">
					</span>
					<div class="register-login-links">
						<a class="mk-return-login" href="#"><?php _e("Remember Password?", 'mk_framework');?></a>
					</div>
				</form>

		</div>
	</div>
</div>
<?php
}

	}
}

/***************************************/

/**
 */
if (!function_exists('mk_header_toolbar_subscribe')) {
	function mk_header_toolbar_subscribe() {
		global $mk_options;

		if ($mk_options['header_toolbar_subscribe'] != 'true') {
			return false;
		}

		?>	<div class="mk-header-signup">
        <a href="#" id="mk-header-subscribe-button" class="mk-subscribe-link mk-toggle-trigger"><i class="mk-moon-envelop"></i><?php _e('Subscribe', 'mk_framework');?></a>
        <div id="mk-header-subscribe" class="mk-box-to-trigger">
			<form action="<?php echo $mk_options['mailchimp_action_url'];?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<label for="mce-EMAIL"><?php _e('Subscribe to newsletter', 'mk_framework');?></label>
				<input type="email" value="" name="EMAIL" class="email text-input" id="mce-EMAIL" placeholder="<?php _e('Email Address', 'mk_framework');?>" required>
				<input type="submit" value="<?php _e('Subscribe', 'mk_framework');?>" name="subscribe" id="mc-embedded-subscribe" class="shop-flat-btn shop-skin-btn">
			</form>
		</div>
      </div> <?php

	}
}

/***************************************/

/**
 */
if (!function_exists('mk_header_search')) {
	function mk_header_search($location) {
		global $mk_options;

		if ($mk_options['header_search_location'] == $location) {

			echo '<div id="mk-header-search">
		      <form class="mk-header-searchform" method="get" id="mk-header-searchform" action="' . home_url() . '">
		        <span>
		        <input type="text" class="text-input on-close-state" value="" name="s" id="s" placeholder="' . __('Search..', 'mk_framework') . '" />
		        <i class="mk-icon-search"><input value="" type="submit" class="header-search-btn" /></i>
		        </span>
		    </form>
   		 </div>';
		}

	}
}

/***************************************/

/**
 */
if (!function_exists('mk_responsive_search')) {
	function mk_responsive_search() {

		global $mk_options;

		if ($mk_options['header_search_location'] == 'disable') {
			return false;
		}

		echo '<form class="responsive-searchform" method="get" style="display:none;" action="' . home_url() . '">
			        <input type="text" class="text-input" value="" name="s" id="s" placeholder="' . __('Search..', 'mk_framework') . '" />
			        <i class="mk-icon-search"><input value="" type="submit" /></i>
			 </form>';

	}
}

/***************************************/

/**
 */
if (!function_exists('mk_header_checkout')) {
	function mk_header_checkout($location) {

		global $woocommerce,
		$mk_options;

		if (!$woocommerce || is_cart() || is_checkout() || $mk_options['woocommerce_catalog'] == 'true') {return false;}

		$show_shopping_cart = isset($mk_options['shopping_cart']) ? $mk_options['shopping_cart'] : 'true';

		if (class_exists('Woocommerce') && $mk_options['header_checkout_woocommerce'] == 'true' && $show_shopping_cart == 'true'):

		?>

					<div class="shopping-cart-header">
								<a class="mk-shoping-cart-link" href="<?php echo $woocommerce->cart->get_cart_url();?>">
									<i class="mk-moon-cart-2"></i><span class="mk-header-cart-count"><?php echo WC()->cart->cart_contents_count;?></span>
								</a>
						<div class="mk-shopping-cart-box">
<?php the_widget('WC_Widget_Cart');?>
<div class="clearboth"></div>
						</div>
					</div>
<?php
endif;
	}
}

/***************************************/

/**
 */
if (!function_exists('mk_header_banner_video')) {
	function mk_header_banner_video() {

		$post_id = global_get_post_id();

		if (empty($post_id)) {
			return false;
		}

		$enable = get_post_meta($post_id, '_enable_banner_video', true);

		if (empty($enable) || $enable == 'false') {return false;}

		$color_overlay = get_post_meta($post_id, '_banner_video_color_overlay', true);
		$video_pattern = get_post_meta($post_id, '_banner_video_pattern', true);
		$video_preview = get_post_meta($post_id, '_banner_video_preview', true);
		$webm = get_post_meta($post_id, '_banner_video_webm', true);
		$mp4 = get_post_meta($post_id, '_banner_video_mp4', true);
		$ogv = get_post_meta($post_id, '_banner_video_ogv', true);

		$output = '';

		if ($video_pattern == 'true') {
			$output .= '<div class="mk-video-mask"></div>';
		}
		if (!empty($color_overlay)) {
			$output .= '<div style="background-color:' . $color_overlay . '" class="mk-video-color-mask"></div>';
		}
		if (!empty($video_preview)) {
			$output .= '<div style="background-image:url(' . $video_preview . ');" class="mk-video-section-touch"></div>';
		}

		$output .= '<div class="mk-section-video"><video poster="' . $video_preview . '" muted="muted" preload="auto" loop="true" autoplay="true">';

		if (!empty($mp4)) {
			//MP4 must be first for iPad!
			$output .= '<source type="video/mp4" src="' . $mp4 . '" />';
		}
		if (!empty($webm)) {
			$output .= '<source type="video/webm" src="' . $webm . '" />';
		}
		if (!empty($ogv)) {
			$output .= '<source type="video/ogg" src="' . $ogv . '" />';
		}

		if (!empty($mp4)) {
			//Flash fallback for non-HTML5 browsers without JavaScript
			$output .= '<object width="1900" height="1060" type="application/x-shockwave-flash" data="' . THEME_JS . '/flashmediaelement.swf">';
			$output .= '<param name="movie" value="' . THEME_JS . '/flashmediaelement.swf" />';
			$output .= '<param name="flashvars" value="controls=true&file=' . $mp4 . '" />';
			$output .= '<img src="' . $video_preview . '" title="No video playback capabilities" />';
			$output .= '</object>';
		}
		$output .= '</video></div>';

		echo $output;

	}
}
/***************************************/

/**
 */
if (!function_exists('mk_start_tour_link')) {
	function mk_start_tour_link() {
		global $mk_options;
		$link_to = isset($mk_options['header_start_tour_page']) ? $mk_options['header_start_tour_page'] : '';
		$link = '';
		if (!empty($link_to)) {
			$link_array = explode('||', $link_to);
			switch ($link_array[0]) {
				case 'page':
					$link = get_page_link($link_array[1]);
					break;
				case 'cat':
					$link = get_category_link($link_array[1]);
					break;
				case 'portfolio':
					$link = get_permalink($link_array[1]);
					break;
				case 'post':
					$link = get_permalink($link_array[1]);
					break;
				case 'manually':
					$link = $link_array[1];
					break;
			}
		}
		if (!empty($mk_options['header_start_tour_text'])) {
			echo '<a href="' . $link . '" class="mk-header-start-tour">' . $mk_options['header_start_tour_text'] . '<i class="mk-icon-caret-right"></i></a>';
		}
	}
}

/**
 */
if (!function_exists('mk_header_logo')) {
	function mk_header_logo() {
		global $mk_options;

		$logo = $mk_options['logo'];
		$mobile_logo = $mk_options['responsive_logo'];
		$light_logo = isset($mk_options['light_header_logo']) ? $mk_options['light_header_logo'] : '';
		$sticky_logo = $mk_options['sticky_header_logo'];

		$post_id = global_get_post_id();

		if ($post_id) {
			global $post;
			$enable = get_post_meta($post_id, '_enable_local_backgrounds', true);

			if ($enable == 'true') {
				$logo_meta = get_post_meta($post_id, 'logo', true);
				$sticky_logo_meta = get_post_meta($post_id, 'sticky_header_logo', true);
				$light_logo_meta = get_post_meta($post_id, 'light_logo', true);
				$logo_mobile_meta = get_post_meta($post_id, 'responsive_logo', true);
				$logo = (isset($logo_meta) && !empty($logo_meta)) ? $logo_meta : $logo;
				$mobile_logo = (isset($logo_mobile_meta) && !empty($logo_mobile_meta)) ? $logo_mobile_meta : $mobile_logo;
				$sticky_logo = (isset($sticky_logo_meta) && !empty($sticky_logo_meta)) ? $sticky_logo_meta : $sticky_logo;
				$light_logo = (isset($light_logo_meta) && !empty($light_logo_meta)) ? $light_logo_meta : $light_logo;
			}
		}

		if (!empty($logo) || !empty($sticky_logo)) {

			$is_repsonive_logo = !empty($mobile_logo) ? 'logo-is-responsive' : '';
			$is_sticky_logo = !empty($sticky_logo) ? 'logo-has-sticky' : '';

			?>
		<div class="header-logo <?php echo $is_repsonive_logo . ' ' . $is_sticky_logo;?>">
		    <a href="<?php echo home_url('/');?>" title="<?php bloginfo('name');?>">

				<img class="mk-desktop-logo dark-logo" alt="<?php bloginfo('name');?>" src="<?php echo $logo;?>" />


<?php if ($light_logo) {?>
				<img class="mk-desktop-logo light-logo" alt="<?php bloginfo('name');?>" src="<?php echo $light_logo;?>" />
<?php }?>

<?php if ($mobile_logo) {?>
				<img class="mk-resposnive-logo" alt="<?php bloginfo('name');?>" src="<?php echo $mobile_logo;?>" />
<?php }?>

<?php if ($sticky_logo) {?>
				<img class="mk-sticky-logo" alt="<?php bloginfo('name');?>" src="<?php echo $sticky_logo;?>" />
<?php }?>
</a>
		</div>

<?php } else {?>
		<div class="header-logo">
		    <a href="<?php echo home_url('/');?>" title="<?php bloginfo('name');?>"><img alt="<?php bloginfo('name');?>" src="<?php echo THEME_IMAGES;?>/jupiter-logo.png" /></a>
		</div>
<?php }

	}
}

/***************************************/

/*
 * Fallback menu
 ******/
if (!function_exists('link_to_menu_editor')) {
	function link_to_menu_editor($args) {
		if (!current_user_can('manage_options')) {
			return;
		}
		extract($args);

		//$link = '<a href="' .admin_url( 'nav-menus.php' ) . '">' . $before . 'Add a menu' . $after . '</a>';

		if (FALSE !== stripos($items_wrap, '<ul')
			or FALSE !== stripos($items_wrap, '<ol')
		) {
			$link = '<li class="menu-item"><a class="menu-item-link" href="' . admin_url('nav-menus.php') . '">' . $before . 'Add a menu' . $after . '</a></li>';
		}

		$output = sprintf($items_wrap, $menu_id, $menu_class, $link);
		if (!empty($container)) {
			$output = "<$container class='$container_class' id='$container_id'>$output</$container>";
		}

		if ($echo) {
			echo $output;
		}

		return $output;
	}
}

/**
 */
if (!function_exists('mk_header_main_navigation')) {
	function mk_header_main_navigation($arg) {
		global $mk_options;
		extract($arg);
		$output = $main_nav = '';
		$post_id = global_get_post_id();
		$post_id = mk_is_woo_archive() ? mk_is_woo_archive() : $post_id;
		$single_menu_location = !empty($post_id) ? get_post_meta($post_id, '_menu_location', true) : false;

		if ($post_id && isset($single_menu_location) && !empty($single_menu_location)) {

			$menu_location = $single_menu_location;

		} else {

			if (is_user_logged_in() && !empty($mk_options['loggedin_menu'])) {
				$menu_location = $mk_options['loggedin_menu'];
			} else {
				$menu_location = 'primary-menu';
			}

		}

		$search_form = '<div class="main-nav-side-search">
						<a class="mk-search-trigger mk-toggle-trigger" href="#"><i class="mk-icon-search"></i></a>
							<div id="mk-nav-search-wrapper" class="mk-box-to-trigger">
							      <form method="get" id="mk-header-navside-searchform" action="' . home_url() . '">
							        <input type="text" value="" name="s" id="mk-ajax-search-input" />
							        <i class="mk-moon-search-3 nav-side-search-icon"><input value="" type="submit" /></i>
							    </form>
					  		</div>
					</div>';

		$search_form_fullscreen = '<div class="main-nav-side-search">
										<a class="mk-search-trigger mk-fullscreen-trigger" href="#"><i class="mk-icon-search"></i></a>
									</div>';

		if ($style == 1 && $nav_location == 'one_row'):

			echo '<div class="mk-header-nav-container one-row-style menu-hover-style-' . $mk_options['main_nav_hover'] . '">';
			echo wp_nav_menu(array(
				'theme_location' => $menu_location,
				'container' => 'nav',
				'container_id' => 'mk-main-navigation',
				'container_class' => 'main_menu',
				'menu_class' => 'main-navigation-ul',
				'echo' => false,
				'fallback_cb' => 'link_to_menu_editor',
				'walker' => new mk_artbees_walker,
			));

			if ($search_location == 'beside_nav' || $search_location == 'beside_nav_no_ajax') {
				echo $search_form;
			} elseif ($search_location == 'fullscreen_search') {
			echo $search_form_fullscreen;
		}

		ob_start();
		do_action('header_checkout');
		ob_end_flush();

		echo '</div>';

		elseif ($style == 2 && $nav_location == 'two_row'):

			echo '<div class="mk-header-nav-container menu-hover-style-' . $mk_options['main_nav_hover'] . '">
					  						<div class="mk-classic-nav-bg"></div>
					  						<div class="mk-classic-menu-wrapper">';

			echo wp_nav_menu(array(
				'theme_location' => $menu_location,
				'container' => 'nav',
				'container_id' => 'mk-main-navigation',
				'container_class' => 'main_menu',
				'menu_class' => 'main-navigation-ul',
				'echo' => false,
				'fallback_cb' => 'link_to_menu_editor',
				'walker' => new mk_artbees_walker,
			));

			if ($search_location == 'beside_nav') {
				echo $search_form;
			} elseif ($search_location == 'fullscreen_search') {
			echo $search_form_fullscreen;
		}

		ob_start();
		do_action('header_checkout');
		ob_end_flush();

		echo '</div></div>';
		endif;

	}
}

/***************************************/

if (!function_exists('mk_full_screen_search_form')) {
	function mk_full_screen_search_form() {
		global $mk_options;

		if ($mk_options['header_search_location'] != 'fullscreen_search') {
			return false;
		}

		echo '<div class="mk-fullscreen-search-overlay">
				<a href="#" class="mk-fullscreen-close"><i class="mk-moon-close-2"></i></a>
				<div id="mk-fullscreen-search-wrapper">
					<p>' . __('Start typing and press Enter to search', 'mk_framework') . '</p>
					<form method="get" id="mk-fullscreen-searchform" action="' . home_url() . '">
		        <input type="text" value="" name="s" id="mk-fullscreen-search-input" />
		        <i class="mk-icon-search fullscreen-search-icon"><input value="" type="submit" /></i>
			    </form>
				</div>
			</div>
		';
	}
}

if (!function_exists('mk_vertical_navigation')) {
	function mk_vertical_navigation() {

		global $mk_options;
		$header_style = $mk_options['theme_header_style'];

		$post_id = global_get_post_id();

		if ($post_id) {
			$enable = get_post_meta($post_id, '_enable_local_backgrounds', true);
			$header_style_meta = get_post_meta($post_id, 'theme_header_style', true);
			$header_style = (isset($header_style_meta) && !empty($header_style_meta) && $enable == 'true') ? $header_style_meta : $header_style;
		}

		if ($header_style != 4) {
			return false;
		}

		$single_menu_location = !empty($post_id) ? get_post_meta($post_id, '_menu_location', true) : false;

		if ($post_id && isset($single_menu_location) && !empty($single_menu_location)) {

			$menu_location = $single_menu_location;

		} else {

			if (is_user_logged_in() && !empty($mk_options['loggedin_menu'])) {
				$menu_location = $mk_options['loggedin_menu'];
			} else {
				$menu_location = 'primary-menu';
			}

		}

		echo wp_nav_menu(array(
			'theme_location' => $menu_location,
			'container' => 'nav',
			'container_id' => 'mk-vm-menu',
			'container_class' => 'mk-vm-menuwrapper ' . 'menu-hover-style-' . $mk_options['main_nav_hover'],
			'menu_class' => 'mk-vm-menu',
			'fallback_cb' => '',
			'walker' => new header_icon_walker(),
		));
	}
}

if (!function_exists('mk_header_copyright')) {
	function mk_header_copyright() {

		global $mk_options;

		$header_style = $mk_options['theme_header_style'];

		$post_id = global_get_post_id();

		if ($post_id) {
			$enable = get_post_meta($post_id, '_enable_local_backgrounds', true);
			$header_style_meta = get_post_meta($post_id, 'theme_header_style', true);
			$header_style = (isset($header_style_meta) && !empty($header_style_meta) && $enable == 'true') ? $header_style_meta : $header_style;
		}

		if ($header_style != 4) {
			return;
		}

		echo '<div class="vm-header-copyright">' . stripslashes($mk_options['vertical_menu_copyright']) . '</div>';

	}
}

/*
 * Create Side Dashboard
 ******/
if (!function_exists('mk_side_dashboard')) {
	function mk_side_dashboard() {
		global $mk_options;

		$header_style = !empty($mk_options['theme_header_style']) ? $mk_options['theme_header_style'] : 1;
		$header_style3_structure = !empty($mk_options['header_style3_structure']) ? $mk_options['header_style3_structure'] : 'header_dashboard_style';

		/*Full Screen Navigation Settings*/
		$full_screen_logo = !empty($mk_options['fullscreen_nav_logo']) ? $mk_options['fullscreen_nav_logo'] : 'dark';
		$dark_logo = $mk_options['logo'];
		$light_logo = isset($mk_options['light_header_logo']) ? $mk_options['light_header_logo'] : '';
		$mobile_logo = isset($mk_options['responsive_logo']) ? $mk_options['responsive_logo'] : '';
		$is_repsonive_logo = !empty($mobile_logo) ? 'logo-is-responsive' : '';

		$post_id = global_get_post_id();

		if ($post_id) {
			$enable = get_post_meta($post_id, '_enable_local_backgrounds', true);
			$header_style_meta = get_post_meta($post_id, 'theme_header_style', true);
			$header_style = (isset($header_style_meta) && !empty($header_style_meta) && $enable == 'true') ? $header_style_meta : $header_style;
		}

		if ($header_style == 3) {
			if ($header_style3_structure == 'header_dashboard_style') {
				$output = '';
				$output .= '<div class="mk-side-dashboard">';
				//$output .= '<span class="mk-sidedasboard-close"><i class="mk-theme-icon-cancel"></i></span>';

				/* Top Widgets */
				$output .= '<div class="side-dash-top-widgets">';
				ob_start();
				dynamic_sidebar('Side Dashboard - Above Navigation');
				$output .= ob_get_contents();
				ob_end_clean();
				$output .= '</div>';
				/************/

				$output .= wp_nav_menu(array(
					'theme_location' => 'side-dashboard-menu',
					'container' => 'nav',
					'container_id' => 'mk-sidedash-navigation',
					'container_class' => 'side_dashboard_menu',
					'menu_class' => 'sidedash-navigation-ul',
					'echo' => false,
					'fallback_cb' => '',
					'walker' => new header_icon_walker(),
				));

				/* Bottom Widets */
				$output .= '<div class="side-dash-bottom-widgets">';
				ob_start();
				dynamic_sidebar('Side Dashboard - Below Navigation');
				$output .= ob_get_contents();
				ob_end_clean();
				$output .= '</div>';
				/************/

				$output .= '</div>';

				echo $output;
			}else if ($header_style3_structure == 'header_fullscreen_style') {
				$output = '';
				$output .= '<div class="mk-fullscreen-nav '.$is_repsonive_logo.'">';
				$output .= '<a href="#" class="mk-fullscreen-nav-close"><i class="mk-moon-close-2"></i></a>';
				$output .= '<div class="mk-fullscreen-nav-wrapper">';
				if($full_screen_logo == 'dark'){
					$output .= '<img class="mk-fullscreen-nav-logo dark-logo" alt="" src="'.$dark_logo.'" />';
					$output .= '<img class="mk-fullscreen-nav-logo responsive-logo" alt="" src="'.$mobile_logo.'" />';
				}else if($full_screen_logo == 'light'){
					$output .= '<img class="mk-fullscreen-nav-logo light-logo" alt="" src="'.$light_logo.'" />';
					$output .= '<img class="mk-fullscreen-nav-logo responsive-logo" alt="" src="'.$mobile_logo.'" />';
				}
				$output .= wp_nav_menu(array(
						'theme_location' => 'fullscreen-menu',
						'container' => 'nav',
						'container_id' => 'fullscreen-navigation',
						'container_class' => 'fullscreen-menu',
						'menu_class' => 'fullscreen-navigation-ul',
						'echo' => false,
						'fallback_cb' => '',
						'walker' => new header_icon_walker(),
					));

				$output .= '</div> </div>';

				echo $output;
			}
		} 
	}
}
/***************************************/
