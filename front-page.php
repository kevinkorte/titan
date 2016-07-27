<?php get_header(); ?>
</head>
<body>
<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

<?php

  $sm_query_args = array(
    'post_type'   => 'plan',
    'meta_query'  => array(
      array(
        'key'     => 'square_footage',
        'value'   => 1000,
        'compare' => '>='
      ),
      array(
        'key'     => 'square_footage',
        'value'   => 1999,
        'compare' => '<='
      )
    )
  );
  $md_query_args = array(
    'post_type'   => 'plan',
    'meta_query'  => array(
      array(
        'key'     => 'square_footage',
        'value'   => 2000,
        'compare' => '>='
      ),
      array(
        'key'     => 'square_footage',
        'value'   => 2999,
        'compare' => '<='
      )
    )
  );
?>

<?php
  $sm_plans = new WP_Query( $sm_query_args );

  if ( $sm_plans->have_posts() ) {
    echo '<ul>';
    $sm_page = get_page_by_title( '1,000 sf. - 2,000 sf. Plans' );
    if ( $sm_page ) {
      echo '<ul><li><a href="'. get_page_link($sm_page->ID) .'">'.get_the_title($sm_page->ID).'</a></li>';
    }
    while ( $sm_plans->have_posts() ) : $sm_plans->the_post(); ?>
      <li><a href="<?php echo esc_url( get_permalink() )?>"><?php the_title(); ?></a></li>
    <?php
    endwhile;
    echo '</ul>';
    if ( $sm_page ) {
      echo '</ul>';
    }
  }
 ?>

 <?php
   $md_plans = new WP_Query( $md_query_args );

   if ( $md_plans->have_posts() ) {
     echo '<ul>';
     while ( $md_plans->have_posts() ) : $md_plans->the_post(); ?>
       <li><a href="<?php echo esc_url( get_permalink() )?>"><?php the_title(); ?></a></li>
     <?php
     endwhile;
     echo '</ul>';
   }

  ?>

<?php get_footer(); ?>
