<?php
$data = $args['data'];
js_log(content:$data);
?>

<section data-module="about_me">
    <h1><?= $data['title'] ?></h1>
    <img class="image" src="<?= $data['image']['src'] ?>" alt="<?= $data['image']['alt'] ?>">
    <p><?= $data['description'] ?></p>
    <img class="icon" src="<?= $data['icon']['src'] ?>" alt="<?= $data['icon']['alt'] ?>">
</section>
