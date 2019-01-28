<?php 
/*template name: Products */

get_header(); 
nectar_page_header($post->ID); 

//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);

?>

<div class="container-wrap">
	
	<div class="<?php if($page_full_screen_rows != 'on') echo 'container'; ?> main-content">
		
		<div class="row">
			
			<?php 

			//breadcrumbs
			if ( function_exists( 'yoast_breadcrumb' ) && !is_home() && !is_front_page() ){ yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } 

			 //buddypress
			 global $bp; 
			 if($bp && !bp_is_blog_page()) echo '<h1>' . get_the_title() . '</h1>';
			
			 //fullscreen rows
			 if($page_full_screen_rows == 'on') echo '<div id="nectar_fullscreen_rows" data-animation="'.$page_full_screen_rows_animation.'" data-row-bg-animation="'.$page_full_screen_rows_bg_img_animation.'" data-animation-speed="'.$page_full_screen_rows_animation_speed.'" data-content-overflow="'.$page_full_screen_rows_content_overflow.'" data-mobile-disable="'.$page_full_screen_rows_mobile_disable.'" data-dot-navigation="'.$page_full_screen_rows_dot_navigation.'" data-footer="'.$page_full_screen_rows_footer.'" data-anchors="'.$page_full_screen_rows_anchors.'">';

				 if(have_posts()) : while(have_posts()) : the_post(); 
					
					 the_content(); 
		
				 endwhile; endif; 
				
			if($page_full_screen_rows == 'on') echo '</div>'; ?>

		</div><!--/row-->

		
	</div><!--/container-->


    <!-- Filter and Produkts -->
	
        <div class="filter--row">
        <div class="filter--container">
                 <a href="#" class="btn">Change to UL</a>
                 <div class="filter--main">
                    <input type="radio" name="product" id="applications" >
                    <label class="filter--label" for="applications">Applications</label>
                    <input type="radio" name="product" id="products" checked>
                    <label class="filter--label" for="products">Products</label>
                    </div>
                 </div>

        </div>
        <div class="products--wrapper">
            <div class="filter--categories">
                 <input type="checkbox" id="all" checked>
                 <label class="filter--item" for="all">All</label><br>
                 <input type="checkbox" id="coatings">
                 <label class="filter--item" for="coatings">Coatings and Wraps</label>
            </div>
            <div class="products--paged">

            <?php 
                $dummy = [
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
                    ['image' => 'pyro-safe_flammotect-a.jpg',
                    'title' => 'Pyro-Safe®',
                    'subtitle' => 'Flammotect-A',
                    'copy' => 'Filler – endothermic'
                ],
            ];
                for($i = 0; $i < count($dummy); $i++){
                    
              

            ?>

                 <a href="#" class="products--item">
                    <img src="/content/uploads/<?= $dummy[$i]['image'] ?>" alt="" class="products--image">
                    <div class="products--description">
                        <h3 class="products--title"><?= $dummy[$i]['title'] ?></h3>
                        <h4 class="products--subtitle"><?= $dummy[$i]['subtitle'] ?></h4>
                        <p class="products--copy"><?= $dummy[$i]['copy'] ?></p>
                    </div>
             
            
           
            </a>

            <?php 
              }?>
                 
        </div>
</div><!--/container-wrap-->



<?php get_footer(); ?>