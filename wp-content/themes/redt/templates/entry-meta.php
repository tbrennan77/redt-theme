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
	<div class="col-xs-2">
		<?php echo wp_get_attachment_image($author_badge, 'w90x110'); ?>
	</div>
	<div class="col-xs-10">
		<p class="byline author vcard"><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= __('By', 'sage'); ?> <?= get_the_author(); ?></a></p>
		<time class="updated" datetime="<?= get_post_time('c', true); ?>">Posted <?= get_the_date(); ?><?php if ( function_exists( 'time_to_read' ) ) { echo ", ".time_to_read( false ).""; } ?></time>
		
		<ul id="social-list-header">
			<?php if($snapchat_account) { ?>
			<li><a href="<?php echo $snapchat_account; ?>" target="_blank"><img class="alignnone size-full wp-image-576 hvr-grow" src="/redt/wp-content/uploads/icon_social_snap_grey.png" alt="" width="50" height="50" /></a></li>
			<?php } ?>
			<?php if($google_maps) { ?>
			<li><a href="<?php echo $google_maps; ?>" target="_blank"><img class="alignnone size-medium wp-image-575 hvr-grow" src="/redt/wp-content/uploads/icon_social_map_grey.png" alt="" width="50" height="50" /></a></li>
			<?php } ?>
			<?php if($instagram_account) { ?>
			<li><a href="<?php echo $instagram_account; ?>" target="_blank"><img class="alignnone size-medium wp-image-574 hvr-grow" src="/redt/wp-content/uploads/icon_social_insta_grey.png" alt="" width="50" height="50" /></a></li>
			<?php } ?>
			<?php if($facebook_profile) { ?>
			<li><a href="<?php echo $facebook_profile; ?>" target="_blank"><img class="alignnone size-medium wp-image-573 hvr-grow" src="/redt/wp-content/uploads/icon_social_facebook_grey.png" alt="" width="50" height="50" /></a></li>
			<?php } ?>
			<?php if($youtube_link) { ?>
			<li><a href="<?php echo $youtube_link; ?>" target="_blank"><img class="alignnone size-medium wp-image-572 hvr-grow" src="/redt/wp-content/uploads/icon_social_youtube_grey.png" alt="" width="50" height="50" /></a></li>
			<?php } ?>
			<?php if($twitter_feed) { ?>
			<li><a href="<?php echo $twitter_feed; ?>" target="_blank"><img class="alignnone size-full wp-image-571 hvr-grow" src="/redt/wp-content/uploads/icon_social_twitter_grey.png" alt="" width="50" height="50" /></a></li>
			<?php } ?>
		</ul>

	</div>
</div>

