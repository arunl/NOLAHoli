<?php
/**
 * Template Name: About Holi
 * Template for the About Holi page
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="min-height: 400px; background: var(--gradient-festival);">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">What is Holi?</h1>
            <p class="hero-subtitle">The Festival of Colors, Love, and New Beginnings</p>
        </div>
    </section>
    
    <!-- Main Content -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto;">
                <h2 class="section-title text-center">An Ancient Celebration</h2>
                <div class="section-divider"></div>
                
                <p style="font-size: 1.1rem; line-height: 1.8; text-align: center; color: var(--text-light); margin-bottom: 40px;">
                    Holi is one of the most vibrant and joyous festivals celebrated primarily in India and Nepal, 
                    marking the arrival of spring and the triumph of good over evil. Known as the "Festival of Colors," 
                    it brings people together in a spirit of love, forgiveness, and renewal.
                </p>
                
                <div class="feature-grid" style="margin-top: 60px;">
                    <div class="feature-card">
                        <div class="feature-icon">🌸</div>
                        <h3 class="feature-title">Spring Celebration</h3>
                        <p class="feature-description">
                            Holi celebrates the arrival of spring, the season of hope and joy. It's a time when nature 
                            bursts into bloom, and people celebrate the end of winter with vibrant colors.
                        </p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">📖</div>
                        <h3 class="feature-title">Mythological Roots</h3>
                        <p class="feature-description">
                            The festival has deep roots in Hindu mythology, celebrating the divine love of Radha and Krishna, 
                            and commemorating the burning of the demoness Holika, symbolizing the victory of good over evil.
                        </p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">🎨</div>
                        <h3 class="feature-title">The Colors</h3>
                        <p class="feature-description">
                            People throw colored powders (gulal) and water at each other, creating a kaleidoscope of joy. 
                            Each color carries meaning: red for love, yellow for turmeric, green for new beginnings, 
                            and blue for Krishna.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- How Holi is Celebrated -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">How Holi is Celebrated</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 900px; margin: 40px auto 0;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 40px;">
                    <div>
                        <h3 class="text-purple" style="font-size: 1.8rem; margin-bottom: 15px;">Holika Dahan</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">
                            The night before Holi, communities gather for Holika Dahan, a bonfire ritual that symbolizes 
                            the burning of evil. People sing, dance, and pray around the fire, preparing for the colorful 
                            celebration the next day.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-green" style="font-size: 1.8rem; margin-bottom: 15px;">Rangwali Holi</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">
                            The main day of Holi is called Rangwali Holi (Festival of Colors). People of all ages play with 
                            colors, drench each other in colored water, dance to music, and share sweets and festive foods.
                        </p>
                    </div>
                </div>
                
                <div style="background: var(--white); padding: 40px; border-radius: 15px; box-shadow: var(--shadow-md);">
                    <h3 class="text-gold" style="font-size: 1.8rem; margin-bottom: 20px; text-align: center;">
                        Unity and Forgiveness
                    </h3>
                    <p style="color: var(--text-light); line-height: 1.8; text-align: center; font-size: 1.1rem;">
                        Perhaps the most beautiful aspect of Holi is its message of unity. On this day, social barriers 
                        dissolve – people forget their differences, forgive past grievances, and come together in celebration. 
                        Rich and poor, young and old, all join in the colorful festivities as equals.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Global Celebration -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Holi Around the World</h2>
            <div class="section-divider"></div>
            
            <p style="max-width: 800px; margin: 20px auto 40px; text-align: center; font-size: 1.1rem; color: var(--text-light); line-height: 1.8;">
                While Holi originated in India, it is now celebrated by the Indian diaspora and color enthusiasts 
                worldwide. From London to New York, Sydney to Toronto, people of all backgrounds participate in 
                this joyous festival, making it a truly global celebration of color, culture, and community.
            </p>
            
            <div class="text-center">
                <a href="<?php echo esc_url(home_url('/about-nola-holi/')); ?>" class="btn btn-primary">
                    Why We Celebrate in New Orleans
                </a>
            </div>
        </div>
    </section>
    
    <!-- Tips Section -->
    <section class="content-section bg-purple">
        <div class="container">
            <h2 class="section-title text-center" style="color: white;">Tips for Celebrating Holi</h2>
            <div class="section-divider"></div>
            
            <div class="feature-grid" style="margin-top: 40px;">
                <div class="feature-card">
                    <div class="feature-icon">👕</div>
                    <h3 class="feature-title">Wear White or Old Clothes</h3>
                    <p class="feature-description">
                        Wear clothes you don't mind getting colorful and stained! White clothes show the colors beautifully. 
                        Colors may not wash out completely.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🧴</div>
                    <h3 class="feature-title">Protect Your Skin & Hair</h3>
                    <p class="feature-description">
                        Apply coconut oil or moisturizer to skin and hair before playing. This creates a barrier and 
                        makes colors easier to wash off later.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🌿</div>
                    <h3 class="feature-title">Natural Colors</h3>
                    <p class="feature-description">
                        We use organic, plant-based colors that are safe and eco-friendly. Still, avoid getting colors 
                        in your eyes and mouth.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💧</div>
                    <h3 class="feature-title">Stay Hydrated</h3>
                    <p class="feature-description">
                        Bring water to stay hydrated throughout the celebration. Dancing and playing with colors can be 
                        energetic work!
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3 class="feature-title">Protect Electronics</h3>
                    <p class="feature-description">
                        Keep phones, cameras, and valuables in sealed plastic bags or leave them at home. Colors and 
                        water can damage electronics.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🤗</div>
                    <h3 class="feature-title">Respect & Consent</h3>
                    <p class="feature-description">
                        Always ask before applying colors to someone, especially on their face. Not everyone may want 
                        to participate fully, and that's okay!
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>

