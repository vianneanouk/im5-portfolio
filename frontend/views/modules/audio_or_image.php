<?php
$data  = $args['data'];
$media = $data['audio_or_image'] ?? [];
?>

<?php if (!empty($media['url'])) : ?>
    <section data-module="audio_or_image">
        <?php if ($media['kind'] === 'audio') : ?>
            <audio controls src="<?= esc_url($media['url']) ?>"></audio>
        <?php else : ?>
            <img src="<?= esc_url($media['url']) ?>" alt="<?= esc_attr($media['alt']) ?>">
        <?php endif; ?>
    </section>
<?php endif; ?>