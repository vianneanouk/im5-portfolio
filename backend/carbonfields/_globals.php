<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Inhaltsfeld-Konfiguration der globalen Einstellungen des Themes
Container::make('theme_options', 'Globales')
    ->add_fields([
        Field::make('image', 'logo', 'Logo'),
        Field::make('complex', 'socials', 'Socials' )
            ->add_fields([
                Field::make('text', 'title', 'Titel')->set_required( true ),
                Field::make('text', 'link', 'Link')->set_required( true ),
                Field::make('image', 'icon', 'Icon')->set_required( true )
                ])

        ->set_header_template('<% if (title) { %> <%- title %><% } %>')
        ->set_layout('tabbed-vertical')

        // todo: Globale Inhaltsfelder hier ergänzen
    ]);
