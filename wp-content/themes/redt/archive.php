<?php get_template_part('templates/page', 'header'); 
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$cat = get_category( get_query_var( 'cat' ) );
$custom_args = array(
	  'post_type' => 'post',
	  'category_name' => $cat->slug,
      'posts_per_page' => 15,
      'paged' => $paged
    );

echo $cat->ID;
?>
<div class="container-fluid blog-top full-width">
	<div class="row">
		<div class="col-sm-12">
		  <?php
		  $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
		  if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 15;

		  $my_query = new WP_Query($custom_args);
		  if($my_query->have_posts()) {

		    $counter = 1;
		    while($my_query->have_posts() && $counter <= $how_many_last_posts) {
		      $my_query->the_post();

		      // echo "<h1>Count ".$counter."</h1>";

		      if($counter ==1) {
		      	$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
				$thumb_url = $thumb_url_array[0];
		      ?>
		      <div class="row">
		      	<div class="col-sm-12 archive-header" style="background: #fff url(<?php echo $thumb_url; ?>) repeat center top;">
		      		<div class="container align-bottom">
		      			<div class="row">
				      		<div class="col-sm-12">
				      		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				      		</div>
				      		<div class="col-sm-12">
				      		<span class="meta">By <?php the_author(); ?></span><span class="meta"><?php the_date(); ?></span><span class="meta"><?php the_category(', '); ?></span><span class="meta"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></span><span class="meta"><?php if ( function_exists( 'time_to_read' ) ) { echo time_to_read(); } ?></span>
				      			<?php the_excerpt(); ?>
				      		</div>
				      		<div class="col-sm-12 read-now">
				      			<div class="row">
				      				<div class="col-sm-3">
							      		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							      			<button class="btn btn-outline-primary hvr-grow">Read Now</button>
							 			</a>
							 		</div>
							 		<div class="col-sm-9 float-right share-buttons">
										<a class="custom-share-button js-social-share bg-fb" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
										  <span class="custom-share-button-label">Facebook</span>
										</a>

										<a class="custom-share-button js-social-share" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
										  <span class="custom-share-button-label">Twitter</span>
										</a>

										<a class="custom-share-button js-social-share bg-li" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
										  <span class="custom-share-button-label">LinkedIn</span>
										</a>
							 		</div>
					 			</div>
				      		</div>
			      		</div>
		      		</div>
		      	</div>
		      </div>

		      <?php
		  		} else { 


		      // end counter == 1
		      if($counter ==  2) {
		      ?>
		      <div class="container">
		      <?php 
		  		}
		      ?>
		      <div class="row">
			      	<div class="col-sm-5">
			      		<img src="<?php the_post_thumbnail_url('w800'); ?>" class="img-fluid clearfix feature-blog-img" />
			      	</div>
			      	<div class="col-sm-7 padding-20">
			      		<div class="row">
			      			<div class="col-sm-12 archive-meta">
			      			<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			      				<span>By <?php the_author(); ?></span><span><?php the_date(); ?></span><span><?php the_category(', '); ?></span><span><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></span><span><?php if ( function_exists( 'time_to_read' ) ) { echo time_to_read(); } ?></span>
			      			</div>
			      			<div class="col-sm-12 archive-excerpt">
					      		<?php the_excerpt(); ?>
					      	</div>
					      	<div class="col-sm-12 read-now">
				      			<div class="row">
				      				<div class="col-sm-12 col-lg-3">
							      		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							      			<button class="btn btn-outline-primary hvr-grow">Read Now</button>
							 			</a>
							 		</div>
							 		<div class="col-sm-12 col-lg-9 share-buttons">
										<a class="custom-share-button js-social-share bg-fb" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
										  <span class="custom-share-button-label">Facebook</span>
										</a>

										<a class="custom-share-button js-social-share" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
										  <span class="custom-share-button-label">Twitter</span>
										</a>

										<a class="custom-share-button js-social-share bg-li" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
										  <span class="custom-share-button-label">LinkedIn</span>
										</a>
							 		</div>
					 			</div>
				      		</div>
					    </div>
			      	</div>
			  </div>
		      <?php 
		      } 

		      if($counter ==  15) {
		      ?>
		      </div>
		      <?php 
		     }

		    $counter++;	// increase counter
		    } // end loop

		    wp_reset_postdata();
		  }
		  

	      if (function_exists(custom_pagination())) {
	        custom_pagination(15,"",$paged);
	      }
	    ?>
		</div>
	</div>
</div>
