<?php
/**
 * Template Name: Festival
 * Template for the Holi Festival page
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="<?php echo nolaholi_get_hero_background_style('linear-gradient(135deg, var(--mardi-gras-green) 0%, var(--mardi-gras-gold) 100%)'); ?>">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Holi Festival</h1>
            <p class="hero-subtitle">A Day of Music, Food, and Color at Washington Square Park</p>
        </div>
    </section>
    
    <!-- Festival Overview -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 class="section-title">Experience the Festival of Colors</h2>
                <div class="section-divider"></div>
                
                <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light); margin-bottom: 30px;">
                    After the parade, the celebration continues at <strong style="color: var(--mardi-gras-green);">
                    Washington Square Park</strong> with live performances, delicious food, community activities, and 
                    the spectacular main color throw that makes Holi unforgettable!
                </p>
                
                <div style="background: var(--gradient-festival); padding: 40px; border-radius: 15px; margin-top: 40px; color: white;">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px;">
                        <div>
                            <div style="font-size: 2.5rem; margin-bottom: 10px;">🗓</div>
                            <div style="font-weight: 600; opacity: 0.9;">DATE</div>
                            <div style="font-size: 1.2rem; font-weight: 700;">
                                <?php echo esc_html(get_theme_mod('nolaholi_event_date', 'March 7, 2026')); ?>
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 2.5rem; margin-bottom: 10px;">⏰</div>
                            <div style="font-weight: 600; opacity: 0.9;">TIME</div>
                            <div style="font-size: 1.2rem; font-weight: 700;">
                                <?php echo esc_html(get_theme_mod('nolaholi_event_time', 'TBD')); ?>
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 2.5rem; margin-bottom: 10px;">📍</div>
                            <div style="font-weight: 600; opacity: 0.9;">LOCATION</div>
                            <div style="font-size: 1.2rem; font-weight: 700;">Washington Square Park</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Festival Activities -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">Festival Highlights</h2>
            <div class="section-divider"></div>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎤</div>
                    <h3 class="feature-title">Live Performances</h3>
                    <p class="feature-description">
                        Enjoy live music and dance performances from the local Indian community, featuring classical 
                        Indian dance, Bollywood performances, DJs spinning bhangra and fusion beats, and more!
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🍛</div>
                    <h3 class="feature-title">Authentic Food</h3>
                    <p class="feature-description">
                        Savor delicious Indian cuisine from local food vendors. From samosas to biryani, gulab jamun 
                        to mango lassi, experience the flavors of India right here in New Orleans.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3 class="feature-title">Massive Color Throws</h3>
                    <p class="feature-description">
                        The main event! Synchronized color throws create spectacular clouds of purple, green, and gold. 
                        Multiple throws throughout the day ensure everyone gets colorful.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🎪</div>
                    <h3 class="feature-title">Kids Activities</h3>
                    <p class="feature-description">
                        Family-friendly fun including face painting, henna artists, craft stations, and safe color 
                        play areas for children. A celebration for all ages!
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🛍️</div>
                    <h3 class="feature-title">Vendor Marketplace</h3>
                    <p class="feature-description">
                        Browse unique goods from local vendors. Discover handmade jewelry, traditional clothing, 
                        art, crafts, and Holi-themed merchandise.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📚</div>
                    <h3 class="feature-title">Cultural Education</h3>
                    <p class="feature-description">
                        Learn about the history and significance of Holi through information booths, storytelling, 
                        and cultural demonstrations throughout the festival.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Performance Schedule -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Entertainment</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 800px; margin: 40px auto 0;">
                <p style="text-align: center; font-size: 1.1rem; color: var(--text-light); line-height: 1.8; margin-bottom: 40px;">
                    Throughout the day, our main stage features continuous entertainment showcasing the best of 
                    Indian culture and local talent. The performance schedule is announced closer to the event date.
                </p>
                
                <div class="feature-grid">
                    <div class="feature-card">
                        <h3 class="feature-title" style="color: var(--mardi-gras-purple);">Traditional Dance</h3>
                        <p class="feature-description">
                            Watch mesmerizing performances of classical Indian dances like Bharatanatyam, Kathak, 
                            and folk dances from various regions of India.
                        </p>
                    </div>
                    
                    <div class="feature-card">
                        <h3 class="feature-title" style="color: var(--mardi-gras-green);">Live DJ Sets</h3>
                        <p class="feature-description">
                            Dance to high-energy DJ sets mixing Bollywood hits, bhangra beats, and fusion tracks 
                            that blend Indian and New Orleans sounds.
                        </p>
                    </div>
                    
                    <div class="feature-card">
                        <h3 class="feature-title" style="color: var(--mardi-gras-gold);">Community Performers</h3>
                        <p class="feature-description">
                            Local dance groups, musicians, and performers from New Orleans' diverse Indian community 
                            share their talents on stage.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Food & Vendors -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">Food & Shopping</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 900px; margin: 40px auto 0;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
                    <div style="background: var(--white); padding: 40px; border-radius: 15px; box-shadow: var(--shadow-md);">
                        <div style="font-size: 3rem; text-align: center; margin-bottom: 20px;">🍽️</div>
                        <h3 class="text-center" style="color: var(--mardi-gras-green); font-size: 1.8rem; margin-bottom: 20px;">
                            Food Vendors
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; text-align: center; margin-bottom: 20px;">
                            Multiple food vendors serving authentic Indian cuisine, from street food favorites to 
                            traditional meals. Vegetarian and vegan options available!
                        </p>
                        <div style="text-align: center;">
                            <a href="<?php echo esc_url(home_url('/vendors/')); ?>" class="btn btn-secondary">Become a Food Vendor</a>
                        </div>
                    </div>
                    
                    <div style="background: var(--white); padding: 40px; border-radius: 15px; box-shadow: var(--shadow-md);">
                        <div style="font-size: 3rem; text-align: center; margin-bottom: 20px;">🎁</div>
                        <h3 class="text-center" style="color: var(--mardi-gras-purple); font-size: 1.8rem; margin-bottom: 20px;">
                            Marketplace
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; text-align: center; margin-bottom: 20px;">
                            Browse unique handmade goods, traditional clothing, jewelry, art, and festival merchandise 
                            from talented local and regional vendors.
                        </p>
                        <div style="text-align: center;">
                            <a href="<?php echo esc_url(home_url('/vendors/')); ?>" class="btn btn-primary">Vendor Information</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Festival Tips -->
    <section class="content-section bg-purple">
        <div class="container">
            <h2 class="section-title text-center" style="color: white;">Festival Tips</h2>
            <div class="section-divider"></div>
            
            <div class="feature-grid" style="margin-top: 40px;">
                <div class="feature-card">
                    <div class="feature-icon">👕</div>
                    <h3 class="feature-title">Dress Code</h3>
                    <p class="feature-description">
                        Wear white or old clothes you don't mind getting permanently colored. Colors will stain! 
                        Comfortable shoes are a must for dancing.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💧</div>
                    <h3 class="feature-title">Stay Hydrated</h3>
                    <p class="feature-description">
                        Bring a refillable water bottle. Water stations available throughout the festival grounds. 
                        March in New Orleans can be warm!
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">☀️</div>
                    <h3 class="feature-title">Sun Protection</h3>
                    <p class="feature-description">
                        Apply sunscreen before arriving (colors stick less to sunscreen). Bring hats and sunglasses 
                        you don't mind getting colorful.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3 class="feature-title">Protect Electronics</h3>
                    <p class="feature-description">
                        Keep phones and cameras in sealed plastic bags or waterproof cases. Colors and moisture 
                        can damage electronics.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💵</div>
                    <h3 class="feature-title">Bring Cash</h3>
                    <p class="feature-description">
                        While many vendors accept cards, having cash makes transactions faster and easier. 
                        ATMs available nearby.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">👨‍👩‍👧‍👦</div>
                    <h3 class="feature-title">Family Friendly</h3>
                    <p class="feature-description">
                        This is a family-friendly event! Kids' areas with gentler color activities available. 
                        Strollers welcome but can get messy!
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Location & Parking -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Getting to the Festival</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 800px; margin: 40px auto 0;">
                <div style="text-align: center; margin-bottom: 40px;">
                    <h3 class="text-green" style="font-size: 1.8rem; margin-bottom: 15px;">Washington Square Park</h3>
                    <p style="font-size: 1.1rem; color: var(--text-light); line-height: 1.8;">
                        <strong>Address:</strong> 700 Elysian Fields Ave, New Orleans, LA 70117<br>
                        Located in the Marigny neighborhood, adjacent to the French Quarter
                    </p>
                </div>
                
                <div style="background: var(--off-white); padding: 40px; border-radius: 15px;">
                    <h4 style="color: var(--mardi-gras-purple); margin-bottom: 20px; font-size: 1.3rem;">
                        Transportation Options
                    </h4>
                    <ul style="color: var(--text-light); line-height: 2; font-size: 1.05rem;">
                        <li><strong>Walk/Bike:</strong> If you're in the French Quarter or Marigny, walking or biking is easiest</li>
                        <li><strong>Streetcar:</strong> Take the Rampart-St. Claude Streetcar line</li>
                        <li><strong>Rideshare:</strong> Uber/Lyft drop-off at Washington Square Park</li>
                        <li><strong>Parking:</strong> Limited street parking available; arrive early or use nearby paid lots</li>
                        <li><strong>Public Transit:</strong> RTA bus lines serve the area</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="content-section bg-light">
        <div class="container">
            <div style="text-align: center; max-width: 700px; margin: 0 auto;">
                <h2 class="section-title">Join Us at the Festival!</h2>
                <div class="section-divider"></div>
                <p style="font-size: 1.1rem; color: var(--text-light); line-height: 1.8; margin-bottom: 30px;">
                    Whether you join the parade or come straight to the festival, Washington Square Park is where 
                    the magic happens. Bring your friends, family, and your spirit of celebration!
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/parade/')); ?>" class="btn btn-primary">About the Parade</a>
                    <a href="<?php echo esc_url(home_url('/volunteers/')); ?>" class="btn btn-secondary">Volunteer</a>
                    <a href="<?php echo esc_url(home_url('/gallery/')); ?>" class="btn btn-gold">View Past Festivals</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>

