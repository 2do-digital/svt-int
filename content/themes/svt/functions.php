<?php 

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles');
function salient_child_enqueue_styles() {

    // wp_enqueue_script('vendors.min', get_theme_file_uri('/js/vendors.min.js'), NULL, '1.0', true);
    wp_enqueue_script('main.min', get_theme_file_uri('/js/main.min.js'), NULL, '1.0', true);
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('font-awesome'));

//     if ( is_rtl() ) 
//    		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
}

function get_images_attachment_url()
{
  global $post; 
  $images_urls = array();

  $images_objects = get_attached_media( 'image', $post->ID );

  foreach ($images_objects as $image_object) {
    $images_urls[] = wp_get_attachment_url ($image_object->ID);
  } 
  return $images_urls;
}



?>