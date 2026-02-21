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
    wp_enqueue_style('nolaholi-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Patrick+Hand&display=swap', array(), null);
    
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
 * Get hero section background style with featured image support
 * 
 * @param string $fallback_gradient Fallback gradient CSS if no featured image
 * @return string Inline style string for hero section
 */
function nolaholi_get_hero_background_style($fallback_gradient = 'linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-gold) 100%)') {
    $style = 'min-height: 400px;';
    
    // Get the post/page ID - handle front page specially
    $post_id = null;
    if (is_front_page() && get_option('page_on_front')) {
        // If this is a static front page, get its ID
        $post_id = get_option('page_on_front');
    } elseif (is_singular() || is_page()) {
        // Regular page or post
        $post_id = get_the_ID();
    }
    
    // Check if page has featured image
    if ($post_id && has_post_thumbnail($post_id)) {
        $featured_image_url = get_the_post_thumbnail_url($post_id, 'full');
        if ($featured_image_url) {
            // Use featured image as background
            $style .= ' background-image: url(' . esc_url($featured_image_url) . ');';
            $style .= ' background-size: cover;';
            $style .= ' background-position: center;';
            $style .= ' background-repeat: no-repeat;';
        } else {
            // Fallback to gradient if image URL is empty
            $style .= ' background: ' . $fallback_gradient . ';';
        }
    } else {
        // No featured image, use gradient
        $style .= ' background: ' . $fallback_gradient . ';';
    }
    
    return $style;
}

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
    
    // News Post Type
    register_post_type('news', array(
        'labels' => array(
            'name'               => __('News', 'nolaholi'),
            'singular_name'      => __('News Item', 'nolaholi'),
            'add_new'            => __('Add News Item', 'nolaholi'),
            'add_new_item'       => __('Add New News Item', 'nolaholi'),
            'edit_item'          => __('Edit News Item', 'nolaholi'),
            'new_item'           => __('New News Item', 'nolaholi'),
            'view_item'          => __('View News Item', 'nolaholi'),
            'search_items'       => __('Search News', 'nolaholi'),
            'not_found'          => __('No news items found', 'nolaholi'),
            'not_found_in_trash' => __('No news items found in trash', 'nolaholi'),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-megaphone',
        'supports'      => array('title', 'editor', 'excerpt', 'thumbnail'),
        'show_in_rest'  => true,
        'rewrite'       => array('slug' => 'news'),
    ));
}
add_action('init', 'nolaholi_custom_post_types');

/**
 * Custom Taxonomies
 */
function nolaholi_custom_taxonomies() {
    // Sponsor Tier Taxonomy
    // Note: Sponsor Tiers taxonomy is registered but NOT used by the theme.
    // Tiers are stored as post meta (_sponsor_tier) instead.
    // Keeping registration for backwards compatibility but hiding from UI.
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
        'show_ui'           => false,  // Hidden - theme uses post meta instead
        'show_admin_column' => false,  // Hidden - custom column added via filter
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
    
    // News meta box
    add_meta_box(
        'news_details',
        __('News Details', 'nolaholi'),
        'nolaholi_news_meta_box',
        'news',
        'normal',
        'high'
    );
    
    // News images meta box
    add_meta_box(
        'news_images',
        __('Additional Images (up to 3)', 'nolaholi'),
        'nolaholi_news_images_meta_box',
        'news',
        'normal',
        'default'
    );
    
    // News popup meta box
    add_meta_box(
        'news_popup',
        __('Popup/Highlight Settings', 'nolaholi'),
        'nolaholi_news_popup_meta_box',
        'news',
        'side',
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
            <optgroup label="2026+ Tiers (Current)">
                <option value="event" <?php selected($tier, 'event'); ?>>Presenting Sponsor ($15,000)</option>
                <option value="parade" <?php selected($tier, 'parade'); ?>>Parade Sponsor ($7,500)</option>
                <option value="entertainment" <?php selected($tier, 'entertainment'); ?>>Entertainment Sponsor ($5,000)</option>
                <option value="vip" <?php selected($tier, 'vip'); ?>>VIP Experience Sponsor ($3,500-$5,000)</option>
                <option value="gold" <?php selected($tier, 'gold'); ?>>Gold Sponsor ($2,500)</option>
                <option value="silver" <?php selected($tier, 'silver'); ?>>Silver Sponsor ($1,000)</option>
                <option value="friends" <?php selected($tier, 'friends'); ?>>Friend of NOLA Holi ($100+)</option>
            </optgroup>
            <optgroup label="2025 Tiers (Historical)">
                <option value="diamond" <?php selected($tier, 'diamond'); ?>>Diamond Sponsor (2025 - $5,000)</option>
                <option value="platinum" <?php selected($tier, 'platinum'); ?>>Platinum Sponsor (2025 - $2,500)</option>
            </optgroup>
        </select>
        <br><small>Select the tier that was active for the sponsor's year. Historical tiers are preserved for past sponsors.</small>
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
 * News meta box callback
 */
function nolaholi_news_meta_box($post) {
    wp_nonce_field('nolaholi_news_meta', 'nolaholi_news_nonce');
    
    $pub_date = get_post_meta($post->ID, '_news_publication_date', true);
    $short_desc = get_post_meta($post->ID, '_news_short_description', true);
    ?>
    <p>
        <label for="news_publication_date"><?php _e('Publication Date:', 'nolaholi'); ?></label><br>
        <input type="date" id="news_publication_date" name="news_publication_date" value="<?php echo esc_attr($pub_date); ?>" style="width: 100%;">
        <br><small>This date will be displayed on the news page. If left empty, the post publish date will be used.</small>
    </p>
    <p>
        <label for="news_short_description"><?php _e('Short Description (for previews & sharing):', 'nolaholi'); ?></label><br>
        <textarea id="news_short_description" name="news_short_description" rows="4" style="width: 100%;"><?php echo esc_textarea($short_desc); ?></textarea>
        <br><small>This will be used in link previews on social media, email, and search engines. Keep it under 160 characters for best results.</small>
    </p>
    <?php
}

/**
 * News images meta box callback
 */
function nolaholi_news_images_meta_box($post) {
    $image_1 = get_post_meta($post->ID, '_news_image_1', true);
    $image_2 = get_post_meta($post->ID, '_news_image_2', true);
    $image_3 = get_post_meta($post->ID, '_news_image_3', true);
    ?>
    <div style="margin-bottom: 20px;">
        <label><?php _e('Image 1:', 'nolaholi'); ?></label><br>
        <input type="hidden" id="news_image_1" name="news_image_1" value="<?php echo esc_attr($image_1); ?>">
        <button type="button" class="button news-image-upload" data-target="news_image_1">Select Image</button>
        <button type="button" class="button news-image-remove" data-target="news_image_1">Remove</button>
        <div class="news-image-preview" id="news_image_1_preview">
            <?php if ($image_1) : ?>
                <img src="<?php echo esc_url(wp_get_attachment_url($image_1)); ?>" style="max-width: 200px; height: auto; margin-top: 10px;">
            <?php endif; ?>
        </div>
    </div>
    
    <div style="margin-bottom: 20px;">
        <label><?php _e('Image 2:', 'nolaholi'); ?></label><br>
        <input type="hidden" id="news_image_2" name="news_image_2" value="<?php echo esc_attr($image_2); ?>">
        <button type="button" class="button news-image-upload" data-target="news_image_2">Select Image</button>
        <button type="button" class="button news-image-remove" data-target="news_image_2">Remove</button>
        <div class="news-image-preview" id="news_image_2_preview">
            <?php if ($image_2) : ?>
                <img src="<?php echo esc_url(wp_get_attachment_url($image_2)); ?>" style="max-width: 200px; height: auto; margin-top: 10px;">
            <?php endif; ?>
        </div>
    </div>
    
    <div style="margin-bottom: 20px;">
        <label><?php _e('Image 3:', 'nolaholi'); ?></label><br>
        <input type="hidden" id="news_image_3" name="news_image_3" value="<?php echo esc_attr($image_3); ?>">
        <button type="button" class="button news-image-upload" data-target="news_image_3">Select Image</button>
        <button type="button" class="button news-image-remove" data-target="news_image_3">Remove</button>
        <div class="news-image-preview" id="news_image_3_preview">
            <?php if ($image_3) : ?>
                <img src="<?php echo esc_url(wp_get_attachment_url($image_3)); ?>" style="max-width: 200px; height: auto; margin-top: 10px;">
            <?php endif; ?>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Media uploader
        $('.news-image-upload').on('click', function(e) {
            e.preventDefault();
            var button = $(this);
            var targetId = button.data('target');
            
            var mediaUploader = wp.media({
                title: 'Select Image',
                button: { text: 'Use this image' },
                multiple: false
            });
            
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#' + targetId).val(attachment.id);
                $('#' + targetId + '_preview').html('<img src="' + attachment.url + '" style="max-width: 200px; height: auto; margin-top: 10px;">');
            });
            
            mediaUploader.open();
        });
        
        // Remove image
        $('.news-image-remove').on('click', function(e) {
            e.preventDefault();
            var button = $(this);
            var targetId = button.data('target');
            
            $('#' + targetId).val('');
            $('#' + targetId + '_preview').html('');
        });
    });
    </script>
    <?php
}

/**
 * News popup meta box callback
 */
function nolaholi_news_popup_meta_box($post) {
    $enable_popup = get_post_meta($post->ID, '_news_enable_popup', true);
    $popup_start = get_post_meta($post->ID, '_news_popup_start', true);
    $popup_end = get_post_meta($post->ID, '_news_popup_end', true);
    ?>
    <p>
        <label>
            <input type="checkbox" id="news_enable_popup" name="news_enable_popup" value="1" <?php checked($enable_popup, '1'); ?>>
            <?php _e('Show as popup above menu bar', 'nolaholi'); ?>
        </label>
    </p>
    <p>
        <label for="news_popup_start"><?php _e('Popup Start Date:', 'nolaholi'); ?></label><br>
        <input type="date" id="news_popup_start" name="news_popup_start" value="<?php echo esc_attr($popup_start); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="news_popup_end"><?php _e('Popup End Date:', 'nolaholi'); ?></label><br>
        <input type="date" id="news_popup_end" name="news_popup_end" value="<?php echo esc_attr($popup_end); ?>" style="width: 100%;">
    </p>
    <p>
        <small><?php _e('When enabled, dates will auto-fill if empty (today to +7 days). Multiple news items with overlapping dates will display as a carousel. Leave dates empty to show indefinitely.', 'nolaholi'); ?></small>
    </p>
    
    <script>
    jQuery(document).ready(function($) {
        $('#news_enable_popup').on('change', function() {
            if ($(this).is(':checked')) {
                var startDate = $('#news_popup_start').val();
                var endDate = $('#news_popup_end').val();
                
                // Auto-fill dates if they're empty
                if (!startDate) {
                    // Set start date to today
                    var today = new Date();
                    var todayStr = today.toISOString().split('T')[0];
                    $('#news_popup_start').val(todayStr);
                }
                
                if (!endDate) {
                    // Set end date to today + 7 days
                    var sevenDaysLater = new Date();
                    sevenDaysLater.setDate(sevenDaysLater.getDate() + 7);
                    var sevenDaysStr = sevenDaysLater.toISOString().split('T')[0];
                    $('#news_popup_end').val(sevenDaysStr);
                }
            }
        });
    });
    </script>
    <?php
}

/**
 * Save custom fields
 */
function nolaholi_save_meta_boxes($post_id) {
    // Check if our nonce is set
    if (!isset($_POST['nolaholi_sponsor_nonce']) && !isset($_POST['nolaholi_team_nonce']) && !isset($_POST['nolaholi_news_nonce'])) {
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
    
    if (isset($_POST['nolaholi_news_nonce'])) {
        if (!wp_verify_nonce($_POST['nolaholi_news_nonce'], 'nolaholi_news_meta')) {
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
    
    // Save news fields
    if (isset($_POST['news_publication_date'])) {
        update_post_meta($post_id, '_news_publication_date', sanitize_text_field($_POST['news_publication_date']));
    }
    if (isset($_POST['news_short_description'])) {
        update_post_meta($post_id, '_news_short_description', sanitize_textarea_field($_POST['news_short_description']));
    }
    if (isset($_POST['news_image_1'])) {
        update_post_meta($post_id, '_news_image_1', intval($_POST['news_image_1']));
    }
    if (isset($_POST['news_image_2'])) {
        update_post_meta($post_id, '_news_image_2', intval($_POST['news_image_2']));
    }
    if (isset($_POST['news_image_3'])) {
        update_post_meta($post_id, '_news_image_3', intval($_POST['news_image_3']));
    }
    if (isset($_POST['news_enable_popup'])) {
        update_post_meta($post_id, '_news_enable_popup', '1');
    } else {
        update_post_meta($post_id, '_news_enable_popup', '0');
    }
    if (isset($_POST['news_popup_start'])) {
        update_post_meta($post_id, '_news_popup_start', sanitize_text_field($_POST['news_popup_start']));
    }
    if (isset($_POST['news_popup_end'])) {
        update_post_meta($post_id, '_news_popup_end', sanitize_text_field($_POST['news_popup_end']));
    }
}
add_action('save_post', 'nolaholi_save_meta_boxes');

/**
 * Get Contact Form 7 form ID by title
 * Searches for a Contact Form 7 form with a specific title and returns its ID
 * 
 * @param string $form_title The title of the form to search for
 * @return int|false The form ID if found, false otherwise
 */
function nolaholi_get_contact_form_7_id($form_title = 'NOLA Holi Contact Form') {
    // Check if Contact Form 7 is active
    if (!function_exists('wpcf7')) {
        return false;
    }
    
    // Get all Contact Form 7 forms
    $args = array(
        'post_type'      => 'wpcf7_contact_form',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC'
    );
    
    $forms = get_posts($args);
    
    if (empty($forms)) {
        return false;
    }
    
    // Define acceptable form titles in order of preference
    $acceptable_titles = array(
        'NOLA Holi Contact Form',
        'Contact form 1',
        'Contact Form 1',
        'Contact Form'
    );
    
    // First, try to find a form matching the preferred titles
    foreach ($acceptable_titles as $title) {
        foreach ($forms as $form) {
            if (strcasecmp(trim($form->post_title), trim($title)) === 0) {
                return $form->ID;
            }
        }
    }
    
    // If no exact match found, return the first available form as a fallback
    // This ensures the site works even if the form is named differently
    return $forms[0]->ID;
}

/**
 * Check if Contact Form 7 is available and configured
 * 
 * @return array Array with 'available' (bool), 'form_id' (int|false), 'message' (string), 'form_name' (string)
 */
function nolaholi_check_contact_form_7_status() {
    $status = array(
        'available' => false,
        'form_id'   => false,
        'message'   => '',
        'form_name' => ''
    );
    
    // Check if Contact Form 7 plugin is active
    if (!function_exists('wpcf7')) {
        $status['message'] = 'Contact Form 7 plugin is not installed or activated.';
        return $status;
    }
    
    // Try to get the form ID
    $form_id = nolaholi_get_contact_form_7_id();
    
    if ($form_id) {
        $status['available'] = true;
        $status['form_id'] = $form_id;
        
        // Get the form title
        $form_post = get_post($form_id);
        $status['form_name'] = $form_post ? $form_post->post_title : '';
        
        // Check if it's using the preferred name
        $preferred_names = array('NOLA Holi Contact Form', 'Contact form 1', 'Contact Form 1');
        $is_preferred_name = false;
        
        foreach ($preferred_names as $name) {
            if (strcasecmp(trim($status['form_name']), trim($name)) === 0) {
                $is_preferred_name = true;
                break;
            }
        }
        
        if ($is_preferred_name) {
            $status['message'] = 'Contact Form 7 is active and configured correctly.';
        } else {
            $status['message'] = 'Using Contact Form 7 form "' . $status['form_name'] . '". For best results, rename it to "NOLA Holi Contact Form" or "Contact form 1".';
        }
    } else {
        $status['message'] = 'Contact Form 7 is installed but no contact forms found. Please create a form named "NOLA Holi Contact Form" or "Contact form 1".';
    }
    
    return $status;
}

/**
 * Display admin notice for Contact Form 7 configuration
 * Only visible to administrators when viewing the contact page
 */
function nolaholi_display_cf7_admin_notice() {
    // Only show to users who can manage options (admins)
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Only show when logged in
    if (!is_user_logged_in()) {
        return;
    }
    
    $cf7_status = nolaholi_check_contact_form_7_status();
    
    // Show different notices based on CF7 status
    if (!function_exists('wpcf7')) {
        // CF7 is not installed
        echo '<div style="background: #d1ecf1; border: 2px solid #0c5460; border-radius: 8px; padding: 20px; margin: 0 0 20px 0; color: #0c5460;">';
        echo '<strong>ℹ️ Administrator Notice:</strong> ';
        echo 'Contact Form 7 plugin is not installed. Using the built-in custom contact form. ';
        echo 'To use Contact Form 7, install the plugin and create a form named "NOLA Holi Contact Form".';
        echo '</div>';
    } elseif (!$cf7_status['available']) {
        // CF7 is installed but no forms found
        echo '<div style="background: #fff3cd; border: 2px solid #ffc107; border-radius: 8px; padding: 20px; margin: 0 0 20px 0; color: #856404;">';
        echo '<strong>⚠️ Administrator Notice:</strong> ';
        echo esc_html($cf7_status['message']);
        echo ' Currently using the custom fallback form. ';
        echo '<a href="' . esc_url(admin_url('admin.php?page=wpcf7-new')) . '" style="color: #0056b3; text-decoration: underline;">Create a Contact Form 7 form</a>';
        echo '</div>';
    } elseif ($cf7_status['available'] && strpos($cf7_status['message'], 'For best results') !== false) {
        // CF7 is working but using a non-preferred form name
        echo '<div style="background: #fff3cd; border: 2px solid #ffc107; border-radius: 8px; padding: 20px; margin: 0 0 20px 0; color: #856404;">';
        echo '<strong>💡 Administrator Notice:</strong> ';
        echo esc_html($cf7_status['message']);
        echo '</div>';
    }
    // If everything is configured correctly, show no notice
}

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
    
    // Show Save the Date Sticky
    $wp_customize->add_setting('nolaholi_show_save_date_sticky', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('nolaholi_show_save_date_sticky', array(
        'label'       => __('Show "Save the Date" Sticky Note', 'nolaholi'),
        'description' => __('Display a floating sticky note with the event date on all pages', 'nolaholi'),
        'section'     => 'nolaholi_event_info',
        'type'        => 'checkbox',
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
    
    // Get event year from theme customizer (extract year from date like "March 7, 2026")
    $event_date = get_theme_mod('nolaholi_event_date', '');
    $current_event_year = $event_date ? date('Y', strtotime($event_date)) : date('Y');
    
    // Query for event/presenting sponsors for the current event year
    $args = array(
        'post_type' => 'sponsor',
        'posts_per_page' => -1,  // Get all to sort properly
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => '_sponsor_year',
                'value' => $current_event_year,
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
    
    // If no sponsor for current year, fall back to most recent year with an event sponsor
    if (!$sponsors_query->have_posts()) {
        wp_reset_postdata();
        
        // Query for any event sponsor, ordered by year descending
        $fallback_args = array(
            'post_type' => 'sponsor',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => '_sponsor_tier',
                    'value' => 'event',
                    'compare' => '='
                )
            )
        );
        
        $sponsors_query = new WP_Query($fallback_args);
        
        if (!$sponsors_query->have_posts()) {
            // Still no sponsor found, cache for 1 hour
            set_transient('nolaholi_first_event_sponsor', false, HOUR_IN_SECONDS);
            return false;
        }
        
        // Find the most recent year among event sponsors
        $most_recent_year = 0;
        while ($sponsors_query->have_posts()) {
            $sponsors_query->the_post();
            $sponsor_year = intval(get_post_meta(get_the_ID(), '_sponsor_year', true));
            if ($sponsor_year > $most_recent_year) {
                $most_recent_year = $sponsor_year;
            }
        }
        wp_reset_postdata();
        
        // Re-query for sponsors from that most recent year
        $args['meta_query'][0]['value'] = strval($most_recent_year);
        $sponsors_query = new WP_Query($args);
        
        if (!$sponsors_query->have_posts()) {
            set_transient('nolaholi_first_event_sponsor', false, HOUR_IN_SECONDS);
            return false;
        }
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

/**
 * Add custom columns to Sponsors admin list
 */
function nolaholi_sponsor_admin_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        // Add Tier and Year columns after Title
        if ($key === 'title') {
            $new_columns['sponsor_tier'] = __('Tier', 'nolaholi');
            $new_columns['sponsor_year'] = __('Year', 'nolaholi');
        }
    }
    return $new_columns;
}
add_filter('manage_sponsor_posts_columns', 'nolaholi_sponsor_admin_columns');

/**
 * Populate custom columns in Sponsors admin list
 */
function nolaholi_sponsor_admin_column_content($column, $post_id) {
    if ($column === 'sponsor_tier') {
        $tier = get_post_meta($post_id, '_sponsor_tier', true);
        $tier_labels = array(
            'event' => 'Presenting',
            'parade' => 'Parade',
            'entertainment' => 'Entertainment',
            'vip' => 'VIP Experience',
            'diamond' => 'Diamond (2025)',
            'platinum' => 'Platinum (2025)',
            'gold' => 'Gold',
            'silver' => 'Silver',
            'friends' => 'Friend'
        );
        echo isset($tier_labels[$tier]) ? esc_html($tier_labels[$tier]) : esc_html(ucfirst($tier));
    }
    if ($column === 'sponsor_year') {
        $year = get_post_meta($post_id, '_sponsor_year', true);
        echo $year ? esc_html($year) : '—';
    }
}
add_action('manage_sponsor_posts_custom_column', 'nolaholi_sponsor_admin_column_content', 10, 2);

/**
 * Make Tier and Year columns sortable
 */
function nolaholi_sponsor_sortable_columns($columns) {
    $columns['sponsor_tier'] = 'sponsor_tier';
    $columns['sponsor_year'] = 'sponsor_year';
    return $columns;
}
add_filter('manage_edit-sponsor_sortable_columns', 'nolaholi_sponsor_sortable_columns');

/**
 * Handle sorting by custom meta fields
 */
function nolaholi_sponsor_column_orderby($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }
    
    if ($query->get('post_type') !== 'sponsor') {
        return;
    }
    
    $orderby = $query->get('orderby');
    
    if ($orderby === 'sponsor_tier') {
        $query->set('meta_key', '_sponsor_tier');
        $query->set('orderby', 'meta_value');
    }
    
    if ($orderby === 'sponsor_year') {
        $query->set('meta_key', '_sponsor_year');
        $query->set('orderby', 'meta_value_num');
    }
}
add_action('pre_get_posts', 'nolaholi_sponsor_column_orderby');

/**
 * Get active popup news items (multiple items for carousel)
 * 
 * @return array|false Array of news items or false if no active popups
 */
function nolaholi_get_active_popup_news() {
    // Check for cached popup news
    $cached_popup = get_transient('nolaholi_active_popup_news');
    if ($cached_popup !== false) {
        return $cached_popup;
    }
    
    // Get current date
    $current_date = date('Y-m-d');
    
    // Query for news with popup enabled
    $args = array(
        'post_type' => 'news',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'meta_query' => array(
            array(
                'key' => '_news_enable_popup',
                'value' => '1',
                'compare' => '='
            )
        )
    );
    
    $popup_query = new WP_Query($args);
    
    if (!$popup_query->have_posts()) {
        // No active popup, cache for 1 hour
        set_transient('nolaholi_active_popup_news', false, HOUR_IN_SECONDS);
        return false;
    }
    
    // Build array of all active popup news items, filtering by date
    $popup_items = array();
    while ($popup_query->have_posts()) {
        $popup_query->the_post();
        
        $popup_start = get_post_meta(get_the_ID(), '_news_popup_start', true);
        $popup_end = get_post_meta(get_the_ID(), '_news_popup_end', true);
        
        // Determine if this news item should be shown
        $should_show = false;
        
        if (empty($popup_start) && empty($popup_end)) {
            // No dates specified - show indefinitely
            $should_show = true;
        } elseif (empty($popup_start) && !empty($popup_end)) {
            // Only end date specified - show until end date
            $should_show = ($current_date <= $popup_end);
        } elseif (!empty($popup_start) && empty($popup_end)) {
            // Only start date specified - show from start date onward
            $should_show = ($current_date >= $popup_start);
        } else {
            // Both dates specified - show within date range
            $should_show = ($current_date >= $popup_start && $current_date <= $popup_end);
        }
        
        if ($should_show) {
            $popup_items[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'url' => get_permalink(),
                'short_description' => get_post_meta(get_the_ID(), '_news_short_description', true),
                'excerpt' => get_the_excerpt(),
                'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')
            );
        }
    }
    wp_reset_postdata();
    
    // If no items passed the date filter, return false
    if (empty($popup_items)) {
        set_transient('nolaholi_active_popup_news', false, HOUR_IN_SECONDS);
        return false;
    }
    
    // Cache for 1 hour
    set_transient('nolaholi_active_popup_news', $popup_items, HOUR_IN_SECONDS);
    
    return $popup_items;
}

/**
 * Clear news cache when news post is saved
 */
function nolaholi_clear_news_cache($post_id) {
    if (get_post_type($post_id) === 'news') {
        delete_transient('nolaholi_active_popup_news');
    }
}
add_action('save_post', 'nolaholi_clear_news_cache');

/**
 * Generate Open Graph and Twitter Card meta tags
 * Creates rich preview cards when URLs are shared on social media, email, and text messages
 */
function nolaholi_open_graph_meta_tags() {
    // Get site information
    $site_name = get_bloginfo('name');
    $site_description = get_bloginfo('description');
    $site_url = home_url('/');
    
    // Override site name for Open Graph (site title is "-" to save header space)
    // Use proper name for social media previews
    $is_staging = (strpos($site_url, 'staging') !== false);
    $og_site_name = $is_staging ? 'NOLA Holi (Staging)' : 'NOLA Holi Festival';
    
    // Get event information
    $event_date = get_theme_mod('nolaholi_event_date', 'March 7, 2026');
    $event_time = get_theme_mod('nolaholi_event_time', 'TBD');
    $location = get_theme_mod('nolaholi_location', 'Washington Square Park, New Orleans');
    
    // Default values
    $og_title = $og_site_name;
    $og_description = $site_description;
    $og_type = 'website';
    $og_url = $site_url;
    $og_image = '';
    
    // Get custom logo or use a default image
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
        if ($logo_image) {
            $og_image = $logo_image[0];
        }
    }
    
    // Customize based on page type
    if (is_front_page() || is_home()) {
        $og_title = $og_site_name;
        $og_description = sprintf(
            'Join us for NOLA Holi on %s at %s. Experience the vibrant colors and joy of Holi in New Orleans!',
            $event_date,
            $location
        );
    } elseif (is_singular()) {
        global $post;
        $og_title = get_the_title();
        $og_url = get_permalink();
        $og_type = 'article';
        
        // Check if this is a news post
        if (get_post_type() === 'news') {
            $short_desc = get_post_meta(get_the_ID(), '_news_short_description', true);
            if (!empty($short_desc)) {
                $og_description = wp_strip_all_tags($short_desc);
            } elseif (has_excerpt()) {
                $og_description = wp_strip_all_tags(get_the_excerpt());
            } else {
                $og_description = wp_trim_words(wp_strip_all_tags(get_the_content()), 30, '...');
            }
        } else {
            // Get excerpt or content for description
            if (has_excerpt()) {
                $og_description = wp_strip_all_tags(get_the_excerpt());
            } else {
                $og_description = wp_trim_words(wp_strip_all_tags(get_the_content()), 30, '...');
            }
        }
        
        // Get featured image if available
        if (has_post_thumbnail()) {
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            if ($thumbnail) {
                $og_image = $thumbnail[0];
            }
        }
    } elseif (is_page()) {
        $og_title = get_the_title() . ' - ' . $og_site_name;
        $og_url = get_permalink();
        
        // Custom descriptions for specific pages
        $page_slug = get_post_field('post_name', get_the_ID());
        
        switch ($page_slug) {
            case 'about-holi':
                $og_description = 'Learn about the ancient Hindu festival of colors, celebrating the victory of good over evil and the arrival of spring.';
                break;
            case 'about-nola-holi':
                $og_description = 'Discover the story of NOLA Holi and how we bring this vibrant celebration to the heart of New Orleans.';
                break;
            case 'festival':
                $og_description = sprintf('Join us for the NOLA Holi Festival on %s at %s. Food, music, dancing, and colors!', $event_date, $location);
                break;
            case 'parade':
                $og_description = sprintf('Experience the colorful NOLA Holi Parade on %s. A spectacular celebration through the streets!', $event_date);
                break;
            case 'gallery':
                $og_description = 'Browse our photo gallery showcasing the vibrant moments from previous NOLA Holi celebrations.';
                break;
            case 'sponsors':
                $og_description = 'Meet our generous sponsors who make NOLA Holi possible. Thank you for supporting our community!';
                break;
            case 'vendors':
                $og_description = 'Discover the amazing vendors bringing food, art, and culture to NOLA Holi.';
                break;
            case 'volunteers':
                $og_description = 'Join our team of volunteers and help make NOLA Holi a success! Sign up to be part of the celebration.';
                break;
            case 'contact':
                $og_description = 'Get in touch with the NOLA Holi team. We\'d love to hear from you!';
                break;
            default:
                if (has_excerpt()) {
                    $og_description = wp_strip_all_tags(get_the_excerpt());
                } else {
                    $og_description = sprintf('Learn more about %s at %s on %s.', $og_title, $location, $event_date);
                }
        }
    }
    
    // If no image found, use first image from images directory as fallback
    if (empty($og_image)) {
        $default_image = get_template_directory_uri() . '/images/celebration-photo-1.jpg';
        $og_image = $default_image;
    }
    
    // Get sponsor information for additional context
    $event_sponsor = nolaholi_get_first_event_sponsor();
    
    // Sanitize all values
    $og_title = esc_attr($og_title);
    $og_description = esc_attr($og_description);
    $og_url = esc_url($og_url);
    $og_image = esc_url($og_image);
    $og_site_name = esc_attr($og_site_name);
    
    // Output Open Graph meta tags
    ?>
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo $og_title; ?>" />
    <meta property="og:description" content="<?php echo $og_description; ?>" />
    <meta property="og:type" content="<?php echo $og_type; ?>" />
    <meta property="og:url" content="<?php echo $og_url; ?>" />
    <meta property="og:site_name" content="<?php echo $og_site_name; ?>" />
    <?php if (!empty($og_image)) : ?>
    <meta property="og:image" content="<?php echo $og_image; ?>" />
    <meta property="og:image:secure_url" content="<?php echo $og_image; ?>" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="<?php echo $og_title; ?>" />
    <?php endif; ?>
    
    <meta property="og:locale" content="en_US" />
    
    <!-- Event specific Open Graph tags -->
    <meta property="event:start_date" content="<?php echo esc_attr($event_date); ?>" />
    <meta property="event:location" content="<?php echo esc_attr($location); ?>" />
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $og_title; ?>" />
    <meta name="twitter:description" content="<?php echo $og_description; ?>" />
    <?php if (!empty($og_image)) : ?>
    <meta name="twitter:image" content="<?php echo $og_image; ?>" />
    <meta name="twitter:image:alt" content="<?php echo $og_title; ?>" />
    <?php endif; ?>
    
    <?php
    // Add Twitter handle if set
    $twitter_url = get_theme_mod('nolaholi_twitter', '');
    if (!empty($twitter_url)) {
        // Extract Twitter handle from URL
        preg_match('/twitter\.com\/([^\/\?]+)/', $twitter_url, $matches);
        if (!empty($matches[1])) {
            $twitter_handle = '@' . $matches[1];
            echo '<meta name="twitter:site" content="' . esc_attr($twitter_handle) . '" />' . "\n";
            echo '<meta name="twitter:creator" content="' . esc_attr($twitter_handle) . '" />' . "\n";
        }
    }
    ?>
    
    <!-- Additional SEO Meta Tags -->
    <meta name="description" content="<?php echo $og_description; ?>" />
    <meta name="keywords" content="NOLA Holi, Holi Festival, New Orleans, Festival of Colors, Indian Festival, Cultural Event, <?php echo esc_attr($event_date); ?>" />
    
    <!-- Schema.org markup for Google+ and other search engines -->
    <meta itemprop="name" content="<?php echo $og_title; ?>" />
    <meta itemprop="description" content="<?php echo $og_description; ?>" />
    <?php if (!empty($og_image)) : ?>
    <meta itemprop="image" content="<?php echo $og_image; ?>" />
    <?php endif; ?>
    
    <?php
}
add_action('wp_head', 'nolaholi_open_graph_meta_tags');

/**
 * ============================================================================
 * CONTACT FORM SECURITY & SPAM PROTECTION
 * ============================================================================
 * 
 * Multi-layered spam protection system for the custom contact form including:
 * - Honeypot field detection
 * - Time-based bot detection
 * - Rate limiting by IP address
 * - Math captcha verification
 * - Input sanitization and XSS protection
 * - Nonce verification (CSRF protection)
 */

/**
 * Check if IP has exceeded submission rate limit
 * 
 * @param string $ip The IP address to check
 * @return bool True if rate limit exceeded, false otherwise
 */
function nolaholi_check_rate_limit($ip) {
    $transient_key = 'contact_rate_' . md5($ip);
    $attempts = get_transient($transient_key);
    
    // Allow 3 submissions per 15 minutes per IP
    if ($attempts && $attempts >= 3) {
        return true; // Rate limit exceeded
    }
    
    return false;
}

/**
 * Update rate limit counter for IP
 * 
 * @param string $ip The IP address
 */
function nolaholi_update_rate_limit($ip) {
    $transient_key = 'contact_rate_' . md5($ip);
    $attempts = get_transient($transient_key);
    
    if (!$attempts) {
        $attempts = 1;
    } else {
        $attempts++;
    }
    
    // Store for 15 minutes
    set_transient($transient_key, $attempts, 15 * MINUTE_IN_SECONDS);
}

/**
 * Validate email address with enhanced security checks
 * 
 * @param string $email The email to validate
 * @return bool True if valid, false otherwise
 */
function nolaholi_validate_email($email) {
    // Basic email validation
    if (!is_email($email)) {
        return false;
    }
    
    // Check for disposable email domains (common spam)
    $disposable_domains = array(
        'tempmail.com', 'throwaway.email', 'guerrillamail.com', 
        'mailinator.com', '10minutemail.com', 'trashmail.com'
    );
    
    $domain = substr(strrchr($email, "@"), 1);
    if (in_array($domain, $disposable_domains)) {
        return false;
    }
    
    return true;
}

/**
 * Handle custom contact form submission with security checks
 */
function nolaholi_handle_contact_form() {
    // Security Check #1: Verify nonce (CSRF protection)
    if (!isset($_POST['nolaholi_contact_nonce']) || 
        !wp_verify_nonce($_POST['nolaholi_contact_nonce'], 'nolaholi_contact_form')) {
        wp_die('Security check failed. Please try again.', 'Security Error', array('response' => 403));
    }
    
    // Security Check #2: Honeypot field (bot detection)
    if (!empty($_POST['contact_website'])) {
        // Honeypot filled = bot detected
        wp_die('Spam detected.', 'Security Error', array('response' => 403));
    }
    
    // Security Check #3: Time-based bot detection (submission too fast)
    if (isset($_POST['contact_timestamp'])) {
        $time_elapsed = time() - intval($_POST['contact_timestamp']);
        // If submitted in less than 3 seconds, likely a bot
        if ($time_elapsed < 3) {
            wp_die('Submission too fast. Please try again.', 'Security Error', array('response' => 403));
        }
        // If timestamp is too old (more than 1 hour), form might be stale
        if ($time_elapsed > 3600) {
            wp_die('Form expired. Please refresh the page and try again.', 'Form Expired', array('response' => 400));
        }
    }
    
    // Security Check #4: Rate limiting by IP
    $ip_address = $_SERVER['REMOTE_ADDR'];
    if (nolaholi_check_rate_limit($ip_address)) {
        wp_die('Too many submissions. Please wait 15 minutes before trying again.', 'Rate Limit Exceeded', array('response' => 429));
    }
    
    // Security Check #5: Captcha verification
    if (!isset($_POST['contact_captcha']) || !isset($_POST['contact_captcha_answer'])) {
        wp_die('Security question missing. Please try again.', 'Security Error', array('response' => 400));
    }
    
    $user_answer = intval($_POST['contact_captcha']);
    $correct_answer = intval(base64_decode($_POST['contact_captcha_answer']));
    
    if ($user_answer !== $correct_answer) {
        wp_die('Incorrect answer to security question. Please try again.', 'Verification Failed', array('response' => 400));
    }
    
    // Security Check #6: Sanitize and validate all input (XSS protection)
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        wp_die('Please fill in all required fields.', 'Missing Information', array('response' => 400));
    }
    
    // Validate email
    if (!nolaholi_validate_email($email)) {
        wp_die('Invalid email address.', 'Invalid Email', array('response' => 400));
    }
    
    // Check message length (prevent abuse)
    if (strlen($message) < 10) {
        wp_die('Message is too short. Please provide more details.', 'Invalid Message', array('response' => 400));
    }
    
    if (strlen($message) > 5000) {
        wp_die('Message is too long. Please keep it under 5000 characters.', 'Invalid Message', array('response' => 400));
    }
    
    // All security checks passed - update rate limit
    nolaholi_update_rate_limit($ip_address);
    
    // Prepare email
    $to = get_option('admin_email'); // Send to site admin
    $email_subject = '[NOLA Holi Contact Form] ' . $subject;
    
    // Build email body
    $email_body = "New contact form submission from NOLAHoli.org\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    if (!empty($phone)) {
        $email_body .= "Phone: $phone\n";
    }
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message\n\n";
    $email_body .= "---\n";
    $email_body .= "Submitted: " . current_time('F j, Y g:i a') . "\n";
    $email_body .= "IP Address: $ip_address\n";
    
    // Set email headers
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: NOLA Holi <noreply@nolaholi.org>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );
    
    // Send email
    $sent = wp_mail($to, $email_subject, $email_body, $headers);
    
    if ($sent) {
        // Redirect to success page or show success message
        wp_redirect(add_query_arg('contact', 'success', home_url('/contact/')));
        exit;
    } else {
        // Email failed to send
        wp_die('There was an error sending your message. Please try again or contact us directly at info@nolaholi.org', 'Email Error', array('response' => 500));
    }
}
add_action('admin_post_nolaholi_contact_form', 'nolaholi_handle_contact_form');
add_action('admin_post_nopriv_nolaholi_contact_form', 'nolaholi_handle_contact_form');

/**
 * ============================================================================
 * NEWS MANAGEMENT ADMIN INTERFACE
 * ============================================================================
 * 
 * Custom admin page for managing news items
 * Provides an alternative to the standard WordPress post editor
 */

/**
 * Add News Management admin menu
 */
function nolaholi_add_news_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=news',
        __('Manage News', 'nolaholi'),
        __('Manage News', 'nolaholi'),
        'manage_options',
        'nolaholi-manage-news',
        'nolaholi_render_news_admin_page'
    );
}
add_action('admin_menu', 'nolaholi_add_news_admin_menu');

/**
 * Render News Management admin page
 */
function nolaholi_render_news_admin_page() {
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    
    // Handle form submission for quick edit
    if (isset($_POST['nolaholi_quick_edit_news']) && check_admin_referer('nolaholi_quick_edit_news')) {
        $news_id = intval($_POST['news_id']);
        $enable_popup = isset($_POST['enable_popup']) ? '1' : '0';
        
        update_post_meta($news_id, '_news_enable_popup', $enable_popup);
        update_post_meta($news_id, '_news_popup_start', sanitize_text_field($_POST['popup_start']));
        update_post_meta($news_id, '_news_popup_end', sanitize_text_field($_POST['popup_end']));
        
        delete_transient('nolaholi_active_popup_news');
        
        echo '<div class="notice notice-success"><p>News item updated successfully!</p></div>';
    }
    
    // Get all news items
    $args = array(
        'post_type' => 'news',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => array('publish', 'draft', 'pending')
    );
    
    $news_query = new WP_Query($args);
    
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="card" style="max-width: none; margin-top: 20px;">
            <h2>News Management</h2>
            <p>Manage all news items, control popup visibility, and edit content. This interface provides quick access to key news features.</p>
            
            <p>
                <a href="<?php echo admin_url('post-new.php?post_type=news'); ?>" class="button button-primary">
                    Add New News Item
                </a>
                <a href="<?php echo home_url('/news/'); ?>" class="button" target="_blank">
                    View News Archive
                </a>
            </p>
        </div>
        
        <?php if ($news_query->have_posts()) : ?>
            <table class="wp-list-table widefat fixed striped" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th style="width: 40%;">Title</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 12%;">Publication Date</th>
                        <th style="width: 10%;">Popup Active</th>
                        <th style="width: 13%;">Popup Duration</th>
                        <th style="width: 15%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($news_query->have_posts()) : $news_query->the_post(); 
                        $news_id = get_the_ID();
                        $pub_date = get_post_meta($news_id, '_news_publication_date', true);
                        $enable_popup = get_post_meta($news_id, '_news_enable_popup', true);
                        $popup_start = get_post_meta($news_id, '_news_popup_start', true);
                        $popup_end = get_post_meta($news_id, '_news_popup_end', true);
                        $short_desc = get_post_meta($news_id, '_news_short_description', true);
                        
                        // Check if popup is currently active
                        $current_date = date('Y-m-d');
                        $is_active_popup = false;
                        if ($enable_popup == '1' && !empty($popup_start) && !empty($popup_end)) {
                            if ($current_date >= $popup_start && $current_date <= $popup_end) {
                                $is_active_popup = true;
                            }
                        }
                    ?>
                        <tr>
                            <td>
                                <strong><a href="<?php echo get_edit_post_link($news_id); ?>"><?php the_title(); ?></a></strong>
                                <?php if ($short_desc) : ?>
                                    <br><small style="color: #666;"><?php echo esc_html(wp_trim_words($short_desc, 15)); ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php 
                                $status = get_post_status();
                                $status_colors = array(
                                    'publish' => '#46b450',
                                    'draft' => '#999',
                                    'pending' => '#f0b849'
                                );
                                $color = isset($status_colors[$status]) ? $status_colors[$status] : '#999';
                                ?>
                                <span style="color: <?php echo $color; ?>; font-weight: bold;">
                                    <?php echo ucfirst($status); ?>
                                </span>
                            </td>
                            <td>
                                <?php echo $pub_date ? esc_html($pub_date) : esc_html(get_the_date('Y-m-d')); ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if ($is_active_popup) : ?>
                                    <span style="color: #46b450; font-weight: bold;">✓ Active</span>
                                <?php elseif ($enable_popup == '1') : ?>
                                    <span style="color: #999;">Scheduled</span>
                                <?php else : ?>
                                    <span style="color: #ccc;">No</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($enable_popup == '1' && !empty($popup_start) && !empty($popup_end)) : ?>
                                    <?php echo esc_html($popup_start); ?> to<br><?php echo esc_html($popup_end); ?>
                                <?php else : ?>
                                    <span style="color: #999;">—</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo get_edit_post_link($news_id); ?>" class="button button-small">Edit</a>
                                <a href="<?php echo get_permalink($news_id); ?>" class="button button-small" target="_blank">View</a>
                                <button type="button" class="button button-small" onclick="toggleQuickEdit(<?php echo $news_id; ?>)">Quick Edit</button>
                            </td>
                        </tr>
                        <tr id="quick-edit-<?php echo $news_id; ?>" style="display: none;">
                            <td colspan="6" style="background: #f9f9f9; padding: 20px;">
                                <h3>Quick Edit: <?php the_title(); ?></h3>
                                <form method="post">
                                    <?php wp_nonce_field('nolaholi_quick_edit_news'); ?>
                                    <input type="hidden" name="nolaholi_quick_edit_news" value="1">
                                    <input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
                                    
                                    <table class="form-table">
                                        <tr>
                                            <th><label for="enable_popup_<?php echo $news_id; ?>">Enable Popup:</label></th>
                                            <td>
                                                <label>
                                                    <input type="checkbox" id="enable_popup_<?php echo $news_id; ?>" name="enable_popup" value="1" <?php checked($enable_popup, '1'); ?>>
                                                    Show this news item as a popup above the menu bar
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="popup_start_<?php echo $news_id; ?>">Popup Start Date:</label></th>
                                            <td>
                                                <input type="date" id="popup_start_<?php echo $news_id; ?>" name="popup_start" value="<?php echo esc_attr($popup_start); ?>" style="width: 200px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="popup_end_<?php echo $news_id; ?>">Popup End Date:</label></th>
                                            <td>
                                                <input type="date" id="popup_end_<?php echo $news_id; ?>" name="popup_end" value="<?php echo esc_attr($popup_end); ?>" style="width: 200px;">
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    <p>
                                        <button type="submit" class="button button-primary">Save Changes</button>
                                        <button type="button" class="button" onclick="toggleQuickEdit(<?php echo $news_id; ?>)">Cancel</button>
                                    </p>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="notice notice-info" style="margin-top: 20px;">
                <p>No news items found. <a href="<?php echo admin_url('post-new.php?post_type=news'); ?>">Create your first news item</a>.</p>
            </div>
        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>
        
        <script>
        function toggleQuickEdit(newsId) {
            var row = document.getElementById('quick-edit-' + newsId);
            if (row.style.display === 'none') {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        }
        </script>
    </div>
    <?php
}


