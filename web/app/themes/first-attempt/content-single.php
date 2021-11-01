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
<h2 class="ttr_post_title entry-title">
<?php the_title(); ?></h2>
</div>
<?php endif; ?>
<div class="ttr_article">
<?php if ( 'post' == get_post_type() ) : ?>
<?php endif; ?>
<div class="postcontent entry-content">
<?php the_content(); ?>
<div style="clear: both;"></div>
</div>
<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'first-attempt' ) . '</span>', 'after' => '</div>' ) ); ?>
</div>
</div>
</article>