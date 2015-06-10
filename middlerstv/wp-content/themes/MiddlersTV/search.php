<?php get_header(); ?>
    <div class="clear"></div>
    <div class="container container-fluid">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="articles">
				<div class="articles-title">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
					<?php the_excerpt('new_excerpt_length', 40); ?> 
				</div>
				<div class="comments-more">
					<span class="articles-comments">
					<?php comments_popup_link(); ?>

					</span>
					<a href="<?php the_permalink(); ?>" class="more">Подробнее</a>
				</div>
			</div>
		<?php endwhile; ?>
		<?php else: ?>
			<p class="no-result">По вашему запросу ничего не найдено =(</p>

		<?php endif; ?>
    </div>
    
<?php get_footer(); ?>