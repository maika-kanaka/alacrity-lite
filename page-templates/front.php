<?php
/*
* Template Name: Front Page template
 *
 * The template for displaying front page
 *
 * @package Alacrity Lite
 */
get_header(); ?>

<div id="primary" class="site-content">

	<!-- START: modif bif (slider) -->
	<div class="slider-main">
		<div id="slider">
			<div class="nivoSlider">
				<img src="https://migunesia.com/wp-content/uploads/2021/07/photo_2021-07-18_11-50-52.jpg" alt="" title="<h2> INOVASI & KREATIFITAS = SOLUSI </h2> <div> Memanfaatkan teknologi untuk membuat acara berharga anda menjadi lebih efisien, efektif dan mewah </div> " />
				<img src="https://migunesia.com/wp-content/uploads/2020/08/solution.png" alt="Event buku tamu digital dengan bukutamu mm" title="<h2> ONE STOP SOLUTION </h2> <div> Perusahaan teknologi yang berdidikasi penuh di event pernikahan, seminar & event formal lainnya </div>" />
			</div>
		</div>
	</div>
	<!-- END: modif bif (slider) -->

	<div id="content" role="main">
	<?php 		
	if (!is_home() && is_front_page()) { 
	$hide_services_sec = get_theme_mod('hide_services_sec', 0);
	$hide_about_section = get_theme_mod('hide_about_section', 0);
	?>

	<?php if( $hide_services_sec == '') : ?>
	<section id="services_container" class="row">
		<div class="container">
			<?php for($s=1; $s<5; $s++) { 
			if(get_theme_mod('service_box'.$s,false)) {
			    $page_query = new WP_Query('page_id='.esc_attr(get_theme_mod('service_box'.$s,true))); 
			    while( $page_query->have_posts() ) : $page_query->the_post(); ?>
			       	<div class="servicebox <?php echo 'bgcolor-'.$s;?>">
						<div class="serviceboxbg">
                        	<?php if ( has_post_thumbnail() ) { ?>
							<div class="service-img"><?php the_post_thumbnail();?></div>
                            <?php } ?>
							<h3><?php echo esc_html(get_the_title()); ?></h3>
							<p><?php echo strip_tags(alacrity_lite_excerpt(100) ,'alacrity-lite');?></p>
							<a href="<?php the_permalink();?>" class="ser-read"><?php esc_html_e('READ MORE', 'alacrity-lite');?></a>
						</div>		
					</div>
				<?php endwhile; 
				 wp_reset_postdata(); 
			}
			} ?>
            
		</div>
	</section>
	<?php endif; ?>

	<?php if( $hide_about_section == '') :
	if(get_theme_mod('about_setting',false)) {
	$about_query = new WP_Query('page_id='.esc_attr(get_theme_mod('about_setting')));  
	while ($about_query->have_posts()) : $about_query->the_post(); ?>
	<section id="about_container" class="row">
		<div class="container">
        <h2 class="sec-title"><?php printf( '<a href="https://migunesia.com/tentang-migunesia">%s</a>', esc_html( get_the_title() ) );?></h2>
	 		<div class="col_left_eq col_2">
	 			<div class="sec-content"><?php echo strip_tags(alacrity_lite_excerpt(100),'alacrity-lite<p><b><strong><u><em>');?></div>
	 			<a href="https://migunesia.com/tentang-migunesia" class="border_btn">
				 <?php esc_html_e('READ MORE', 'alacrity-lite');?>
				</a>
	 		</div>
	        <div class="col_right_eq col_2"><div class="feat_thumb"><?php the_post_thumbnail();?></div></div>
	    </div>
	</section><!--About-section-->
	<?php endwhile; 
	}
	endif;
	?>

<?php } else { ?>
<div class="container">
	<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		/*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		get_template_part( 'template-parts/content', get_post_format() );
	endwhile;
        // Post navigation.
        alacrity_lite_custom_pagination();
                    
    else :
         // If no content, include the "No posts found" template.
     get_template_part( 'template-parts/content','none');					
    endif;
}
	?>

	<?php 
		wp_reset_postdata();
		echo get_the_content(); 
	?>
	</div><!-- .conatiner -->
   </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>