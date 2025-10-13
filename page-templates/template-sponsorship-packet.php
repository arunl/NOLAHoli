<?php
/**
 * Template Name: Sponsorship Packet
 * Template for the Sponsorship Information page (for potential sponsors)
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section - Why Sponsor -->
    <section class="hero-section" style="min-height: 500px; background: linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-gold) 100%);">
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
                        Be part of keeping Michelle Lakhotia's vision alive and creating joyful memories for thousands 
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
                Join us in making NOLA Holi 2026 bigger and better! Choose a sponsorship level that works for you.
            </p>
            
            <div class="tier-grid">
                <!-- Event Sponsor -->
                <div class="sponsor-tier tier-event">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: var(--mardi-gras-purple);">Event Sponsor</h3>
                        <div class="tier-amount">$10,000+</div>
                    </div>
                    <ul class="tier-benefits">
                        <li>Title sponsorship recognition on all marketing materials</li>
                        <li>Exclusive VIP tent at the festival</li>
                        <li>Prime booth location</li>
                        <li>Logo on main stage backdrop</li>
                        <li>Featured in all press releases and media coverage</li>
                        <li>Social media spotlight campaign</li>
                        <li>Speaking opportunity at the event</li>
                        <li>Company banner displayed prominently</li>
                        <li>30 VIP passes for employees/guests</li>
                        <li>Logo on event t-shirts</li>
                        <li>Exclusive mention by MC throughout the day</li>
                        <li>First right of refusal for following year</li>
                    </ul>
                </div>
                
                <!-- Diamond Sponsor -->
                <div class="sponsor-tier tier-diamond">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: #4DB8FF;">Diamond Sponsor</h3>
                        <div class="tier-amount">$5,000</div>
                    </div>
                    <ul class="tier-benefits">
                        <li>Prominent logo placement on website and all marketing</li>
                        <li>Premium booth space at festival</li>
                        <li>Logo on main stage backdrop</li>
                        <li>Featured in press releases</li>
                        <li>Social media recognition (5+ posts)</li>
                        <li>Company banner at event</li>
                        <li>20 VIP passes</li>
                        <li>Logo in event program</li>
                        <li>Mentioned by MC during event</li>
                        <li>Recognition in email newsletters</li>
                    </ul>
                </div>
                
                <!-- Platinum Sponsor -->
                <div class="sponsor-tier tier-platinum">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: #6C757D;">Platinum Sponsor</h3>
                        <div class="tier-amount">$2,500</div>
                    </div>
                    <ul class="tier-benefits">
                        <li>Logo on website and select marketing materials</li>
                        <li>Booth space at festival</li>
                        <li>Logo included on stage signage</li>
                        <li>Social media recognition (3+ posts)</li>
                        <li>15 VIP passes</li>
                        <li>Logo in event program</li>
                        <li>Recognition in email newsletter</li>
                        <li>Company name announced at event</li>
                    </ul>
                </div>
                
                <!-- Gold Sponsor -->
                <div class="sponsor-tier tier-gold">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: var(--mardi-gras-gold);">Gold Sponsor</h3>
                        <div class="tier-amount">$1,000</div>
                    </div>
                    <ul class="tier-benefits">
                        <li>Logo on website sponsor page</li>
                        <li>Booth space at festival (subject to availability)</li>
                        <li>Social media recognition (2+ posts)</li>
                        <li>10 VIP passes</li>
                        <li>Logo in event program</li>
                        <li>Recognition in email newsletter</li>
                        <li>Company name announced at event</li>
                    </ul>
                </div>
                
                <!-- Silver Sponsor -->
                <div class="sponsor-tier tier-silver">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: #95A5A6;">Silver Sponsor</h3>
                        <div class="tier-amount">$500</div>
                    </div>
                    <ul class="tier-benefits">
                        <li>Logo on website sponsor page</li>
                        <li>Social media recognition (1+ posts)</li>
                        <li>5 festival passes</li>
                        <li>Name listed in event program</li>
                        <li>Recognition in email newsletter</li>
                    </ul>
                </div>
                
                <!-- Friends of NOLA Holi -->
                <div class="sponsor-tier tier-friends">
                    <div class="tier-header">
                        <h3 class="tier-name" style="color: var(--mardi-gras-green);">Friends of NOLA Holi</h3>
                        <div class="tier-amount">$100 - $499</div>
                    </div>
                    <ul class="tier-benefits">
                        <li>Name listed on website</li>
                        <li>Social media thank you</li>
                        <li>2 festival passes</li>
                        <li>Name in event program</li>
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
                    We'd love to discuss how your organization can be part of NOLA Holi 2026! Sponsorship packages can be 
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
                
                <div style="margin-top: 30px; padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.2);">
                    <p style="color: var(--off-white); margin-bottom: 15px;">
                        Want to see our current sponsors?
                    </p>
                    <a href="<?php echo esc_url(home_url('/sponsors/')); ?>" class="btn btn-white" style="display: inline-block;">
                        View 2025 Sponsors →
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>

