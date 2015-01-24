    </div><!-- #main -->
    <div class="push">
    </div><!--.push-->
    </div><!--#contentwrapper-->    
    <div id="footer">
        <?php if ( get_theme_mod( 'themeslug_footer_title_image_setting' )  ) : ?>
        <div id="footerimage">
            <img src='<?php echo esc_url( get_theme_mod( 'themeslug_footer_title_image_setting' ) ); ?>' id='footertitleimage'>            
        </div><!-- #footerimage -->
        <?php endif; ?>
        <div id="footercontent">
	        <div id="site-info">
	        	<?php wp_nav_menu(array('menu' => 'footer', 'container_id' => 'footer-menu')); ?>
	        </div><!-- #site-info -->
    	</div><!-- footercontent -->
    </div><!-- #footer -->
</div><!-- #wrapper -->
</div><!--#container-->
<?php wp_footer(); ?>
</body>
</html>