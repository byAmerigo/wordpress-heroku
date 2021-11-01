<?php global $TemplateToaster_classes_post;?>
<article id="post-<?php the_ID(); ?>"<?php post_class( $TemplateToaster_classes_post ); ?>>
<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
<div class="entry-thumbnail">
<?php the_post_thumbnail(); ?>
</div>
<?php endif; ?>
<div class="ttr_post_content_inner">
<?php $postid = ( isset( $post->ID ) ? get_the_ID() : NULL );
$var = get_post_meta($postid, 'ttr_post_title_checkbox',true);
 $var_all=TemplateToaster_theme_option('ttr_all_post_title');
if($var != 'false' && $var_all):?>
<div class="ttr_post_inner_box">
 <h2 class="ttr_post_title entry-title">
<?php if(has_post_format( array( 'link' ))):?>
<a href="<?php echo esc_url( TemplateToaster_get_link_url() ); ?>"><?php the_title(); ?></a></h1>
<?php else: ?>
<?php $postid = ( isset( $post->ID ) ? get_the_ID() : NULL );
if(get_post_meta($postid,'ttr_post_link_enable_checkbox',true)!= 'false'):?>
<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'first-attempt' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php endif; ?><?php the_title(); ?></a></h2>
<?php endif; ?>
</div>
<?php endif; ?>
<div class="ttr_article">
<?php if ( 'post' == get_post_type() ) : ?>
<?php endif; ?>
<?php if ( is_search() ) : ?>
<div class="entry-summary">
<?php the_excerpt(); ?>
</div>
<?php else : ?>
<div class="postcontent">
<div class="entry-content">
<?php if(TemplateToaster_theme_option('ttr_read_more_button')):
the_content( '<span class="button">'.TemplateToaster_theme_option('ttr_read_more').'</span>' );
else:
the_content( TemplateToaster_theme_option('ttr_read_more') ); 
endif;?>
<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'first-attempt' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
<div style="clear: both;"></div>
</div>
</div>
<?php wp_link_pages( array( 'before' => '<span>' . __( 'Pages:', 'first-attempt' ) . '</span>', 'after' => '' ) ); ?>
<?php endif; ?>
<?php $show_sep = false; ?>
</div>
</div>
</article>