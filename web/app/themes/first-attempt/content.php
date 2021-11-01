<?php
/**
* File for displaying content.
*
* @package TemplateToaster
*/
?>
<?php global $TemplateToaster_classes_post;?>
<article <?php post_class( $TemplateToaster_classes_post ); ?>>
<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
<div class="entry-thumbnail">
<?php the_post_thumbnail('featuredImageCropped'); ?>
</div>
<?php endif; ?>
<div class="ttr_post_content_inner">
<?php $postid = ( isset( $post->ID ) ? get_the_ID() : NULL );
$var = get_post_meta($postid, 'ttr_post_title_checkbox',true);
 $var_all=TemplateToaster_theme_option('ttr_all_post_title');
if($var != 'false' && $var_all):?>
<div class="ttr_post_inner_box">
 <?php if(is_page()) {
echo "<h1".' class="ttr_page_title">'; ?>
<?php $postid = ( isset( $post->ID ) ? get_the_ID() : NULL );
if(get_post_meta($postid,'ttr_post_link_enable_checkbox',true)!= 'false'):?>
<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', CURRENT_THEME, 'first-attempt' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php endif; ?><?php the_title(); ?></a>
<?php  } else {
if((is_front_page() && is_home()) || is_home()){
$post_tag = 'h2'; 
}
else{
$post_tag = 'h1'; 
} 
echo "<$post_tag".' class="ttr_post_title entry-title">'; ?>
<?php $postid = ( isset( $post->ID ) ? get_the_ID() : NULL );
if(get_post_meta($postid,'ttr_post_link_enable_checkbox',true)!= 'false'):?>
<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'first-attempt' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php endif; ?><?php the_title(); ?></a>
<?php echo "</$post_tag>"; } ?>
</div>
<?php endif; ?>
<div class="ttr_article">
<?php if ( 'post' == get_post_type() ) : ?>
<?php endif; ?>
<?php if ( is_search() ) : ?>
<div class="entry-summary postcontent">
<?php the_excerpt(); ?>
</div>
<?php else : ?>
<div class="postcontent entry-content">
<?php if(TemplateToaster_theme_option('ttr_read_more_button')):
the_content( '<span class="button">'.TemplateToaster_theme_option('ttr_read_more').'</span>' );
else:
the_content( TemplateToaster_theme_option('ttr_read_more') ); 
endif;?>
<div style="clear: both;"></div>
</div>
<?php endif;?>
<?php wp_link_pages( array( 'before' => '<span>' . __( 'Pages:', 'first-attempt' ) . '</span>', 'after' => '' ) ); ?>
<?php $show_sep = false; ?>
</div>
</div>
</article>