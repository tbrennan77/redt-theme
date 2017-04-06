<footer class="content-info">
  <?php 
  	//echo the_field('featured_footer_background_image', 'option'); 
  	//echo the_field('feature_logo_1', 'option'); 
  ?>
  <?php if(is_front_page()) { ?>
  <div class="container-fluid featured-row" style="background: #fff url(<?php echo the_field('featured_footer_background_image', 'option'); ?>) repeat center top;"><!-- featured section -->

    <div class="row">

      <div class="container">
        <div class="row justify-content-center">

          <div class="col-sm-12">
              <h3>Featured In and On</h3>

            	<div class="masonry">
            	  <div class="item"><img src="<?php echo the_field('feature_logo_1', 'option'); ?>" class="img-fluid" /></div>
            	  <div class="item"><img src="<?php echo the_field('feature_logo_2', 'option'); ?>" class="img-fluid" /></div>
            	  <div class="item"><img src="<?php echo the_field('feature_logo_3', 'option'); ?>" class="img-fluid" /></div>
            	  <div class="item"><img src="<?php echo the_field('feature_logo_4', 'option'); ?>" class="img-fluid" /></div>
            	  <div class="item"><img src="<?php echo the_field('feature_logo_5', 'option'); ?>" class="img-fluid" /></div>
                <div class="item"><img src="<?php echo the_field('feature_logo_6', 'option'); ?>" class="img-fluid" /></div>
                <div class="item"><img src="<?php echo the_field('feature_logo_7', 'option'); ?>" class="img-fluid" /></div>
                <div class="item"><img src="<?php echo the_field('feature_logo_8', 'option'); ?>" class="img-fluid" /></div>
                <div class="item"><img src="<?php echo the_field('feature_logo_9', 'option'); ?>" class="img-fluid" /></div>
                <div class="item"><img src="<?php echo the_field('feature_logo_10', 'option'); ?>" class="img-fluid" /></div>
                <div class="item"><img src="<?php echo the_field('feature_logo_11', 'option'); ?>" class="img-fluid" /></div>
                <div class="item"><img src="<?php echo the_field('feature_logo_12', 'option'); ?>" class="img-fluid" /></div>
            	</div>

              <button type="button" class="btn btn-primary hvr-grow-shadow hidden-xs-up">See Media Appearances</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- end featured -->
  <?php } ?>
  <div class="container sidebar-footer">
    <div class="row">
      <div class="col-sm-4">
        <?php dynamic_sidebar('sidebar-footer-left'); ?>
      </div>
      <div class="col-sm-4">
        <?php dynamic_sidebar('sidebar-footer-center'); ?>
      </div>
      <div class="col-sm-4">
        <?php dynamic_sidebar('sidebar-footer-right'); ?>
      </div>
    </div>
  </div>
</footer>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>

