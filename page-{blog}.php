<?php
/*
Template Name: Blog Index Template
*/
?>
	<?php get_header(); ?> 
    <div id="content">
    	<div id="blogtitleimagecontainer">
			<?php if ( get_theme_mod( 'themeslug_blog_title_image_setting' )  ) : ?>
                <img src='<?php echo esc_url( get_theme_mod( 'themeslug_blog_title_image_setting' ) ); ?>' id='blogtitleimage'>
            <?php endif; ?>
    	</div>
    	<div id="postlist">			
			<?php /* The Loop — with comments! */ 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array( 'posts_per_page' => 50, 'paged' => $paged,'post_type' => 'post' );
			$postslist = new WP_Query( $args );
			if ( $postslist->have_posts() ) :
				while ( $postslist->have_posts() ) : $postslist->the_post() ?>

			<?php /* Create a div with a unique ID thanks to the_ID() and semantic classes with post_class() */ ?>
			                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			                	<div id="postmeta">
			<?php /* a h2 title */ ?>
			                    <span><h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'hbd-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>
			                    <span class="entry-date"><h2><abbr class="published" title="<?php the_time('ymd') ?>"><?php the_time('ymd'); ?></abbr></h2></span>
			<?php /* Microformatted category and tag links along with a comments link */ ?>
								<div id="whereandwhencontainer">
		                        	<span class="timeago"><?php wp_awhileago();?></span>
		                        	<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'in ', 'hbd-theme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
		                    	</div>
			                	</div><!--#postmeta-->
			<?php /* The entry content */ ?>
			                    <div class="entry-content indexcontent">
			<?php the_content("read more"); ?>
			<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'hbd-theme' ) . '&after=</div>') ?>
			                    </div><!-- .entry-content -->
			                </div><!--#post id-->
			
			<?php /* Close up the post div and then end the loop with endwhile */ ?>      
			<?php 
			endwhile;
			?> 
			<div id="nav-below" class="navigation">
				<?php next_posts_link('<span id="navolder" class="meta-nav">&laquo; Older posts</span>', $postslist->max_num_pages ); ?>  <?php previous_posts_link(' <span id="navnewer" class="meta-nav">Newer posts &raquo;</span>'); ?>
			</div><!-- #nav-below -->
			<?php
			wp_reset_postdata();
			endif;
			?>             
		</div><!--#postlist-->
    </div><!-- #content -->

	<?php get_sidebar(); ?>
<?php get_footer(); ?>