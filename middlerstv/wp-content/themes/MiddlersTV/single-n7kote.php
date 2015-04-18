<?php get_header(); ?>
    <div class="clear"></div>
    <div class="container container-fluid single-article">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="articles">
				<div class="articles-title">
					<h2><?php the_title(); ?></h2>
					<span class="articles-date">
						<img src="<?php bloginfo('template_url'); ?>/images/articles-autor.png" alt="author">
						<span class="author"><?php the_author(); ?></span>
						<?php the_time('j.m.y') ?>
					</span>
				</div>
				<div class="clear"></div>
				<div class="articles-thumbnail">
					<a href="<?php the_permalink(); ?>">
					<?php if(has_post_thumbnail()): ?>
						<?php the_post_thumbnail(); ?>
					<?php else: ?>
						<img src="<?php bloginfo('template_url'); ?>/images/thumb-default.jpg" alt="thumbnail">
					<?php endif; ?>
					</a>
				</div>
				<div class="articles-head">
					<?php the_content(); ?> 
				</div>
				<div class="comments">
					<?php comments_template(); ?>
				</div>

			</div>
		<?php endwhile; ?>
		<?php endif; ?>
    </div>
    
<?php get_footer(); ?>