<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make('post_meta', 'Projekt')
    ->where('post_type', '=', 'project')
    ->add_fields([
        Field::make('image', 'image', 'Beitragsbild'),
        Field::make('text', 'title', 'Titel'),
        Field::make('rich_text', 'content', 'Inhalt')


]);
