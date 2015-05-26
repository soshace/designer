<?php
wp_enqueue_style('importer-styles', THEME_DIR_URI . '/demo-importer/engine/css/style.css', false, false, 'all');
?>




<?php
function mk_nummerize($size)
{
    $let = substr($size, -1);
    $ret = substr($size, 0, -1);
    switch (strtoupper($let)) {
        case 'P':
            $ret *= 1024;
        case 'T':
            $ret *= 1024;
        case 'G':
            $ret *= 1024;
        case 'M':
            $ret *= 1024;
        case 'K':
            $ret *= 1024;
    }
    return $ret;
}

$max_execution_time  = ini_get("max_execution_time");
$max_input_time      = ini_get("max_input_time");
$upload_max_filesize = ini_get("upload_max_filesize");


if ($max_execution_time < 60 || $max_input_time < 60 || mk_nummerize(WP_MEMORY_LIMIT) < 100663296 || mk_nummerize($upload_max_filesize) < 10485760) {
    
    echo '<div class="error settings-error">';
    
    echo '<br><strong>Please resolve these issues before installing any template.</strong>';
    echo '<ol>';
    if ($max_execution_time < 60) {
        echo '<li><strong>Maximum Execution Time (max_execution_time) : </strong>' . $max_execution_time . ' seconds. <span style="color:red"> Recommended max_execution_time should be at least 60 Seconds.</span></li>';
    }
    if ($max_input_time < 60)
        echo '<li><strong>Maximum Input Time (max_input_time) : </strong>' . $max_input_time . ' seconds. <span style="color:red"> Recommended max_input_time should be at least 60 Seconds.</span></li>';
    if (mk_nummerize(WP_MEMORY_LIMIT) < 100663296) {
        echo '<li><strong>WordPress Memory Limit (WP_MEMORY_LIMIT) : </strong>' . WP_MEMORY_LIMIT . ' <span style="color:red"> Recommended memory limit should be at least 96MB. Please refer to : <a target="_blank" href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP">Increasing memory allocated to PHP</a> for more information</span></li>';
    }
    if (mk_nummerize($upload_max_filesize) < 10485760) {
        echo '<li><strong>Maximum Upload File Size (upload_max_filesize) : </strong>' . $upload_max_filesize . ' <span style="color:red"> Recommended Maximum Upload Filesize should be at least 10MB.</li>';
    }
    
    echo '</ol>';
    
    echo '</div>';
}

echo '<div class="import_message"></div>';



?>


<div id="importer-wrapper">
    <?php

echo '<h1>' . __('Install Templates', 'mk_framework') . '</h1>';

$dir = THEME_DIR . '/demo-importer/data/*';

echo '<div class="import-package"><div>';
echo '<form method="post">';
echo '<input type="hidden" name="template" value="main">';
echo '<img src="' . THEME_DIR_URI . '/demo-importer/data/main/preview.jpg" alt="thumb">';
echo '<h2 class="demo-importer-title">Main</h2>';
echo '<div class="checkbox-holder">';
 echo '<span><input type="checkbox" checked="checked" value="contents" id="contents-checkbox-main" name="contents" /><label for="contents-checkbox-main">Contents</label></span>'; 
 echo '<span><input type="checkbox" checked="checked" value="widgets" id="widgets-checkbox-main" name="widgets" /><label for="widgets-checkbox-main">Widgets</label></span>'; 
 echo '<span><input type="checkbox" checked="checked" value="options" id="options-checkbox-main" name="options" /><label for="options-checkbox-main">Settings</label></span>'; 
echo '</div>';
echo '<div class="button-holder">';
echo '<input id="import" type="submit" value="' . __('Install', 'mk_framework') . '" class="button-primary mk-import-content-btn" />';
echo '<a href="http://artbees.net/themes/jupiter/" target="_blank" class="button">' . __('Preview', 'mk_framework') . '</a>';
echo '</div>';

echo '</form></div></div>';

foreach (glob($dir) as $folder) {
    if (basename($folder) != 'main') {
        echo '<div class="import-package"><div>';
        echo '<form method="post">';
        echo '<input type="hidden" name="template" value="' . basename($folder) . '">';
        echo '<img src="' . THEME_DIR_URI . '/demo-importer/data/' . basename($folder) . '/preview.jpg" alt="thumb">';
        echo '<h2 class="demo-importer-title">' . basename($folder) . '</h2>';
        echo '<div class="checkbox-holder">';
         echo '<span><input type="checkbox" checked="checked" value="contents" id="contents-checkbox-' . basename($folder) . '" name="contents" /><label for="contents-checkbox-' . basename($folder) . '">Contents</label></span>'; 
         echo '<span><input type="checkbox" checked="checked" value="widgets" id="widgets-checkbox-' . basename($folder) . '" name="widgets" /><label for="widgets-checkbox-' . basename($folder) . '">Widgets</label></span>'; 
         echo '<span><input type="checkbox" checked="checked" value="options" id="options-checkbox-' . basename($folder) . '" name="options" /><label for="options-checkbox-' . basename($folder) . '">Settings</label></span>'; 
        echo '</div>';
        echo '<div class="button-holder">';
        echo '<input id="import" type="submit" value="' . __('Install', 'mk_framework') . '" class="button-primary mk-import-content-btn" />';
        echo '<a href="http://artbees.net/themes/jupiter/' . basename($folder) . '" target="_blank" class="button">' . __('Preview', 'mk_framework') . '</a>';
        echo '</div>';
        
        echo '</form></div></div>';
    }
}
?>


</div>
<script type="text/javascript">
  (function($) {
    "use strict";
        $('.mk-import-content-btn').click(function(e){

            

            var $serilized = 'template=' + $(this).parents('form').find("input[name='template']").val() +'&';

            $serilized += $(this).parents('form').find("input[type='checkbox']").map(function(){return this.name+"="+this.checked;}).get().join("&");            

           var $import_true = confirm('Are you sure to import dummy content? We highly encourage you to do this action in a WordPress fresh installation!');
            
            if($import_true == false) return;

            $('.import_message').html('<div class="updated settings-error"><div class="import-content-loading">Please be patient while template is being imported. This process may take a couple of minutes.</div></div>');

       var data = {
            action: 'mk_ajax_import_options',
            options: $serilized
        };

        $.post(ajaxurl, data, function(response) {
            $('.import_message').html('<div class="updated settings-error">'+ response +'</div>');
            alert('Please note that all images & videos that you will see in page sections, sliders are hotlinked to our server (not imported). You are allowed to use these images on your development phase (for better visual guide) of your site and MUST be replaced with your own images/videos before its ready for production.');
        });
         $("html, body").animate({ scrollTop: 0 }, "fast");

        e.preventDefault();
    });
})(jQuery);
</script>

