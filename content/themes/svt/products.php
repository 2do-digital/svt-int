<?php 
/*template name: Products */

get_header(); 
nectar_page_header($post->ID); 
?>

<div class="container-wrap">
	
    <!-- Filter and Produkts -->

    <!-- Category Filter -->
	
        <div class="filter--row">
            <div class="filter--container">
                 <a href="#" class="btn">Change to UL</a>
                 <div class="filter--main">
                    <input type="radio" name="product" id="applications" >
                    <label onclick="window.location.href='/applications'" data-filter="applications" class="filter--label" for="applications">Applications</label>
                    <input type="radio" name="product" id="products" checked>
                    <label onclick="window.location.href='/products'" data-filter="products" class="filter--label" for="products">Products</label>
                </div>
            </div>
        </div>

        <!-- Products Filter -->

        <div class="products--wrapper">
            <div class="filter--categories">
                <form action="" method="get">
                    <input class="filter--input" type="checkbox" id="all" name="" checked>
                    <label class="filter--item" for="all">All</label><br>                 
                    <?php 
                    $selected_category = 'products';
                    if (isset($_GET['category'])){
                        $selected_category = $_GET['category'];
                    } 
                    // Products
                        $terms = get_terms('category');
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){                        
                            foreach ( $terms as $i => $term ) {
                                if ($term->name !== 'Products' && $term->parent === 23){ ?>
                                <input  class="filter--input" type="checkbox" name="filter<?= $i ?>" value="<?= $term->slug?>" id="<?= $term->slug?>">
                                <label class="filter--item" for="<?= $term->slug ?>"><?= $term->name?></label><br>
                    <?php }}}
                    ?>  <input type="submit" id="submit" value="Filter">
                </form>    
            </div>

            <div class="products--paged">

                <?php 
                        // Products
                        $category_list = "";
                    
                        foreach ($_GET as $key => $value)  {
                            $addition = "";
                            if (next($_GET)) {$addition = ',';}
                            $category_list .= $value . $addition;               
                    }
        
                        $app_args = array();

                        if ( get_query_var('paged') ) {

                            $paged = get_query_var('paged');
                            
                        } elseif ( get_query_var('page') ) {
                        
                            $paged = get_query_var('page');
                            
                        } else {
                        
                            $paged = 1;
                            
                        }

                        
        
                        $products_query = new WP_Query(array(
                            "cat"       =>  23,
                            "category_name" => $category_list,
                            "post_per_page" => 8,
                            "nopaging" => false,
                            "exact"      => true,
                            "paged"     => $paged
        
                        ));
        
                        while($products_query->have_posts()){
                            $products_query->the_post();  
                ?>    

                <a href="<?php echo get_relative_permalink(get_permalink(get_the_ID())); ?>" class="products--item <?php 
                    //strip_tags(get_the_category_list(" ")) 
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){                    
                        foreach((get_the_category()) as $category) {
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
                } ?>

                <div class="pagination">
                    <?php   echo paginate_links( array(
                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'total'        => $products_query->max_num_pages,
                            'current'      => max( 1, get_query_var( 'paged' ) ),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => sprintf( '<i></i> %1$s', __( '<', 'text-domain' ) ),
                            'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
                            'add_args'     => false,
                            'add_fragment' => '',
                        ) );
                    ?>
                </div>
            <?php wp_reset_query(); ?>

            </div>
        </div>
</div><!--/container-wrap -->




<?php get_footer(); ?>



