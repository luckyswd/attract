<?php
// Filter organization schema
add_filter('wpseo_schema_person_user_id', function($author_id){
  if(is_singular('post')){
    return 2;
  }
  return $author_id;
});

add_action('wpseo_json_ld', 'insert_theme_json_ld', 3);

function insert_theme_json_ld(){

  if(is_admin() || wp_doing_ajax()) return;

  $theme_schemas = get_field('schemas', 'option');
  $page_schemas = get_field('schemas');
  if(empty($page_schemas)){
    $page_schemas = array();
  }
  $schemas = array_unique($theme_schemas + $page_schemas);

  // параметры по умолчанию
  $my_posts = get_posts( array(
    'include'     => $schemas,
    'post_type'   => 'schemas',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
  ) );

  global $post;

  foreach( $my_posts as $post ){
    setup_postdata( $post );

    the_content();

    // формат вывода the_title() ...
  }

  wp_reset_postdata(); // сброс

  // var_dump($theme_schemas);
  // var_dump($page_schemas);
  // var_dump($schemas);

}