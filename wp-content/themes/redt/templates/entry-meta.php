<?php

$author_id 		  	= get_the_author_meta('ID');
$author_badge 	  	= get_field('wp_avatar', 'user_'. $author_id );
$youtube_link 	  	= get_field('youtube_link', 'user_'. $author_id );
$twitter_feed 	  	= get_field('twitter_feed', 'user_'. $author_id );
$facebook_profile 	= get_field('facebook_profile', 'user_'. $author_id );
$instagram_account 	= get_field('instagram_account', 'user_'. $author_id );
$snapchat_account 	= get_field('snapchat_account', 'user_'. $author_id );
$google_maps 	  	= get_field('google_maps', 'user_'. $author_id );

?>
<div class="row no-gutters align-items-center">
	<div class="col-sm-0 hidden-sm-up">
		<?php echo wp_get_attachment_image($author_badge, 'w90x110'); ?>
	</div>
	<div class="col-sm-7">
		<p class="byline author vcard"><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= __('By', 'sage'); ?> <?= get_the_author(); ?></a></p>
		<time class="updated" datetime="<?= get_post_time('c', true); ?>">Posted <?= get_the_date(); ?><?php if ( function_exists( 'time_to_read' ) ) { echo ", ".time_to_read( false ).""; } ?></time>
		
		<ul id="social-list-header">
			<?php if($snapchat_account) { ?>
				<li>
					<a href="<?php echo $snapchat_account; ?>" target="_blank">
						<span class="fa-stack fa-1x hvr-grow">
							<i class="fa fa-circle fa-stack-2x icon-background"></i>
							<i class="fa fa-snapchat-ghost fa-stack-1x icon-dark"></i>
						</span>
					</a>
				</li>
			<?php } ?>
			<?php if($google_maps) { ?>
				<li>
					<a href="<?php echo $google_maps; ?>" target="_blank">
						<span class="fa-stack fa-1x">
							<i class="fa fa-circle fa-stack-2x icon-background"></i>
							<i class="fa fa-google-plus fa-stack-1x icon-dark"></i>
						</span>
					</a>
				</li>
			<?php } ?>
			<?php if($instagram_account) { ?>
				<li>
					<a href="<?php echo $instagram_account; ?>" target="_blank">
						<span class="fa-stack fa-1x">
							<i class="fa fa-circle fa-stack-2x icon-background"></i>
							<i class="fa fa-instagram fa-stack-1x icon-dark"></i>
						</span>
					</a>
				</li>
			<?php } ?>
			<?php if($facebook_profile) { ?>
				<li>
					<a href="<?php echo $facebook_profile; ?>" target="_blank">
						<span class="fa-stack fa-1x">
							<i class="fa fa-circle fa-stack-2x icon-background"></i>
							<i class="fa fa-facebook fa-stack-1x icon-dark"></i>
						</span>
					</a>
				</li>
			<?php } ?>
			<?php if($youtube_link) { ?>
				<li>
					<a href="<?php echo $youtube_link; ?>" target="_blank">
						<span class="fa-stack fa-1x">
							<i class="fa fa-circle fa-stack-2x icon-background"></i>
							<i class="fa fa-youtube-play fa-stack-1x icon-dark"></i>
						</span>
					</a>
				</li>
			<?php } ?>
			<?php if($twitter_feed) { ?>
				<li>
					<a href="<?php echo $twitter_feed; ?>" target="_blank">
						<span class="fa-stack fa-1x">
							<i class="fa fa-circle fa-stack-2x icon-background"></i>
							<i class="fa fa-twitter fa-stack-1x icon-dark"></i>
						</span>
					</a>
				</li>
			<?php } ?>
		</ul>

	</div>
	<div class="col-sm-5 float-right share-buttons">
		<a class="custom-share-button js-social-share bg-fb" href="https://www.facebook.com/sharer/sharer.php
     ?u=<?php echo urlencode(get_the_title()); ?>" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
										  <span class="custom-share-button-label">Facebook</span>
										</a>

										<a class="custom-share-button js-social-share" href="https://twitter.com/intent/tweet/?text=Check%20this%20out&url=<?php echo urlencode(get_the_title()); ?>&via=abhigohlar" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
										  <span class="custom-share-button-label">Twitter</span>
										</a>

										<a class="custom-share-button js-social-share bg-li" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo urlencode(get_the_title()); ?>&source=https%3A%2F%2Frealestatedealtalk.com%2F" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
										  <span class="custom-share-button-label">LinkedIn</span>
										</a>
	</div>
</div>

