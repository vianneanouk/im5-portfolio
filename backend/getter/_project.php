<?php

function get_project_by_id($id){
    $title = get_the_title($id);
    $image_id = carbon_get_post_meta($id, 'image');
    $image = get_media_by_id(id: $image_id);
    $link = get_permalink($id);
    // -> return data
    return [
        'title' => $title,
        'image' => $image,
        'link' => $link
    ];
}