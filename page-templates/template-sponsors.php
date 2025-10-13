<?php
/**
 * Template Name: Sponsors
 * Template for displaying current sponsors by tier
 * 
 * @package NOLAHoli
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="min-height: 400px; background: linear-gradient(135deg, var(--mardi-gras-gold) 0%, var(--mardi-gras-purple) 100%);">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Our Sponsors</h1>
            <p class="hero-subtitle">Thank You for Supporting the Festival of Colors</p>
        </div>
    </section>
    
    <!-- Thank You Section -->
    <section class="content-section bg-white">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 class="section-title">Thank You to Our Sponsors</h2>
                <div class="section-divider"></div>
                
                <p style="font-size: 1.2rem; line-height: 2; color: var(--text-light); margin-bottom: 30px;">
                    NOLA Holi wouldn't be possible without the generous support of our sponsors. These organizations 
                    and individuals share our vision of celebrating diversity, culture, and community in New Orleans. 
                    Their contributions help us create a vibrant, FREE festival for everyone to enjoy!
                </p>
                
                <a href="<?php echo esc_url(home_url('/sponsorship-packet/')); ?>" class="btn btn-primary">
                    Become a Sponsor
                </a>
            </div>
        </div>
    </section>
    
    <!-- 2025 Sponsors by Tier -->
    <section class="content-section bg-light">
        <div class="container">
            <h2 class="section-title text-center">2025 Sponsors</h2>
            <div class="section-divider"></div>
            <p style="text-align: center; font-size: 1.1rem; color: var(--text-light); margin-bottom: 50px;">
                We are grateful to our 2025 sponsors who help make the festival possible!
            </p>
            
            <?php
            // Define tier order and styling
            $tiers = array(
                'event' => array(
                    'name' => 'Event Sponsors',
                    'color' => 'var(--mardi-gras-purple)',
                    'order' => 1
                ),
                'diamond' => array(
                    'name' => 'Diamond Sponsors',
                    'color' => '#4DB8FF',
                    'order' => 2
                ),
                'platinum' => array(
                    'name' => 'Platinum Sponsors',
                    'color' => '#6C757D',
                    'order' => 3
                ),
                'gold' => array(
                    'name' => 'Gold Sponsors',
                    'color' => 'var(--mardi-gras-gold)',
                    'order' => 4
                ),
                'silver' => array(
                    'name' => 'Silver Sponsors',
                    'color' => '#95A5A6',
                    'order' => 5
                ),
                'friends' => array(
                    'name' => 'Friends of NOLA Holi',
                    'color' => 'var(--mardi-gras-green)',
                    'order' => 6
                )
            );
            
            // Loop through each tier
            foreach ($tiers as $tier_key => $tier_data) :
                // Query sponsors for this tier
                $args = array(
                    'post_type' => 'sponsor',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => '_sponsor_year',
                            'value' => '2025',
                            'compare' => '='
                        ),
                        array(
                            'key' => '_sponsor_tier',
                            'value' => $tier_key,
                            'compare' => '='
                        )
                    ),
                    'meta_key' => '_sponsor_display_order',
                    'orderby' => array(
                        'meta_value_num' => 'ASC',
                        'title' => 'ASC'
                    )
                );
                
                $sponsors_query = new WP_Query($args);
                
                if ($sponsors_query->have_posts()) : ?>
                    <!-- Tier Section -->
                    <div class="sponsor-tier-section" style="margin-bottom: 60px;">
                        <h3 class="tier-title" style="color: <?php echo $tier_data['color']; ?>; text-align: center; font-size: 2rem; margin-bottom: 30px;">
                            <?php echo $tier_data['name']; ?>
                        </h3>
                        
                        <div class="sponsor-logos" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; align-items: center; justify-items: center;">
                            <?php while ($sponsors_query->have_posts()) : $sponsors_query->the_post(); 
                                $website = get_post_meta(get_the_ID(), '_sponsor_website', true);
                                $display_order = get_post_meta(get_the_ID(), '_sponsor_display_order', true);
                            ?>
                                <div class="sponsor-logo-item" style="text-align: center; padding: 20px; background: white; border-radius: 10px; box-shadow: var(--shadow-sm); transition: transform 0.3s ease, box-shadow 0.3s ease; width: 100%; max-width: 300px;">
                                    <?php if ($website) : ?>
                                        <a href="<?php echo esc_url($website); ?>" target="_blank" rel="noopener noreferrer" style="text-decoration: none; display: block;">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div style="height: 150px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                                                    <?php the_post_thumbnail('medium', array('style' => 'max-width: 100%; max-height: 150px; height: auto; object-fit: contain;')); ?>
                                                </div>
                                            <?php endif; ?>
                                            <h4 style="color: <?php echo $tier_data['color']; ?>; margin: 0; font-size: 1.2rem;">
                                                <?php the_title(); ?>
                                            </h4>
                                        </a>
                                    <?php else : ?>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div style="height: 150px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                                                <?php the_post_thumbnail('medium', array('style' => 'max-width: 100%; max-height: 150px; height: auto; object-fit: contain;')); ?>
                                            </div>
                                        <?php endif; ?>
                                        <h4 style="color: <?php echo $tier_data['color']; ?>; margin: 0; font-size: 1.2rem;">
                                            <?php the_title(); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endif;
            endforeach;
            
            // Check if there are ANY sponsors at all
            $all_sponsors_args = array(
                'post_type' => 'sponsor',
                'posts_per_page' => 1,
                'meta_query' => array(
                    array(
                        'key' => '_sponsor_year',
                        'value' => '2025',
                        'compare' => '='
                    )
                )
            );
            $check_query = new WP_Query($all_sponsors_args);
            
            if (!$check_query->have_posts()) : ?>
                <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 15px;">
                    <div style="font-size: 3rem; margin-bottom: 20px;">🎉</div>
                    <h3 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.8rem;">
                        Be Our First Sponsor!
                    </h3>
                    <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px; max-width: 600px; margin-left: auto; margin-right: auto;">
                        Our 2025 sponsors will be announced soon. Want to be first? Join us in making NOLA Holi 2026 
                        the biggest celebration yet!
                    </p>
                    <a href="<?php echo esc_url(home_url('/sponsorship-packet/')); ?>" class="btn btn-primary">
                        View Sponsorship Opportunities
                    </a>
                </div>
            <?php endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2 style="margin-bottom: 20px; font-size: 2.5rem; color: white;">Join Our Sponsors</h2>
            <p style="font-size: 1.2rem; margin-bottom: 30px; color: white; opacity: 0.95;">
                Interested in sponsoring NOLA Holi 2026? We'd love to partner with you!
            </p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/sponsorship-packet/')); ?>" class="btn btn-gold">
                    View Sponsorship Packages
                </a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-white">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
</main>

<style>
.sponsor-logo-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

@media (max-width: 768px) {
    .sponsor-logos {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php
get_footer();
?>
