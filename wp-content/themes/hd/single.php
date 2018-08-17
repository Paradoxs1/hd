<?php get_header(); ?>

		<?php
      while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content', get_post_format() );
          setPostViews(get_the_ID());

      endwhile; ?>

<?php get_footer();
