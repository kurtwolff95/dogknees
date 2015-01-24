<?php
/*
Template Name: Index Template
*/
?>
 <?php get_header(); ?>
	<div id="content">
    <div class="content-box">
    	<div class="blurb">
	    	<p class="firstline">
	    		Dog Knees Games is a videogame development company based in Melbourne, Australia.
	    	</p>
	    	<p>
	    		We are currently developing a project codenamed <a href="<?php $url = site_url( '/apollo/', 'http'); echo $url; ?>">Apollo</a>,
	    		 alongside other ventures. Read our <a href="<?php $url = site_url( '/blog/', 'http'); echo $url; ?>">blog</a> to keep up with 
	    		 development and studio news.
	    	</p>
    	</div>
    	<ul id="gameslist">
			<?php
			$args = array( 'meta_key' => 'Projects' );
			$mypages = get_pages( $args );
			foreach ( $mypages as $page ) {
				$content = $page->post_content;
				if ( ! $content ) // Empty Page?
					continue;

				$content = apply_filters( 'the_content', $content );
			?>
			<li class="game">
				<div class="gamewrapper">
					<div class="gamecontainer">
						<a href="<?php echo get_page_link( $page->ID ); ?>">
							<h1 class="gametitle"><?php echo $page->post_title; ?></h1>
							<div class="gamethumb">
								<?php echo get_the_post_thumbnail( $page->ID ); ?>
							</div><!--.gamethumb-->
						</a>
				<!--<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>-->
						<p>
							<?php the_content(); ?>
						</p>
					</div>
				</div>
			</li>
			<?php
			} //Ends foreach
			wp_reset_postdata();
			?>
		</ul><!--#gameslist-->
		<div class="kymessagewrap">
			<div class="kymessage">
				<h2 class="kymessagetitle">
					A message from Ky.
				</h2>
				<p class=>
					Hello, thanks for checking the site out! Information regarding the development of my projects is automatically posted 
					to the <a href="<?php $url = site_url( '/blog/', 'http'); echo $url; ?>">blog</a> as I work on them, so be sure to 
					check there regularly for each one's progress. I will also be posting, over time, general information regarding all things
					 <i>Dog Knees</i>.
				</p>
				<p>
					<br>
					Support <i>me</i> by following my journey here. 
				</p>
				<p>
					<br>
					(You can also <a href="#">feed me</a> if you like)
				</p>
			</div><!--.kymessage-->
		</div>
		<div class="allprojectswrap">
			<div class="allprojects">
				<h1 class="entry-title">All Projects</h1>
				<ul id="gameslist">
					<?php
						$args = array( 'meta_key' => 'Projects' );
						$mypages = get_pages( $args );
						foreach ( $mypages as $page ) {
							$content = $page->post_content;
							if ( ! $content ) // Empty Page?
								continue;

						$content = apply_filters( 'the_content', $content );
						?>
						<li class="game thesecondone">
							<a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a>
						</li>
					<?php
						} //Close the request: if has thumb, get everything 
						wp_reset_postdata();
					?>
				</ul><!--#gameslist-->
			</div><!--.allprojects-->
		</div><!--.allprojectswrap-->
    </div><!--.content-box-->
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>