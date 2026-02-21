<?php
/**
 * Template Name: Volunteers
 * Template for the Volunteers page
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
    <section class="hero-section" style="<?php echo nolaholi_get_hero_background_style('linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-gold) 100%)'); ?>">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Volunteer with Us</h1>
            <p class="hero-subtitle">Help Create the Magic of NOLA Holi</p>
        </div>
    </section>
    
    <!-- Intro Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 class="section-title">Be Part of Something Colorful</h2>
                <div class="section-divider"></div>
                
                <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light); margin-bottom: 30px;">
                    NOLA Holi is powered by amazing volunteers who give their time, energy, and passion to create 
                    an unforgettable experience for thousands. Whether you can help for a few hours or the whole day, 
                    we'd love to have you on our team!
                </p>
            </div>
        </div>
    </section>
    
    <!-- Why Volunteer -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">Why Volunteer?</h2>
            <div class="section-divider"></div>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">💜</div>
                    <h3 class="feature-title">Make an Impact</h3>
                    <p class="feature-description">
                        Be part of creating a FREE community event that brings joy to thousands and celebrates 
                        cultural diversity in New Orleans.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3 class="feature-title">Meet Amazing People</h3>
                    <p class="feature-description">
                        Connect with fellow volunteers, community members, and people from diverse backgrounds 
                        who share a passion for celebration and culture.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🎉</div>
                    <h3 class="feature-title">Experience the Festival</h3>
                    <p class="feature-description">
                        Get a behind-the-scenes look at festival operations while still enjoying the music, food, 
                        and celebration (yes, you'll get colorful too!).
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🎁</div>
                    <h3 class="feature-title">Volunteer Perks</h3>
                    <p class="feature-description">
                        Receive an official NOLA Holi volunteer t-shirt, free food and drinks during your shift, 
                        and our eternal gratitude!
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📚</div>
                    <h3 class="feature-title">Learn & Grow</h3>
                    <p class="feature-description">
                        Gain experience in event management, community organizing, and cultural programming. 
                        Great for students and professionals alike!
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🌟</div>
                    <h3 class="feature-title">Be Remembered</h3>
                    <p class="feature-description">
                        All volunteers are recognized on our website and in our annual report. Your contribution 
                        makes history!
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Volunteer Roles -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Volunteer Opportunities</h2>
            <div class="section-divider"></div>
            <p style="text-align: center; max-width: 700px; margin: 20px auto 40px; font-size: 1.1rem; color: var(--text-light);">
                We need help in many areas! You can indicate your preferences when you sign up.
            </p>
            
            <div style="max-width: 1000px; margin: 0 auto;">
                <div style="display: grid; gap: 30px;">
                    <!-- Setup & Breakdown -->
                    <div style="background: var(--off-white); padding: 30px; border-radius: 15px; border-left: 5px solid var(--mardi-gras-purple);">
                        <h3 style="color: var(--mardi-gras-purple); font-size: 1.5rem; margin-bottom: 15px;">
                            🔧 Setup & Breakdown Team
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 15px;">
                            <strong>When:</strong> Early morning before event / Late afternoon after event<br>
                            <strong>What:</strong> Help set up tents, tables, signage, and decorations before the festival, 
                            and help break down and clean up afterwards.
                        </p>
                        <p style="color: var(--text-light); font-style: italic;">
                            Perfect for early risers and those who enjoy physical work!
                        </p>
                    </div>
                    
                    <!-- Parade Support -->
                    <div style="background: var(--off-white); padding: 30px; border-radius: 15px; border-left: 5px solid var(--mardi-gras-green);">
                        <h3 style="color: var(--mardi-gras-green); font-size: 1.5rem; margin-bottom: 15px;">
                            🎭 Parade Support
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 15px;">
                            <strong>When:</strong> During parade hours<br>
                            <strong>What:</strong> Help manage parade flow, distribute colors safely, assist participants, 
                            and ensure everyone has a great (and safe) time along the route.
                        </p>
                        <p style="color: var(--text-light); font-style: italic;">
                            Great for energetic, outgoing volunteers!
                        </p>
                    </div>
                    
                    <!-- Registration & Info -->
                    <div style="background: var(--off-white); padding: 30px; border-radius: 15px; border-left: 5px solid var(--mardi-gras-gold);">
                        <h3 style="color: var(--mardi-gras-gold); font-size: 1.5rem; margin-bottom: 15px;">
                            📋 Registration & Information
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 15px;">
                            <strong>When:</strong> Throughout the event<br>
                            <strong>What:</strong> Greet attendees, answer questions, hand out event programs, 
                            provide directions, and help people navigate the festival grounds.
                        </p>
                        <p style="color: var(--text-light); font-style: italic;">
                            Perfect for friendly, knowledgeable people-persons!
                        </p>
                    </div>
                    
                    <!-- Vendor & Sponsor Liaison -->
                    <div style="background: var(--off-white); padding: 30px; border-radius: 15px; border-left: 5px solid var(--mardi-gras-purple);">
                        <h3 style="color: var(--mardi-gras-purple); font-size: 1.5rem; margin-bottom: 15px;">
                            🤝 Vendor & Sponsor Liaison
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 15px;">
                            <strong>When:</strong> Setup through breakdown<br>
                            <strong>What:</strong> Assist vendors with setup, answer questions, ensure they have what they need, 
                            and help coordinate sponsor recognition.
                        </p>
                        <p style="color: var(--text-light); font-style: italic;">
                            Ideal for organized, customer-service oriented volunteers!
                        </p>
                    </div>
                    
                    <!-- Color Distribution -->
                    <div style="background: var(--off-white); padding: 30px; border-radius: 15px; border-left: 5px solid var(--mardi-gras-green);">
                        <h3 style="color: var(--mardi-gras-green); font-size: 1.5rem; margin-bottom: 15px;">
                            🎨 Color Distribution Team
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 15px;">
                            <strong>When:</strong> During main festival hours<br>
                            <strong>What:</strong> Distribute color packets to attendees, coordinate color throws, 
                            ensure safe and fun color play throughout the festival.
                        </p>
                        <p style="color: var(--text-light); font-style: italic;">
                            For those who don't mind getting VERY colorful!
                        </p>
                    </div>
                    
                    <!-- Kids Area -->
                    <div style="background: var(--off-white); padding: 30px; border-radius: 15px; border-left: 5px solid var(--mardi-gras-gold);">
                        <h3 style="color: var(--mardi-gras-gold); font-size: 1.5rem; margin-bottom: 15px;">
                            👶 Kids Activity Area
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 15px;">
                            <strong>When:</strong> Throughout the event<br>
                            <strong>What:</strong> Supervise kids' activities, help with face painting stations, 
                            craft areas, and ensure families have a safe, fun experience.
                        </p>
                        <p style="color: var(--text-light); font-style: italic;">
                            Perfect for volunteers who love working with children!
                        </p>
                    </div>
                    
                    <!-- Photography/Media -->
                    <div style="background: var(--off-white); padding: 30px; border-radius: 15px; border-left: 5px solid var(--mardi-gras-purple);">
                        <h3 style="color: var(--mardi-gras-purple); font-size: 1.5rem; margin-bottom: 15px;">
                            📸 Photography & Media
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 15px;">
                            <strong>When:</strong> Parade and festival hours<br>
                            <strong>What:</strong> Capture the magic! Take photos and videos of the event, 
                            help with social media posts, document the celebration for future promotion.
                        </p>
                        <p style="color: var(--text-light); font-style: italic;">
                            Great for photographers and social media enthusiasts!
                        </p>
                    </div>
                    
                    <!-- Sustainability Team -->
                    <div style="background: var(--off-white); padding: 30px; border-radius: 15px; border-left: 5px solid var(--mardi-gras-green);">
                        <h3 style="color: var(--mardi-gras-green); font-size: 1.5rem; margin-bottom: 15px;">
                            ♻️ Sustainability Team
                        </h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 15px;">
                            <strong>When:</strong> Throughout the event<br>
                            <strong>What:</strong> Manage recycling and composting stations, educate attendees about 
                            eco-friendly practices, help keep the festival grounds clean and green.
                        </p>
                        <p style="color: var(--text-light); font-style: italic;">
                            For environmentally conscious volunteers!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Requirements -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">Volunteer Requirements</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 900px; margin: 40px auto 0;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
                    <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm);">
                        <h4 style="color: var(--mardi-gras-green); margin-bottom: 15px; font-size: 1.3rem;">✓ What We Need</h4>
                        <ul style="list-style-position: inside; color: var(--text-light); line-height: 2;">
                            <li>Age 16+ (under 18 with guardian)</li>
                            <li>Minimum 3-hour commitment</li>
                            <li>Positive, helpful attitude</li>
                            <li>Ability to stand/walk for extended periods</li>
                            <li>Willingness to get colorful!</li>
                            <li>Complete volunteer orientation</li>
                        </ul>
                    </div>
                    
                    <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm);">
                        <h4 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.3rem;">🎁 What You Get</h4>
                        <ul style="list-style-position: inside; color: var(--text-light); line-height: 2;">
                            <li>Official volunteer t-shirt</li>
                            <li>Free food and drinks during shift</li>
                            <li>Community service hours (if needed)</li>
                            <li>Volunteer appreciation event</li>
                            <li>Recognition on website</li>
                            <li>Amazing memories!</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Volunteer Form -->
    <section id="volunteer-form" class="content-section bg-purple">
        <div class="container">
            <div style="max-width: 700px; margin: 0 auto;">
                <h2 class="section-title text-center" style="color: white;">Join Our <?php echo esc_html($event_year); ?> Volunteer Team!</h2>
                <div class="section-divider"></div>
                <p style="text-align: center; font-size: 1.1rem; color: var(--off-white); margin-bottom: 30px; line-height: 1.8;">
                    Ready to join our amazing volunteer team? Sign up now and help us make NOLA Holi <?php echo esc_html($event_year); ?> the best one yet!
                </p>
                
                <div style="text-align: center; margin-bottom: 40px;">
                    <button id="open-volunteer-form-btn" class="btn btn-gold" style="display: inline-block;">
                        Sign Up to Volunteer
                    </button>
                </div>
                
                <div style="text-align: center; border-top: 2px solid rgba(255, 255, 255, 0.3); padding-top: 30px; margin-top: 30px;">
                    <h4 style="color: white; margin-bottom: 15px;">Questions?</h4>
                    <p style="color: var(--off-white); margin-bottom: 10px;">
                        <strong>Email:</strong> <a href="mailto:info@nolaholi.org" style="color: var(--mardi-gras-gold);">info@nolaholi.org</a>
                    </p>
                    <p style="color: var(--off-white); font-size: 0.95rem; font-style: italic;">
                        We'll be in touch with you soon and send you orientation details about a week before the event!
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Thank You to Past Volunteers -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="text-align: center; max-width: 800px; margin: 0 auto;">
                <h2 class="section-title">Thank You to Our Volunteers</h2>
                <div class="section-divider"></div>
                <p style="font-size: 1.1rem; color: var(--text-light); line-height: 1.8;">
                    To everyone who has volunteered at NOLA Holi, <strong style="color: var(--mardi-gras-purple);">THANK YOU</strong>! 
                    Your dedication, energy, and spirit make this festival possible. From setup to cleanup, from sunrise 
                    to sunset, you are the heart of NOLA Holi. We couldn't do it without you! 💜💚💛
                </p>
            </div>
        </div>
    </section>
    
    <!-- Volunteer Form Modal -->
    <div id="volunteer-form-modal" class="volunteer-modal" style="display: none;">
        <div class="volunteer-modal-overlay"></div>
        <div class="volunteer-modal-content">
            <button class="volunteer-modal-close" id="close-volunteer-modal" aria-label="Close volunteer form">
                <span>&times;</span>
            </button>
            <div class="volunteer-modal-header">
                <h2>Join Our <?php echo esc_html($event_year); ?> Volunteer Team!</h2>
                <p class="volunteer-modal-event-info">
                    <strong>Event Date:</strong> <?php echo esc_html(get_theme_mod('nolaholi_event_date', 'March 7, 2026')); ?> | 
                    <strong>Time:</strong> <?php echo esc_html(get_theme_mod('nolaholi_event_time', 'TBD')); ?>
                    <br>
                    <strong>Rain Date:</strong> <?php echo esc_html(get_theme_mod('nolaholi_rain_date', 'March 8, 2026')); ?>
                </p>
            </div>
            <div class="volunteer-modal-body">
                <iframe 
                    src="https://docs.google.com/forms/d/e/1FAIpQLSeU82Cs0MJaVBFH80fkY8TnB9OBO6o2wBEFaDuHTliOo6_IuA/viewform?embedded=true" 
                    width="100%" 
                    height="1191" 
                    frameborder="0" 
                    marginheight="0" 
                    marginwidth="0">
                    Loading…
                </iframe>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>

