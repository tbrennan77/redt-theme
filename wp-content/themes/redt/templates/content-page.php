
  <article>
    <div class="entry-content mt-2">
      <?php the_content(); ?>
    </div>
    <footer style="display: none;">
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>