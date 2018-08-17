<?php 

  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', false);

?>

<section class="video">
  <div class="container">
   <?php if ( 'post' === get_post_type() ) : ?>
    <div class="video-page">
      <div class="video-page-top">
          <?php the_title( '<h1>', '</h1>' ); ?>
          <?php the_content(); ?>
        <div class="like"></div>
      </div>
      <video preload="none" src="<?php echo get_post_meta($post->ID, 'src', true); ?>" poster="<?php echo $thumb_url[0]; ?>" controls="" style="width: 100%; height: 100%"></video>
      <div class="description">
        <ul>
          <li><i class="fa fa-calendar" aria-hidden="true"></i> <span><?php the_date(); ?></span></li>
          <li><i class="fa fa-list" aria-hidden="true"></i> 
          <?php the_category(', ');  ?>
          <li class="right"><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php echo get_post_meta($post->ID, 'time', true); ?></span></li>
        </ul>
      </div>
    </div>
    <?php endif; ?>
    <?php if( is_single()){ ?>
    <div class="video-inner clearfix">
    <?php 
          
        $categories = get_the_category($post->ID);
        foreach($categories as $cat){
          $cats[] = $cat->name;
        }
      
        $q = new WP_Query( array(
          'category_name' => $cats, 
          'posts_per_page' => 12,
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
          <?php endwhile; } ?>               
     </div>
     <?php } ?>
  </div>
</section>
<section class="add">
  <div class="container">

  </div>
</section>