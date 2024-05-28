<?php
// Filter organization schema
add_filter('wpseo_schema_person_user_id', function($author_id){
  return 2;
});

add_action('wpseo_json_ld', 'insert_theme_json_ld');

function insert_theme_json_ld(){

  if(is_admin()) return;

  $theme_schemas = get_field('schemas', 'option');
  $page_schemas = get_field('schemas') ?? array();
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