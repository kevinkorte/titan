<?php echo get_field('bedrooms', '26') ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_title(); ?>
  <?php echo get_field('bedrooms') ?>
  <?php the_content(); ?>
<?php endwhile; else : ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
