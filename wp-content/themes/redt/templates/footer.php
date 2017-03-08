<footer class="content-info">
  <?php 
  	//echo the_field('featured_footer_background_image', 'option'); 
  	//echo the_field('feature_logo_1', 'option'); 
  ?>
  <div class="container-fluid featured-row" style="background: #fff url(<?php echo the_field('featured_footer_background_image', 'option'); ?>) no-repeat center top;"><!-- featured section -->
  	<h3>Featured In and On</h3>

	<ul class="bxslider">
	  <li><img src="<?php echo the_field('feature_logo_1', 'option'); ?>" class="img-fluid" /></li>
	  <li><img src="<?php echo the_field('feature_logo_2', 'option'); ?>" class="img-fluid" /></li>
	  <li><img src="<?php echo the_field('feature_logo_3', 'option'); ?>" class="img-fluid" /></li>
	  <li><img src="<?php echo the_field('feature_logo_4', 'option'); ?>" class="img-fluid" /></li>
	  <li><img src="<?php echo the_field('feature_logo_5', 'option'); ?>" class="img-fluid" /></li>
	</ul>

  	<button type="button" class="btn btn-primary hvr-grow-shadow">See Media Appearances</button>
  </div> <!-- end featured -->
  <div class="container sidebar-footer">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
