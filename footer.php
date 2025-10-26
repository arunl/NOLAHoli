<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>About NOLA Holi</h3>
                <p>Celebrating the ancient Indian festival of colors in the heart of New Orleans and bringing communities together.</p>
                <div class="social-links">
                    <?php
                    $facebook = get_theme_mod('nolaholi_facebook');
                    $instagram = get_theme_mod('nolaholi_instagram');
                    $twitter = get_theme_mod('nolaholi_twitter');
                    
                    if ($facebook) : ?>
                        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="Facebook">
                            <span>f</span>
                        </a>
                    <?php endif;
                    
                    if ($instagram) : ?>
                        <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="Instagram">
                            <span>📷</span>
                        </a>
                    <?php endif;
                    
                    if ($twitter) : ?>
                        <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="Twitter">
                            <span>🐦</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    'container'      => false,
                    'fallback_cb'    => 'nolaholi_footer_menu_fallback',
                ));
                ?>
            </div>
            
            <div class="footer-section">
                <h3>Event Info</h3>
                <p>
                    <strong>Date:</strong> <?php echo esc_html(get_theme_mod('nolaholi_event_date', 'March 7, 2026')); ?><br>
                    <strong>Rain Date:</strong> <?php echo esc_html(get_theme_mod('nolaholi_rain_date', 'March 8, 2026')); ?><br>
                    <strong>Time:</strong> <?php echo esc_html(get_theme_mod('nolaholi_event_time', 'TBD')); ?><br>
                    <strong>Location:</strong> <?php echo esc_html(get_theme_mod('nolaholi_location', 'Washington Square Park, New Orleans')); ?>
                </p>
            </div>
            
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>
                    <strong>Email:</strong> <a href="mailto:info@nolaholi.org">info@nolaholi.org</a><br>
                    <strong>Website:</strong> <a href="https://www.nolaholi.org">www.nolaholi.org</a>
                </p>
                <p class="mt-2">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-gold">Contact Us</a>
                </p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> NOLA Holi Festival, Inc. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Default footer menu fallback
 */
function nolaholi_footer_menu_fallback() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about-holi/')) . '">About Holi</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about-nola-holi/')) . '">Our Story</a></li>';
    echo '<li><a href="' . esc_url(home_url('/organizers/')) . '">Organizers</a></li>';
    echo '<li><a href="' . esc_url(home_url('/sponsors/')) . '">Sponsors</a></li>';
    echo '<li><a href="' . esc_url(home_url('/vendors/')) . '">Vendors</a></li>';
    echo '<li><a href="' . esc_url(home_url('/volunteers/')) . '">Volunteers</a></li>';
    echo '<li><a href="' . esc_url(home_url('/gallery/')) . '">Gallery</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
    echo '</ul>';
}
?>

