<?php
/*
Template Name: traditions
*/
?>
<?php
/**
 * @author Alex Space
 *
 * @package WordPress
 * @subpackage rhsh
 * @since rhsh 1.0
 */
get_header(); ?>
<div id="primary" class="site-content prepod-page">
	<div id="content" role="main">
		<?php navigation_left (); ?>
		<div class="general-area">
			<div class="tradition-page mCustomScrollbar _mCS_1" id="content_1">
			 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="articles home-page-article">
					
					<div class="clear"></div>
					<div class="photos-videos">
						<img src="http://www.artschool1omsk.ru/images/photo-video-tradition.png" alt="">
						<?php if( get_field('video-trad1') ): ?>
							<a href="<?php the_field('video-trad1'); ?>">Видео</a>
						<?php endif; ?>
					</div>
					<div class="articles-head">
						<div class="articles-title">
							<h1><?php the_title(); ?></h2>
						</div>
						<a href="http://www.artschool1omsk.ru/?page_id=420"><h2>Посвящение в художники (первокласников)</h2></a>
						
						<a href="http://www.artschool1omsk.ru/?page_id=422"><h2>Пленэры</h2></a>
						

						<a href="http://www.artschool1omsk.ru/?page_id=424"><h2>Выставки и конкурсы</h2></a>
					
					</div>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
			</div>


			
		</div><!-- .general-area -->
	</div><!-- #content -->
</div><!-- #primary -->
	

<?php get_footer(); ?>