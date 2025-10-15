<?php
/**
 * NOLA Holi Theme Functions
 * 
 * @package NOLAHoli
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Include Google Photos API Integration
 */
require_once get_template_directory() . '/inc/google-photos-api.php';

/**
 * Theme Setup
 */
function nolaholi_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'nolaholi'),
        'footer'  => __('Footer Menu', 'nolaholi'),
    ));
    
    // Add image sizes
    add_image_size('nolaholi-hero', 1920, 800, true);
    add_image_size('nolaholi-gallery', 600, 600, true);
    add_image_size('nolaholi-team', 400, 400, true);
}
add_action('after_setup_theme', 'nolaholi_setup');

/**
 * Enqueue scripts and styles
 */
function nolaholi_scripts() {
    // Aggressive cache busting: always use file modification time
    // This ensures browsers ALWAYS get the latest version
    $css_version = filemtime(get_template_directory() . '/style.css');
    $js_version = filemtime(get_template_directory() . '/js/main.js');
    
    // Main stylesheet
    wp_enqueue_style('nolaholi-style', get_stylesheet_uri(), array(), $css_version);
    
    // Google Fonts
    wp_enqueue_style('nolaholi-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap', array(), null);
    
    // Main JavaScript
    wp_enqueue_script('nolaholi-script', get_template_directory_uri() . '/js/main.js', array('jquery'), $js_version, true);
    
    // Localize script for AJAX
    wp_localize_script('nolaholi-script', 'nolaholi_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('nolaholi_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'nolaholi_scripts');

/**
 * Register widget areas
 */
function nolaholi_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer - Column 1', 'nolaholi'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in the first footer column.', 'nolaholi'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer - Column 2', 'nolaholi'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in the second footer column.', 'nolaholi'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer - Column 3', 'nolaholi'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in the third footer column.', 'nolaholi'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'nolaholi_widgets_init');

/**
 * Custom excerpt length
 */
function nolaholi_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'nolaholi_excerpt_length');

/**
 * Custom excerpt more
 */
function nolaholi_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'nolaholi_excerpt_more');

/**
 * Add custom body classes
 */
function nolaholi_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    
    return $classes;
}
add_filter('body_class', 'nolaholi_body_classes');

/**
 * Custom template tags
 */
function nolaholi_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    $time_string = sprintf($time_string,
        esc_attr(get_the_date('c')),
        esc_html(get_the_date())
    );
    
    $posted_on = sprintf(
        esc_html_x('Posted on %s', 'post date', 'nolaholi'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );
    
    echo '<span class="posted-on">' . $posted_on . '</span>';
}

/**
 * Custom Post Types
 */
function nolaholi_custom_post_types() {
    // Sponsors Post Type
    register_post_type('sponsor', array(
        'labels' => array(
            'name'               => __('Sponsors', 'nolaholi'),
            'singular_name'      => __('Sponsor', 'nolaholi'),
            'add_new'            => __('Add New Sponsor', 'nolaholi'),
            'add_new_item'       => __('Add New Sponsor', 'nolaholi'),
            'edit_item'          => __('Edit Sponsor', 'nolaholi'),
            'new_item'           => __('New Sponsor', 'nolaholi'),
            'view_item'          => __('View Sponsor', 'nolaholi'),
            'search_items'       => __('Search Sponsors', 'nolaholi'),
            'not_found'          => __('No sponsors found', 'nolaholi'),
            'not_found_in_trash' => __('No sponsors found in trash', 'nolaholi'),
        ),
        'public'        => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-star-filled',
        'supports'      => array('title', 'editor', 'thumbnail'),
        'show_in_rest'  => true,
    ));
    
    // Vendors Post Type
    register_post_type('vendor', array(
        'labels' => array(
            'name'               => __('Vendors', 'nolaholi'),
            'singular_name'      => __('Vendor', 'nolaholi'),
            'add_new'            => __('Add New Vendor', 'nolaholi'),
            'add_new_item'       => __('Add New Vendor', 'nolaholi'),
            'edit_item'          => __('Edit Vendor', 'nolaholi'),
            'new_item'           => __('New Vendor', 'nolaholi'),
            'view_item'          => __('View Vendor', 'nolaholi'),
            'search_items'       => __('Search Vendors', 'nolaholi'),
            'not_found'          => __('No vendors found', 'nolaholi'),
            'not_found_in_trash' => __('No vendors found in trash', 'nolaholi'),
        ),
        'public'        => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-store',
        'supports'      => array('title', 'editor', 'thumbnail'),
        'show_in_rest'  => true,
    ));
    
    // Team Members Post Type
    register_post_type('team_member', array(
        'labels' => array(
            'name'               => __('Team Members', 'nolaholi'),
            'singular_name'      => __('Team Member', 'nolaholi'),
            'add_new'            => __('Add New Member', 'nolaholi'),
            'add_new_item'       => __('Add New Team Member', 'nolaholi'),
            'edit_item'          => __('Edit Team Member', 'nolaholi'),
            'new_item'           => __('New Team Member', 'nolaholi'),
            'view_item'          => __('View Team Member', 'nolaholi'),
            'search_items'       => __('Search Team Members', 'nolaholi'),
            'not_found'          => __('No team members found', 'nolaholi'),
            'not_found_in_trash' => __('No team members found in trash', 'nolaholi'),
        ),
        'public'        => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-groups',
        'supports'      => array('title', 'editor', 'thumbnail'),
        'show_in_rest'  => true,
    ));
    
    // Gallery Post Type
    // Note: has_archive set to false to avoid conflict with /gallery/ page
    register_post_type('gallery', array(
        'labels' => array(
            'name'               => __('Gallery', 'nolaholi'),
            'singular_name'      => __('Gallery Item', 'nolaholi'),
            'add_new'            => __('Add New Gallery Item', 'nolaholi'),
            'add_new_item'       => __('Add New Gallery Item', 'nolaholi'),
            'edit_item'          => __('Edit Gallery Item', 'nolaholi'),
            'new_item'           => __('New Gallery Item', 'nolaholi'),
            'view_item'          => __('View Gallery Item', 'nolaholi'),
            'search_items'       => __('Search Gallery', 'nolaholi'),
            'not_found'          => __('No gallery items found', 'nolaholi'),
            'not_found_in_trash' => __('No gallery items found in trash', 'nolaholi'),
        ),
        'public'        => true,
        'has_archive'   => false,  // Changed to false to allow /gallery/ page
        'menu_icon'     => 'dashicons-format-gallery',
        'supports'      => array('title', 'editor', 'thumbnail'),
        'show_in_rest'  => true,
    ));
}
add_action('init', 'nolaholi_custom_post_types');

/**
 * Custom Taxonomies
 */
function nolaholi_custom_taxonomies() {
    // Sponsor Tier Taxonomy
    register_taxonomy('sponsor_tier', 'sponsor', array(
        'labels' => array(
            'name'              => __('Sponsor Tiers', 'nolaholi'),
            'singular_name'     => __('Sponsor Tier', 'nolaholi'),
            'search_items'      => __('Search Sponsor Tiers', 'nolaholi'),
            'all_items'         => __('All Sponsor Tiers', 'nolaholi'),
            'edit_item'         => __('Edit Sponsor Tier', 'nolaholi'),
            'update_item'       => __('Update Sponsor Tier', 'nolaholi'),
            'add_new_item'      => __('Add New Sponsor Tier', 'nolaholi'),
            'new_item_name'     => __('New Sponsor Tier Name', 'nolaholi'),
            'menu_name'         => __('Sponsor Tiers', 'nolaholi'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
    ));
    
    // Gallery Year Taxonomy
    register_taxonomy('gallery_year', 'gallery', array(
        'labels' => array(
            'name'              => __('Years', 'nolaholi'),
            'singular_name'     => __('Year', 'nolaholi'),
            'search_items'      => __('Search Years', 'nolaholi'),
            'all_items'         => __('All Years', 'nolaholi'),
            'edit_item'         => __('Edit Year', 'nolaholi'),
            'update_item'       => __('Update Year', 'nolaholi'),
            'add_new_item'      => __('Add New Year', 'nolaholi'),
            'new_item_name'     => __('New Year Name', 'nolaholi'),
            'menu_name'         => __('Years', 'nolaholi'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
    ));
}
add_action('init', 'nolaholi_custom_taxonomies');

/**
 * Add custom fields support
 * Note: You can use plugins like Advanced Custom Fields (ACF) for more robust custom fields
 */
function nolaholi_add_meta_boxes() {
    // Sponsor meta box
    add_meta_box(
        'sponsor_details',
        __('Sponsor Details', 'nolaholi'),
        'nolaholi_sponsor_meta_box',
        'sponsor',
        'normal',
        'high'
    );
    
    // Team member meta box
    add_meta_box(
        'team_member_details',
        __('Team Member Details', 'nolaholi'),
        'nolaholi_team_member_meta_box',
        'team_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'nolaholi_add_meta_boxes');

/**
 * Sponsor meta box callback
 */
function nolaholi_sponsor_meta_box($post) {
    wp_nonce_field('nolaholi_sponsor_meta', 'nolaholi_sponsor_nonce');
    
    $website = get_post_meta($post->ID, '_sponsor_website', true);
    $tier = get_post_meta($post->ID, '_sponsor_tier', true);
    $year = get_post_meta($post->ID, '_sponsor_year', true);
    $order = get_post_meta($post->ID, '_sponsor_display_order', true);
    ?>
    <p>
        <label for="sponsor_website"><?php _e('Website URL:', 'nolaholi'); ?></label><br>
        <input type="url" id="sponsor_website" name="sponsor_website" value="<?php echo esc_attr($website); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="sponsor_tier"><?php _e('Sponsor Tier:', 'nolaholi'); ?></label><br>
        <select id="sponsor_tier" name="sponsor_tier" style="width: 100%;">
            <option value="event" <?php selected($tier, 'event'); ?>>Event Sponsor</option>
            <option value="diamond" <?php selected($tier, 'diamond'); ?>>Diamond</option>
            <option value="platinum" <?php selected($tier, 'platinum'); ?>>Platinum</option>
            <option value="gold" <?php selected($tier, 'gold'); ?>>Gold</option>
            <option value="silver" <?php selected($tier, 'silver'); ?>>Silver</option>
            <option value="friends" <?php selected($tier, 'friends'); ?>>Friends of NOLA Holi</option>
        </select>
    </p>
    <p>
        <label for="sponsor_year"><?php _e('Year:', 'nolaholi'); ?></label><br>
        <input type="number" id="sponsor_year" name="sponsor_year" value="<?php echo esc_attr($year); ?>" min="2024" max="2050" style="width: 100%;">
    </p>
    <p>
        <label for="sponsor_display_order"><?php _e('Display Order (within tier):', 'nolaholi'); ?></label><br>
        <input type="number" id="sponsor_display_order" name="sponsor_display_order" value="<?php echo esc_attr($order); ?>" min="0" style="width: 100%;">
        <br><small>Lower numbers appear first. Use this to control ordering within the same sponsorship tier.</small>
    </p>
    <?php
}

/**
 * Team member meta box callback
 */
function nolaholi_team_member_meta_box($post) {
    wp_nonce_field('nolaholi_team_meta', 'nolaholi_team_nonce');
    
    $role = get_post_meta($post->ID, '_team_role', true);
    $order = get_post_meta($post->ID, '_team_order', true);
    ?>
    <p>
        <label for="team_role"><?php _e('Role/Position:', 'nolaholi'); ?></label><br>
        <input type="text" id="team_role" name="team_role" value="<?php echo esc_attr($role); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="team_order"><?php _e('Display Order:', 'nolaholi'); ?></label><br>
        <input type="number" id="team_order" name="team_order" value="<?php echo esc_attr($order); ?>" min="0" style="width: 100%;">
    </p>
    <?php
}

/**
 * Save custom fields
 */
function nolaholi_save_meta_boxes($post_id) {
    // Check if our nonce is set
    if (!isset($_POST['nolaholi_sponsor_nonce']) && !isset($_POST['nolaholi_team_nonce'])) {
        return;
    }
    
    // Verify nonce
    if (isset($_POST['nolaholi_sponsor_nonce'])) {
        if (!wp_verify_nonce($_POST['nolaholi_sponsor_nonce'], 'nolaholi_sponsor_meta')) {
            return;
        }
    }
    
    if (isset($_POST['nolaholi_team_nonce'])) {
        if (!wp_verify_nonce($_POST['nolaholi_team_nonce'], 'nolaholi_team_meta')) {
            return;
        }
    }
    
    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save sponsor fields
    if (isset($_POST['sponsor_website'])) {
        update_post_meta($post_id, '_sponsor_website', sanitize_text_field($_POST['sponsor_website']));
    }
    if (isset($_POST['sponsor_tier'])) {
        update_post_meta($post_id, '_sponsor_tier', sanitize_text_field($_POST['sponsor_tier']));
    }
    if (isset($_POST['sponsor_year'])) {
        update_post_meta($post_id, '_sponsor_year', sanitize_text_field($_POST['sponsor_year']));
    }
    if (isset($_POST['sponsor_display_order'])) {
        update_post_meta($post_id, '_sponsor_display_order', intval($_POST['sponsor_display_order']));
    }
    
    // Save team member fields
    if (isset($_POST['team_role'])) {
        update_post_meta($post_id, '_team_role', sanitize_text_field($_POST['team_role']));
    }
    if (isset($_POST['team_order'])) {
        update_post_meta($post_id, '_team_order', intval($_POST['team_order']));
    }
}
add_action('save_post', 'nolaholi_save_meta_boxes');

/**
 * Customizer settings
 */
function nolaholi_customize_register($wp_customize) {
    // Event Info Section
    $wp_customize->add_section('nolaholi_event_info', array(
        'title'    => __('Event Information', 'nolaholi'),
        'priority' => 30,
    ));
    
    // Event Date
    $wp_customize->add_setting('nolaholi_event_date', array(
        'default'           => 'March 7, 2026',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('nolaholi_event_date', array(
        'label'   => __('Event Date', 'nolaholi'),
        'section' => 'nolaholi_event_info',
        'type'    => 'text',
    ));
    
    // Rain Date
    $wp_customize->add_setting('nolaholi_rain_date', array(
        'default'           => 'March 8, 2026',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('nolaholi_rain_date', array(
        'label'   => __('Rain Date', 'nolaholi'),
        'section' => 'nolaholi_event_info',
        'type'    => 'text',
    ));
    
    // Event Time
    $wp_customize->add_setting('nolaholi_event_time', array(
        'default'           => 'TBD',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('nolaholi_event_time', array(
        'label'   => __('Event Time', 'nolaholi'),
        'section' => 'nolaholi_event_info',
        'type'    => 'text',
    ));
    
    // Location
    $wp_customize->add_setting('nolaholi_location', array(
        'default'           => 'Washington Square Park, New Orleans',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('nolaholi_location', array(
        'label'   => __('Event Location', 'nolaholi'),
        'section' => 'nolaholi_event_info',
        'type'    => 'text',
    ));
    
    // Social Media Section
    $wp_customize->add_section('nolaholi_social', array(
        'title'    => __('Social Media', 'nolaholi'),
        'priority' => 31,
    ));
    
    // Facebook URL
    $wp_customize->add_setting('nolaholi_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('nolaholi_facebook', array(
        'label'   => __('Facebook URL', 'nolaholi'),
        'section' => 'nolaholi_social',
        'type'    => 'url',
    ));
    
    // Instagram URL
    $wp_customize->add_setting('nolaholi_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('nolaholi_instagram', array(
        'label'   => __('Instagram URL', 'nolaholi'),
        'section' => 'nolaholi_social',
        'type'    => 'url',
    ));
    
    // Twitter URL
    $wp_customize->add_setting('nolaholi_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('nolaholi_twitter', array(
        'label'   => __('Twitter URL', 'nolaholi'),
        'section' => 'nolaholi_social',
        'type'    => 'url',
    ));
    
    // Gallery Section
    $wp_customize->add_section('nolaholi_gallery', array(
        'title'    => __('Photo Gallery', 'nolaholi'),
        'priority' => 32,
        'description' => __('Add Google Photos album URLs for each year. Get shareable link from Google Photos album.', 'nolaholi'),
    ));
    
    // Gallery Display Style
    $wp_customize->add_setting('nolaholi_gallery_style', array(
        'default'           => 'grid',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('nolaholi_gallery_style', array(
        'label'   => __('Gallery Display Style', 'nolaholi'),
        'section' => 'nolaholi_gallery',
        'type'    => 'select',
        'choices' => array(
            'grid'     => __('Grid View', 'nolaholi'),
            'carousel' => __('Carousel Slider', 'nolaholi'),
        ),
    ));
    
    // 2026 Gallery URL
    $wp_customize->add_setting('nolaholi_gallery_2026', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('nolaholi_gallery_2026', array(
        'label'       => __('2026 Google Photos Album URL', 'nolaholi'),
        'section'     => 'nolaholi_gallery',
        'type'        => 'url',
        'description' => __('Paste the shareable link from Google Photos', 'nolaholi'),
    ));
    
    // 2025 Gallery URL
    $wp_customize->add_setting('nolaholi_gallery_2025', array(
        'default'           => 'https://photos.app.goo.gl/A7k1H1NdwU7wUvjLA',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('nolaholi_gallery_2025', array(
        'label'       => __('2025 Google Photos Album URL', 'nolaholi'),
        'section'     => 'nolaholi_gallery',
        'type'        => 'url',
        'description' => __('Paste the shareable link from Google Photos', 'nolaholi'),
    ));
    
    // 2024 Gallery URL
    $wp_customize->add_setting('nolaholi_gallery_2024', array(
        'default'           => 'https://photos.google.com/share/AF1QipMXoU__flN42f4HOvc_3Ue8HkTyXWUEHWSLuJulorUazYVGVsRzijEKD6GjA48MGA/memory/AF1QipPlfUZfOStBcDVTINx3OhPsgfCN77FIL4qBkiLIfzo63FJca7L1jE2KRHHm492t_g?key=MHgwV0xhLU9tYzdhMmNfR2FNbTN0eDdCWE9nRkF3&pli=1',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('nolaholi_gallery_2024', array(
        'label'       => __('2024 Google Photos Album URL', 'nolaholi'),
        'section'     => 'nolaholi_gallery',
        'type'        => 'url',
        'description' => __('Paste the shareable link from Google Photos', 'nolaholi'),
    ));
}
add_action('customize_register', 'nolaholi_customize_register');

/**
 * Get first event sponsor for header display
 * 
 * @return array|false Array with sponsor data or false if no sponsor found
 */
function nolaholi_get_first_event_sponsor() {
    // Check for cached sponsor
    $cached_sponsor = get_transient('nolaholi_first_event_sponsor');
    if ($cached_sponsor !== false) {
        return $cached_sponsor;
    }
    
    // Query for event sponsors in 2025
    $args = array(
        'post_type' => 'sponsor',
        'posts_per_page' => -1,  // Get all to sort properly
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => '_sponsor_year',
                'value' => '2025',
                'compare' => '='
            ),
            array(
                'key' => '_sponsor_tier',
                'value' => 'event',
                'compare' => '='
            )
        )
    );
    
    $sponsors_query = new WP_Query($args);
    
    if (!$sponsors_query->have_posts()) {
        // No sponsor found, cache for 1 hour
        set_transient('nolaholi_first_event_sponsor', false, HOUR_IN_SECONDS);
        return false;
    }
    
    // Sort sponsors by display_order
    $sponsors_array = array();
    while ($sponsors_query->have_posts()) {
        $sponsors_query->the_post();
        $display_order = get_post_meta(get_the_ID(), '_sponsor_display_order', true);
        $display_order = ($display_order === '' || $display_order === false) ? 0 : intval($display_order);
        
        $sponsors_array[] = array(
            'id' => get_the_ID(),
            'name' => get_the_title(),
            'display_order' => $display_order,
            'website' => get_post_meta(get_the_ID(), '_sponsor_website', true),
            'logo' => get_the_post_thumbnail_url(get_the_ID(), 'medium')
        );
    }
    wp_reset_postdata();
    
    // Sort by display_order (ascending)
    usort($sponsors_array, function($a, $b) {
        return $a['display_order'] - $b['display_order'];
    });
    
    // Get first sponsor
    $first_sponsor = $sponsors_array[0];
    
    // Prepare return data
    $sponsor_data = array(
        'name' => $first_sponsor['name'],
        'logo' => $first_sponsor['logo'],
        'website' => $first_sponsor['website']
    );
    
    // Cache for 1 hour
    set_transient('nolaholi_first_event_sponsor', $sponsor_data, HOUR_IN_SECONDS);
    
    return $sponsor_data;
}

/**
 * Clear sponsor cache when sponsor post is saved
 */
function nolaholi_clear_sponsor_cache($post_id) {
    if (get_post_type($post_id) === 'sponsor') {
        delete_transient('nolaholi_first_event_sponsor');
    }
}
add_action('save_post', 'nolaholi_clear_sponsor_cache');

