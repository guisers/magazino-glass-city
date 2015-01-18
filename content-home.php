
<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>

    <header class="entry-header">
        <?php if ( 'post' == get_post_type() ) : ?>
        <div class="entry-meta">
            <?php the_category(' &bull; '); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'magazino' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                <?php 
                    $yoast_title = get_post_meta($post->ID, '_yoast_wpseo_title', true);
                    if ($yoast_title) {
                        echo $yoast_title;
                    } else {
                        echo the_title();
                    } 
                ?>
            </a>
        </h2>		
    </header><!-- .entry-header -->
    
    <div class="entry-content post_content">
        <?php
            $yoast_meta = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
            if ($yoast_meta) {
                echo $yoast_meta;
            } else {
                echo magazino_excerpt(12);    
            }
        ?>
    </div><!-- .entry-content -->
    
    <div class="go-button"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'magazino' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
        <?php if (has_post_format('aside')) { ?>
            <span class="genericon genericon-aside"></span>
        <?php ;} elseif (has_post_format('gallery')) { ?>
            <span class="genericon genericon-gallery"></span>
        <?php ;} elseif (has_post_format('link')) { ?>
            <span class="genericon genericon-link"></span>  
        <?php ;} elseif (has_post_format('image')) { ?>
            <span class="genericon genericon-image"></span> 
        <?php ;} elseif (has_post_format('quote')) { ?>
            <span class="genericon genericon-quote"></span>
        <?php ;} elseif (has_post_format('status')) { ?>
            <span class="genericon genericon-status"></span>
        <?php ;} elseif (has_post_format('video')) { ?>
            <span class="genericon genericon-video"></span>
        <?php ;} elseif (has_post_format('audio')) { ?>
            <span class="genericon genericon-audio"></span>  
        <?php ;} elseif (has_post_format('chat')) { ?>
            <span class="genericon genericon-chat"></span>  
        <?php ;} else { ?>
            <span class="genericon genericon-standard"></span>
        <?php } ?>
    </a></div>
    
	<?php //Checks for plugin..
	if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'grid-thumbnail', strval(get_the_ID()))) : ?>

    <div class="post-box-img"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'grid-thumbnail'); ?></div>
      
    <?php else : //Plugin not installed?>
    
      <?php //Checks for attached post image instead
    $postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'exclude' => get_post_thumbnail_id() ) );
    if ( !empty($postimgs) ) {
        $firstimg = array_shift( $postimgs );
        $th_image = wp_get_attachment_image( $firstimg->ID, array(500, 500), false );
     ?>
        <div class="post-box-img"><?php echo $th_image; ?></div>
    <?php } ?>
    
    <?php endif; ?>
		
</article><!-- #post-<?php the_ID(); ?> -->
    

