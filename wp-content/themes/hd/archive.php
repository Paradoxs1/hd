<?php 
  get_header();  
  if( have_posts()):?>
  
<section class="video">
  <div class="container">
    <div class="video-inner clearfix">
  
  <?php  $cat_ID = get_query_var('cat');

  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $q = new WP_Query( array(
      'cat' => $cat_ID, 
      'posts_per_page' => 2,
      'paged' => $paged,
  )); 
      
  if( $q->have_posts() ){ ?>
    <?php while( $q->have_posts()): $q->the_post(); ?>
     
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
      
  <?php endwhile; ?>
  <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
  <?php } ?>     
			
    </div>
  </div>
</section>
 
<?php else: 
  get_template_part( 'template-parts/content', 'none' );
  endif; 
  get_footer();
