<?php
$data = $args['data'];
$pdf  = $data['pdf'] ?? [];
$url  = $pdf['url'] ?? '';
?>

<?php if (!empty($url)) : ?>
    <section data-module="pdf">
        <object class="pdf__preview"
                data="<?= esc_url($url) ?>#toolbar=0&navpanes=0&view=FitH"
                type="application/pdf">
            <p>Die Vorschau wird in deinem Browser nicht unterstützt.</p>
        </object>

        <a href="<?= esc_url($url) ?>" download class="pdf__download">
            <?= esc_html($pdf['title'] ?: 'PDF') ?> herunterladen
        </a>
    </section>
<?php endif; ?>