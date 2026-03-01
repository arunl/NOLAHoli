<?php
/**
 * Template Name: Event Day
 * Template for Event Day schedule and parade route
 * 
 * @package NOLAHoli
 */

get_header();

// Get event info from theme customizer
$event_date = get_theme_mod('nolaholi_event_date', 'March 8, 2026');
$event_year = $event_date ? date('Y', strtotime($event_date)) : date('Y');
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="<?php 
        $style = nolaholi_get_hero_background_style('linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-green) 50%, var(--mardi-gras-gold) 100%)');
        $style = str_replace('min-height: 400px;', 'min-height: 300px;', $style);
        echo $style;
    ?>">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Event Day <?php echo esc_html($event_year); ?></h1>
            <p class="hero-subtitle"><?php echo esc_html($event_date); ?> • Washington Square Park</p>
        </div>
    </section>
    
    <!-- Main Content: Schedule + Parade Route -->
    <section class="content-section bg-white">
        <div class="container">
            
            <!-- Centered Date Badge -->
            <div class="event-date-header">
                <span class="date-badge">March 8, 2026</span>
            </div>
            
            <div class="event-day-grid">
                
                <!-- Left Column: Schedule -->
                <div class="event-schedule">
                    <div class="schedule-header">
                        <span class="schedule-icon">🗓</span>
                        <h2>Event Schedule</h2>
                    </div>
                    
                    <div class="schedule-cards">
                        
                        <div class="schedule-card">
                            <div class="card-time">10:00 AM</div>
                            <div class="card-details">
                                <h3>Event Opens</h3>
                                <p class="card-location">
                                    <span class="pin-icon"></span> Washington Square Park<br>
                                    <span class="address">700 Elysian Fields Ave</span>
                                </p>
                            </div>
                        </div>
                        
                        <div class="schedule-card">
                            <div class="card-time">11:00 AM</div>
                            <div class="card-details">
                                <h3>Assemble for Parade</h3>
                                <p class="card-location">
                                    <span class="pin-icon"></span> Royal St at Touro Street<br>
                                    <span class="address">1913 Royal St</span>
                                </p>
                            </div>
                        </div>
                        
                        <div class="schedule-card highlight">
                            <div class="card-time">12:00 PM</div>
                            <div class="card-details">
                                <h3>🎉 Parade Starts!</h3>
                            </div>
                        </div>
                        
                        <div class="schedule-card">
                            <div class="card-time">1:00 PM</div>
                            <div class="card-details">
                                <h3>Parade Returns</h3>
                                <p>Back to Washington Square Park</p>
                            </div>
                        </div>
                        
                        <div class="schedule-card">
                            <div class="card-time">1:15 PM</div>
                            <div class="card-details">
                                <h3>Cultural Performances</h3>
                                <p>Live music, dance & entertainment</p>
                            </div>
                        </div>
                        
                        <div class="schedule-card">
                            <div class="card-time">2:30 PM</div>
                            <div class="card-details">
                                <h3>DJ Set</h3>
                                <p>Dance party at the park!</p>
                            </div>
                        </div>
                        
                        <div class="schedule-card last">
                            <div class="card-time">5:00 PM</div>
                            <div class="card-details">
                                <h3>Event Ends</h3>
                                <p>See you next year! 🎨</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Middle Column: Parade Route Map -->
                <div class="parade-route-map">
                    <div class="route-header">
                        <span class="route-icon">🚶</span>
                        <h2>Parade Route</h2>
                    </div>
                    
                    <div class="route-map">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/2026-parade-route.png" alt="NOLA Holi 2026 Parade Route Map">
                    </div>
                </div>
                
                <!-- Right Column: Route Directions -->
                <div class="parade-route-directions">
                    <div class="route-header">
                        <span class="route-icon">🧭</span>
                        <h2>Directions</h2>
                    </div>
                    
                    <ol class="route-steps">
                        <li>
                            <span class="step-marker assemble"><span class="pin-icon"></span></span>
                            <span class="step-text">Assemble at Royal St at Touro</span>
                        </li>
                        <li>
                            <span class="step-marker start">START</span>
                            <span class="step-text">Start down Royal St</span>
                        </li>
                        <li>
                            <span class="step-marker turn">←</span>
                            <span class="step-text">Left on St Philip</span>
                        </li>
                        <li>
                            <span class="step-marker turn">←</span>
                            <span class="step-text">Left on Chartres</span>
                        </li>
                        <li>
                            <span class="step-marker straight">↑</span>
                            <span class="step-text">Continue on Chartres</span>
                        </li>
                        <li>
                            <span class="step-marker end">END</span>
                            <span class="step-text">End at Chartres at Kerlerec</span>
                        </li>
                    </ol>
                    
                    <div class="route-note">
                        <p>💡 <strong>Tip:</strong> Arrive at the parade assembly point by 11:00 AM to join the march!</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <!-- General Info Section -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title" style="text-align: center; margin-bottom: 30px;">Event Information</h2>
            <div class="event-quick-info">
                <div class="quick-info-card featured">
                    <span class="quick-icon">🎟️</span>
                    <h3>Free Entrance</h3>
                    <p>Open to everyone!</p>
                </div>
                <div class="quick-info-card">
                    <span class="quick-icon">🎨</span>
                    <h3>Colors</h3>
                    <p>
                        1 packet — $3<br>
                        4 packets — $10
                    </p>
                </div>
                <div class="quick-info-card">
                    <span class="quick-icon">👕</span>
                    <h3>T-Shirts</h3>
                    <p>NOLA Holi T-Shirt<br><strong>$20</strong></p>
                </div>
                <div class="quick-info-card">
                    <span class="quick-icon">🍛</span>
                    <h3>Food & Drinks</h3>
                    <p>Food, Drinks, Beer & Liquor available from vendors</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Food Vendors Section -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title" style="text-align: center; margin-bottom: 10px;">Food Vendors</h2>
            <p style="text-align: center; color: var(--text-light); margin-bottom: 30px;">Authentic Indian cuisine from the Gulf South</p>
            
            <div class="food-vendors-grid">
                <a href="https://www.indiandelightms.com/" target="_blank" rel="noopener noreferrer" class="vendor-card">
                    <div class="vendor-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Indian Delight logo.png" alt="Indian Delight Logo">
                    </div>
                    <div class="vendor-info">
                        <h3>Indian Delight</h3>
                        <p>Hattiesburg, MS</p>
                    </div>
                </a>
                
                <a href="https://aromanolaindiancuisine.com/" target="_blank" rel="noopener noreferrer" class="vendor-card">
                    <div class="vendor-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Aroma Logo.png" alt="Aroma Indian Cuisine Logo">
                    </div>
                    <div class="vendor-info">
                        <h3>Aroma Indian Cuisine</h3>
                        <p>New Orleans, LA</p>
                    </div>
                </a>
                
                <a href="https://destinationindiala.com/" target="_blank" rel="noopener noreferrer" class="vendor-card">
                    <div class="vendor-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Destination India Logo.PNG" alt="Destination India Logo">
                    </div>
                    <div class="vendor-info">
                        <h3>Destination India</h3>
                        <p>Lafayette, LA</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="content-section bg-purple text-white" style="padding: 50px 20px;">
        <div class="container">
            <div style="text-align: center; max-width: 600px; margin: 0 auto;">
                <h2 style="color: white; margin-bottom: 15px;">Join the Celebration!</h2>
                <p style="color: rgba(255,255,255,0.9); margin-bottom: 25px;">
                    NOLA Holi is free and open to everyone. Bring your friends, bring your family, and let's celebrate together!
                </p>
                <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/volunteers/')); ?>" class="btn btn-gold">Volunteer</a>
                    <a href="<?php echo esc_url(home_url('/donate/')); ?>" class="btn" style="background: white; color: var(--mardi-gras-purple);">Donate</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
