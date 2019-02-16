<?php // Shortcodes Filter

// Add Shortcode
function filter_products( $atts ) {

   ?>

      <form action="/products" class="filter--list" actions="post"><div id="product--filter">
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
                    <?php }}} ?></div>
      <input id="submit" class="appSubmit" type="submit" value="Filter"></form>
    <?php
    //return $output;
}
add_shortcode( 'product-filter', 'filter_products' ); ?>