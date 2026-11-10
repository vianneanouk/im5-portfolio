<?php
$project = get_project_by_id(id: get_the_ID());
js_log(content: $project);
?>

<main data-page="project">
    <p class="category"><?= $project['category']?></p>
    <div><a class="projects-link" href="/projekt" >Alle Projekte</a></div>
    <h1><?= $project['title'] ?></h1>
    <p><?= $project['description'] ?></p>
    <div>
        <?php if (!empty($project['file'])):
            $file_id   = (int) $project['file'];
            $file_url  = wp_get_attachment_url($file_id);
            $mime      = get_post_mime_type($file_id); // z. B. audio/mpeg, image/jpeg
            ?>
            <div>
                <?php if (str_starts_with($mime, 'audio/')): ?>
                    <audio controls src="<?= esc_url($file_url) ?>"></audio>
                <?php elseif (str_starts_with($mime, 'image/')): ?>
                    <?= wp_get_attachment_image($file_id, 'large') ?>
                <?php else: ?>
                    <a href="<?= esc_url($file_url) ?>" download>Datei herunterladen</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <div>
        <?php if (!empty($project['media_gallery'])): ?>
            <div class="slider" data-slider>
                <div class="slider__track">
                    <?php foreach ($project['media_gallery'] as $image_id): ?>
                        <figure class="slider__slide">
                            <?= wp_get_attachment_image($image_id, 'large') ?>
                        </figure>
                    <?php endforeach; ?>
                </div>
                <button class="slider__btn slider__btn--prev" type="button" aria-label="Vorheriges Bild">‹</button>
                <button class="slider__btn slider__btn--next" type="button" aria-label="Nächstes Bild">›</button>
            </div>
        <?php endif; ?>
    </div>
    <div>
        <?= wpautop($project['content']) ?>
    </div>

</main>