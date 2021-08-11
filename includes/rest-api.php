<?php
add_action( 'rest_api_init', function () {
  register_rest_route( 'sppr/v1', '/projects/list', array(
    'methods' => 'GET',
    'callback' => 'sppr_projects_func',
    'permission_callback' => '__return_true',
  ) );
} );


function sppr_projects_func()
{
    $data =[];
    $data['risks'] = SPPRTemplates::$risks;
    $data['networks'] = SPPRTemplates::$networks;
    $data['posts'] = SPPRProjectHelper::get_posts_meta();
   return $data;
}

