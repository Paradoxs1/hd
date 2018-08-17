<?php 
/*
Template Name: Популярные
*/
get_header();
	$args = array(
	    'category_name' => 'porno',
	    'posts_per_page' => 28,
	    'meta_key'    => 'post_views_count',
	    'orderby'     => 'meta_value_num',
	    'order'       => 'DESC'
	);
    query_posts( $args ); ?>

	<section class="video">
  		<div class="container">
     		<div class="video-inner clearfix">

			<?php while ( have_posts() ) : the_post(); ?>

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

			<?php endwhile; wp_reset_query(); ?>

			</div>
	  </div>
	</section>

<?php get_footer();
