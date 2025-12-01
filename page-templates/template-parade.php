<?php
/**
 * Template Name: Parade
 * Template for the Holi Parade page
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="<?php echo nolaholi_get_hero_background_style('linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-green) 100%)'); ?>">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Holi Parade</h1>
            <p class="hero-subtitle">A Colorful March Through the French Quarter</p>
        </div>
    </section>
    
    <!-- Parade Overview -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 class="section-title">Join the Most Colorful Parade in NOLA</h2>
                <div class="section-divider"></div>
                
                <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light); margin-bottom: 30px;">
                    The NOLA Holi Parade is a vibrant walking parade that brings the colors and energy of India's 
                    Festival of Colors to the historic French Quarter. Led by the renowned <strong style="color: var(--mardi-gras-purple);">
                    Krewe da Bhan Gras</strong> and featuring a live DJ, this is unlike any parade you've experienced!
                </p>
                
                <div style="background: var(--mardi-gras-gold); padding: 40px; border-radius: 15px; margin-top: 40px;">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px;">
                        <div>
                            <div style="font-size: 2.5rem; margin-bottom: 10px;">📅</div>
                            <div style="font-weight: 600; color: var(--text-dark);">DATE</div>
                            <div style="font-size: 1.2rem; font-weight: 700; color: var(--dark-purple);">
                                <?php echo esc_html(get_theme_mod('nolaholi_event_date', 'March 7, 2026')); ?>
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 2.5rem; margin-bottom: 10px;">⏰</div>
                            <div style="font-weight: 600; color: var(--text-dark);">TIME</div>
                            <div style="font-size: 1.2rem; font-weight: 700; color: var(--dark-purple);">
                                <?php echo esc_html(get_theme_mod('nolaholi_event_time', 'TBD')); ?>
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 2.5rem; margin-bottom: 10px;">📍</div>
                            <div style="font-weight: 600; color: var(--text-dark);">STARTING POINT</div>
                            <div style="font-size: 1.2rem; font-weight: 700; color: var(--dark-purple);">French Quarter</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- What to Expect -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">What to Expect</h2>
            <div class="section-divider"></div>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎵</div>
                    <h3 class="feature-title">Live DJ</h3>
                    <p class="feature-description">
                        Dance through the streets to a mix of Bollywood beats, bhangra, and NOLA funk. Our DJ keeps 
                        the energy high and the crowd moving throughout the entire parade route.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🎭</div>
                    <h3 class="feature-title">Krewe da Bhan Gras</h3>
                    <p class="feature-description">
                        Join New Orleans' beloved Krewe da Bhan Gras as they lead the parade with their signature 
                        style, bringing together Indian and New Orleans cultures in perfect harmony.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3 class="feature-title">Color Throws</h3>
                    <p class="feature-description">
                        Get ready for spontaneous bursts of color along the route! Participants throw eco-friendly 
                        colored powders, creating clouds of purple, green, and gold in the air.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">👥</div>
                    <h3 class="feature-title">Community Spirit</h3>
                    <p class="feature-description">
                        Everyone is welcome to join! Walk alongside families, friends, tourists, and locals as we 
                        celebrate diversity, unity, and the joy of spring together.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📸</div>
                    <h3 class="feature-title">Photo Opportunities</h3>
                    <p class="feature-description">
                        The parade offers countless Instagram-worthy moments. Colorful outfits, painted faces, 
                        and joyful celebrations make for unforgettable photos.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🚶</div>
                    <h3 class="feature-title">Walking Parade</h3>
                    <p class="feature-description">
                        This is a walking parade, not a float parade. Everyone can participate! The pace is leisurely, 
                        with plenty of stops for dancing and celebrating along the way.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Parade Route -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Parade Route</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 800px; margin: 40px auto 0;">
                <div style="background: var(--off-white); padding: 40px; border-radius: 15px; text-align: center;">
                    <p style="font-size: 1.2rem; color: var(--text-light); line-height: 1.8; margin-bottom: 20px;">
                        The parade route through the French Quarter is announced each year closer to the event date. 
                        We wind through the historic streets, ending at Washington Square Park where the festival continues!
                    </p>
                    <p style="font-size: 1rem; color: var(--text-dark); font-weight: 600;">
                        Route details will be posted here and on our social media as soon as they're finalized.
                    </p>
                </div>
                
                <div style="margin-top: 40px; text-align: center;">
                    <h3 class="text-purple" style="font-size: 1.5rem; margin-bottom: 20px;">
                        Parade Ends at the Festival
                    </h3>
                    <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 20px;">
                        The parade culminates at Washington Square Park, where the Holi Festival continues with 
                        live performances, food vendors, activities, and the main color throw celebration!
                    </p>
                    <a href="<?php echo esc_url(home_url('/festival/')); ?>" class="btn btn-secondary">
                        About the Festival
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- How to Participate -->
    <section class="content-section bg-purple">
        <div class="container">
            <h2 class="section-title text-center" style="color: white;">How to Participate</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 800px; margin: 40px auto 0;">
                <div class="feature-grid">
                    <div class="feature-card">
                        <h3 class="feature-title" style="color: var(--mardi-gras-purple);">Just Show Up!</h3>
                        <p class="feature-description">
                            No registration required for parade participants. Just arrive at the starting point on time, 
                            ready to celebrate. Wear white or clothes you don't mind coloring!
                        </p>
                    </div>
                    
                    <div class="feature-card">
                        <h3 class="feature-title" style="color: var(--mardi-gras-green);">What to Bring</h3>
                        <p class="feature-description">
                            Wear comfortable walking shoes, bring water, and dress in white or old clothes. We provide 
                            some colors, but you can bring your own eco-friendly powder too!
                        </p>
                    </div>
                    
                    <div class="feature-card">
                        <h3 class="feature-title" style="color: var(--mardi-gras-gold);">Spectators Welcome</h3>
                        <p class="feature-description">
                            Prefer to watch? Line the streets of the French Quarter and enjoy the colorful spectacle! 
                            You might get a little color on you – it's all part of the fun.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Safety & Guidelines -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">Parade Guidelines</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 900px; margin: 40px auto 0;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                    <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm);">
                        <h4 style="color: var(--mardi-gras-green); margin-bottom: 15px; font-size: 1.3rem;">✓ Please Do</h4>
                        <ul style="list-style-position: inside; color: var(--text-light); line-height: 2;">
                            <li>Respect others and ask before applying colors</li>
                            <li>Stay hydrated and take breaks if needed</li>
                            <li>Use eco-friendly, natural colors</li>
                            <li>Supervise children at all times</li>
                            <li>Dance, celebrate, and spread joy!</li>
                            <li>Take amazing photos and tag us</li>
                        </ul>
                    </div>
                    
                    <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm);">
                        <h4 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.3rem;">✗ Please Don't</h4>
                        <ul style="list-style-position: inside; color: var(--text-light); line-height: 2;">
                            <li>Use water balloons or throw objects</li>
                            <li>Apply colors forcefully to anyone</li>
                            <li>Bring glass containers</li>
                            <li>Block the parade route</li>
                            <li>Consume alcohol in public areas</li>
                            <li>Litter – keep NOLA clean!</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="text-align: center; max-width: 700px; margin: 0 auto;">
                <h2 class="section-title">Ready to Join the Parade?</h2>
                <div class="section-divider"></div>
                <p style="font-size: 1.1rem; color: var(--text-light); line-height: 1.8; margin-bottom: 30px;">
                    Mark your calendar, gather your friends, and get ready for the most colorful parade New Orleans 
                    has ever seen! Follow us on social media for updates, route announcements, and parade day details.
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/festival/')); ?>" class="btn btn-primary">Festival Details</a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-secondary">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>

