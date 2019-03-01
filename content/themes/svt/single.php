
<?php get_header(); ?>

<style>
	body {background: white!important}
</style>


<?php 

global $nectar_theme_skin, $options;

$bg = get_post_meta($post->ID, '_nectar_header_bg', true);
$bg_color = get_post_meta($post->ID, '_nectar_header_bg_color', true);
$fullscreen_header = (!empty($options['blog_header_type']) && $options['blog_header_type'] == 'fullscreen' && is_singular('post')) ? true : false;
$blog_header_type = (!empty($options['blog_header_type'])) ? $options['blog_header_type'] : 'default';
$fullscreen_class = ($fullscreen_header == true) ? "fullscreen-header full-width-content" : null;
$theme_skin = (!empty($options['theme-skin'])) ? $options['theme-skin'] : 'default';
$hide_sidebar = (!empty($options['blog_hide_sidebar'])) ? $options['blog_hide_sidebar'] : '0'; 
$blog_type = $options['blog_type']; 
$blog_social_style = (!empty($options['blog_social_style'])) ? $options['blog_social_style'] : 'default';
$enable_ss = (!empty($options['blog_enable_ss'])) ? $options['blog_enable_ss'] : 'false';

?>
<!-- Header -->
<div id="page-header-wrap" data-animate-in-effect="zoom-out" data-midnight="light" class="" style="height: 490px; margin-top: 0px;">	    <div class="loaded" data-animate-in-effect="zoom-out" id="page-header-bg" data-midnight="light" data-text-effect="none" data-bg-pos="center" data-alignment="left" data-alignment-v="top" data-parallax="1" data-height="490" style="background-color: rgb(0, 0, 0); height: 490px; opacity: 1; overflow: visible; z-index:0">
			
			<div class="page-header-bg-image" style="background-image: url(/content/uploads/header_products-1.jpg);"></div> 
			<div class="container">
						 <div class="row" style="top: 0px; visibility: visible;">
							<div class="col span_6" style="opacity: 1; top: 255px;">
								<div class="inner-wrap">
									<h1 style="color: black;">Fire Protection Worldwide</h1>
									<span class="subheader"></span>
								</div>
								 
																</div>
						  </div>
					  
					  					
					
				
			</div>
		</div>

	   </div>
<!-- Header -->


<div class="filter--row">
        <div class="filter--container">
		
                 <a href="<?php echo get_post_meta( get_the_ID(), 'backlink', true ) ?  get_post_meta( get_the_ID(), 'backlink', true ) : "/products" ?>" class="back">Back to <?php 
					echo get_post_meta( get_the_ID(), 'backlink', true ) ?  "Applications " : "Products "
				 ?>overview</a>
              
                 </div>

        </div>

<?php

if(have_posts()) : while(have_posts()) : the_post();

	?><div class="container full--width" style="background: white">
	<div class="post--content">
	<?php the_content(); ?>
	</div>
	</div>
	<?php

endwhile; endif;

?>



			

					
		</div><!--/row-->

		

		<!--ascend only author/comment positioning-->
		<div class="row">

			<?php if($theme_skin == 'ascend' && $fullscreen_header == true ) { ?>

			<div id="single-below-header" class="<?php echo $fullscreen_class; ?> custom-skip">
				<?php if($blog_social_style != 'fixed_bottom_right') { ?>
					<span class="meta-share-count"><i class="icon-default-style steadysets-icon-share"></i> <?php echo '<a href=""><span class="share-count-total">0</span> <span class="plural">'. __('Shares',NECTAR_THEME_NAME) . '</span> <span class="singular">'. __('Share',NECTAR_THEME_NAME) .'</span> </a>'; nectar_blog_social_sharing(); ?> </span>
				<?php } else { ?>
					<span class="meta-love"><span class="n-shortcode"> <?php echo nectar_love('return'); ?>  </span></span>
				<?php } ?>
				<span class="meta-category"><i class="icon-default-style steadysets-icon-book2"></i> <?php the_category(', '); ?></span>
				<span class="meta-comment-count"><i class="icon-default-style steadysets-icon-chat-3"></i> <a class="comments-link" href="<?php comments_link(); ?>"><?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a></span>
			</div><!--/single-below-header-->

			<?php }

			if($theme_skin == 'ascend' || $theme_skin == 'material') {
				
		
			
		} ?>

			


		</div>


		
	</div><!--/container-->

</div><!--/container-wrap-->




	
<?php get_footer(); ?>