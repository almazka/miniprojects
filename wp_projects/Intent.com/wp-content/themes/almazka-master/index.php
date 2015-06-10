<?php get_header(); ?>
	<div class="section">
	<div class="container">

<div class="posts">
<?php if(have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
			<div class="post"> <!-- start post -->
				<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
				<div class="mediacontent">
					<img src="<?php bloginfo('template_url') ?>/img/slider-blog2.jpg" height="300" width="650" class="post-slider">
				</div>
				<div class="post-info">
					<div class="data">
						<h4>Date</h4>
						<p><?php the_date_xml(); ?></p>
						<h4>Tags</h4>
						<p>Website | Design</p>
						<h4>Comments</h4>
						<p>4</p>
					</div>
					<div class="text">
					<?php the_excerpt(); ?> <a href="<?php the_permalink();?>">...</a>
					</div>
				</div>
			</div> <!-- end post -->
	<?php endwhile; ?>
<?php endif ?>
		</div> <!-- end posts -->
<?php get_sidebar(); ?>
		<div class="pages">
			<span class="active">1</span>
			<span>2</span>
			<span>3</span>
		</div>
	</div>
	</div>
</div>
<?php get_footer(); ?>