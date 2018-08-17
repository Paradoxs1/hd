<?php get_header(); ?>
<section class="video">
  <div class="container">
     <div class="video-inner clearfix">

     <?php 
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $q = new WP_Query('category_name=porno&posts_per_page=28&paged=' . $paged);?>
        <?php if ( $q->have_posts() ) { ?>
            <?php while ( $q->have_posts() ) : $q->the_post(); ?>
                  <div class="video-block">
                     <div class="video-top">
                       <a href="<?php echo get_permalink(); ?>" class="video-link">
                         <div><i class="fa fa-play" aria-hidden="true"></i> Смотреть видео</div>
                       </a>
                       <div class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_post_meta($post->ID, 'time', true); ?></div>
                       <?php the_post_thumbnail('full'); ?>
                     </div>
                     <div class="video-desc">
                       <a href="<?php echo get_permalink(); ?>" class="title"><?php the_title(); ?></a>
                     </div>
                  </div>
        <?php endwhile; } ?>
  
     </div>
        <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
  </div>
</section>
<section class="add">
  <div class="container">

  </div>
</section>
	
<?php get_footer();
