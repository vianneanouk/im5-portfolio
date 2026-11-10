<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make('post_meta', 'Projekt')
    ->where('post_type', '=', 'project')
    ->add_fields([
        Field::make('image', 'image', 'Beitragsbild')-> set_required(),
        Field::make('textarea', 'description', 'Beschreibung')-> set_required(),
        Field::make( 'file', 'crb_file', __( 'File' ) )
            ->set_type( array( 'audio', 'image' ) ),
        Field::make( 'media_gallery', 'crb_media_gallery', __( 'Media Gallery' ) )
            ->set_type( array( 'image' ) ),
        Field::make('rich_text', 'content', 'übriger Inhalt'),

]);
