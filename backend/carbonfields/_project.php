<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make('post_meta', 'Projekt')
    ->where('post_type', '=', 'project')
    ->add_fields([
        Field::make('image', 'image', 'Beitragsbild')-> set_required(),
        Field::make('textarea', 'description', 'Beschreibung')-> set_required(),
        Field::make('text', 'category', 'Kategorie')-> set_required(),

        Field::make('complex', 'project_modules', 'Module')
            // PDF
            -> add_fields( 'pdf', 'PDF', [
                Field::make( 'file', 'pdf', 'PDF')
            ])
            // Bildergallerie
            ->add_fields( 'gallery', 'Bildergalerie', [
                Field::make( 'media_gallery', 'gallery', 'Bildergalerie')
                    ->set_type( array( 'image' ) )
            ])
            // Audio oder Bild
            ->add_fields( 'audio_or_image', 'Audio oder Bild', [
                Field::make( 'file', 'audio_or_image', 'Audio oder Bild' )
                ->set_type( array( 'audio', 'image' ) )
            ])
            // Link
            ->add_fields( 'link', 'Link', [
                Field::make( 'text', 'link', 'Link')
            ])

]);
