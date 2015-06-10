<?php
/*
Template Name: Translations
*/
?>
<?php get_header(); ?>
    <div class="clear"></div>
    <div class="container container-fluid translations">
				<?php $video = new WP_Query ( array('post_type' => 'video') ); ?>
					<?php if ($video->have_posts()) : while ($video->have_posts()) : $video->the_post(); ?>
						<div class="articles">
							<div class="articles-title">
								<h2><?php the_title(); ?></h2>
							</div>
							<div class="clear"></div>
							<div class="articles-thumbnail">
									<?php if(has_post_thumbnail()): ?>
										<?php the_post_thumbnail('full'); ?>
									<?php else: ?>
									<img src="<?php bloginfo('template_url'); ?>/images/vodeo-default.jpg" alt="thumbnail" height="315" width="560">
									<?php endif; ?>
							</div>
							<div class="articles-head">
							<?php the_content(); ?>
							</div>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
    </div>
    
<?php get_footer(); ?>