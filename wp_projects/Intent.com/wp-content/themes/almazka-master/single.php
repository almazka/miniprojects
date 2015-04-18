<?php get_header(); ?>
	<div class="section">
	<div class="container">

<div class="posts">
<?php if(have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
			<div class="post"> <!-- start post -->
				<h2><?php the_title(); ?></h2>
				<div class="mediacontent">
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
					<?php the_content(); ?>
					</div>
				</div>
			</div> <!-- end post -->
	<?php endwhile; ?>
<?php endif ?>
		</div> <!-- end posts -->
<?php get_sidebar(); ?>
<div class="clean"></div>
		<div class="links">
			<?php previous_post_link(); ?>
			<?php next_post_link(); ?>
		</div>
	</div>
	</div>
</div>
<?php get_footer(); ?>