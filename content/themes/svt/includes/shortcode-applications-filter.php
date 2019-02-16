<?php // Shortcodes Filter

// function filter_applications( $atts ){
//     $a = shortcode_atts( array(
//         'name' => 'Tom'
//      ), $atts );
// 	return `<div class="filter--list><h2>Hier kommt der Inhalt hin, `. $a['name'] . `</h2></div>"`;
// }
// add_shortcode( 'apps', 'filter_applications' );


?>
<?php

// Add Shortcode
function filter_applications( $atts ) {

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

      <form action="/applications" class="filter--list" actions="post">
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
    <?php
    //return $output;
}
add_shortcode( 'application-filter', 'filter_applications' ); ?>