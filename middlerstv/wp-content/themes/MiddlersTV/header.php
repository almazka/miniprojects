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
    <script type="text/javascript">
      VK.init({apiId: 4563667, onlyWidgets: true});
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
      <div class="container container-fluid">
        <a class="logo-link" href="/"></a>
        <div class="slider-box">
          <?php if(function_exists('wp_content_slider')) { wp_content_slider(); } ?>
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