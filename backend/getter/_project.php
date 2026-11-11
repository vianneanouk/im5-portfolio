<?php


function get_project_by_id(int $id): array {
    // -> collect data
    $title = get_the_title($id);
    $category = carbon_get_post_meta($id, 'category');
    $image_id = carbon_get_post_meta($id, 'image');
    $image = get_media_by_id(id: $image_id);
    $description = carbon_get_post_meta($id, 'description');
    $link = get_permalink($id);
    // -> return data
    return [
        'title' => $title,
        'category' => $category,
        'link' => $link,
        'image' => $image,
        'description' => $description,
    ];
}