<?php
/**
 * Template Name: Donate
 * Template for the Donation page - Simplified QR-focused design
 * 
 * @package NOLAHoli
 */

get_header();

// Get event year from theme customizer
$event_date = get_theme_mod('nolaholi_event_date', '');
$event_year = $event_date ? date('Y', strtotime($event_date)) : date('Y');
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="<?php 
        $style = nolaholi_get_hero_background_style('linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-gold) 100%)');
        $style = str_replace('min-height: 400px;', 'min-height: 300px;', $style);
        echo $style;
    ?>">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Support NOLA Holi</h1>
            <p class="hero-subtitle">Your generosity brings the Festival of Colors to life</p>
        </div>
    </section>
    
    <!-- Introduction -->
    <section class="content-section bg-white" style="padding-bottom: 30px;">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <p style="font-size: 1.2rem; line-height: 1.8; color: var(--text-light); margin: 0;">
                    NOLA Holi is a <strong>free community celebration</strong> made possible by generous donors like you. 
                    Scan a QR code or tap to donate using your preferred payment method.
                </p>
            </div>
        </div>
    </section>
    
    <!-- Payment Options - The Main Event -->
    <section class="content-section bg-light" style="padding-top: 30px;">
        <div class="container">
            <h2 class="section-title text-center">Choose How to Donate</h2>
            <div class="section-divider"></div>
            
            <!-- Payment Grid -->
            <div class="donate-grid">
                
                <!-- Zelle -->
                <div class="donate-card">
                    <div class="donate-card-header zelle-bg">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/qr-zelle.png" alt="Zelle QR Code" class="donate-qr">
                    </div>
                    <div class="donate-card-body">
                        <h3>Zelle</h3>
                        <p class="donate-card-desc">Instant bank transfer</p>
                        <div class="donate-card-action zelle-action">
                            <span>info@nolaholi.org</span>
                        </div>
                        <p class="donate-card-instructions">
                            Scan QR with your banking app
                        </p>
                    </div>
                </div>
                
                <!-- PayPal -->
                <a href="https://www.paypal.com/paypalme/nolaholi" target="_blank" rel="noopener" class="donate-card donate-card-link">
                    <div class="donate-card-header paypal-bg">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/qr-paypal.png" alt="PayPal QR Code" class="donate-qr">
                    </div>
                    <div class="donate-card-body">
                        <h3>PayPal</h3>
                        <p class="donate-card-desc">Secure online payment</p>
                        <div class="donate-card-action">
                            <span>Tap to Pay with PayPal →</span>
                        </div>
                        <p class="donate-card-instructions">
                            Scan QR with PayPal app
                        </p>
                    </div>
                </a>
                
                <!-- Venmo -->
                <a href="https://venmo.com/nolaholi" target="_blank" rel="noopener" class="donate-card donate-card-link">
                    <div class="donate-card-header venmo-bg">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/qr-venmo.png" alt="Venmo QR Code" class="donate-qr">
                    </div>
                    <div class="donate-card-body">
                        <h3>Venmo</h3>
                        <p class="donate-card-desc">Quick & easy</p>
                        <div class="donate-card-action">
                            <span>Tap to Pay with Venmo →</span>
                        </div>
                        <p class="donate-card-instructions">
                            Scan QR with Venmo app
                        </p>
                    </div>
                </a>
                
                <!-- Square / Credit Card -->
                <a href="https://square.link/u/Y5y5CM0o" target="_blank" rel="noopener" class="donate-card donate-card-link">
                    <div class="donate-card-header square-bg">
                        <div class="square-brand">■ Square</div>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/qr-square.png" alt="Square QR Code" class="donate-qr">
                    </div>
                    <div class="donate-card-body">
                        <h3>Credit Card</h3>
                        <p class="donate-card-desc">Visa, Mastercard, Amex</p>
                        <div class="donate-card-action">
                            <span>Tap to Pay by Card →</span>
                        </div>
                        <p class="donate-card-instructions">
                            Secure checkout via Square
                        </p>
                    </div>
                </a>
                
            </div>
            
            <!-- Check Option -->
            <div class="donate-check-option">
                <details class="check-accordion">
                    <summary class="check-summary">
                        <span class="check-icon">✉️</span>
                        <span>Prefer to send a check?</span>
                        <span class="check-arrow">▼</span>
                    </summary>
                    <div class="check-content">
                        <p><strong>Make checks payable to:</strong> NOLA Holi Festival</p>
                        <p>
                            <strong>Mail to:</strong><br>
                            NOLA Holi Festival<br>
                            1130 Spain St<br>
                            New Orleans, LA 70117
                        </p>
                        <p style="margin-top: 15px; font-size: 0.95rem; color: var(--text-light);">
                            <strong>Memo:</strong> "NOLA Holi <?php echo esc_html($event_year); ?> Donation"
                        </p>
                    </div>
                </details>
            </div>
        </div>
    </section>
    
    <!-- Impact Section -->
    <section class="content-section bg-purple text-white">
        <div class="container">
            <h2 class="section-title text-center" style="color: white;">Your Impact</h2>
            <div class="section-divider" style="background: var(--mardi-gras-gold);"></div>
            
            <div class="donate-impact-grid">
                <div class="impact-card">
                    <span class="impact-amount">$25</span>
                    <p>Eco-friendly colors for 25 people</p>
                </div>
                <div class="impact-card">
                    <span class="impact-amount">$50</span>
                    <p>Live music & performances</p>
                </div>
                <div class="impact-card">
                    <span class="impact-amount">$100</span>
                    <p>Kids activities & family fun</p>
                </div>
                <div class="impact-card">
                    <span class="impact-amount">$250+</span>
                    <p>Major festival impact!</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Already Donated Section -->
    <section class="content-section bg-white" id="already-donated">
        <div class="container">
            <div style="max-width: 600px; margin: 0 auto;">
                <div class="already-donated-card">
                    <h3>🙏 Already Donated?</h3>
                    <p>Let us know so we can thank you properly! This is completely optional.</p>
                    
                    <?php if (isset($_GET['donation']) && $_GET['donation'] === 'recorded') : ?>
                        <div class="donate-success-message">
                            <h4>🎉 Thank You!</h4>
                            <p>We've recorded your information. We truly appreciate your support!</p>
                        </div>
                    <?php else : ?>
                        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="already-donated-form">
                            <input type="hidden" name="action" value="nolaholi_record_donation">
                            <?php wp_nonce_field('nolaholi_donation_form', 'nolaholi_donation_nonce'); ?>
                            
                            <!-- Honeypot -->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="donation_website" tabindex="-1" autocomplete="off">
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" name="donor_name" placeholder="Your Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="donor_email" placeholder="Email Address" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" name="donation_amount" placeholder="Amount (e.g., $50)">
                                </div>
                                <div class="form-group">
                                    <select name="payment_method">
                                        <option value="">Payment Method Used</option>
                                        <option value="zelle">Zelle</option>
                                        <option value="paypal">PayPal</option>
                                        <option value="venmo">Venmo</option>
                                        <option value="credit_card">Credit Card</option>
                                        <option value="check">Check</option>
                                    </select>
                                </div>
                            </div>
                            
                            <input type="hidden" name="donor_phone" value="">
                            <input type="hidden" name="donor_message" value="">
                            
                            <div class="form-group" style="margin-bottom: 0;">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    Let Us Know 💜
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Sponsorship CTA -->
    <section class="content-section bg-light">
        <div class="container">
            <div style="max-width: 700px; margin: 0 auto; text-align: center;">
                <h3 style="color: var(--mardi-gras-purple);">Want to Make a Bigger Impact?</h3>
                <p style="color: var(--text-light); margin-bottom: 25px;">
                    Become a <strong>NOLA Holi Sponsor</strong> and get premium benefits including logo placement, VIP access, and event recognition.
                </p>
                <a href="<?php echo esc_url(home_url('/sponsors/')); ?>" class="btn btn-secondary">
                    View Sponsorship Packages →
                </a>
            </div>
        </div>
    </section>
    
    <!-- Thank You -->
    <section class="content-section bg-white" style="padding: 50px 20px;">
        <div class="container">
            <div style="text-align: center;">
                <p style="font-size: 1.3rem; color: var(--mardi-gras-purple); font-weight: 600; margin: 0;">
                    Thank you for supporting NOLA Holi! See you at the festival! 🎨🎉
                </p>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
