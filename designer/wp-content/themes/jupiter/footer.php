<?php
global $mk_options;

$mk_footer_class = $show_footer_old = $show_footer = '';
$post_id = global_get_post_id();
if($post_id) {
  $show_footer_old = get_post_meta($post_id, '_footer', true );
  $show_footer = get_post_meta($post_id, '_template', true );

}

if($mk_options['footer_size'] == 'true') {
  $mk_footer_class .= 'mk-background-stretch';
}
if($mk_options['disable_footer'] == 'false' || ($show_footer_old == 'false' || $show_footer == 'no-footer' || $show_footer == 'no-header-footer' || $show_footer == 'no-header-title-footer' || $show_footer == 'no-footer-title')) {
  $mk_footer_class .= ' mk-footer-disable';
}

if($mk_options['footer_type'] == '2') {
  $mk_footer_class .= ' mk-footer-unfold';
}

$boxed_footer = (isset($mk_options['boxed_footer']) && !empty($mk_options['boxed_footer'])) ? $mk_options['boxed_footer'] : 'true';
$boxed_footer_css = ($boxed_footer == 'true') ? ' mk-grid' : ' fullwidth-footer';

?>
<section id="mk-footer" class="<?php echo $mk_footer_class; ?>">
<?php if($mk_options['disable_footer'] == 'true' && ($show_footer_old != 'false' && $show_footer != 'no-footer' && $show_footer != 'no-header-footer' && $show_footer != 'no-header-title-footer' && $show_footer != 'no-footer-title')) : ?>
<div class="footer-wrapper<?php echo $boxed_footer_css;?>">
<div class="mk-padding-wrapper">
<?php
$footer_column = $mk_options['footer_columns'];
if(is_numeric($footer_column)):
	switch ( $footer_column ):
		case 1:
		$class = '';
			break;
		case 2:
			$class = 'mk-col-1-2';
			break;
		case 3:
			$class = 'mk-col-1-3';
			break;
		case 4:
			$class = 'mk-col-1-4';
			break;
		case 5:
			$class = 'mk-col-1-5';
			break;
		case 6:
			$class = 'mk-col-1-6';
			break;
	endswitch;
	for( $i=1; $i<=$footer_column; $i++ ):
?>
<div class="<?php echo $class; ?>"><?php mk_sidebar_generator( 'get_footer_sidebar' )  ?></div>
<?php endfor;

else :

switch($footer_column):
		case 'third_sub_third':
?>
		<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		<div class="mk-col-2-3">
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
<?php
			break;
		case 'sub_third_third':
?>
		<div class="mk-col-2-3">
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
		<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
<?php
			break;
		case 'third_sub_fourth':
?>
		<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		<div class="mk-col-2-3 last">
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
<?php
			break;
		case 'sub_fourth_third':
?>
		<div class="mk-col-2-3">
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-4"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
		<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
<?php
			break;
		case 'half_sub_half':
?>
		<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		<div class="mk-col-1-2">
			<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
<?php
			break;
		case 'half_sub_third':
?>
		<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		<div class="mk-col-1-2">
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
<?php
			break;
		case 'sub_half_half':
?>
		<div class="mk-col-1-2">
			<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
		<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
<?php
			break;
		case 'sub_third_half':
?>
		<div class="mk-col-1-2">
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
			<div class="mk-col-1-3"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
		</div>
		<div class="mk-col-1-2"><?php mk_sidebar_generator( 'get_footer_sidebar' ); ?></div>
<?php
			break;
	endswitch;
endif;?>
<div class="clearboth"></div>
</div>
</div>
<?php endif;?>
<?php if ( $mk_options['disable_sub_footer'] == 'true' && ($show_footer_old != 'false' && $show_footer != 'no-footer' && $show_footer != 'no-header-footer' && $show_footer != 'no-header-title-footer' && $show_footer != 'no-footer-title')) { ?>
<div id="sub-footer">
	<div class="<?php echo $boxed_footer_css;?>">
		<?php if ( !empty( $mk_options['footer_logo'] ) ) {?>
		<div class="mk-footer-logo">
		    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $mk_options['footer_logo']; ?>" /></a>
		</div>
		<?php } ?>

    	<span class="mk-footer-copyright"><?php echo stripslashes($mk_options['copyright']); ?></span>
    	<?php do_action('footer_menu'); ?>
	</div>
	<div class="clearboth"></div>
</div>
<?php } ?>

</section>





</div>
<?php


	do_action( 'side_dashboard');


	if($mk_options['custom_js']) :

	?>
		<script type="text/javascript">
		<?php echo stripslashes($mk_options['custom_js']); ?>
		</script>
	<?php

	endif;

	if($mk_options['analytics']){
		?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo stripslashes($mk_options['analytics']); ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	<?php } ?>

</div>


	<a href="#" class="mk-go-top"><i class="mk-icon-chevron-up"></i></a>
	
	<?php
		do_action('quick_contact');
		do_action('full_screen_search_form');
	?>


	<?php wp_footer(); ?>

	<?php
		global $app_dynamic_styles;
		global $app_modules;

		$app_dynamic_styles_ids = array();
		$app_dynamic_styles_inject = '';

		$ken_styles_length = count($app_dynamic_styles);

		if ($ken_styles_length > 0) {
			foreach ($app_dynamic_styles as $key => $val) { 
				$app_dynamic_styles_ids[] = $val["id"]; 
				$app_dynamic_styles_inject .= $val["inject"];
			};
		}

		$modulesLength = count($app_modules);


		if ($modulesLength > 0) {
			foreach ($app_modules as $key => $val) { 
				$modules[] = $val["name"]; 
				$params[] = $val["params"];
			};
		}

	?>
	<script type="text/javascript">
		var dynamic_styles = '<?php echo mk_clean_init_styles($app_dynamic_styles_inject); ?>';
		var dynamic_styles_ids = (<?php echo json_encode($app_dynamic_styles_ids); ?> != null) ? <?php echo json_encode($app_dynamic_styles_ids); ?> : [];

		var styleTag = document.createElement('style'),
			head = document.getElementsByTagName('head')[0];

			//console.log('jhonny')
		styleTag.type = 'text/css';
		styleTag.setAttribute('data-ajax', '');
		styleTag.innerHTML = dynamic_styles;
		head.appendChild(styleTag);

		function ajaxStylesInjector() {
			window.$ = jQuery
			$('.mk-dynamic-styles').each(function() {
				var $this = $(this),
					id = $this.attr('id'),
					styles = $this.html();

				if(dynamic_styles_ids.indexOf(id) === -1) {
					$('style[data-ajax]').append(styles);
				}

				dynamic_styles_ids.push(id);
			});
		};

		<?php 
			if ($modulesLength > 0) {
				for ($i = 0; $i < $modulesLength; $i++) {
					echo "abb.modules." . $modules[$i] . ".init({";
						foreach ($params[$i] as $key => $val) {
							echo $key . ": '$val',";
						}
					echo "}); \n";
				} 

				echo "abb.init();";
			}
		?>
	</script>

</body>
</html>


