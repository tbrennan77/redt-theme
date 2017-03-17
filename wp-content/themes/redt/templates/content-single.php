<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="full-width">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-7">
            <div class="row no-gutters">
              <div class="col-xs-12">
                <h1 class="entry-title"><?php the_title(); ?></h1>
              </div>
              <div class="col-xs-12">
                <?php get_template_part('templates/entry-meta'); ?>
              </div>
            </div>
          </div>
          <div class="col-md-5 featured-image no-gutters float-right">
            <?php the_post_thumbnail('500x250', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
          </div>
        </div>
      </div>
    </header>
    <?php 
          $soundcloud_id = get_field('soundcloud_track_id');

          if($soundcloud_id) {
        ?>
        <div class="soundcloud-player">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <?php echo do_shortcode("[soundcloud id='".$soundcloud_id."']"); ?>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>
    <div class="entry-content mt-2">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
