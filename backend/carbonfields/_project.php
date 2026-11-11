<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make('post_meta', 'Projekt')
    ->where('post_type', '=', 'project')
    ->add_fields([
        Field::make('image', 'image', 'Beitragsbild')-> set_required(),
        Field::make('textarea', 'description', 'Beschreibung')-> set_required(),
        Field::make('text', 'category', 'Kategorie')-> set_required(),

        Field::make('complex', 'modules', 'Module')
            // PDF
            -> add_fields( 'pdf', 'PDF', [
                Field::make( 'file', 'pdf', 'PDF')
            ])
            // Bildergallerie
            ->add_fields( 'gallery', 'Bildergallerie', [
                Field::make( 'media_gallery', 'gallery', 'Bildergallerie')
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


// -> Funktion, um die Module und die entsprechenden Templates auf der Seite zu laden
// function render_modules (): void {
//  $modules = carbon_get_the_post_meta('modules');
//   js_log(content: $modules);

//   if (empty($modules)) {
//       return;
//  }
//    foreach ($modules as $module) {
        // -> Modifiziere die Daten des Moduls, falls nötig, basierend auf dem Modultyp
//        switch ($module['_type']) {
//            case 'adudio_or_image':
//                $module['image'] = get_media_by_id($module['image'], 'full');
//                break;
//            // todo: add data modifications for modules here as a new case
//        }
        // -> Laden des Templates basierend auf dem Modultyp und weitergeben der Daten
//        get_template_part(
//            'frontend/views/modules/' . $module['_type'],
//            null,
//            [
//                'data' => $module
//            ]
//        );
//    }
// }