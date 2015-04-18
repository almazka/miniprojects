<?php
/*
Template Name: Home
*/
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--  <meta name="viewport" content="width=device-width, initial-scale=1"> -->
   
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
      <div class="menu-button-hider">
          <span class="white-line"></span>
          <span class="white-line"></span>
          <span class="white-line"></span>
          <span class="white-line"></span>
        </div>
      <div class="container container-fluid rel menu-fix-1275">
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
      <div class="container container-fluid width95percent">
        <a class="logo-link" href="/"></a>
        <div class="slider-box">
          <?php if(function_exists('wp_content_slider')) { wp_content_slider(); } ?>
        </div>
        <div class="clear"></div>
       
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
    <div class="clear"></div>
    <div class="container container-fluid home-page general-front-page width95percent">
    	<!-- text slider
      <ul class="bxslider">
        <li>
          <div class="slider-column-box">
          <h2><?php the_field('title-text1'); ?></h2>
          <p class="text-slider-column">
            <?php the_field('text-st1'); ?>
          </p>
          </div>
          <div class="slider-column-box">
          <h2><?php the_field('title-text2'); ?></h2>
          <p class="text-slider-column">
            <?php the_field('text-st2'); ?>
          </p>
          </div>
          <div class="slider-column-box">
          <h2><?php the_field('title-text3'); ?></h2>
          <p class="text-slider-column">
            <?php the_field('text-st3'); ?>
          </p>
          </div>
        </li>
        <li>
          <div class="slider-column-box">
          <h2><?php the_field('title-text4'); ?></h2>
          <p class="text-slider-column">
            <?php the_field('text-st4'); ?>
          </p>
          </div>
          <div class="slider-column-box">
          <h2><?php the_field('title-text5'); ?></h2>
          <p class="text-slider-column">
            <?php the_field('text-st5'); ?>
          </p>
          </div>
          <div class="slider-column-box">
          <h2><?php the_field('title-text6'); ?></h2>
          <p class="text-slider-column">
            <?php the_field('text-st6'); ?>
          </p>
          </div>
        </li>
      </ul> -->
    
    	<div class="content-box">
    		<div class="news-block">
          <ul class="bxslider7">
                    
                    <?php 
                
                $query = new WP_Query( array( 'category_name'=>'na_glavnuyu', 'paged'=>get_query_var('page'), 'posts_per_page'=>'9'  ) );
                while ( $query->have_posts() ) { 
                  $query->the_post();
                  
                   ?>
                  <li class="articles home-page-article">
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
                      
                      <a href="<?php the_permalink(); ?>" class="more">Подробнее</a>
                      </span>
                      <?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>
                    </div>

                  </li>

    <?php } ?>
    </ul>
          <div class="clear"></div>
        </div> <!-- New block -->
        <div class="obzors-block">
          <?php 
      
      $query1 = new WP_Query( array( 'category_name'=>'obzors', 'paged'=>get_query_var('page'), 'posts_per_page'=>'3'  ) );
      while ( $query1->have_posts() ) { 
        $query1->the_post();
        
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
            
            <a href="<?php the_permalink(); ?>" class="more">Подробнее</a>
            </span>
            <?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>
          </div>

        </div>
    <?php } ?>
          <div class="clear"></div>
        </div><!-- Obzors block -->
        <div class="translations-block">
          <?php 
      
      $query2 = new WP_Query( array( 'category_name'=>'translation', 'paged'=>get_query_var('page'), 'posts_per_page'=>'3'  ) );
      while ( $query2->have_posts() ) { 
        $query2->the_post();
        
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
            
            <a href="<?php the_permalink(); ?>" class="more">Подробнее</a>
            </span>
            <?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>
          </div>

        </div>
    <?php } ?>
          <div class="clear"></div>
        </div>
        
        
        
        </div> <!-- box- -->



        <div class="bottom-sidebar">
          <?php if(!dynamic_sidebar('sidebar-bottom')): ?>
            <p>Здесь виджеты сайдбара</p>
          <?php endif; ?>
        </div>
    		<div class="clear"></div>
    		<div class="slider-mini-2-box">
        
        <!-- text slider 
        <ul class="bxslider2">
                <li>
                  <div class="slider-column-box">
                  <h2><?php the_field('text-st6'); ?></h2>
                  <p class="text-slider-column">
                    <?php the_field('text1'); ?>
                  </p>
                  </div>
                  <div class="slider-column-box">
                  <h2><?php the_field('h2'); ?></h2>
                  <p class="text-slider-column">
                    <?php the_field('text2'); ?>
                  </p>
                  </div>
                  <div class="slider-column-box">
                  <h2><?php the_field('h3'); ?></h2>
                  <p class="text-slider-column">
                    <?php the_field('text3'); ?>
                  </p>
                  </div>
                </li>
                <li>
                  <div class="slider-column-box">
                  <h2><?php the_field('h4'); ?></h2>
                  <p class="text-slider-column">
                    <?php the_field('text4'); ?>
                  </p>
                  </div>
                  <div class="slider-column-box">
                  <h2><?php the_field('h5'); ?></h2>
                  <p class="text-slider-column">
                    <?php the_field('text5'); ?>
                  </p>
                  </div>
                  <div class="slider-column-box">
                  <h2><?php the_field('h6'); ?></h2>
                  <p class="text-slider-column">
                    <?php the_field('text6'); ?>
                  </p>
                  </div>
                </li>
              </ul> -->
          </div>  

			<?php if(!dynamic_sidebar('slider-text2')): ?>	
			<?php endif; ?>
    	
      </div>
    	
		
		
			
		
		
    </div>
    
<?php get_footer(); ?>
