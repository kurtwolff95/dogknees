<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>;" charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
    <!--Fonts and Stylesheets-->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'hbd-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'hbd-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <style type="text/css">
        @media 
        only screen and (-webkit-min-device-pixel-ratio: 1.1),
        only screen and (min--moz-device-pixel-ratio: 1.1),
        only screen and (-o-min-device-pixel-ratio: 10/9),
        only screen and (min-device-pixel-ratio: 1.1),
        only screen and (min-resolution: 1.1dppx)
        {
            img#titleimagetext
            {
                content:url(<?php echo esc_url(get_theme_mod('themeslug_logo_text_mobile_setting'))?>);
            }
            img#titleimage
            {
                content:url(<?php echo esc_url(get_theme_mod('themeslug_logo_mobile_setting'))?>);
            }
            img#navigationimage
            {
                content:url(<?php echo esc_url(get_theme_mod('themeslug_navigation_mobile_image_setting'))?>);
            }
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/webfont/1.5.6/webfont.js"></script>
    <script>
      WebFont.load({
        google: {
          families: ['Arimo', 'Titillium Web', 'Passion One']
        }
      });
    </script>
</head>

<body>
<div id="container">
<div id="wrapper" class="hfeed">
    <div id="contentwrapper">
    <div id="fontload">
        this is hidden
    </div>
    <div id="header">
        <div id="sitelogo">
            <div id="logoholder">
                <?php if (is_front_page() && ( get_theme_mod( 'themeslug_logo_setting' ) and get_theme_mod( 'themeslug_logo_text_setting' ) ) ): ?>
                <img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo_setting' ) ); ?>' id='titleimage'>
                <img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo_text_setting' ) ); ?>' id='titleimagetext'>
                <?php endif; ?>
            </div><!--#logoholder-->
        </div><!-- #sitelogo -->
    </div><!-- #header -->
    <div class="fullnavigationbar">
        <?php if( current_user_can( 'administrator' )) {echo "<div id='pushnavigationbar' style='display: none;'></div>";}; ?>
        <div id="navigationcont">
            <div id="widebarcont">
                <div id="widebarmain">
                    <div id="navigationbar">
                        <div id="navigationtitleimagecontainer">
                            <div id="navigationtitleimage" class="alwayssee">
                                <?php if ( get_theme_mod( 'themeslug_navigation_image_setting' ) ) : ?>
                                <a href="<?php echo home_url()?>"><img src='<?php echo esc_url( get_theme_mod( 'themeslug_navigation_image_setting' ) ); ?>' id='navigationimage'></a>
                                <?php endif; ?>
                            </div><!--#navigationtitleimage-->
                        </div><!--navigationtitleimagecontainer-->
                        <div id="navigationmenu">                            
                            <?php if ( get_theme_mod( 'themeslug_navigation_button_image_setting' ) ) : ?>
                            <div id="navbuttonimgcont">
                                <a class="mtoggle"><img src='<?php echo esc_url( get_theme_mod( 'themeslug_navigation_button_image_setting' ) ); ?>' id='navigationbuttonimage'></a>
                            </div><!--#navbuttonimgcont-->
                            <?php endif; ?>
                            <div id="navigationholder">
                        <?php wp_nav_menu( array( 'menu' => 'main', 'sort_column' => 'menu_order', 'container' => '' ) ); ?>
                            </div><!--#navigationholder-->
                        </div><!--#navigationmenu-->
                    </div><!--#navigationbar-->
                </div><!--#widebarmain-->
                <div id="widebarshadow">

                </div><!--#widebarshadow-->
            </div><!--#widebarcont-->
        </div><!--#navigationcont-->
    </div><!--fullnavigationbar-->
    <div class="stickyalias">
    </div><!--#stickalias-->
    <div id="main">