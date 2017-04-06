  <?php 
  if(is_page() && !is_front_page()) {
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
		$thumb_url = $thumb_url_array[0];


		$author_id 		  	= get_the_author_meta('ID');
		$author_badge 	  	= get_field('wp_avatar', 'user_'. $author_id );
		$youtube_link 	  	= get_field('youtube_link', 'user_'. $author_id );
		$twitter_feed 	  	= get_field('twitter_feed', 'user_'. $author_id );
		$facebook_profile 	= get_field('facebook_profile', 'user_'. $author_id );
		$instagram_account 	= get_field('instagram_account', 'user_'. $author_id );
		$snapchat_account 	= get_field('snapchat_account', 'user_'. $author_id );
		$google_maps 	  	= get_field('google_maps', 'user_'. $author_id );




  	?>
    <header class="full-width content-header" style="background: #fff url(<?php echo $thumb_url; ?>) repeat center top;">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-5">
            <div class="row no-gutters">
              <div class="col-xs-12">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php 
	            $subheader = get_post_meta( get_the_ID(), 'sub-header', true );
	            if($subheader) {
	            	echo "<h3>".$subheader."</h3>";
	            }
	           ?>
              </div>
              <div class="col-xs-12">
	           <?php 
	            $video = get_post_meta( get_the_ID(), 'youtube_embed_link', true );

	            echo wp_oembed_get( $video, array('width'=>350) );
	           ?>
              </div>
              <div class="col-xs-12">
                <div class="row no-gutters align-items-center">
					<div class="col-xs-12">
						<ul id="social-list-header">
							<?php if($snapchat_account) { ?>
							<li><a href="<?php echo $snapchat_account; ?>" target="_blank">
								<span class="fa-stack fa-1x hvr-grow">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-snapchat-ghost fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
							<?php if($google_maps) { ?>
							<li><a href="<?php echo $google_maps; ?>" target="_blank">
								<span class="fa-stack fa-1x">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-google-plus fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
							<?php if($instagram_account) { ?>
							<li><a href="<?php echo $instagram_account; ?>" target="_blank">
								<span class="fa-stack fa-1x">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-instagram fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
							<?php if($facebook_profile) { ?>
							<li><a href="<?php echo $facebook_profile; ?>" target="_blank">
								<span class="fa-stack fa-1x">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-facebook fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
							<?php if($youtube_link) { ?>
							<li><a href="<?php echo $youtube_link; ?>" target="_blank">
								<span class="fa-stack fa-1x">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-youtube-play fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
							<?php if($twitter_feed) { ?>
							<li><a href="<?php echo $twitter_feed; ?>" target="_blank">
								<span class="fa-stack fa-1x">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-twitter fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  <?php 
	}
  ?>