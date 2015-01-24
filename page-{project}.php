<?php
/*
Template Name: Project Template
*/
?>
<?php get_header(); ?>
<?php if ( function_exists( 'get_smooth_slider' ) ) { get_smooth_slider(); }?>
<div id="content">
  <div class="content-box">
    <?php 
      the_post(); 

    ?>
    <div class="project-content">
      <div class="project-title">          
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </div><!--.project-title-->
      <div class="projectwrap">
        <?php
        if ( function_exists( 'the_content_part' ) && has_content_parts() ) {
          the_content_part( 1, '<div class="projectslider">', '</div>' );
          ?>
          <div class="projectblurb">
            <div class="gamethumb">
              <?php echo get_the_post_thumbnail( $page->ID ); ?>
            </div>
            <?php the_content_part( 2 ); ?>
          </div><!--.projectblurb-->
          <div class="projectextendedblurb">
            <div class="projectbloglinks">
              <?php
                $key = "projectblogcategory";
                $category_name = get_post_meta(get_queried_object_id(), $key, true);
                $category_id = get_cat_ID( $category_name );
                $category_link = get_category_link( $category_id );
              ?>
              <p><a href="<?php echo esc_url( $category_link ); ?>">Follow this project here!</a></p>
            </div>
          </div><!--.projectextendedblurb-->
        <?php
        } else {
          the_content();
        }
        ?>
      </div><!--.projectwrap-->
      <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'hbd-theme' ) . '&after=</div>') ?>
    </div><!--.project-content-->
    <div class="entry-utility">
      <?php /* printf( __( 'This entry was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'hbd-theme' ),
        get_the_category_list(', '),
        get_the_tag_list( __( ' and tagged ', 'hbd-theme' ), ', ', '' ),
        get_permalink(),
        the_title_attribute('echo=0'),
        comments_rss() ) */
      ?>
      <?php edit_post_link( __( 'Edit', 'hbd-theme' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
    </div><!--.entry-utility-->
  </div><!--.content-box-->
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>