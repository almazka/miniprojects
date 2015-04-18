<?php 
	$post = $wp_query->post;
	if ( in_category('Na_glavnuyu') ) { ?>
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
						
						<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail(); ?>
						<?php else: ?>
							<img src="<?php bloginfo('template_url'); ?>/images/thumb-default.jpg" alt="thumbnail">
						<?php endif; ?>
						
					</div>
					<div class="articles-head">
						<?php the_content(); ?> 
					</div>
					
					
					
				</div>

			<?php endwhile; ?>
			<?php endif; ?>
			<div class="comments">
					<?php comments_template(); ?>
				</div>
	    </div>
	    <div class="container container-fluid">
	    	<div id="vk_comments"></div>
					<script type="text/javascript">
					VK.Widgets.Comments("vk_comments", {limit: 10, width: "1140", attach: "*"});
					</script>
		</div>
		<div class="container container-fluid">
      	<div class="breadcrumb">
	      <?php
	      if(function_exists('bcn_display'))
	      {
	        bcn_display();
	      }
	      ?>
	      </div>
	   	</div> 
	<?php get_footer(); ?>
	<?php } else {
		include(TEMPLATEPATH . '/single_general.php');

	} ?>