<?php
global $wp_scripts;
global $TemplateToaster_justify;
global $TemplateToaster_magmenu;
global $TemplateToaster_menuh;
global $TemplateToaster_vmenuh;
global $TemplateToaster_ocmenu;
global $TemplateToaster_no_slides, $TemplateToaster_slide_show_visible;
$TemplateToaster_no_slides = 1;
$TemplateToaster_slide_show_visible = false;
$TemplateToaster_magmenu = false;
$TemplateToaster_menuh = true;
$TemplateToaster_vmenuh = false;
$TemplateToaster_justify = false;
global $TemplateToaster_cssprefix;
$TemplateToaster_cssprefix="ttr_";
global $TemplateToaster_fontSize1, $TemplateToaster_style1, $sidebarmenuheading;
$TemplateToaster_style1="";
$sidebarmenuheading = TemplateToaster_theme_option('ttr_sidebarmenuheading');
$TemplateToaster_fontSize1 = TemplateToaster_theme_option('ttr_font_size_sidebarmenu');
add_shortcode( 'widget', 'my_widget_shortcode' );
function my_widget_shortcode( $atts ) {
global $TemplateToaster_cssprefix;
extract( shortcode_atts(
array(
'type'  => '',
'title' => '',
'style' => '',
),
$atts));
if($TemplateToaster_style=='block'):
$args = array(
'before_widget' => '<div class="'.$TemplateToaster_cssprefix.'block %2$s"><div class="remove_collapsing_margins"></div>',
'after_widget'  => '</div>',
'before_title'  => '<div class="'.$TemplateToaster_cssprefix.'block_header"><h3 class="'.$TemplateToaster_cssprefix.'block_heading widget_before_title">',
'after_title'   => '</h3></div>',
);
else:
$args = array(
'before_widget' => '<div class="box widget">',
'after_widget'  => '</div>',
'before_title'  => '<div class="wcidget-title">',
'after_title'   => '</div>',
);
endif;
the_widget( $type, $atts, $args );
}
add_action('wp_enqueue_scripts', 'TemplateToaster_scripts_method');
function TemplateToaster_scripts_method() {
$TemplateToaster_js_enable =  TemplateToaster_theme_option('ttr_theme_bootstrap_enable');
if($TemplateToaster_js_enable)
{
wp_register_script( 'popperfront', get_template_directory_uri() . '/js/popper.min.js', array( 'jquery' ), '1.11.0', true );
wp_enqueue_script( 'popperfront' );
wp_register_script('bootstrapfront', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.1.3', true);
wp_enqueue_script('bootstrapfront');
}
wp_register_script('customscripts', get_template_directory_uri() . '/js/customscripts.js', array('jquery'), '1.0.0', true);
 wp_enqueue_script('customscripts');
wp_register_script('totop', get_template_directory_uri() . '/js/totop.js', array('jquery'), '1.0.0', true);
wp_enqueue_script('totop');
wp_register_script('tt_animation', get_template_directory_uri() . '/js/tt_animation.js', array('jquery'), '1.0.0', true);
wp_enqueue_script('tt_animation');
wp_register_script('tt_googlemaps', '//maps.googleapis.com/maps/api/js',  '1.0.0', true);
wp_enqueue_style('menuie', get_stylesheet_directory_uri() . '/menuie.css');
wp_style_add_data('menuie', 'conditional', 'if lte IE 8');
wp_enqueue_style('vmenuie', get_stylesheet_directory_uri() . '/vmenuie.css');
wp_style_add_data('vmenuie', 'conditional', 'if lte IE 8');
wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
wp_enqueue_style('bootstrap');
wp_register_style('rtl', get_stylesheet_directory_uri() . '/rtl.css');
wp_register_style('style', get_stylesheet_directory_uri() . '/style.css');
wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
}
function TemplateToaster_widgets_init() {
global $TemplateToaster_cssprefix;
$TemplateToaster_cssprefix="ttr_";
global $TemplateToaster_theme_widget_args;
global $TemplateToaster_fontSize, $TemplateToaster_style;
$heading_tag = TemplateToaster_theme_option('ttr_heading_tag_block');
 if(empty($heading_tag) || $heading_tag == Null){
$heading_tag = 'h3';
}
$TemplateToaster_style="";
 $blockheading = TemplateToaster_theme_option('ttr_blockheading');
 $TemplateToaster_fontSize = TemplateToaster_theme_option('ttr_font_size_block');
 if(!empty($blockheading)){
 $TemplateToaster_style .= "color:".$blockheading.";";
 }
 if(!empty($TemplateToaster_fontSize)){
 $TemplateToaster_style .= "font-size:".$TemplateToaster_fontSize."px;";
 }
$TemplateToaster_theme_widget_args = array('before_widget' => '<div class="'.$TemplateToaster_cssprefix.'block %2$s"><div class="remove_collapsing_margins"></div> <div class="'.$TemplateToaster_cssprefix.'block_header">',
'after_widget' => '</div></div>~tt',
'before_title' => '<'.TemplateToaster_theme_option('ttr_heading_tag_block').' class="'.$TemplateToaster_cssprefix.'block_heading">
',
'after_title' => '</'.$heading_tag.'></div> <div id="%1$s" class="'.$TemplateToaster_cssprefix.'block_content">',
);
extract($TemplateToaster_theme_widget_args);
register_sidebar( array(
'name' => __( 'CAWidgetArea00', 'scratch' ),
'id' => 'contenttopcolumn1',
'description' => __( 'An optional widget area for your site content', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CAWidgetArea01', 'scratch' ),
'id' => 'contenttopcolumn2',
'description' => __( 'An optional widget area for your site content', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CAWidgetArea02', 'scratch' ),
'id' => 'contenttopcolumn3',
'description' => __( 'An optional widget area for your site content', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CAWidgetArea03', 'scratch' ),
'id' => 'contenttopcolumn4',
'description' => __( 'An optional widget area for your site content', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'MAWidgetArea00', 'scratch' ),
'id' => 'menuabovecolumn1',
'description' => __( 'An optional widget area for your site menu', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'MAWidgetArea01', 'scratch' ),
'id' => 'menuabovecolumn2',
'description' => __( 'An optional widget area for your site menu', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'MAWidgetArea02', 'scratch' ),
'id' => 'menuabovecolumn3',
'description' => __( 'An optional widget area for your site menu', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'MAWidgetArea03', 'scratch' ),
'id' => 'menuabovecolumn4',
'description' => __( 'An optional widget area for your site menu', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'MBWidgetArea00', 'scratch' ),
'id' => 'menubelowcolumn1',
'description' => __( 'An optional widget area for your site menu', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'MBWidgetArea01', 'scratch' ),
'id' => 'menubelowcolumn2',
'description' => __( 'An optional widget area for your site menu', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'MBWidgetArea02', 'scratch' ),
'id' => 'menubelowcolumn3',
'description' => __( 'An optional widget area for your site menu', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'MBWidgetArea03', 'scratch' ),
'id' => 'menubelowcolumn4',
'description' => __( 'An optional widget area for your site menu', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CBWidgetArea00', 'scratch' ),
'id' => 'contentbottomcolumn1',
'description' => __( 'An optional widget area for your site content', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CBWidgetArea01', 'scratch' ),
'id' => 'contentbottomcolumn2',
'description' => __( 'An optional widget area for your site content', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CBWidgetArea02', 'scratch' ),
'id' => 'contentbottomcolumn3',
'description' => __( 'An optional widget area for your site content', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CBWidgetArea03', 'scratch' ),
'id' => 'contentbottomcolumn4',
'description' => __( 'An optional widget area for your site content', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'FAWidgetArea00', 'scratch' ),
'id' => 'footerabovecolumn1',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'FAWidgetArea01', 'scratch' ),
'id' => 'footerabovecolumn2',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'FAWidgetArea02', 'scratch' ),
'id' => 'footerabovecolumn3',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'FAWidgetArea03', 'scratch' ),
'id' => 'footerabovecolumn4',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'FBWidgetArea00', 'scratch' ),
'id' => 'footerbelowcolumn1',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'FBWidgetArea01', 'scratch' ),
'id' => 'footerbelowcolumn2',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'FBWidgetArea02', 'scratch' ),
'id' => 'footerbelowcolumn3',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'FBWidgetArea03', 'scratch' ),
'id' => 'footerbelowcolumn4',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'first-footer-widget-area', 'scratch' ),
'id' => 'first-footer-widget-area',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'second-footer-widget-area', 'scratch' ),
'id' => 'second-footer-widget-area',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'third-footer-widget-area', 'scratch' ),
'id' => 'third-footer-widget-area',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'abc00', 'scratch' ),
'id' => 'footercellcolumn1',
'description' => __( 'An optional widget area for your site footer', 'scratch' ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'widgets_init', 'TemplateToaster_widgets_init' );?>
