<?php

if (!defined('ABSPATH')) {
    exit;
}

define('DRWORK_VERSION', '1.0.0');

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
    $path = preg_replace('/\.[a-z0-9]+$/i', '', urldecode($asset_path));
    $field = sanitize_title($page_slug . '-' . $path);

    return 'image_' . str_replace('-', '_', $field);
}

function drwork_prepare_static_content(string $content, string $page_slug): string
{
    $content = preg_replace_callback(
        '/(<img\b[^>]*\bsrc=["\'])\/assets\/images\/([^"\']+)(["\'][^>]*>)/i',
        static function (array $matches) use ($page_slug): string {
            $asset_path = $matches[2];
            $fallback = drwork_asset_url('images/' . $asset_path);
            $field_name = drwork_acf_image_field_name($page_slug, $asset_path);
            $image_url = drwork_acf_image_url($field_name, $fallback);

            return $matches[1] . esc_url($image_url) . $matches[3];
        },
        $content
    );

    $page_links = [
        '/index.html' => '/',
        '/technologiak.html' => '/technologiak/',
        '/markak.html' => '/markak/',
        '/kapcsolat.html' => '/kapcsolat/',
        '/adatkezeles.html' => '/adatkezeles/',
        '/impresszum.html' => '/impresszum/',
        '/cookie.html' => '/cookie/',
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
                return 'href="' . esc_url(home_url('/')) . '"';
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

function drwork_module_script_tag(string $tag, string $handle, string $src): string
{
    if ($handle !== 'drwork-main') {
        return $tag;
    }

    return '<script type="module" src="' . esc_url($src) . '"></script>';
}
add_filter('script_loader_tag', 'drwork_module_script_tag', 10, 3);
