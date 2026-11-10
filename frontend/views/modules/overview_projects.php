<?php
$data = $args['data'];
?>

<section data-module="overview_projects">
    <h1><?= $data['title'] ?></h1>
    <div class="projects">
        <?php foreach ($data['selection'] as $project_id) : ?>
        <?php
            $project = get_project_by_id(id: $project_id);
        ?>
            <a href="<?= $project['link'] ?>" target="_self">
                <img src="<?= $project['image'] ['src'] ?>" alt="<?= $project['image'] ['alt'] ?>">
            </a>
        <?php endforeach; ?>
    </div>
    <a href="/projekte" target="_self" class="projects-link">
        <?= esc_html($data['link']) ?>
    </a>
</section>
