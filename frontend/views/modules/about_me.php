<?php
$data = $args['data'];
js_log(content:$data);
?>

<section data-module="about_me">
    <h1><?= $data['title'] ?></h1>
    <div class="content">
        <div class="description">
        <p><?= $data['description'] ?></p>
         <img class="icon" src="<?= $data['icon']['src'] ?>" alt="<?= $data['icon']['alt'] ?>">
        </div>
        <img class="image" src="<?= $data['image']['src'] ?>" alt="<?= $data['image']['alt'] ?>">
    </div>
</section>
