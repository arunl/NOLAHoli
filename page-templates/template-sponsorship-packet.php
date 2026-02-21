<?php
/**
 * Template Name: Sponsorship Packet
 * Template for the Sponsorship Information page (for potential sponsors)
 * 
 * @package NOLAHoli
 */

get_header();

// Get event year from theme customizer
$event_date = get_theme_mod('nolaholi_event_date', '');
$event_year = $event_date ? date('Y', strtotime($event_date)) : date('Y');
?>

<main id="primary" class="site-main">
    <!-- Hero Section - Why Sponsor -->
    <section class="hero-section" style="<?php 
        $style = nolaholi_get_hero_background_style('linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-gold) 100%)');
        $style = str_replace('min-height: 400px;', 'min-height: 500px;', $style);
        echo $style;
    ?>">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Become a Sponsor</h1>
            <p class="hero-subtitle">Partner with us to celebrate culture, color, and community</p>
            <div style="margin-top: 30px;">
                <a href="#contact-cta" class="btn btn-gold btn-large">Get Sponsorship Info</a>
            </div>
        </div>
    </section>
    
    <!-- Why Sponsor NOLA Holi -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Why Sponsor NOLA Holi?</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 900px; margin: 0 auto 50px; text-align: center;">
                <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light);">
                    NOLA Holi is more than just a festival—it's a celebration of diversity, community, and joy that brings 
                    together thousands of people from all walks of life. As a sponsor, you'll be part of creating an unforgettable 
                    experience while gaining valuable exposure for your brand.
                </p>
            </div>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">👥</div>
                    <h3 class="feature-title">Community Impact</h3>
                    <p class="feature-description">
                        Support a FREE community event that brings together thousands of New Orleanians and visitors, 
                        fostering cultural understanding and unity.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📣</div>
                    <h3 class="feature-title">Brand Visibility</h3>
                    <p class="feature-description">
                        Gain exposure to a diverse, engaged audience through event marketing, social media, press coverage, 
                        and on-site presence.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3 class="feature-title">Networking</h3>
                    <p class="feature-description">
                        Connect with other sponsors, community leaders, and potential customers in a positive, 
                        celebratory environment.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🌈</div>
                    <h3 class="feature-title">Cultural Celebration</h3>
                    <p class="feature-description">
                        Show your commitment to diversity and inclusion by supporting one of New Orleans' most unique 
                        cultural celebrations.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3 class="feature-title">Demographics</h3>
                    <p class="feature-description">
                        Reach families, young professionals, tourists, students, and community members from diverse 
                        backgrounds and neighborhoods.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💜</div>
                    <h3 class="feature-title">Feel Good</h3>
                    <p class="feature-description">
                        Create joyful memories for hundreds 
                        of festival-goers.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Sponsorship Packages -->
    <section class="content-section sponsor-tiers bg-light">
        <div class="container">
            <h2 class="section-title text-center">Sponsorship Packages</h2>
            <div class="section-divider"></div>
            <p style="text-align: center; max-width: 700px; margin: 20px auto 40px; font-size: 1.1rem; color: var(--text-light);">
                Join us in making NOLA Holi <?php echo esc_html($event_year); ?> bigger and better! Choose a sponsorship level that works for you.
            </p>
            
            <div class="tier-grid">
                <!-- Presenting Sponsor -->
                <div class="sponsor-tier tier-event">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: var(--mardi-gras-purple);">Presenting Sponsor</h3>
                        <div class="tier-amount">$15,000</div>
                        <div style="font-size: 0.9rem; color: var(--text-light); margin-top: 5px;">(Limit 1)</div>
                    </div>
                    <div style="text-align: center; font-style: italic; color: var(--mardi-gras-purple); margin-bottom: 15px; font-weight: 600;">
                        "Exclusive Top Tier Partner"
                    </div>
                    <ul class="tier-benefits">
                        <li>"NOLA Holi Festival presented by [Sponsor Name]" branding across all marketing, press, and stage signage</li>
                        <li>Premier logo placement on all materials (digital, print, applicable press releases, website, parade banners)</li>
                        <li>20 VIP passes + reserved table in the VIP Tent (no-Color area)</li>
                        <li>Recognition during parade and stage emcee mentions throughout event</li>
                        <li>Opportunity to address audience from the main stage</li>
                        <li>Social Media Spotlight</li>
                        <li>Inclusion in all post-event media + thank-you social spotlight</li>
                        <li>Option for brand activation booth or custom experience (Photo-booth experience add-on for additional $5K)</li>
                    </ul>
                </div>
                
                <!-- Parade Sponsor -->
                <div class="sponsor-tier tier-diamond">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: #4DB8FF;">Parade Sponsor</h3>
                        <div class="tier-amount">$7,500</div>
                        <div style="font-size: 0.9rem; color: var(--text-light); margin-top: 5px;">(Limit 1)</div>
                    </div>
                    <div style="text-align: center; font-style: italic; color: #4DB8FF; margin-bottom: 15px; font-weight: 600;">
                        "Signature Cultural Element Sponsor"
                    </div>
                    <ul class="tier-benefits">
                        <li>Prominent logo and name on all parade signage, march banners, and parade float</li>
                        <li>10 VIP passes + reserved seating in VIP tent</li>
                        <li>Brand mention during parade route and at main stage</li>
                        <li>Inclusion in press release and social media promotions</li>
                        <li>Option for activation area or branded giveaways along the route</li>
                    </ul>
                </div>
                
                <!-- Entertainment Sponsor -->
                <div class="sponsor-tier tier-platinum">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: var(--mardi-gras-purple);">Entertainment Sponsor</h3>
                        <div class="tier-amount">$5,000</div>
                        <div style="font-size: 0.9rem; color: var(--text-light); margin-top: 5px;">(Limit 4)</div>
                    </div>
                    <ul class="tier-benefits">
                        <li>Prominent Logo placement on stage side banners and program schedule</li>
                        <li>Verbal shoutout from emcee during headliner acts</li>
                        <li>8 VIP passes + access to VIP tent</li>
                        <li>Logo placement in all market materials – online and offline</li>
                        <li>Logo on event T-shirts</li>
                    </ul>
                </div>
                
                <!-- VIP Experience Sponsor -->
                <div class="sponsor-tier tier-vip">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: var(--mardi-gras-gold);">VIP Experience Sponsor</h3>
                        <div class="tier-amount">$3,500 - $5,000</div>
                        <div style="font-size: 0.9rem; color: var(--text-light); margin-top: 5px;">(Limit 4)</div>
                    </div>
                    <div style="text-align: center; font-style: italic; color: var(--mardi-gras-gold); margin-bottom: 15px; font-weight: 600;">
                        "Luxury Guest & Hospitality Area"
                    </div>
                    <ul class="tier-benefits">
                        <li>Logo featured at VIP tent entrance and tables</li>
                        <li>6-8 VIP passes</li>
                        <li>Opportunity to include product or collateral in VIP tent area</li>
                        <li>Inclusion on website, signage, and select social posts</li>
                    </ul>
                </div>
                
                <!-- Gold Sponsor -->
                <div class="sponsor-tier tier-gold">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: var(--mardi-gras-gold);">Gold Sponsor</h3>
                        <div class="tier-amount">$2,500</div>
                        <div style="font-size: 0.9rem; color: var(--text-light); margin-top: 5px;">(No Limit)</div>
                    </div>
                    <ul class="tier-benefits">
                        <li>Name on event T-shirts</li>
                        <li>4 VIP passes</li>
                        <li>Recognition by DJ at Festival</li>
                        <li>Recognition on Social Media</li>
                        <li>Name on NOLA Holi Website</li>
                    </ul>
                </div>
                
                <!-- Silver Sponsor -->
                <div class="sponsor-tier tier-silver">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: #95A5A6;">Silver Sponsor</h3>
                        <div class="tier-amount">$1,000</div>
                        <div style="font-size: 0.9rem; color: var(--text-light); margin-top: 5px;">(No Limit)</div>
                    </div>
                    <ul class="tier-benefits">
                        <li>2 VIP passes</li>
                        <li>Recognition on Social Media</li>
                        <li>Recognition on NOLA Holi Website</li>
                    </ul>
                </div>
                
                <!-- Friends of NOLA Holi -->
                <div class="sponsor-tier tier-friends">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: var(--mardi-gras-green);">Friend of NOLA Holi</h3>
                        <div class="tier-amount">$100+</div>
                        <div style="font-size: 0.9rem; color: var(--text-light); margin-top: 5px;">(No Limit)</div>
                    </div>
                    <ul class="tier-benefits">
                        <li>Recognition on NOLA Holi Website</li>
                        <li>Our eternal gratitude! 💜</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- In-Kind Sponsorship -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">In-Kind Sponsorship</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 800px; margin: 40px auto 0;">
                <p style="text-align: center; font-size: 1.1rem; color: var(--text-light); line-height: 1.8; margin-bottom: 30px;">
                    Can't provide financial support? We also welcome in-kind donations of goods and services!
                </p>
                
                <div style="background: var(--off-white); padding: 40px; border-radius: 15px;">
                    <h4 style="color: var(--mardi-gras-purple); margin-bottom: 20px; font-size: 1.3rem; text-align: center;">
                        What We Need
                    </h4>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <ul style="color: var(--text-light); line-height: 2;">
                            <li>Tents and canopies</li>
                            <li>Sound equipment</li>
                            <li>Printing services</li>
                            <li>Transportation/logistics</li>
                            <li>Food and beverages</li>
                        </ul>
                        <ul style="color: var(--text-light); line-height: 2;">
                            <li>Photography/videography</li>
                            <li>Marketing services</li>
                            <li>Event supplies</li>
                            <li>Eco-friendly color powder</li>
                            <li>Portable restrooms</li>
                        </ul>
                    </div>
                    <p style="text-align: center; margin-top: 30px; font-style: italic; color: var(--text-dark);">
                        In-kind sponsors receive recognition based on the value of their contribution.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section - Become a Sponsor -->
    <section id="contact-cta" class="content-section bg-purple">
        <div class="container">
            <div style="text-align: center; max-width: 700px; margin: 0 auto;">
                <h2 class="section-title" style="color: white;">Ready to Partner With Us?</h2>
                <div class="section-divider"></div>
                <p style="font-size: 1.1rem; color: var(--off-white); line-height: 1.8; margin-bottom: 30px;">
                    We'd love to discuss how your organization can be part of NOLA Holi <?php echo esc_html($event_year); ?>! Sponsorship packages can be 
                    customized to meet your organization's goals and budget.
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-gold">Contact Us</a>
                    <a href="mailto:sponsors@nolaholi.org" class="btn btn-secondary">Email: sponsors@nolaholi.org</a>
                </div>
                
                <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 10px; margin-top: 40px;">
                    <p style="color: var(--off-white); font-size: 1rem; margin: 0;">
                        <strong>Tax-Deductible Donations:</strong> NOLA Holi is a registered non-profit organization. 
                        All sponsorships are tax-deductible to the extent allowed by law.
                    </p>
                </div>
                
            </div>
        </div>
    </section>
    
    <!-- View Current Sponsors Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="text-align: center; max-width: 700px; margin: 0 auto;">
                <a href="<?php echo esc_url(home_url('/sponsors/')); ?>" class="btn btn-primary btn-large">
                    See Our Current Sponsors
                </a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>

