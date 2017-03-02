			<div id="morphsearch" class="morphsearch">
				<form class="morphsearch-form">
					<input class="morphsearch-input" type="search" placeholder="Search..."/>
					<button class="morphsearch-submit" type="submit">Search</button>
				</form>
				<div class="morphsearch-content">
					<div class="search-column">
						<h2>Getting Started</h2>
						<?php $recommended = new WP_Query(array('posts_per_page'=>5, 'category' => 50, 'order'=>'DESC'));
							while ($recommended->have_posts()) : $recommended->the_post(); ?>
							<a class="search-media-object" href="<?php the_permalink(); ?>">
								<img class="round" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
								<h3><?php the_title(); ?></h3>
							</a>
						 <?php endwhile; wp_reset_postdata(); ?>
					</div>
					<div class="search-column">
						<h2>Popular</h2>
						<?php $popular = new WP_Query(array('posts_per_page'=>5, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
							while ($popular->have_posts()) : $popular->the_post(); ?>
							<a class="search-media-object" href="<?php the_permalink(); ?>">
								<img class="round" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
								<h3><?php the_title(); ?></h3>
							</a>
						 <?php endwhile; wp_reset_postdata(); ?>
					</div>
					<div class="search-column">
						<h2>Latest</h2>
						<?php
							$args = array( 'numberposts' => '5' );
							$recent_posts = wp_get_recent_posts( $args );
							foreach( $recent_posts as $recent ){ ?>
								<a class="search-media-object" href="<?php echo get_permalink($recent["ID"]); ?>">
								<img class="round" src="<?php echo get_the_post_thumbnail($recent["ID"], 'thumbnail'); ?>" alt="" />
								<h3><?php echo  __($recent["post_title"]); ?></h3>
							</a>
							<?php }
							wp_reset_query();
						?>
					</div>
				</div><!-- /morphsearch-content -->
				<span class="morphsearch-close"></span>
			</div><!-- /morphsearch -->
			<div class="overlay"></div>