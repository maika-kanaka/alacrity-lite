<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Alacrity Lite
 */
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<div class="content_box">
				<?php if ( have_posts() ) : ?>
			       <div class="blog_listing row">
			       	<?php
			       	/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					the_posts_pagination();?>
					</div>
					<?php else :
					get_template_part( 'template-parts/content', 'none' );
					?>	
				<?php endif;?>
			</div>
		    <?php get_sidebar(); ?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<!-- modif bif -->
<script>
	$($("#colophon .social-icons a")[0]).removeClass('fa-twitter');
	$($("#colophon .social-icons a")[0]).html(`
	<img src="https://migunesia.com/wp-content/uploads/2023/02/tiktok-1.png">
	`);
</script>

<?php get_footer(); ?>