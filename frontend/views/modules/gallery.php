<?php
$data   = $args['data'];
$images = $data['gallery'] ?? [];
?>

<?php if (!empty($images)) : ?>
    <section data-module="gallery">
        <div class="slider" data-slider>
            <div class="slider__track" tabindex="0">
                <?php foreach ($images as $image) : ?>
                    <figure class="slider__slide">
                        <img src="<?= esc_url($image['url']) ?>"
                             alt="<?= esc_attr($image['alt']) ?>"
                             loading="lazy">
                    </figure>
                <?php endforeach; ?>
            </div>
            <button class="slider__btn slider__btn--prev" type="button" aria-label="Vorheriges Bild">‹</button>
            <button class="slider__btn slider__btn--next" type="button" aria-label="Nächstes Bild">›</button>
        </div>
    </section>
<?php endif; ?>