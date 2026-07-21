<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
    <footer class="site-footer">
      <div class="container footer-grid">
        <div>
          <a class="brand footer-brand" href="<?php echo esc_url(home_url('/fooldal/')); ?>">
            <img
              class="brand-logo"
              src="<?php echo esc_url(drwork_acf_image_url('site_footer_logo', drwork_asset_url('images/common/logo.png'))); ?>"
              alt="Dr.Work"
            />
          </a>
          <p data-i18n="footer.tagline">Egyedi munkaruhák, profin nyomtatva.</p>
        </div>
        <div>
          <h3 data-i18n="footer.quickLinks">Gyors linkek</h3>
          <a href="<?php echo esc_url(home_url('/technologiak/')); ?>" data-i18n="nav.technologies">Technológiák</a>
          <a href="<?php echo esc_url(home_url('/markak/')); ?>" data-i18n="nav.brands">Márkák</a>
          <a href="<?php echo esc_url(home_url('/kapcsolat/')); ?>" data-i18n="nav.contact">Kapcsolat</a>
        </div>
        <div>
          <h3 data-i18n="footer.contact">Kapcsolat</h3>
          <a href="tel:+36704515370">+36704515370</a>
          <a href="mailto:iroda@drwork.hu">iroda@drwork.hu</a>
          <p data-i18n="footer.address">6400 Kiskunhalas, Kéve utca 26.</p>
        </div>
      </div>
      <div class="container footer-bottom">
        <p data-i18n="footer.copyright" data-i18n-html>© <span id="year"></span> Dr.Work. Minden jog fenntartva.</p>
        <div class="footer-legal-links">
          <a href="<?php echo esc_url(home_url('/adatkezeles/')); ?>" data-i18n="footer.privacy">Adatkezelés</a>
          <a href="<?php echo esc_url(home_url('/impresszum/')); ?>" data-i18n="footer.legalNotice">Impresszum</a>
          <a href="<?php echo esc_url(home_url('/cookie-tajekoztato/')); ?>" data-i18n="footer.cookie">Cookie tájékoztató</a>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
