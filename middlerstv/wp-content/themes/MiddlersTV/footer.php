<footer>
	<div class="container container-fluid width95percent">
		<div class="social-box">
            <a class="letter-link" href="mailto:middlersTV@gmail.com"><i class="footer-icon0"></i>MiddlersTV@gmail.com</a>
            <a class="letter-link" href="https://www.youtube.com/middlerstv"><i class="footer-icon1"></i>YouTube</a>
            <a class="letter-link" href="http://cybergame.tv/n7kote/"><i class="footer-icon2"></i>Cybergame.tv</a>
            <a class="letter-link" href="http://sc2tv.ru/content/n7kote"><i class="footer-icon3"></i>SC2.tv</a>
            <a class="letter-link" href="http://www.twitch.tv/n7kote"><i class="footer-icon4"></i>Twitch</a>
            <a class="letter-link" href="http://goodgame.ru/channel/n7kote"><i class="footer-icon5"></i>GoodGame!!</a>
            <a class="contact-us-link" href="http://middlerstv.ru/?p=83">Связаться с нами</a>
        </div>
        <div class="o-nas-box-footer">
            <?php if(!dynamic_sidebar('footer-menu')): ?>
            <?php endif; ?>
            <?php if(!dynamic_sidebar('footer-menu2')): ?>
            <?php endif; ?>       
        </div>
        <div class="copy-box">
            <img class="logo-mini" src="<?php bloginfo('template_directory'); ?>/images/MTV-logo-mini.png" alt="logo-mini">
            <span class="copy"> Copyright © 2014 MiddlersTV - Web-development by <a class="liquis" href="http://liquis.zz.mu">Spaceliquis</a> </span>
        </div>
		
        
	</div>	
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>-->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.fitvids.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.formstyler.min.js" type="text/javascript"></script>
    <!-- <script src="<?php bloginfo('template_url'); ?>/js/covervid.min.js" type="text/javascript"></script> -->

    <script src="<?php bloginfo('template_url'); ?>/js/scripts.js" type="text/javascript"></script>

  	<?php wp_footer(); ?>
  </body>
</html>