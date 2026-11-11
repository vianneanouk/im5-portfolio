<?php
$project = get_project_by_id(id: get_the_ID());
js_log(content: $project);
?>



<main data-page="project">
    <p class="category"><?= $project['category']?></p>
    <div class="projects-link"><a class="projects-link1" href="/projekt" >Alle Projekte</a></div>
    <h1><?= $project['title'] ?></h1>
    <p><?= $project['description'] ?></p>
    <?php render_modules(); ?>
</main>