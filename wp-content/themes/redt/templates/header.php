<header class="banner">
  <div class="container-fluid menu-bar">
    <div class="container">
      <div class="row">
        <div class="navbar-header hidden-md-down col-lg-9">
          <nav class="nav-primary">
            <?php
              if (has_nav_menu('primary_navigation')) :
                wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
                endif;
              ?>
          </nav>
        </div>
        <div class="col-xs-3 hidden-lg-up"><!-- Mobile Menu Here -->
          <button class="navbar-toggler pull-left align-bottom" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">☰</button>
        </div><!-- End Mobile -->
        <div class="col-xs-9 col-lg-3 col-centered search-container">
          <?php 
            get_template_part('templates/search');
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container mobile-menu">
    <div class="row">
          <div id="navbarResponsive" class="collapse navbar-toggleable-lg col-sm-12 hidden-lg-up">
          <nav class="navbar navbar-light pull-left">
            <?php
              if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu([ 'menu' => 'primary_navigation',
                  'theme_location' => 'primary_navigation',
                  'container_class' => 'collapse navbar-toggleable-md',
                  'menu_id' => false,
                  'menu_class' => 'nav navbar-nav',
                  'depth' => 2
                  ]);
              endif;
            ?>
          </nav>
        </div>
      </div>
    </div>
  <div class="container-fluid brand-container">
    <div class="container pr-0 pl-0">
      <div class="row">
        <div class="col-md-3">
          <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
            <?php
              if ( get_theme_mod('theme_logo') ) :
                echo '<img src="' . esc_url( get_theme_mod('theme_logo') ) . '" class="img-responsive">';
              else:
                echo get_bloginfo('name') . '<span>' . get_bloginfo('description') . '</span>';
              endif;
            ?>
            </a>
        </div>
        <div class="col-md-9">
            <?php 
              $args = array(
               'post_type' => 'deal',
               'posts_per_page' => '4',
               'order'=>'ASC'
              );
            ?>
            <?php
            // the query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {

              while ( $query->have_posts() ) : $query->the_post() ;

              $key_value = get_post_custom_values('deal_icon');
              $deal_icon = $key_value[0];

              $deal_icon = wp_get_attachment_image_src( $deal_icon, 'full', false );

              $key_value = get_post_custom_values('deal_value');
              $deal_value = $key_value[0];

              ?>
                <div class="col-md-2 hidden-md-down pull-right">
                  <img src="<?php echo $deal_icon[0]; ?>" title="" />
                </div>
              <?
              endwhile;
            }

          ?>
        </div>
      </div>
    </div>
  </div>
</header>
