<?php ?>
 
  <section class="result">
    <div class="container">
      <?php the_post_thumbnail('full'); ?>
		  <?php the_title( sprintf( '<p><a href="%s" class="result-title">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
      <div class="content-search">
        <?php echo substr(get_the_excerpt(), 0, -11).'...'; ?>
      </div>

    </div>
</section>
	
