<?php
/**
 * Template Name: Contact
 * Template for the Contact page
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="min-height: 350px; background: linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-green) 100%);">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Contact Us</h1>
            <p class="hero-subtitle">We'd Love to Hear From You</p>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 1100px; margin: 0 auto;">
                <div class="contact-section">
                    <!-- Contact Form -->
                    <div class="contact-form">
                        <h2 style="color: var(--mardi-gras-purple); margin-bottom: 10px;">Send Us a Message</h2>
                        <p style="color: var(--text-light); margin-bottom: 30px;">
                            Have questions, ideas, or want to get involved? Fill out the form below and we'll get back to you soon!
                        </p>
                        
                        <?php 
                        /**
                         * Automatic Contact Form 7 Detection
                         * 
                         * This template automatically detects if Contact Form 7 is installed and configured.
                         * It searches for forms with these names (in order of preference):
                         * 1. "NOLA Holi Contact Form"
                         * 2. "Contact form 1"
                         * 3. "Contact Form 1"
                         * 4. "Contact Form"
                         * 
                         * If Contact Form 7 is not available or no forms exist, 
                         * it automatically falls back to the built-in custom form.
                         * 
                         * Administrators will see helpful notices when logged in about the form status.
                         */
                        
                        // Display admin notice if CF7 is not properly configured
                        nolaholi_display_cf7_admin_notice();
                        
                        // Check Contact Form 7 status
                        $cf7_status = nolaholi_check_contact_form_7_status();
                        
                        if ($cf7_status['available'] && $cf7_status['form_id']) : 
                            // Use Contact Form 7
                        ?>
                            <!-- Contact Form 7 -->
                            <?php echo do_shortcode('[contact-form-7 id="' . esc_attr($cf7_status['form_id']) . '"]'); ?>
                        
                        <?php else : 
                            // Use custom fallback form
                        ?>
                        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" id="nolaholi-contact-form">
                            <input type="hidden" name="action" value="nolaholi_contact_form">
                            <?php wp_nonce_field('nolaholi_contact_form', 'nolaholi_contact_nonce'); ?>
                            
                            <div class="form-group">
                                <label for="contact_name">Your Name *</label>
                                <input type="text" id="contact_name" name="contact_name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_email">Your Email *</label>
                                <input type="email" id="contact_email" name="contact_email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_phone">Phone Number</label>
                                <input type="tel" id="contact_phone" name="contact_phone">
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_subject">Subject *</label>
                                <select id="contact_subject" name="contact_subject" required>
                                    <option value="">-- Select a Subject --</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="volunteer">Volunteer Information</option>
                                    <option value="sponsor">Sponsorship Inquiry</option>
                                    <option value="vendor">Vendor Application</option>
                                    <option value="media">Media Request</option>
                                    <option value="partnership">Partnership Opportunity</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_message">Your Message *</label>
                                <textarea id="contact_message" name="contact_message" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                        </form>
                        
                        <?php endif; ?>
                    </div>
 
                    <!-- Contact Information -->
                    <div class="contact-info">
                        <h3 style="color: var(--mardi-gras-purple); margin-bottom: 20px; font-size: 1.8rem;">
                            Get in Touch
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 40px;">
                            Whether you want to volunteer, sponsor, become a vendor, or just say hi, 
                            we're here for you. Choose the best way to reach us below!
                        </p>
                        
                        <div class="contact-info-item">
                            <h3>📧 Email</h3>
                            <p><strong>General:</strong> <a href="mailto:info@nolaholi.org">info@nolaholi.org</a></p>
                            <p><strong>Volunteers:</strong> <a href="mailto:volunteers@nolaholi.org">volunteers@nolaholi.org</a></p>
                            <p><strong>Sponsors:</strong> <a href="mailto:sponsors@nolaholi.org">sponsors@nolaholi.org</a></p>
                            <p><strong>Vendors:</strong> <a href="mailto:vendors@nolaholi.org">vendors@nolaholi.org</a></p>
                            <p><strong>Media:</strong> <a href="mailto:media@nolaholi.org">media@nolaholi.org</a></p>
                        </div>
                        
                        <div class="contact-info-item">
                            <h3>🌐 Website</h3>
                            <p><a href="https://www.nolaholi.org" target="_blank" rel="noopener noreferrer">www.nolaholi.org</a></p>
                        </div>
                        
                        <div class="contact-info-item">
                            <h3>📱 Social Media</h3>
                            <p>Follow us for updates, photos, and festival announcements!</p>
                            <div style="margin-top: 15px;">
                                <?php
                                $facebook = get_theme_mod('nolaholi_facebook');
                                $instagram = get_theme_mod('nolaholi_instagram');
                                $twitter = get_theme_mod('nolaholi_twitter');
                                ?>
                                
                                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                                    <?php if ($facebook) : ?>
                                        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary" style="flex: 1; min-width: 120px;">Facebook</a>
                                    <?php endif; ?>
                                    
                                    <?php if ($instagram) : ?>
                                        <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary" style="flex: 1; min-width: 120px;">Instagram</a>
                                    <?php endif; ?>
                                    
                                    <?php if ($twitter) : ?>
                                        <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary" style="flex: 1; min-width: 120px;">Twitter</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contact-info-item">
                            <h3>📍 Festival Location</h3>
                            <p>
                                <strong>Washington Square Park</strong><br>
                                700 Elysian Fields Ave<br>
                                New Orleans, LA 70117
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Quick Links -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">Quick Links</h2>
            <div class="section-divider"></div>
            <p style="text-align: center; max-width: 700px; margin: 20px auto 40px; font-size: 1.1rem; color: var(--text-light);">
                Looking for something specific? These pages might help:
            </p>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3 class="feature-title">Volunteer</h3>
                    <p class="feature-description">
                        Sign up to volunteer and help create the magic of NOLA Holi!
                    </p>
                    <a href="<?php echo esc_url(home_url('/volunteers/')); ?>" class="btn btn-primary mt-2">Volunteer Info</a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h3 class="feature-title">Become a Sponsor</h3>
                    <p class="feature-description">
                        Support our festival and gain visibility in the community.
                    </p>
                    <a href="<?php echo esc_url(home_url('/sponsors/')); ?>" class="btn btn-secondary mt-2">Sponsorship Packages</a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🍛</div>
                    <h3 class="feature-title">Vendor Application</h3>
                    <p class="feature-description">
                        Join us as a food or artisan vendor at the festival.
                    </p>
                    <a href="<?php echo esc_url(home_url('/vendors/')); ?>" class="btn btn-gold mt-2">Vendor Details</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FAQ -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Frequently Asked Questions</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 900px; margin: 40px auto 0;">
                <div style="display: grid; gap: 20px;">
                    <div style="background: var(--off-white); padding: 30px; border-radius: 10px;">
                        <h4 style="color: var(--mardi-gras-purple); margin-bottom: 10px; font-size: 1.2rem;">
                            When is NOLA Holi 2026?
                        </h4>
                        <p style="color: var(--text-light); line-height: 1.8;">
                            NOLA Holi 2026 is scheduled for <strong><?php echo esc_html(get_theme_mod('nolaholi_event_date', 'March 7, 2026')); ?></strong>, 
                            with a rain date of <strong><?php echo esc_html(get_theme_mod('nolaholi_rain_date', 'March 8, 2026')); ?></strong>. 
                            Specific times will be announced closer to the event date.
                        </p>
                    </div>
                    
                    <div style="background: var(--off-white); padding: 30px; border-radius: 10px;">
                        <h4 style="color: var(--mardi-gras-green); margin-bottom: 10px; font-size: 1.2rem;">
                            Is the festival free to attend?
                        </h4>
                        <p style="color: var(--text-light); line-height: 1.8;">
                            Yes! NOLA Holi is completely FREE for all attendees. We believe in making this celebration 
                            accessible to everyone. Food and vendor purchases are separate.
                        </p>
                    </div>
                    
                    <div style="background: var(--off-white); padding: 30px; border-radius: 10px;">
                        <h4 style="color: var(--mardi-gras-gold); margin-bottom: 10px; font-size: 1.2rem;">
                            Do I need to register to participate?
                        </h4>
                        <p style="color: var(--text-light); line-height: 1.8;">
                            No registration is required for attendees! Just show up and join the celebration. 
                            Volunteers, vendors, and sponsors do need to register in advance.
                        </p>
                    </div>
                    
                    <div style="background: var(--off-white); padding: 30px; border-radius: 10px;">
                        <h4 style="color: var(--mardi-gras-purple); margin-bottom: 10px; font-size: 1.2rem;">
                            Is it safe for children?
                        </h4>
                        <p style="color: var(--text-light); line-height: 1.8;">
                            Absolutely! NOLA Holi is a family-friendly event. We use eco-friendly, non-toxic colors 
                            and have dedicated kids' activity areas. Adult supervision is recommended for young children.
                        </p>
                    </div>
                    
                    <div style="background: var(--off-white); padding: 30px; border-radius: 10px;">
                        <h4 style="color: var(--mardi-gras-green); margin-bottom: 10px; font-size: 1.2rem;">
                            How can I stay updated on festival news?
                        </h4>
                        <p style="color: var(--text-light); line-height: 1.8;">
                            Follow us on social media (Facebook, Instagram, Twitter) and check our website regularly 
                            for the latest updates, announcements, and behind-the-scenes content!
                        </p>
                    </div>
                </div>
                
                <div style="text-align: center; margin-top: 40px;">
                    <p style="color: var(--text-light); font-size: 1.1rem;">
                        Have more questions? <a href="#nolaholi-contact-form" style="color: var(--mardi-gras-purple); font-weight: 600;">Send us a message above!</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>

