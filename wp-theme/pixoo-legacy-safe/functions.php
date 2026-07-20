<?php

if (!defined('ABSPATH')) {
    exit;
}

define('DRWORK_VERSION', '1.2.2');

function drwork_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'drwork_setup');

function drwork_asset_url(string $path): string
{
    return get_template_directory_uri() . '/assets/' . ltrim($path, '/');
}

function drwork_acf_image_url(string $field_name, string $fallback_url): string
{
    if (function_exists('get_field')) {
        $value = get_field($field_name);

        if (is_array($value) && !empty($value['url'])) {
            return $value['url'];
        }

        if (is_numeric($value)) {
            $url = wp_get_attachment_image_url((int) $value, 'full');
            if ($url) {
                return $url;
            }
        }

        if (is_string($value) && $value !== '') {
            return $value;
        }
    }

    return $fallback_url;
}

function drwork_acf_image_field_name(string $page_slug, string $asset_path): string
{
    $decoded_path = urldecode($asset_path);
    $explicit_fields = [
        'home|icons/méret.png' => 'home_size_image',
        'home|icons/GLS.png' => 'home_delivery_image',
    ];
    $explicit_key = $page_slug . '|' . $decoded_path;

    if (isset($explicit_fields[$explicit_key])) {
        return $explicit_fields[$explicit_key];
    }

    $path = preg_replace('/\.[a-z0-9]+$/i', '', $decoded_path);
    $field = sanitize_title($page_slug . '-' . $path);

    return 'image_' . str_replace('-', '_', $field);
}

function drwork_image_should_stay_theme_asset(string $image_prefix, string $asset_path): bool
{
    $decoded_path = urldecode($asset_path);

    if (strpos($decoded_path, 'cloths/') === 0) {
        return true;
    }

    if (strpos($image_prefix, 'data-mockup-') !== false || strpos($image_prefix, 'mockup-') !== false) {
        return true;
    }

    if ($decoded_path === 'common/logo.png' && strpos($image_prefix, 'brand-logo') === false) {
        return true;
    }

    return false;
}

function drwork_prepare_static_content(string $content, string $page_slug): string
{
    $content = preg_replace_callback(
        '/(<img\b[^>]*\bsrc=["\'])\/assets\/images\/([^"\']+)(["\'][^>]*>)/i',
        static function (array $matches) use ($page_slug): string {
            $asset_path = $matches[2];
            $fallback = drwork_asset_url('images/' . $asset_path);

            if (drwork_image_should_stay_theme_asset($matches[1], $asset_path)) {
                return $matches[1] . esc_url($fallback) . $matches[3];
            }

            $field_name = drwork_acf_image_field_name($page_slug, $asset_path);
            $image_url = drwork_acf_image_url($field_name, $fallback);

            return $matches[1] . esc_url($image_url) . $matches[3];
        },
        $content
    );

    $page_links = [
        '/index.html' => '/fooldal/',
        '/technologiak.html' => '/technologiak/',
        '/markak.html' => '/markak/',
        '/kapcsolat.html' => '/kapcsolat/',
        '/adatkezeles.html' => '/adatkezeles/',
        '/impresszum.html' => '/impresszum/',
        '/cookie.html' => '/cookie-tajekoztato/',
    ];

    $content = preg_replace_callback(
        '/href=["\']([^"\']+)["\']/i',
        static function (array $matches) use ($page_links): string {
            $href = $matches[1];

            foreach ($page_links as $static_path => $wp_path) {
                if ($href === $static_path || strpos($href, $static_path . '#') === 0) {
                    $anchor = strpos($href, '#') !== false ? substr($href, strpos($href, '#')) : '';
                    return 'href="' . esc_url(home_url($wp_path . $anchor)) . '"';
                }
            }

            if ($href === '/') {
                return 'href="' . esc_url(home_url('/fooldal/')) . '"';
            }

            return $matches[0];
        },
        $content
    );

    return $content;
}

function drwork_render_static_fragment(string $page_slug, string $template_name): void
{
    $file = get_template_directory() . '/template-parts/static/' . $template_name . '.php';

    if (!file_exists($file)) {
        return;
    }

    ob_start();
    include $file;
    $content = ob_get_clean();

    echo '<main>';
    echo drwork_prepare_static_content($content, $page_slug); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo '</main>';
}

function drwork_enqueue_assets(): void
{
    wp_enqueue_style(
        'drwork-main',
        drwork_asset_url('css/main.css'),
        [],
        DRWORK_VERSION
    );

    wp_enqueue_script(
        'drwork-main',
        drwork_asset_url('js/main.js'),
        [],
        DRWORK_VERSION,
        true
    );

    wp_add_inline_script(
        'drwork-main',
        'window.drworkTheme = ' . wp_json_encode([
            'assetsUrl' => get_template_directory_uri() . '/assets',
        ]) . ';',
        'before'
    );
}
add_action('wp_enqueue_scripts', 'drwork_enqueue_assets');

function drwork_preload_assets(): void
{
    echo '<link rel="preload" href="' . esc_url(drwork_asset_url('fonts/Bebas_Neue/BebasNeue-Regular.ttf')) . '" as="font" type="font/ttf" crossorigin>' . "\n";

    if (is_front_page() || is_page_template('page-home.php')) {
        $hero_image = drwork_acf_image_url(
            'image_home_home_hero_img',
            drwork_asset_url('images/home/Hero%20img.png')
        );
        echo '<link rel="preload" href="' . esc_url($hero_image) . '" as="image" fetchpriority="high">' . "\n";
    }
}
add_action('wp_head', 'drwork_preload_assets', 1);

function drwork_seo_data(): array
{
    $default = [
        'title' => 'Egyedi munkaruha nyomtatás és hímzés | Dr.Work',
        'description' => 'Egyedi munkaruhák, céges pólók, hímzés és DTF/DTG nyomtatás látványtervvel, gyors gyártással és GLS szállítással.',
        'path' => '/fooldal/',
        'robots' => 'index, follow',
    ];

    $pages = [
        'technologiak' => [
            'title' => 'Nyomtatási technológiák | DTF, DTG, hímzés | Dr.Work',
            'description' => 'DTF és DTG nyomtatás, hímzés, nyakpánt, tarisznya és logótervezés egyedi céges munkaruhákhoz és promóciós termékekhez.',
            'path' => '/technologiak/',
            'robots' => 'index, follow',
        ],
        'markak' => [
            'title' => 'Munkaruha márkák céges ruházathoz | Dr.Work',
            'description' => 'Munkaruha márkák céges ruházathoz és logózott pólókhoz: Malfini, Snickers Workwear, Craft, Cerva, Gildan, Kariban, Rimeck és Sol\'s.',
            'path' => '/markak/',
            'robots' => 'index, follow',
        ],
        'kapcsolat' => [
            'title' => 'Munkaruha ajánlatkérés és kapcsolat | Dr.Work',
            'description' => 'Kérj ajánlatot egyedi munkaruhára, logózásra vagy céges ruházatra. Írd meg az elképzelésed, és segítünk a megfelelő megoldásban.',
            'path' => '/kapcsolat/',
            'robots' => 'index, follow',
        ],
        'adatkezeles' => [
            'title' => 'Adatkezelési tájékoztató | Dr.Work',
            'description' => 'A Dr.Work adatkezelési tájékoztatója kapcsolatfelvételhez, ajánlatkéréshez és weboldalhasználathoz.',
            'path' => '/adatkezeles/',
            'robots' => 'noindex, follow',
        ],
        'impresszum' => [
            'title' => 'Impresszum | Dr.Work',
            'description' => 'A Dr.Work weboldal impresszuma és üzemeltetői adatai.',
            'path' => '/impresszum/',
            'robots' => 'noindex, follow',
        ],
        'cookie' => [
            'title' => 'Cookie tájékoztató | Dr.Work',
            'description' => 'A Dr.Work weboldal cookie tájékoztatója.',
            'path' => '/cookie-tajekoztato/',
            'robots' => 'noindex, follow',
        ],
    ];

    if (is_404()) {
        return [
            'title' => '404 - Az oldal nem található | Dr.Work',
            'description' => 'A keresett Dr.Work oldal nem található. Térj vissza a főoldalra, vagy kérj ajánlatot egyedi munkaruhára.',
            'path' => '',
            'robots' => 'noindex, follow',
        ];
    }

    if (is_front_page() || is_page('fooldal') || is_page_template('page-home.php')) {
        return $default;
    }

    foreach ($pages as $slug => $data) {
        $page_slugs = $slug === 'cookie' ? ['cookie', 'cookie-tajekoztato'] : [$slug];

        if (is_page($page_slugs) || is_page_template('page-' . $slug . '.php')) {
            return $data;
        }
    }

    return $default;
}

function drwork_seo_plugin_is_active(): bool
{
    return defined('RANK_MATH_VERSION')
        || defined('WPSEO_VERSION')
        || defined('AIOSEO_VERSION')
        || class_exists('RankMath');
}

function drwork_document_title_parts(array $title): array
{
    if (drwork_seo_plugin_is_active()) {
        return $title;
    }

    $seo = drwork_seo_data();
    $title['title'] = $seo['title'];
    unset($title['site'], $title['tagline']);

    return $title;
}
add_filter('document_title_parts', 'drwork_document_title_parts', 20);

function drwork_fallback_seo_meta(): void
{
    if (drwork_seo_plugin_is_active()) {
        return;
    }

    $seo = drwork_seo_data();
    $canonical = $seo['path'] !== '' ? home_url($seo['path']) : '';

    echo '<meta name="description" content="' . esc_attr($seo['description']) . '">' . "\n";
    echo '<meta name="robots" content="' . esc_attr($seo['robots']) . '">' . "\n";

    if ($canonical !== '') {
        echo '<link rel="canonical" href="' . esc_url($canonical) . '">' . "\n";
    }

    echo '<meta property="og:locale" content="hu_HU">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($seo['title']) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($seo['description']) . '">' . "\n";

    if ($canonical !== '') {
        echo '<meta property="og:url" content="' . esc_url($canonical) . '">' . "\n";
    }

    echo '<meta property="og:site_name" content="Dr.Work">' . "\n";
}
add_action('wp_head', 'drwork_fallback_seo_meta', 5);

function drwork_module_script_tag(string $tag, string $handle, string $src): string
{
    if ($handle !== 'drwork-main') {
        return $tag;
    }

    return '<script type="module" src="' . esc_url($src) . '"></script>';
}
add_filter('script_loader_tag', 'drwork_module_script_tag', 10, 3);
