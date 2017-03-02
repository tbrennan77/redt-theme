<header class="banner">
  <div class="container-fluid menu-bar">
    <div class="container">
      <div class="row">
        <div class="navbar-header col-xs-0 col-md-9">
          <nav class="nav-primary">
            <?php
              if (has_nav_menu('primary_navigation')) :
                wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
                endif;
              ?>
          </nav>
        </div>
        <div class="col-xs-10 col-md-3 col-centered search-container">
          <?php 
            get_template_part('templates/search');
          ?>
         </div>
      </div>
    </div>
  </div>
  <div class="container">
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

      </div>
    </div>
  </div>
</header>
