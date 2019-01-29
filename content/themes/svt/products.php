<?php 
/*template name: Products */

get_header(); 
nectar_page_header($post->ID); 

//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);
?>

<div class="container-wrap">
	
    <!-- Filter and Produkts -->

    <!-- Category Filter -->
	
        <div class="filter--row">
        <div class="filter--container">
                 <a href="#" class="btn">Change to UL</a>
                 <div class="filter--main">
                    <input type="radio" name="product" id="applications" >
                    <label data-filter="applications" class="filter--label" for="applications">Applications</label>
                    <input type="radio" name="product" id="products" checked>
                    <label data-filter="products" class="filter--label" for="products">Products</label>
                    </div>
                 </div>
        </div>

        <!-- Products Filter -->

        <div class="products--wrapper">
            <div class="filter--categories">
                <input type="checkbox" id="all" checked>
                <label class="filter--item" for="all">All</label><br>                 
                 <?php 
                $selected_category = 'products';
                if (isset($_GET['category'])){
                    $selected_category = $_GET['category'];
                } 
                // Products
                 if($selected_category && $selected_category === 'products'){
                    $terms = get_terms('category');
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){                        
                        foreach ( $terms as $term ) {
                            if ($term->name !== 'Products' && $term->name !== 'Applications' && $term->parent === 23){ ?>
                            <input type="checkbox" id="<?= $term->slug?>">
                            <label class="filter--item" for="<?= $term->slug ?>"><?= $term->name?></label><br>
                <?php }}}}
                // Applications
                 if($selected_category && $selected_category === 'applications'){
                    $terms = get_terms('category');
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){                        
                        foreach ( $terms as $term ) {
                            if ($term->name !== 'Products' && $term->name !== 'Applications' && $term->parent === 25){ ?>
                            <input type="checkbox" id="<?= $term->slug?>">
                            <label class="filter--item" for="<?= $term->slug ?>"><?= $term->name?></label><br>
                <?php }}}}
                ?>       
            </div>

            <div class="products--paged">
            <?php 
                if (isset($selected_category)){
                    $selected_category;
                } else {
                    $selected_category = 'products';
                }

                // Product
              if($selected_category != 'applications'){
                query_posts(array('category_name' => $selected_category, 'posts_per_page' => 12, 'paged' => $paged));
                if (have_posts()): while (have_posts()): the_post();        
            ?>               
            <a href="<?php echo get_relative_permalink(get_permalink(get_the_ID())); ?>" class="products--item products <?php 
                //strip_tags(get_the_category_list(" ")) 
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){                    
                    foreach((get_the_category()) as $category) {
                        if ($category->category_parent  == '23') {
                            echo $category->slug. " ";
                        }
                    }
                }        
                ?>">   
                <img src="<?php the_post_thumbnail_url();?>" alt="" class="products--image">
                <div class="products--description">
                    <h3 class="products--title"><?php the_title();?></h3>                        
                    <p class="products--copy"><?=get_post_meta($post->ID, 'post_subtitle', true);?></p>
                </div>
            </a>
                <?php
                 
                    endwhile;endif;

              } else {
                query_posts(array('category_name' => 'applications', 'posts_per_page' => 12, 'paged' => $paged));
                if (have_posts()): while (have_posts()): the_post();        
            ?>               
            <a href="<?php echo get_relative_permalink(get_permalink(get_the_ID())); ?>" class="products--item applications <?php 
                                   
                    foreach((get_the_category()) as $category) {
                        if ($category->category_parent  == '25') {
                            echo $category->slug. " ";
                        }
                    }
                       
                ?>">   
                <img src="<?php the_post_thumbnail_url();?>" alt="" class="products--image">
                <div class="products--description">
                    <h3 class="products--title"><?php the_title();?></h3>                        
                    <p class="products--copy"><?=get_post_meta($post->ID, 'post_subtitle', true);?></p>
                </div>
            </a>
                <?php
                 
                    endwhile;endif;
              }
                    ?>


            
        
        <?php the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => __( '<', 'textdomain' ),
                        'next_text' => __( '>', 'textdomain' ),
                    ) );?>
        </div>
</div><!--/container-wrap-->



<?php get_footer(); ?>