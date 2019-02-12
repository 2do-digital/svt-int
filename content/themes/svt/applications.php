<?php 
/*template name: Applications */

get_header(); 
nectar_page_header($post->ID); 

//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);

// Get Variablen anhängen

function addOrUpdateUrlParam($name, $value)
{
    $params = $_GET;
    unset($params[$name]);
    $params[$name] = $value;
    return basename($_SERVER['PHP_SELF']).'?'.http_build_query($params);
}







?>

<div class="container-wrap">
	
    <!-- Filter and Produkts -->

    <!-- Category Filter -->
	
        <div class="filter--row">
            <div class="filter--container">
                 <a href="#" class="btn">Change to UL</a>
                 <div class="filter--main">
                    <input type="radio" name="product" id="applications" checked>
                    <label onclick="window.location.href='/applications'" data-filter="applications" class="filter--label" for="applications">Applications</label>
                    <input type="radio" name="product" id="products" >
                    <label onclick="window.location.href='/products'" data-filter="products" class="filter--label" for="products">Products</label>
                </div>
            </div>
        </div>

        <!-- Products Filter -->

        <div class="products--wrapper">
            <div class="filter--categories">
            <form action="" method="get">
            <?php 

            // wp_list_categories(array(
            //     'child_of' => 43,
            //     'show_option_all' => 'Show all',        
            // ));

         //print(get_category(43));
    
           
                //   Fire-Rating
                     wp_dropdown_categories(array(
                                 
                        'show_option_all' => 'Fire Rating',
                        'child_of' => 43,
                        'name' => 'firerating',
                        'hierarchical' => 1,
                        'tab_index' => 1, 
                        'selected' => isset($_GET['firerating']) ? $_GET['firerating'] : 0,
                        'class' => "filter--dropdown",
                        'taxonomy' => 'category',
                        'value_field' => 'slug'
                        )
                     );
                     
                     
                //   Allowed-services
                wp_dropdown_categories(array(
                    'show_option_all' => "Allowed Services",
                    'child_of' => 53,
                    'name' => 'allowed',
                    'hierarchical' => 1,
                    'tab_index' => 1, 
                    'selected' => isset($_GET['allowed']) ? $_GET['allowed'] : 0,
                    'class' => "filter--dropdown",
                    'taxonomy' => 'category',
                    'value_field' => 'slug'
                ));
                        
                //   Installation in
                    wp_dropdown_categories(array(
                        'show_option_all' => "Installation in",
                        'child_of' => 49,
                        'name' => 'installation',
                        'hierarchical' => 1,
                        'tab_index' => 1, 
                        'selected' => isset($_GET['installation']) ? $_GET['installation'] : 0,
                        'class' => "filter--dropdown",
                        'taxonomy' => 'category',
                        'value_field' => 'slug'
                    ));
                     ?>
                     
                 
                <input id="submit" class="appSubmit" type="submit" value="Filter"> </form>    
            </div>

            <div class="products--paged">
            <?php 
         

                // Applications
                $category_list = "";
                
                foreach ($_GET as $key => $value)  {
                    $addition = "";
                    if($value === 0){} else{
                        if (next($_GET)) {$addition = ',';}
                        $category_list .= $value . $addition;               
                    }
            }

                $app_args = array();


                // Check for static Page

                if ( get_query_var('paged') ) {
                    $paged = get_query_var('paged');                    
                } elseif ( get_query_var('page') ) {                
                    $paged = get_query_var('page');                    
                } else {                
                    $paged = 1;                    
                }

          

                $category_names = array();

                if(isset($_GET['firerating']) || isset($_GET['allowed']) || isset($_GET['installation'])){
                    $fire = $_GET['firerating'];
                    $allow = $_GET['allowed'];
                    $install = $_GET['installation'];
                    isset($fire) && $fire !== "0" ? array_push($category_names, $fire) : null;
                    isset($allow) && $allow !== "0" ? array_push($category_names, $allow) : null;
                    isset($install) && $install !== "0" ? array_push($category_names, $install) : null;

                    $output_cats = "";
                    for($i = 0; $i < count($category_names); $i++){
                        $output_cats .= $category_names[$i];
                        $output_cats .= $i < count($category_names) - 1 ? "+" : "";                        
                    }
      
                } else { 
                    $output_cats = 'applications';}
        

            
                $applicationsQuery = new WP_Query(array(
                    "cat"       =>  25,
                    "category_name" => $output_cats,
                    //"exact"     => true,
                    "post_per_page" => 8,
                    "nopaging" => false,
                    "paged" => $paged

                ));


                while($applicationsQuery->have_posts()){
                    $applicationsQuery->the_post();
                
     
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
                }

                if(!$applicationsQuery->have_posts()){
                    echo "No results for your search";
                };
                ?>
                <div class="pagination"> 

                    <?php   echo paginate_links( array(
                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'total'        => $applicationsQuery->max_num_pages,
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
                <?php wp_reset_postdata(); ?>
            </div>
        </div>

</div><!--/container-wrap -->




<?php get_footer(); ?>



