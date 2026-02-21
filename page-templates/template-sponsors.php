<?php
/**
 * Template Name: Sponsors
 * Template for displaying current sponsors by tier
 * 
 * @package NOLAHoli
 */

get_header();

// Year-aware tier naming function
// Maps tier keys to display names based on the year
if (!function_exists('nolaholi_get_tier_name')) {
    function nolaholi_get_tier_name($tier_key, $year) {
        // 2025 tier names (original structure)
        $tiers_2025 = array(
            'event' => 'Event Sponsors',
            'diamond' => 'Diamond Sponsors',
            'platinum' => 'Platinum Sponsors',
            'gold' => 'Gold Sponsors',
            'silver' => 'Silver Sponsors',
            'friends' => 'Friends of NOLA Holi'
        );
        
        // 2026+ tier names (new structure)
        $tiers_2026_plus = array(
            'event' => 'Presenting Sponsors',
            'parade' => 'Parade Sponsors',
            'entertainment' => 'Entertainment Sponsors',
            'vip' => 'VIP Experience Sponsors',
            'gold' => 'Gold Sponsors',
            'silver' => 'Silver Sponsors',
            'friends' => 'Friends of NOLA Holi'
        );
        
        // Select appropriate tier structure based on year
        if ($year <= 2025) {
            return isset($tiers_2025[$tier_key]) ? $tiers_2025[$tier_key] : ucfirst($tier_key) . ' Sponsors';
        } else {
            return isset($tiers_2026_plus[$tier_key]) ? $tiers_2026_plus[$tier_key] : ucfirst($tier_key) . ' Sponsors';
        }
    }
}

// Define all possible tiers with their styling and order
$all_tier_config = array(
    'event' => array('color' => 'var(--mardi-gras-purple)', 'order' => 1),
    'parade' => array('color' => '#4DB8FF', 'order' => 2),
    'diamond' => array('color' => '#4DB8FF', 'order' => 2),
    'entertainment' => array('color' => 'var(--mardi-gras-purple)', 'order' => 3),
    'platinum' => array('color' => '#6C757D', 'order' => 3),
    'vip' => array('color' => 'var(--mardi-gras-gold)', 'order' => 4),
    'gold' => array('color' => 'var(--mardi-gras-gold)', 'order' => 5),
    'silver' => array('color' => '#95A5A6', 'order' => 6),
    'friends' => array('color' => 'var(--mardi-gras-green)', 'order' => 7)
);

// Get all unique years that have sponsors (sorted descending - most recent first)
global $wpdb;
$available_years = $wpdb->get_col(
    "SELECT DISTINCT meta_value FROM {$wpdb->postmeta} pm
     INNER JOIN {$wpdb->posts} p ON pm.post_id = p.ID
     WHERE pm.meta_key = '_sponsor_year' 
     AND p.post_type = 'sponsor' 
     AND p.post_status = 'publish'
     AND pm.meta_value != ''
     ORDER BY meta_value DESC"
);

// Determine selected year: from URL parameter, or default to most recent
$selected_year = isset($_GET['year']) && in_array($_GET['year'], $available_years) 
    ? sanitize_text_field($_GET['year']) 
    : (!empty($available_years) ? $available_years[0] : date('Y'));
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="<?php echo nolaholi_get_hero_background_style('linear-gradient(135deg, var(--mardi-gras-gold) 0%, var(--mardi-gras-purple) 100%)'); ?>">
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
    
    <!-- Sponsors by Tier -->
    <section class="content-section bg-light">
        <div class="container">
            
            <?php if (count($available_years) > 1) : ?>
            <!-- Year Selector Tabs -->
            <div class="sponsor-year-selector" style="display: flex; justify-content: center; gap: 10px; margin-bottom: 40px; flex-wrap: wrap;">
                <?php foreach ($available_years as $year) : ?>
                    <a href="<?php echo esc_url(add_query_arg('year', $year)); ?>" 
                       class="year-tab <?php echo ($year == $selected_year) ? 'active' : ''; ?>"
                       style="padding: 12px 24px; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;
                              <?php if ($year == $selected_year) : ?>
                                  background: var(--mardi-gras-purple); color: white;
                              <?php else : ?>
                                  background: white; color: var(--mardi-gras-purple); border: 2px solid var(--mardi-gras-purple);
                              <?php endif; ?>">
                        <?php echo esc_html($year); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            
            <h2 class="section-title text-center"><?php echo esc_html($selected_year); ?> Sponsors</h2>
            <div class="section-divider"></div>
            <p style="text-align: center; font-size: 1.1rem; color: var(--text-light); margin-bottom: 50px;">
                We are grateful to our <?php echo esc_html($selected_year); ?> sponsors who help make the festival possible!
            </p>
            
            <?php
            // Get all sponsors for the selected year
            $args = array(
                'post_type' => 'sponsor',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => '_sponsor_year',
                        'value' => $selected_year,
                        'compare' => '='
                    )
                )
            );
            
            $all_sponsors_query = new WP_Query($args);
            
            // Group sponsors by tier
            $sponsors_by_tier = array();
            $has_valid_sponsors = false;
            
            if ($all_sponsors_query->have_posts()) {
                while ($all_sponsors_query->have_posts()) {
                    $all_sponsors_query->the_post();
                    $tier_key = get_post_meta(get_the_ID(), '_sponsor_tier', true);
                    
                    // Skip sponsors without a valid tier
                    if (empty($tier_key) || !isset($all_tier_config[$tier_key])) {
                        continue;
                    }
                    
                    $display_order = get_post_meta(get_the_ID(), '_sponsor_display_order', true);
                    $display_order = ($display_order === '' || $display_order === false) ? 0 : intval($display_order);
                    
                    if (!isset($sponsors_by_tier[$tier_key])) {
                        $sponsors_by_tier[$tier_key] = array();
                    }
                    
                    $sponsors_by_tier[$tier_key][] = array(
                        'id' => get_the_ID(),
                        'title' => get_the_title(),
                        'display_order' => $display_order,
                        'website' => get_post_meta(get_the_ID(), '_sponsor_website', true),
                        'has_thumbnail' => has_post_thumbnail()
                    );
                    $has_valid_sponsors = true;
                }
                wp_reset_postdata();
            }
            
            // Sort tiers by their order before displaying
            uksort($sponsors_by_tier, function($a, $b) use ($all_tier_config) {
                $order_a = isset($all_tier_config[$a]['order']) ? $all_tier_config[$a]['order'] : 999;
                $order_b = isset($all_tier_config[$b]['order']) ? $all_tier_config[$b]['order'] : 999;
                return $order_a - $order_b;
            });
            
            // Sort and display each tier
            foreach ($sponsors_by_tier as $tier_key => $sponsors_array) :
                // Skip if tier config doesn't exist
                if (!isset($all_tier_config[$tier_key])) continue;
                
                // Get tier configuration
                $tier_config = $all_tier_config[$tier_key];
                $tier_name = nolaholi_get_tier_name($tier_key, intval($selected_year));
                
                // Sort sponsors by display_order first, then by title
                usort($sponsors_array, function($a, $b) {
                    if ($a['display_order'] === $b['display_order']) {
                        return strcmp($a['title'], $b['title']);
                    }
                    return $a['display_order'] - $b['display_order'];
                });
                
                if (!empty($sponsors_array)) : ?>
                    <!-- Tier Section -->
                    <div class="sponsor-tier-section" style="margin-bottom: 60px;">
                        <h3 class="tier-title" style="color: <?php echo $tier_config['color']; ?>; text-align: center; font-size: 2rem; margin-bottom: 30px;">
                            <?php echo esc_html($tier_name); ?>
                        </h3>
                        
                        <div class="sponsor-logos" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; align-items: center; justify-items: center;">
                            <?php foreach ($sponsors_array as $sponsor) : 
                                // Get the post to access thumbnail
                                $sponsor_post = get_post($sponsor['id']);
                            ?>
                                <div class="sponsor-logo-item" style="text-align: center; padding: 20px; background: white; border-radius: 10px; box-shadow: var(--shadow-sm); transition: transform 0.3s ease, box-shadow 0.3s ease; width: 100%; max-width: 300px;">
                                    <?php if ($sponsor['website']) : ?>
                                        <a href="<?php echo esc_url($sponsor['website']); ?>" target="_blank" rel="noopener noreferrer" style="text-decoration: none; display: block;">
                                            <?php if ($sponsor['has_thumbnail']) : ?>
                                                <div style="height: 150px; display: flex; align-items: center; justify-content: center;">
                                                    <?php echo get_the_post_thumbnail($sponsor['id'], 'medium', array('style' => 'max-width: 100%; max-height: 150px; height: auto; object-fit: contain;')); ?>
                                                </div>
                                            <?php else : ?>
                                                <h4 style="color: <?php echo $tier_config['color']; ?>; margin: 0; font-size: 1.2rem;">
                                                    <?php echo esc_html($sponsor['title']); ?>
                                                </h4>
                                            <?php endif; ?>
                                        </a>
                                    <?php else : ?>
                                        <?php if ($sponsor['has_thumbnail']) : ?>
                                            <div style="height: 150px; display: flex; align-items: center; justify-content: center;">
                                                <?php echo get_the_post_thumbnail($sponsor['id'], 'medium', array('style' => 'max-width: 100%; max-height: 150px; height: auto; object-fit: contain;')); ?>
                                            </div>
                                        <?php else : ?>
                                            <h4 style="color: <?php echo $tier_config['color']; ?>; margin: 0; font-size: 1.2rem;">
                                                <?php echo esc_html($sponsor['title']); ?>
                                            </h4>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif;
            endforeach;
            
            // Check if there are ANY valid sponsors for the selected year
            if (!$has_valid_sponsors) : ?>
                <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 15px;">
                    <div style="font-size: 3rem; margin-bottom: 20px;">🎉</div>
                    <h3 style="color: var(--mardi-gras-purple); margin-bottom: 15px; font-size: 1.8rem;">
                        <?php echo esc_html($selected_year); ?> Sponsors Coming Soon!
                    </h3>
                    <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px; max-width: 600px; margin-left: auto; margin-right: auto;">
                        Our <?php echo esc_html($selected_year); ?> sponsors will be announced soon. Want to be part of NOLA Holi <?php echo esc_html($selected_year); ?>? 
                        Join us in making it the biggest celebration yet!
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
    <?php 
    // Get next event year from customizer or default to next calendar year
    $event_date = get_theme_mod('nolaholi_event_date', '');
    $next_event_year = $event_date ? date('Y', strtotime($event_date)) : date('Y');
    ?>
    <section class="cta-section" style="margin-bottom: 80px;">
        <div class="cta-content">
            <h2 style="margin-bottom: 20px; font-size: 2.5rem; color: white;">Join Our Sponsors</h2>
            <p style="font-size: 1.2rem; margin-bottom: 30px; color: white; opacity: 0.95;">
                Interested in sponsoring NOLA Holi <?php echo esc_html($next_event_year); ?>? We'd love to partner with you!
            </p>
            <div class="cta-buttons" style="display: flex; justify-content: center;">
                <a href="<?php echo esc_url(home_url('/sponsorship-packet/')); ?>" class="btn btn-gold">
                    See Our Sponsorship Package
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

.year-tab:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(94, 43, 122, 0.3);
}

.year-tab.active {
    box-shadow: 0 4px 12px rgba(94, 43, 122, 0.3);
}

@media (max-width: 768px) {
    .sponsor-logos {
        grid-template-columns: 1fr !important;
    }
    
    .sponsor-year-selector {
        gap: 8px !important;
    }
    
    .year-tab {
        padding: 10px 18px !important;
        font-size: 0.9rem;
    }
}
</style>

<?php
get_footer();
?>
