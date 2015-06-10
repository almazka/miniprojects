<?php
/*
Template Name: Forum
*/
 ?>
<?php get_header(); ?>
    <div class="clear"></div>
    <div class="container container-fluid forum-head">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="articles">
				<div class="articles-title">
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="clear"></div>
				<div class="articles-head">
					<?php the_content(); ?> 
				</div>

			</div>
		<?php endwhile; ?>
		<?php endif; ?>
    </div>
    
<?php get_footer(); ?>