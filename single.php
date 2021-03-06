<?php get_header(); ?>
<div id="content">
  <div class="post-single">
    <?php the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div id="entry-wrapper">          
        <h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
        <div class="entry-content">
          <?php the_content(); ?>
          <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'hbd-theme' ) . '&after=</div>') ?>
        </div><!-- .entry-utility -->
      </div><!--#entry-wrapper-->
      <div class="entry-utility">
        <?php 
          /* printf( __( 'This entry was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'hbd-theme' ),
          get_the_category_list(', '),
          get_the_tag_list( __( ' and tagged ', 'hbd-theme' ), ', ', '' ),
          get_permalink(),
          the_title_attribute('echo=0'),
          comments_rss() ) */
        ?>
        <?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>
          <?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'hbd-theme' ), get_trackback_url() ) ?>
        <?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>
          <?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'hbd-theme' ), get_trackback_url() ) ?>
        <?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>
          <?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'hbd-theme' ) ?>
        <?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
          <?php _e( 'Both comments and trackbacks are currently closed.', 'hbd-theme' ) ?>
        <?php endif; ?>
        <?php edit_post_link( __( 'Edit', 'hbd-theme' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
      </div><!--.entry-utility-->
    </div><!-- #post-<?php the_ID(); ?> -->
    <div id="nav-below" class="navigation">
      <?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?> <span style="color: #bbb;">&#8226;</span> <?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?>
    </div><!-- #nav-below -->            
    <?php comments_template('', true); ?>
  </div><!--.post-single-->
</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>