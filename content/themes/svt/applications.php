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
    <?php 
        
       
    ?>
	
        <div class="filter--row">
            <div class="filter--container apps">
                 <a target="_blank" rel="noopener noreferrer" href="/content/uploads/2018-03-UL-Broschuere_LQ.pdf" class="btn">Further standards: UL</a>
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
                <?php
            $fire_terms = get_terms(array(
                "parent" => 43,
                "taxonomy" => 'category',    
                ));
            $allowed_terms = get_terms(array(
                "parent" => 53,
                "taxonomy" => 'category',    
                ));
            $install_terms = get_terms(array(
                "parent" => 49,
                "taxonomy" => 'category',    
                ));   
                ?>

      <form action="" class="filter--list" actions="get">
      <!-- Fire Rating -->
        <dl class="toggle--list"><dt class="toggle--header"><p>
            Fire Rating
        </p><span class="filter--arrow"></span></dt>
        <dd class="toggle--body">
      <?php                 
        foreach ( $fire_terms as $i => $term ) {
            if ($term->parent === 43){ ?>
                <input  class="filter--input" type="checkbox" name="filter<?= $i ?>" value="<?= $term->slug?>" id="<?= $term->slug?>">
                <label class="filter--item" for="<?= $term->slug ?>"><?= $term->name?></label><br>
            <?php }}; ?>
        </dd>   </dl> 
        <!-- Allowed Services -->
        <dl class="toggle--list">
        <dt class="toggle--header"><p>
            Allowed Services
        </p><span class="filter--arrow"></span> </dt>
        <dd class="toggle--body">
      <?php                 
        foreach ( $allowed_terms as $i => $term ) {
            if ($term->parent === 53){ ?>
                <input  class="filter--input" type="checkbox" name="filter<?= $i ?>" value="<?= $term->slug?>" id="<?= $term->slug?>">
                <label class="filter--item" for="<?= $term->slug ?>"><?= $term->name?></label><br>
            <?php }}; ?>
            </dd></dl>  
        <!-- Installation in  -->
        <dl class="toggle--list">
        <dt class="toggle--header"><p>
            Installation in
        </p><span class="filter--arrow"></span></dt>
        <dd class="toggle--body">
      <?php                 
        foreach ( $install_terms as $i => $term ) {
            if ($term->parent === 49){ ?>
                <input  class="filter--input" type="checkbox" name="filter<?= $i ?>" value="<?= $term->slug?>" id="<?= $term->slug?>">
                <label class="filter--item" for="<?= $term->slug ?>"><?= $term->name?></label><br>
            <?php }}; ?>
        </dd>    </dl>
<?php
     
     

 
    ?><input id="submit" class="appSubmit" type="submit" value="Filter"></form>  
            </div>

            <div class="products--paged">
            <?php 
         

                // Applications
                $category_list = "";
                
                foreach ($_GET as $key => $value)  {
                    $addition = "";
                    if($value === 0){} else{
                        if (next($_GET)) {$addition = '+';}
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

            
                $applicationsQuery = new WP_Query(array(
                    "cat"       =>  25,
                    "category_name" => $category_list,
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



