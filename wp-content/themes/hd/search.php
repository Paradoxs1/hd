<?php get_header(); 

  if( have_posts()): ?>
  
  <section class="result">
    <div class="container">
      <p class="result-text">
        <?php printf( esc_html__( 'Результат поиска: %s', 'hd' ), '<span>' . get_search_query() . '</span>' ); ?>
      </p>
    </div>
  </section>
   
  <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

  get_footer();
