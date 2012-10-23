<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
<![endif]-->
<title><?php bloginfo('name') ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="page-wrapper">
    	<div class="top-quick-links"><?php wp_nav_menu(array('theme_location'=>sanitize_title('Top Quick Links'),'container'=>false)); ?></div>
    	<header>
        	<div class="logo-wrapper"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><div id="site-logo"></div></a></div>
            <div class="menu-wrapper"><div class="menu-container">
            	<?php wp_nav_menu(array('theme_location'=>sanitize_title('Header Menu'),'container'=>false, 'walker'=>new Walker_Habitat_Top_Menu())); ?>
            </div></div>
        </header>
        <section>