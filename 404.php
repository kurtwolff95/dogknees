<!DOCTYPE html>
<?php get_header( 'index' ); ?> 
    <div id="content">
		<div class="post error404 not-found">
			<h1 class="entry-title"><?php _e( 'Error 404, Page Not Found', 'hbd-theme' ); ?></h1>
			<div class="entry-content">
				<p>
					Whoah! What are you tryna' to do, kill me?
				</p>
				<p>
					You should try looking somewhere else...
				</p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</div><!-- #post-0 -->
    </div><!-- #content -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>