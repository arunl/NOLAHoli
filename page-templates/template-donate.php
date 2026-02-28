<?php
/**
 * Template Name: Donate
 * Template for the Donation page
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
        $style = str_replace('min-height: 400px;', 'min-height: 350px;', $style);
        echo $style;
    ?>">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Support NOLA Holi</h1>
            <p class="hero-subtitle">Your generosity helps bring the Festival of Colors to New Orleans</p>
        </div>
    </section>
    
    <!-- Introduction Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 style="color: var(--mardi-gras-purple); margin-bottom: 20px;">Make a Donation</h2>
                <div class="section-divider"></div>
                <p style="font-size: 1.15rem; line-height: 1.8; color: var(--text-light); margin-top: 30px;">
                    NOLA Holi is a <strong>free, community celebration</strong> made possible by generous donors like you. 
                    Your contribution helps us bring vibrant colors, music, food, and cultural experiences to 
                    Washington Square Park each year.
                </p>
                <p style="font-size: 1.1rem; color: var(--text-light);">
                    Every donation, big or small, makes a difference. Choose your preferred payment method below.
                </p>
            </div>
        </div>
    </section>
    
    <!-- Donor Information Form -->
    <section class="content-section bg-light" id="donor-info-section">
        <div class="container">
            <div style="max-width: 700px; margin: 0 auto;">
                <div class="donate-info-card">
                    <h3 style="color: var(--mardi-gras-purple); margin-bottom: 10px; text-align: center;">
                        📝 Tell Us About Your Donation
                    </h3>
                    <p style="text-align: center; color: var(--text-light); margin-bottom: 30px;">
                        Please fill this out so we can thank you and keep you updated on the festival!
                    </p>
                    
                    <?php
                    // Display success message if form was submitted
                    if (isset($_GET['donation']) && $_GET['donation'] === 'recorded') : ?>
                        <div class="donate-success-message">
                            <h4>🎉 Thank You!</h4>
                            <p>Your donation information has been recorded. We truly appreciate your support for NOLA Holi!</p>
                        </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" id="donor-info-form" class="donate-form">
                        <input type="hidden" name="action" value="nolaholi_record_donation">
                        <?php wp_nonce_field('nolaholi_donation_form', 'nolaholi_donation_nonce'); ?>
                        
                        <!-- Honeypot -->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" name="donation_website" tabindex="-1" autocomplete="off">
                        </div>
                        
                        <div class="donate-form-row">
                            <div class="form-group">
                                <label for="donor_name">Your Name *</label>
                                <input type="text" id="donor_name" name="donor_name" required placeholder="Jane Smith">
                            </div>
                            <div class="form-group">
                                <label for="donor_email">Email Address *</label>
                                <input type="email" id="donor_email" name="donor_email" required placeholder="jane@example.com">
                            </div>
                        </div>
                        
                        <div class="donate-form-row">
                            <div class="form-group">
                                <label for="donor_phone">Phone Number</label>
                                <input type="tel" id="donor_phone" name="donor_phone" placeholder="(555) 123-4567">
                            </div>
                            <div class="form-group">
                                <label for="donation_amount">Donation Amount *</label>
                                <input type="text" id="donation_amount" name="donation_amount" required placeholder="$50">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="payment_method">Payment Method Used *</label>
                            <select id="payment_method" name="payment_method" required>
                                <option value="">-- Select Payment Method --</option>
                                <option value="zelle">Zelle</option>
                                <option value="paypal">PayPal</option>
                                <option value="venmo">Venmo</option>
                                <option value="credit_card">Credit Card (Square)</option>
                                <option value="check">Check</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="donor_message">Message (Optional)</label>
                            <textarea id="donor_message" name="donor_message" rows="3" placeholder="Any message you'd like to share with us..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
                                <input type="checkbox" name="donor_anonymous" value="1" style="margin-top: 4px;">
                                <span>I prefer to remain anonymous (we won't list your name publicly)</span>
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 1.1rem; padding: 15px;">
                            Record My Donation
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Payment Options Section -->
    <section class="content-section bg-white" id="payment-options">
        <div class="container">
            <h2 class="section-title text-center">Choose Your Payment Method</h2>
            <div class="section-divider"></div>
            <p style="text-align: center; max-width: 700px; margin: 20px auto 50px; color: var(--text-light);">
                We accept multiple payment methods for your convenience. Scroll through the options below to find one that works best for you.
            </p>
            
            <!-- Payment Method Tabs -->
            <div class="donate-tabs">
                <button class="donate-tab active" data-tab="mobile-pay">
                    <span class="tab-icon">📱</span>
                    <span class="tab-text">Mobile Pay</span>
                </button>
                <button class="donate-tab" data-tab="credit-card">
                    <span class="tab-icon">💳</span>
                    <span class="tab-text">Credit Card</span>
                </button>
                <button class="donate-tab" data-tab="check">
                    <span class="tab-icon">✉️</span>
                    <span class="tab-text">Check</span>
                </button>
            </div>
            
            <!-- Mobile Pay Tab Content -->
            <div class="donate-tab-content active" id="mobile-pay">
                <div class="donate-mobile-grid">
                    <!-- Zelle -->
                    <div class="donate-payment-card">
                        <div class="payment-card-header zelle-header">
                            <h3>Zelle</h3>
                            <span class="payment-badge">Instant Transfer</span>
                        </div>
                        <div class="payment-card-body">
                            <div class="qr-code-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/qr-zelle.png" alt="Zelle QR Code" class="qr-code-image">
                            </div>
                            <div class="payment-instructions">
                                <p><strong>Send to:</strong></p>
                                <p class="payment-email">info@nolaholi.org</p>
                                <ol>
                                    <li>Open your banking app</li>
                                    <li>Select "Send with Zelle"</li>
                                    <li>Scan QR code or enter email</li>
                                    <li>Enter amount and send!</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                    <!-- PayPal -->
                    <div class="donate-payment-card">
                        <div class="payment-card-header paypal-header">
                            <h3>PayPal</h3>
                            <span class="payment-badge">Secure Payment</span>
                        </div>
                        <div class="payment-card-body">
                            <div class="qr-code-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/qr-paypal.png" alt="PayPal QR Code" class="qr-code-image">
                            </div>
                            <div class="payment-instructions">
                                <p><strong>PayPal.me:</strong></p>
                                <p class="payment-link">
                                    <a href="https://paypal.me/nolaholi" target="_blank" rel="noopener">paypal.me/nolaholi</a>
                                </p>
                                <ol>
                                    <li>Open PayPal app</li>
                                    <li>Scan QR code or click link</li>
                                    <li>Enter your donation amount</li>
                                    <li>Complete the payment!</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Venmo -->
                    <div class="donate-payment-card">
                        <div class="payment-card-header venmo-header">
                            <h3>Venmo</h3>
                            <span class="payment-badge">Quick & Easy</span>
                        </div>
                        <div class="payment-card-body">
                            <div class="qr-code-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/qr-venmo.png" alt="Venmo QR Code" class="qr-code-image">
                            </div>
                            <div class="payment-instructions">
                                <p><strong>Venmo:</strong></p>
                                <p class="payment-handle">@NOLAHoli</p>
                                <ol>
                                    <li>Open Venmo app</li>
                                    <li>Scan QR code or search username</li>
                                    <li>Enter your donation amount</li>
                                    <li>Add note: "NOLA Holi Donation"</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="donate-note">
                    <p>💡 <strong>Tip:</strong> After making your payment, please <a href="#donor-info-section">fill out the form above</a> so we can properly thank you and send you updates!</p>
                </div>
            </div>
            
            <!-- Credit Card Tab Content -->
            <div class="donate-tab-content" id="credit-card">
                <div class="donate-credit-card-section">
                    <div class="credit-card-info">
                        <div class="square-qr-section">
                            <div class="square-qr-wrapper">
                                <div class="square-brand-header">
                                    <span class="square-logo-icon">■</span> Square
                                </div>
                                <div class="qr-code-container square-qr">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/qr-square.png" alt="Square Payment QR Code" class="qr-code-image">
                                </div>
                            </div>
                            <p class="scan-text">Scan to pay with your phone</p>
                        </div>
                        
                        <div class="square-divider">
                            <span>or</span>
                        </div>
                        
                        <h3>Pay Securely with Credit Card</h3>
                        <p>We use <strong>Square</strong> for secure credit card processing. Click the button below to make a donation with your credit or debit card.</p>
                        
                        <div class="card-types">
                            <span title="Visa">💳 Visa</span>
                            <span title="Mastercard">💳 Mastercard</span>
                            <span title="American Express">💳 Amex</span>
                            <span title="Discover">💳 Discover</span>
                        </div>
                        
                        <a href="https://square.link/u/Y5y5CM0o" target="_blank" rel="noopener" class="btn btn-primary btn-large">
                            Donate with Credit Card →
                        </a>
                        
                        <p class="secure-note">
                            🔒 Secure, encrypted payment powered by Square
                        </p>
                    </div>
                </div>
                
                <div class="donate-note">
                    <p>💡 <strong>Note:</strong> After completing your payment on Square, please <a href="#donor-info-section">come back and fill out the form above</a> so we can acknowledge your generous contribution!</p>
                </div>
            </div>
            
            <!-- Check Tab Content -->
            <div class="donate-tab-content" id="check">
                <div class="donate-check-section">
                    <div class="check-info-card">
                        <h3>📬 Send a Check</h3>
                        <p>If you prefer to donate by check, please make it payable to:</p>
                        
                        <div class="check-details">
                            <p class="payable-to"><strong>NOLA Holi Festival</strong></p>
                            <p class="mailing-address">
                                <strong>Mail to:</strong><br>
                                NOLA Holi Festival<br>
                                1130 Spain St<br>
                                New Orleans, LA 70117
                            </p>
                        </div>
                        
                        <div class="check-memo">
                            <p><strong>In the memo line, please write:</strong></p>
                            <p class="memo-text">"NOLA Holi <?php echo esc_html($event_year); ?> Donation"</p>
                        </div>
                        
                        <div class="check-photo-tip">
                            <h4>📸 Quick Processing Tip</h4>
                            <p>Want us to process your donation faster? Take a clear photo of your check with good contrast (dark pen on light paper works great!) and email it to us at <strong>info@nolaholi.org</strong> along with your contact information.</p>
                        </div>
                    </div>
                </div>
                
                <div class="donate-note">
                    <p>💡 <strong>Important:</strong> Please <a href="#donor-info-section">fill out the form above</a> when you mail your check so we know to expect it and can send you a confirmation!</p>
                </div>
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
                    <p>Provides eco-friendly colors for 25 festival-goers</p>
                </div>
                <div class="impact-card">
                    <span class="impact-amount">$50</span>
                    <p>Helps fund live music and cultural performances</p>
                </div>
                <div class="impact-card">
                    <span class="impact-amount">$100</span>
                    <p>Supports kids' activities and family programming</p>
                </div>
                <div class="impact-card">
                    <span class="impact-amount">$250+</span>
                    <p>Major impact on bringing NOLA Holi to life!</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Sponsorship CTA -->
    <section class="content-section bg-light">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <h2 style="color: var(--mardi-gras-purple);">Want to Make a Bigger Impact?</h2>
                <div class="section-divider"></div>
                <p style="font-size: 1.15rem; color: var(--text-light); margin: 30px 0;">
                    Consider becoming a <strong>NOLA Holi Sponsor</strong>! Sponsorships include premium benefits 
                    like logo placement, VIP access, and recognition at the event.
                </p>
                <a href="<?php echo esc_url(home_url('/sponsors/')); ?>" class="btn btn-primary btn-large">
                    View Sponsorship Packages →
                </a>
            </div>
        </div>
    </section>
    
    <!-- Thank You Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 700px; margin: 0 auto; text-align: center;">
                <span style="font-size: 4rem; display: block; margin-bottom: 20px;">🙏</span>
                <h2 style="color: var(--mardi-gras-purple);">Thank You!</h2>
                <p style="font-size: 1.15rem; color: var(--text-light); line-height: 1.8;">
                    NOLA Holi wouldn't be possible without the generosity of our community. 
                    Whether you donate $5 or $500, you're helping bring joy, color, and cultural 
                    celebration to thousands of people in New Orleans.
                </p>
                <p style="font-size: 1.1rem; color: var(--mardi-gras-green); font-weight: 600;">
                    See you at the festival! 🎨🎉
                </p>
            </div>
        </div>
    </section>
</main>

<!-- Tab Switching Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.donate-tab');
    const contents = document.querySelectorAll('.donate-tab-content');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const targetId = this.getAttribute('data-tab');
            
            // Remove active class from all tabs and contents
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(targetId).classList.add('active');
        });
    });
});
</script>

<?php
get_footer();
?>
