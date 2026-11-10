<?php


function get_project_by_id(int $id): array {
    // -> collect data
    $title = get_the_title($id);
    $image_id = carbon_get_post_meta($id, 'image');
    $image = get_media_by_id(id: $image_id);
    $description = carbon_get_post_meta($id, 'description');
    $file = carbon_get_post_meta($id, 'crb_file');
    $media_gallery = carbon_get_post_meta($id, 'crb_media_gallery');
    // -> return data
    return [
        'title' => $title,
        'image' => $image,
        'description' => $description,
        'file' => $file,
        'media_gallery' => $media_gallery,
    ];
}