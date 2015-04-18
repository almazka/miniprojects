<?php
/*
Template Name: streamer-page
*/
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo(template_directory); ?>/images/favicon.ico" type="image/x-icon">
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <link href='http://fonts.googleapis.com/css?family=Roboto&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?115"></script>
    <script>
      VK.init({apiId: 4536967, onlyWidgets: true});
    </script>
	
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo(template_directory); ?>/css/jquery.fancybox-1.3.4.css" media="screen" />
    
    <?php wp_head(); ?>
    
  </head>
  <body>
    <!-- <div class="covervid-wrapper">
      <video class="covervid-video" autoplay loop>
         <source src="<?php bloginfo('template_url'); ?>/videos/clouds.webm" type="video/webm">
          <source src="<?php bloginfo('template_url'); ?>/videos/clouds.mp4" type="video/mp4">
      </video>
    </div> -->
    <div class="top-box">
      <div class="container container-fluid rel">
        <!-- <a class="logo" href="#">Логотип</a> -->
        <?php if(!dynamic_sidebar('menu_header')): ?>
        <?php endif; ?>
        <div class="log-reg">
          <p>Вход/Регистрация</p>
          <div class="dropdown-log">
            <?php if(!dynamic_sidebar('menu-register')): ?>
            <?php endif; ?>
          </div>  
        </div>
        <div class="search"><?php get_search_form(); ?> </div>
      </div>
      <a class="vk" href="http://vk.com/middlerstv"></a>
    </div>
    <div class="header-top">
        <div class="personal-header">
			<?php if( get_field('header-img1') ): ?>
				<img id="bg" class="personal-header-img " src="<?php the_field('header-img1'); ?>" alt="">
			<?php else : ?>
			<img id="bg" class="personal-header-img " src="<?php bloginfo('template_directory'); ?>/images/stream-head.jpg" alt="">
			<?php endif; ?>
			
			
			<div class="social-vallet">
				<?php if( get_field('webmoney1') || get_field('yandex1') ): ?>
					<div class="doverie">
						<p>Кошельки доверия:</p>
					</div>
					<?php if( get_field('webmoney1') ): ?>
						<div class="web-money">
							<p class="web-money-icon"><?php the_field('webmoney1'); ?></p>
						</div>
					<?php endif; ?>
					<?php if( get_field('yandex1') ): ?>
					<div class="yandex-money">
						<p class="yandex-money-icon"><?php the_field('yandex1'); ?></p>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<div class="vk-box">
					<a class="vk" href="<?php the_field('vk-1'); ?>">Вконтакте</a>
				</div>
				<div class="gp-box">
					<a class="gp" href="<?php the_field('google1'); ?>"></a>
				</div>

			</div>
			
			<div class="personal-social">
				
			</div>
		</div>
    </div>
    <div class="header-bottom">
      <div class="container container-fluid">
        <p class="slogan">Оставайтесь с нами на MiddlersTV ^^<p>
        <div class="social">
          <a class="social-link cybergame" href="http://cybergame.tv/n7kote/"></a>
          <a class="social-link youtube" href="https://www.youtube.com/middlerstv"></a>
          <a class="social-link cs2tv" href="http://sc2tv.ru/content/n7kote"></a>
          <a class="social-link twich" href="http://www.twitch.tv/n7kote"></a>
          <a class="social-link googgame" href="http://goodgame.ru/channel/n7kote"></a>
        </div>
      </div>  
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
<div class="clear"></div>
<div class="container container-fluid streamer-page general-front-page">
	
	<ul class="bxslider">
		<li>
			<div class="slider-column-video">
				<?php if( get_field('url_translation1') ): ?>
					<?php the_field('url_translation1');?>
				<?php endif; ?>
			</div>
			<div class="slider-column-chat">
				<?php if( get_field('url_chat1') ): ?>
					<?php the_field('url_chat1');?>
				<?php endif; ?>
			</div>
		</li>
		<li>
			<div class="slider-column-avatar">
				<?php if( get_field('avatar_in_slider1') ): ?>
					<img class="personal-page-avatar" src="<?php the_field('avatar_in_slider1');?>" alt="">
				<?php endif; ?>
			</div>
			<div class="slider-column-text-info">
				<h2>Информация о стримере</h2>
				<p class="text-slider-column">
					<?php if( get_field('info1') ): ?>
						<?php the_field('info1');?>
					<?php endif; ?>
				</p>
			</div>
		</li>
	</ul> <!-- slider -->
	
	<div class="play-zone">
		<?php if( get_field('play-playlist1') ): ?>
		<h2 class="play-lists-title"><?php the_field('play-playlist1'); ?></h2>
		<ul class="bxslider3">
			<li class="play-list">
				<?php if( get_field('play-name1') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link1'); ?>" title="<?php the_field('play-name1'); ?>">
						<img alt="" src="<?php the_field('play-img1'); ?>">
						<p><?php the_field('play-name1'); ?></p>
					</a>
				<?php endif; ?>
				<?php if( get_field('play-name2') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link2'); ?>" title="<?php the_field('play-name2'); ?>">
						<img alt="" src="<?php the_field('play-img2'); ?>">
						<p><?php the_field('play-name2'); ?></p>
					</a>
				<?php endif; ?>
				<?php if( get_field('play-name3') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link3'); ?>" title="<?php the_field('play-name3'); ?>">
						<img alt="" src="<?php the_field('play-img3'); ?>">
						<p><?php the_field('play-name3'); ?></p>
					</a>
				<?php endif; ?>
				<?php if( get_field('play-name4') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link4'); ?>" title="<?php the_field('play-name4'); ?>">
						<img alt="" src="<?php the_field('play-img4'); ?>">
						<p><?php the_field('play-name4'); ?></p>
					</a>
				<?php endif; ?>
				<?php if( get_field('play-name5') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link5'); ?>" title="<?php the_field('play-name5'); ?>">
						<img alt="" src="<?php the_field('play-img5'); ?>">
						<p><?php the_field('play-name5'); ?></p>
					</a>
				<?php endif; ?>
			</li>
			<li class="play-list">
				<?php if( get_field('play-name6') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link6'); ?>" title="<?php the_field('play-name6'); ?>">
						<img alt="" src="<?php the_field('play-img6'); ?>">
						<p><?php the_field('play-name6'); ?></p>
					</a>
				<?php endif; ?>
				<?php if( get_field('play-name7') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link7'); ?>" title="<?php the_field('play-name7'); ?>">
						<img alt="" src="<?php the_field('play-img7'); ?>">
						<p><?php the_field('play-name7'); ?></p>
					</a>
				<?php endif; ?>
				<?php if( get_field('play-name8') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link8'); ?>" title="<?php the_field('play-name8'); ?>">
						<img alt="" src="<?php the_field('play-img8'); ?>">
						<p><?php the_field('play-name8'); ?></p>
					</a>
				<?php endif; ?>
				<?php if( get_field('play-name9') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link9'); ?>" title="<?php the_field('play-name9'); ?>">
						<img alt="" src="<?php the_field('play-img9'); ?>">
						<p><?php the_field('play-name9'); ?></p>
					</a>
				<?php endif; ?>
				<?php if( get_field('play-name10') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link10'); ?>" title="<?php the_field('play-name10'); ?>">
						<img alt="" src="<?php the_field('play-img10'); ?>">
						<p><?php the_field('play-name10'); ?></p>
					</a>
				<?php endif; ?>
				
			</li>
			<li class="play-list">
				<?php if( get_field('play-name11') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link11'); ?>" title="<?php the_field('play-name11'); ?>">
						<img alt="" src="<?php the_field('play-img11'); ?>">
						<p><?php the_field('play-name11'); ?></p>
					</a>
				<?php endif; ?>
				<?php if( get_field('play-name12') ): ?>
					<a class="example6 video-box" href="<?php the_field('play-link12'); ?>" title="<?php the_field('play-name12'); ?>">
						<img alt="" src="<?php the_field('play-img12'); ?>">
						<p><?php the_field('play-name12'); ?></p>
					</a>
				<?php endif; ?>
				<?php if( get_field('play-name13') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link13'); ?>" title="<?php the_field('play-name13'); ?>">
					<img alt="" src="<?php the_field('play-img13'); ?>">
					<p><?php the_field('play-name13'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name14') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link14'); ?>" title="<?php the_field('play-name14'); ?>">
					<img alt="" src="<?php the_field('play-img14'); ?>">
					<p><?php the_field('play-name14'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name15') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link15'); ?>" title="<?php the_field('play-name15'); ?>">
					<img alt="" src="<?php the_field('play-img15'); ?>">
					<p><?php the_field('play-name15'); ?></p>
				</a>
				<?php endif; ?>

			</li>
			<li class="play-list">
				<?php if( get_field('play-name16') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link16'); ?>" title="<?php the_field('play-name16'); ?>">
					<img alt="" src="<?php the_field('play-img16'); ?>">
					<p><?php the_field('play-name16'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name17') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link17'); ?>" title="<?php the_field('play-name17'); ?>">
					<img alt="" src="<?php the_field('play-img17'); ?>">
					<p><?php the_field('play-name17'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name18') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link18'); ?>" title="<?php the_field('play-name18'); ?>">
					<img alt="" src="<?php the_field('play-img18'); ?>">
					<p><?php the_field('play-name18'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name19') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link19'); ?>" title="<?php the_field('play-name19'); ?>">
					<img alt="" src="<?php the_field('play-img19'); ?>">
					<p><?php the_field('play-name19'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name20') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link20'); ?>" title="<?php the_field('play-name20'); ?>">
					<img alt="" src="<?php the_field('play-img20'); ?>">
					<p><?php the_field('play-name20'); ?></p>
				</a>
				<?php endif; ?>

			</li>
			<li class="play-list">
				<?php if( get_field('play-name21') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link21'); ?>" title="<?php the_field('play-name21'); ?>">
					<img alt="" src="<?php the_field('play-img21'); ?>">
					<p><?php the_field('play-name21'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name22') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link22'); ?>" title="<?php the_field('play-name22'); ?>">
					<img alt="" src="<?php the_field('play-img22'); ?>">
					<p><?php the_field('play-name22'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name23') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link23'); ?>" title="<?php the_field('play-name23'); ?>">
					<img alt="" src="<?php the_field('play-img23'); ?>">
					<p><?php the_field('play-name23'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name24') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link24'); ?>" title="<?php the_field('play-name24'); ?>">
					<img alt="" src="<?php the_field('play-img24'); ?>">
					<p><?php the_field('play-name24'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name25') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link25'); ?>" title="<?php the_field('play-name25'); ?>">
					<img alt="" src="<?php the_field('play-img25'); ?>">
					<p><?php the_field('play-name25'); ?></p>
				</a>
				<?php endif; ?>
				
			</li>
			<li class="play-list">
				<?php if( get_field('play-name26') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link26'); ?>" title="<?php the_field('play-name26'); ?>">
					<img alt="" src="<?php the_field('play-img26'); ?>">
					<p><?php the_field('play-name26'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name27') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link27'); ?>" title="<?php the_field('play-name27'); ?>">
					<img alt="" src="<?php the_field('play-img27'); ?>">
					<p><?php the_field('play-name27'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name28') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link28'); ?>" title="<?php the_field('play-name28'); ?>">
					<img alt="" src="<?php the_field('play-img28'); ?>">
					<p><?php the_field('play-name28'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name29') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link29'); ?>" title="<?php the_field('play-name29'); ?>">
					<img alt="" src="<?php the_field('play-img29'); ?>">
					<p><?php the_field('play-name29'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name30') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link30'); ?>" title="<?php the_field('play-name30'); ?>">
					<img alt="" src="<?php the_field('play-img30'); ?>">
					<p><?php the_field('play-name30'); ?></p>
				</a>
				<?php endif; ?>

			</li>
			<li class="play-list">
				<?php if( get_field('play-name31') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link31'); ?>" title="<?php the_field('play-name31'); ?>">
					<img alt="" src="<?php the_field('play-img31'); ?>">
					<p><?php the_field('play-name31'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name32') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link32'); ?>" title="<?php the_field('play-name32'); ?>">
					<img alt="" src="<?php the_field('play-img32'); ?>">
					<p><?php the_field('play-name32'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name33') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link33'); ?>" title="<?php the_field('play-name33'); ?>">
					<img alt="" src="<?php the_field('play-img33'); ?>">
					<p><?php the_field('play-name33'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name34') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link34'); ?>" title="<?php the_field('play-name34'); ?>">
					<img alt="" src="<?php the_field('play-img34'); ?>">
					<p><?php the_field('play-name34'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name35') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link35'); ?>" title="<?php the_field('play-name35'); ?>">
					<img alt="" src="<?php the_field('play-img35'); ?>">
					<p><?php the_field('play-name35'); ?></p>
				</a>
				<?php endif; ?>
				
			</li>
			<li class="play-list">
				<?php if( get_field('play-name36') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link36'); ?>" title="<?php the_field('play-name36'); ?>">
					<img alt="" src="<?php the_field('play-img36'); ?>">
					<p><?php the_field('play-name36'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name37') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link37'); ?>" title="<?php the_field('play-name37'); ?>">
					<img alt="" src="<?php the_field('play-img37'); ?>">
					<p><?php the_field('play-name37'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name38') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link38'); ?>" title="<?php the_field('play-name38'); ?>">
					<img alt="" src="<?php the_field('play-img38'); ?>">
					<p><?php the_field('play-name38'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name39') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link39'); ?>" title="<?php the_field('play-name39'); ?>">
					<img alt="" src="<?php the_field('play-img39'); ?>">
					<p><?php the_field('play-name39'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name40') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link40'); ?>" title="<?php the_field('play-name40'); ?>">
					<img alt="" src="<?php the_field('play-img40'); ?>">
					<p><?php the_field('play-name40'); ?></p>
				</a>
				<?php endif; ?>
				
			</li>
			<li class="play-list">
				<?php if( get_field('play-name41') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link41'); ?>" title="<?php the_field('play-name41'); ?>">
					<img alt="" src="<?php the_field('play-img41'); ?>">
					<p><?php the_field('play-name41'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name42') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link42'); ?>" title="<?php the_field('play-name42'); ?>">
					<img alt="" src="<?php the_field('play-img42'); ?>">
					<p><?php the_field('play-name42'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name43') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link43'); ?>" title="<?php the_field('play-name43'); ?>">
					<img alt="" src="<?php the_field('play-img43'); ?>">
					<p><?php the_field('play-name43'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name44') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link44'); ?>" title="<?php the_field('play-name44'); ?>">
					<img alt="" src="<?php the_field('play-img44'); ?>">
					<p><?php the_field('play-name44'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name45') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link45'); ?>" title="<?php the_field('play-name45'); ?>">
					<img alt="" src="<?php the_field('play-img45'); ?>">
					<p><?php the_field('play-name45'); ?></p>
				</a>
				<?php endif; ?>
				
			</li>
			<li class="play-list">
				<?php if( get_field('play-name46') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link46'); ?>" title="<?php the_field('play-name46'); ?>">
					<img alt="" src="<?php the_field('play-img46'); ?>">
					<p><?php the_field('play-name46'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name47') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link47'); ?>" title="<?php the_field('play-name47'); ?>">
					<img alt="" src="<?php the_field('play-img47'); ?>">
					<p><?php the_field('play-name47'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name48') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link48'); ?>" title="<?php the_field('play-name48'); ?>">
					<img alt="" src="<?php the_field('play-img48'); ?>">
					<p><?php the_field('play-name48'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name49') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link49'); ?>" title="<?php the_field('play-name49'); ?>">
					<img alt="" src="<?php the_field('play-img49'); ?>">
					<p><?php the_field('play-name49'); ?></p>
				</a>
				<?php endif; ?>
				<?php if( get_field('play-name50') ): ?>
				<a class="example6 video-box" href="<?php the_field('play-link50'); ?>" title="<?php the_field('play-name50'); ?>">
					<img alt="" src="<?php the_field('play-img50'); ?>">
					<p><?php the_field('play-name50'); ?></p>
				</a>
				<?php endif; ?>
			</li>
		</ul><!-- slider 2 -->
		<?php endif; ?>
		<!-- <h2 class="play-lists-title">Плейлисты</h2>
		<ul class="bxslider4">
			<li class="play-list">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
			</li>
			<li class="play-list">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
			</li>
		</ul>slider 2
		<h2 class="play-lists-title">Плейлисты</h2>
		<ul class="bxslider5">
			<li class="play-list">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
			</li>
			<li class="play-list">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
			</li>
		</ul>slider 2
		<h2 class="play-lists-title">Плейлисты</h2>
		<ul class="bxslider6">
			<li class="play-list">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
			</li>
			<li class="play-list">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
					<img src="<?php bloginfo('template_directory'); ?>/images/playlist-img1.jpg" alt="">
			</li>
		</ul>slider 2
		<h2 class="play-lists-title">Плейлисты</h2> -->
	</div>
	<div class="micro-blog">
		<?php 
			
			$query = new WP_Query( array( 'category_name'=>the_field666('nick-1'), 'paged'=>get_query_var('paged'), 'posts_per_page'=>'4'  ) );
			while ( $query->have_posts() ) { 
				$query->the_post();
				
				 ?>
				<div class="articles home-page-article">
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
		<?php } ?>
		</div>
		<div class="clear"></div>
		<div class="pager">
			<?php  
			wp_pagenavi( array( 'query' => $query ) );

			wp_reset_postdata();	// avoid errors further down the page ?>
		</div>
		<div id="vk_comments"></div>
		<script type="text/javascript">
		VK.Widgets.Comments("vk_comments", {limit: 10, width: "1140", attach: "*"});
		</script>
	</div>
	
	
</div> <!-- container -->

<?php get_footer(); ?>