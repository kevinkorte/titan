    <?php get_header(); ?>
  </head>
  <body>

    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

    <?php
    $args = array(
      'category' => 0
    )
    ?>

    <?php wp_get_nav_menu_items('theme_location', $args); ?>

    <?php get_footer(); ?>
