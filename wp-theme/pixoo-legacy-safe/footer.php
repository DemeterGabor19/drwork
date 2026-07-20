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
          <p><?php esc_html_e('Egyedi munkaruhák, profin nyomtatva.', 'drwork'); ?></p>
        </div>
        <div>
          <h3><?php esc_html_e('Gyors linkek', 'drwork'); ?></h3>
          <a href="<?php echo esc_url(home_url('/technologiak/')); ?>"><?php esc_html_e('Technológiák', 'drwork'); ?></a>
          <a href="<?php echo esc_url(home_url('/markak/')); ?>"><?php esc_html_e('Márkák', 'drwork'); ?></a>
          <a href="<?php echo esc_url(home_url('/kapcsolat/')); ?>"><?php esc_html_e('Kapcsolat', 'drwork'); ?></a>
        </div>
        <div>
          <h3><?php esc_html_e('Kapcsolat', 'drwork'); ?></h3>
          <a href="tel:+36704515370">+36704515370</a>
          <a href="mailto:iroda@drwork.hu">iroda@drwork.hu</a>
          <p>6400 Kiskunhalas, Kéve utca 26.</p>
        </div>
      </div>
      <div class="container footer-bottom">
        <p>© <span id="year"></span> Dr.Work. <?php esc_html_e('Minden jog fenntartva.', 'drwork'); ?></p>
        <div class="footer-legal-links">
          <a href="<?php echo esc_url(home_url('/adatkezeles/')); ?>"><?php esc_html_e('Adatkezelés', 'drwork'); ?></a>
          <a href="<?php echo esc_url(home_url('/impresszum/')); ?>"><?php esc_html_e('Impresszum', 'drwork'); ?></a>
          <a href="<?php echo esc_url(home_url('/cookie-tajekoztato/')); ?>"><?php esc_html_e('Cookie tájékoztató', 'drwork'); ?></a>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
