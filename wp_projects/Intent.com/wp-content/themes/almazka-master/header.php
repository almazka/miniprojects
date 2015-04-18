<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /> 
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/scripts/jquery-2.1.3.min.js"></script>
	<!-- Удалить после верстки -->
		<script type="text/javascript" src="<?php bloginfo('template_url') ?>/scripts/pixLayout.js"></script>
		<script type="text/javascript">
			$(function(){
					$.pixlayout("<?php bloginfo('template_url') ?>/img/layout-blog.jpg");
					$.pixlayout({
					src: "<?php bloginfo('template_url') ?>/img/layout-blog.jpg",
					opacity: 0.5,
					top: 32,
					left: 134,
					right: 135,
					center: true,
					clip: true,
					show: true
			}, ".wrapper");
			});
		</script>
	<!-- Удалить после верстки -->
</head>
	<body>
	<div class="wrapper">
	<div class="top-social">
		<div class="container">
			<i class="social"></i>
			<i class="social"></i>
			<i class="social"></i>
			<i class="social"></i>
		</div>
	</div>
	<div class="header">
		<div class="container">
		<div class="top">
			<div class="logo">
				<i class="logo-letter">i</i><span>Intent</span>
			</div>
			<ul class="nav">
				<li><a href="index.html">Home</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="portfolio.html">Portfolio</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		</div>
	</div>
	<div class="big-container">
		<div class="front">
			<div class="title-img"><img src="<?php bloginfo('template_url') ?>/img/blog-title.jpg" alt=""></div>
		</div>
		<div class="container">
			<div class="top-container">
				<h1>Blog</h1>
				<strong>Keep in the loop</strong>
			</div>
			</div>
	</div>