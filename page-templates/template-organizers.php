<?php
/**
 * Template Name: Organizers
 * Template for the Organizers/Board of Directors page
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="min-height: 400px; background: linear-gradient(135deg, var(--mardi-gras-gold) 0%, var(--mardi-gras-green) 100%);">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Our Team</h1>
            <p class="hero-subtitle">The People Behind NOLA Holi</p>
        </div>
    </section>
    
    <!-- Intro Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 class="section-title">Board of Directors</h2>
                <div class="section-divider"></div>
                
                <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light); margin-bottom: 30px;">
                    NOLA Holi is organized by a dedicated Board of Directors comprising community leaders, 
                    volunteers, and passionate individuals who believe in the power of celebration to unite people. 
                    Together, they work year-round to bring this vibrant festival to life.
                </p>
            </div>
        </div>
    </section>
    
    <!-- Board Members -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">Meet Our Board</h2>
            <div class="section-divider"></div>
            
            <?php
            // Query team members
            $args = array(
                'post_type' => 'team_member',
                'posts_per_page' => -1,
                'meta_key' => '_team_order',
                'orderby' => 'meta_value_num',
                'order' => 'ASC'
            );
            
            $team_query = new WP_Query($args);
            
            if ($team_query->have_posts()) : ?>
                <div class="team-grid">
                    <?php while ($team_query->have_posts()) : $team_query->the_post(); 
                        $role = get_post_meta(get_the_ID(), '_team_role', true);
                    ?>
                        <div class="team-member">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('nolaholi-team', array('class' => 'member-photo')); ?>
                            <?php else : ?>
                                <div class="member-photo" style="background: var(--mardi-gras-gold); display: flex; align-items: center; justify-content: center; font-size: 4rem; color: white;">
                                    👤
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="member-name"><?php the_title(); ?></h3>
                            <?php if ($role) : ?>
                                <p class="member-role"><?php echo esc_html($role); ?></p>
                            <?php endif; ?>
                            
                            <?php if (get_the_content()) : ?>
                                <div class="member-bio">
                                    <?php the_content(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <!-- Static Board Members if none added yet -->
                <div class="team-grid">
                    <div class="team-member">
                        <div class="member-photo" style="background: var(--mardi-gras-purple); display: flex; align-items: center; justify-content: center; font-size: 4rem; color: white;">
                            AL
                        </div>
                        <h3 class="member-name">Arun Lakhotia</h3>
                        <p class="member-role">Founder & President</p>
                        <p class="member-bio">
                            Arun founded NOLA Holi in honor of his late wife Michelle, bringing their shared dream 
                            of celebrating Holi in New Orleans to life. His vision and dedication continue to drive 
                            the festival's growth and success.
                        </p>
                    </div>
                    
                    <!-- Add more static board members as needed -->
                    <div style="grid-column: 1 / -1; text-align: center; padding: 40px 20px; background: var(--off-white); border-radius: 10px; margin-top: 20px;">
                        <p style="color: var(--text-light); font-size: 1.1rem; margin-bottom: 15px;">
                            More board member profiles coming soon!
                        </p>
                        <p style="color: var(--text-light); font-style: italic;">
                            Want to get involved in festival leadership? <a href="<?php echo esc_url(home_url('/contact/')); ?>" style="color: var(--mardi-gras-purple); font-weight: 600;">Contact us</a>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- Our Mission -->
    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title text-center">Our Mission</h2>
            <div class="section-divider"></div>
            
            <div style="max-width: 900px; margin: 40px auto 0;">
                <div style="background: var(--off-white); padding: 40px; border-radius: 15px; text-align: center;">
                    <p style="font-size: 1.3rem; line-height: 2; color: var(--text-dark); margin-bottom: 30px;">
                        <strong style="color: var(--mardi-gras-purple);">Our mission</strong> is to celebrate diversity, 
                        foster cultural understanding, and bring communities together through the joyful celebration of 
                        Holi in New Orleans.

                    </p>
                </div>
                
                <div class="feature-grid" style="margin-top: 60px;">
                    <div class="feature-card">
                        <div class="feature-icon">🌈</div>
                        <h3 class="feature-title">Celebrate Diversity</h3>
                        <p class="feature-description">
                            Honor and showcase the rich tapestry of cultures that make New Orleans unique, with 
                            special focus on Indian heritage and traditions.
                        </p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">🤝</div>
                        <h3 class="feature-title">Build Community</h3>
                        <p class="feature-description">
                            Create spaces where people of all backgrounds can come together, break down barriers, 
                            and form meaningful connections through shared celebration.
                        </p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">📚</div>
                        <h3 class="feature-title">Educate & Inspire</h3>
                        <p class="feature-description">
                            Share the history and significance of Holi while inspiring others to embrace joy, 
                            forgiveness, and the celebration of new beginnings.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Volunteer Leadership -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">Volunteer Committee Leaders</h2>
            <div class="section-divider"></div>
            <p style="text-align: center; max-width: 700px; margin: 20px auto 40px; font-size: 1.1rem; color: var(--text-light);">
                In addition to our Board of Directors, NOLA Holi is supported by dedicated committee leaders 
                who coordinate different aspects of the festival.
            </p>
            
            <div style="max-width: 1000px; margin: 0 auto;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                    <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm); text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 15px;">🎪</div>
                        <h4 style="color: var(--mardi-gras-purple); font-size: 1.3rem; margin-bottom: 10px;">
                            Event Operations
                        </h4>
                        <p style="color: var(--text-light);">
                            Logistics, venue coordination, permits, and day-of operations
                        </p>
                    </div>
                    
                    <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm); text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 15px;">🤝</div>
                        <h4 style="color: var(--mardi-gras-green); font-size: 1.3rem; margin-bottom: 10px;">
                            Volunteer Coordination
                        </h4>
                        <p style="color: var(--text-light);">
                            Recruiting, training, scheduling, and supporting our volunteer team
                        </p>
                    </div>
                    
                    <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm); text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 15px;">📣</div>
                        <h4 style="color: var(--mardi-gras-gold); font-size: 1.3rem; margin-bottom: 10px;">
                            Marketing & PR
                        </h4>
                        <p style="color: var(--text-light);">
                            Social media, press releases, community outreach, and promotion
                        </p>
                    </div>
                    
                    <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm); text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 15px;">⭐</div>
                        <h4 style="color: var(--mardi-gras-purple); font-size: 1.3rem; margin-bottom: 10px;">
                            Sponsorship
                        </h4>
                        <p style="color: var(--text-light);">
                            Securing sponsors, managing partnerships, and donor relations
                        </p>
                    </div>
                    
                    <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm); text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 15px;">🎤</div>
                        <h4 style="color: var(--mardi-gras-green); font-size: 1.3rem; margin-bottom: 10px;">
                            Programming
                        </h4>
                        <p style="color: var(--text-light);">
                            Booking performers, coordinating entertainment, and cultural activities
                        </p>
                    </div>
                    
                    <div style="background: var(--white); padding: 30px; border-radius: 10px; box-shadow: var(--shadow-sm); text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 15px;">🍽️</div>
                        <h4 style="color: var(--mardi-gras-gold); font-size: 1.3rem; margin-bottom: 10px;">
                            Vendor Relations
                        </h4>
                        <p style="color: var(--text-light);">
                            Managing food vendors, artisans, and marketplace logistics
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Get Involved -->
    <section class="content-section bg-purple">
        <div class="container">
            <div style="text-align: center; max-width: 700px; margin: 0 auto;">
                <h2 class="section-title" style="color: white;">Join Our Team</h2>
                <div class="section-divider"></div>
                <p style="font-size: 1.1rem; color: var(--off-white); line-height: 1.8; margin-bottom: 30px;">
                    Interested in taking a leadership role with NOLA Holi? We're always looking for passionate 
                    individuals to join our organizing team, serve on committees, or contribute their skills 
                    to making the festival even better.
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/volunteers/')); ?>" class="btn btn-gold">Volunteer</a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-secondary">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
    
</main>

<?php
get_footer();
?>

