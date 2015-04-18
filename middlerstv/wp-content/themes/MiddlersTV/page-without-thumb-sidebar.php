<?php
/*
Template Name: without thub&sidebar
*/
?>
<?php get_header(); ?>
    <div class="clear"></div>
    <div class="without-thumb-sidebar container container-fluid">
    	<div class="content-box">
    		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="articles home-page-article">
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
    	
    </div>
    
<?php get_footer(); ?>