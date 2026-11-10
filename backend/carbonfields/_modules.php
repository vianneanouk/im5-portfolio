<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Konfiguration der verschiedenen Module
Container::make('post_meta', 'Module')
    ->where('post_type', '=', 'page')
    ->add_fields([
        Field::make('complex', 'modules', 'Module')
            // -> example
            ->add_fields('example', 'Beispiel', [
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('image', 'image', 'Bild')->set_required(),
            ])
            // -> hero_front
            ->add_fields('hero_front', 'Hero Startseite', [
                Field::make('text', 'title', 'Titel'),
                Field::make('text', 'name', 'Name'),
            ])
            // -> overview_projects
            ->add_fields('overview_projects', 'Übersicht Projekte', [
                Field::make('text', 'title', 'Titel'),
                Field::make('association', 'selection', 'Auswahl Projekte' )
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'project',
                        ]
                    ]),
                Field::make('text', 'link', 'Link'),
            ])

            // -> about_me
            ->add_fields('about_me', 'Über mich', [
                Field::make('text', 'title', 'Titel'),
                Field::make('image', 'image', 'Bild'),
                Field::make('textarea', 'description', 'Beschreibung'),
                Field::make('image', 'icon', 'Icon'),
            ])

            // todo: add new modules here
            // -> SETTINGS
            ->set_layout('tabbed-vertical')
    ]);

// -> Funktion, um die Module und die entsprechenden Templates auf der Seite zu laden
function render_modules (): void {
    $modules = carbon_get_the_post_meta('modules');
    js_log(content:$modules);
    if (empty($modules)) {
        return;
    }
    foreach ($modules as $module) {
        // -> Modifiziere die Daten des Moduls, falls nötig, basierend auf dem Modultyp
        switch ($module['_type']) {
            case 'example':
                $module['image'] = get_media_by_id($module['image'], 'full');
                break;
            case 'overview_projects':
                $module['selection'] = array_map( callback: function($item) {
                    return (int) $item['id'];
                }, array: $module['selection'] );
                break;
            case 'about_me':
                $module['image'] = get_media_by_id($module['image'], 'full');
                $module['icon'] = get_media_by_id($module['icon'], 'full');
                break;
                // todo: add data modifications for modules here as a new case
        }
        // -> Laden des Templates basierend auf dem Modultyp und weitergeben der Daten
        get_template_part(
            'frontend/views/modules/' . $module['_type'],
            null,
            [
                'data' => $module
            ]
        );
    }
}
