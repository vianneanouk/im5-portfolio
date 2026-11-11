<?php
$data = $args['data'];
$url  = $data['link'] ?? '';

$type = 'link';
$id   = '';

if (!empty($url)) {
    $host = preg_replace('/^www\./', '', wp_parse_url($url, PHP_URL_HOST) ?: '');
    $path = wp_parse_url($url, PHP_URL_PATH) ?: '';
    parse_str(wp_parse_url($url, PHP_URL_QUERY) ?: '', $query);

    if ($host === 'youtu.be') {
        $id   = ltrim($path, '/');
        $type = 'youtube';
    } elseif (in_array($host, ['youtube.com', 'm.youtube.com'], true)) {
        if (preg_match('#^/shorts/([\w-]+)#', $path, $m)) {
            $id   = $m[1];
            $type = 'youtube-short';
        } elseif (!empty($query['v'])) {
            $id   = $query['v'];
            $type = 'youtube';
        }
    } elseif ($host === 'open.spotify.com' && preg_match('#/(show|episode)/(\w+)#', $path, $m)) {
        $id   = $m[1] . '/' . $m[2];
        $type = 'spotify';
    }

    // YouTube-IDs bestehen nur aus Buchstaben, Zahlen, - und _
    if (in_array($type, ['youtube', 'youtube-short'], true) && !preg_match('/^[\w-]{6,15}$/', $id)) {
        $type = 'link';
    }
}
?>

<?php if (!empty($url)) : ?>
    <section data-module="link" data-embed="<?= esc_attr($type) ?>">

        <?php if ($type === 'youtube' || $type === 'youtube-short') : ?>
            <div class="embed embed--<?= esc_attr($type) ?>">
                <iframe src="https://www.youtube-nocookie.com/embed/<?= esc_attr($id) ?>"
                        title="YouTube-Video"
                        loading="lazy"
                        allow="accelerometer; encrypted-media; picture-in-picture; fullscreen"
                        allowfullscreen></iframe>
            </div>

        <?php elseif ($type === 'spotify') : ?>
            <div class="embed embed--spotify">
                <iframe src="https://open.spotify.com/embed/<?= esc_attr($id) ?>"
                        title="Spotify"
                        loading="lazy"
                        allow="encrypted-media"></iframe>
            </div>

        <?php else : ?>
            <a href="<?= esc_url($url) ?>" target="_blank" rel="noopener" class="project-link">
                <?= esc_html(wp_parse_url($url, PHP_URL_HOST) ?: $url) ?>
            </a>
        <?php endif; ?>

    </section>
<?php endif; ?>