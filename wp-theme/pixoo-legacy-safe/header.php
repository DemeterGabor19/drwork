<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="page-bg" aria-hidden="true"></div>

    <header class="site-header" id="top">
      <div class="container nav-wrap">
        <a class="brand" href="<?php echo esc_url(home_url('/fooldal/')); ?>" aria-label="<?php esc_attr_e('Dr.Work kezdőoldal', 'drwork'); ?>">
          <img
            class="brand-logo"
            src="<?php echo esc_url(drwork_acf_image_url('site_header_logo', drwork_asset_url('images/common/logo-fekete_Rajzt%C3%A1bla%201.svg'))); ?>"
            alt="Dr.Work"
          />
        </a>

        <button
          class="menu-toggle"
          id="menuToggle"
          aria-label="<?php esc_attr_e('Menü megnyitása', 'drwork'); ?>"
          aria-expanded="false"
          aria-controls="mainNav"
        >
          <span></span>
          <span></span>
          <span></span>
        </button>

        <nav class="main-nav" id="mainNav">
          <a href="<?php echo esc_url(home_url('/fooldal/')); ?>"><?php esc_html_e('Főoldal', 'drwork'); ?></a>
          <a href="<?php echo esc_url(home_url('/technologiak/')); ?>"><?php esc_html_e('Technológiák', 'drwork'); ?></a>
          <a href="<?php echo esc_url(home_url('/markak/')); ?>"><?php esc_html_e('Márkák', 'drwork'); ?></a>
          <a href="<?php echo esc_url(home_url('/kapcsolat/')); ?>"><?php esc_html_e('Kapcsolat', 'drwork'); ?></a>
        </nav>

        <div class="nav-actions">
          <div class="social-links" aria-label="<?php esc_attr_e('Közösségi média', 'drwork'); ?>">
            <a href="https://www.facebook.com/dr.work" aria-label="Facebook" target="_blank" rel="noopener">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M14.2 8.3V6.9c0-.7.5-1.1 1.2-1.1h1.4V3.3c-.7-.1-1.4-.2-2.1-.2-2.2 0-3.8 1.4-3.8 3.9v1.3H8.5V11h2.4v9.8h3.3V11h2.3l.4-2.7h-2.7Z" />
              </svg>
            </a>
            <a href="https://www.instagram.com/drwork_wear/" aria-label="Instagram" target="_blank" rel="noopener">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <rect x="4" y="4" width="16" height="16" rx="4.5" />
                <circle cx="12" cy="12" r="3.4" />
                <circle cx="16.8" cy="7.2" r="0.9" />
              </svg>
            </a>
          </div>

          <details class="language-switcher">
            <summary aria-label="<?php esc_attr_e('Nyelvválasztás', 'drwork'); ?>">HU</summary>
            <div class="language-menu">
              <a href="<?php echo esc_url(home_url('/fooldal/')); ?>" aria-current="true">Magyar</a>
              <a href="<?php echo esc_url(home_url('/en/')); ?>">English</a>
              <a href="<?php echo esc_url(home_url('/de/')); ?>">Deutsch</a>
            </div>
          </details>
        </div>

        <a class="btn btn-outline hide-mobile" href="<?php echo esc_url(home_url('/kapcsolat/#ajanlatkeres')); ?>">
          <?php esc_html_e('Ajánlatot kérek', 'drwork'); ?>
        </a>
      </div>
    </header>
