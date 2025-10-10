<?php
/**
 * Google Photos API Integration
 * 
 * This file handles fetching photos from Google Photos shared albums
 * and displaying them in the gallery.
 *
 * @package NOLAHoli
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class NOLA_Holi_Google_Photos {
    
    /**
     * Cache duration in seconds (24 hours)
     */
    const CACHE_DURATION = 86400;
    
    /**
     * API endpoint for fetching album data
     */
    private $api_endpoint = 'https://photoslibrary.googleapis.com/v1/mediaItems';
    
    /**
     * Initialize the class
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'add_settings_page'));
        add_action('admin_init', array($this, 'register_settings'));
    }
    
    /**
     * Add settings page to WordPress admin
     */
    public function add_settings_page() {
        add_submenu_page(
            'options-general.php',
            'Google Photos API Settings',
            'Google Photos API',
            'manage_options',
            'nolaholi-google-photos',
            array($this, 'render_settings_page')
        );
    }
    
    /**
     * Register settings
     */
    public function register_settings() {
        register_setting('nolaholi_google_photos', 'nolaholi_google_api_key');
        register_setting('nolaholi_google_photos', 'nolaholi_google_client_id');
        register_setting('nolaholi_google_photos', 'nolaholi_google_client_secret');
        register_setting('nolaholi_google_photos', 'nolaholi_google_refresh_token');
    }
    
    /**
     * Render settings page
     */
    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1>Google Photos API Settings</h1>
            
            <div class="notice notice-info">
                <p><strong>Setup Instructions:</strong></p>
                <ol>
                    <li>Go to <a href="https://console.cloud.google.com/" target="_blank">Google Cloud Console</a></li>
                    <li>Create a new project or select an existing one</li>
                    <li>Enable the "Google Photos Library API"</li>
                    <li>Create OAuth 2.0 credentials (Client ID and Client Secret)</li>
                    <li>Add authorized redirect URI: <code><?php echo admin_url('options-general.php?page=nolaholi-google-photos&auth=callback'); ?></code></li>
                    <li>Enter your credentials below</li>
                </ol>
            </div>
            
            <?php
            if (isset($_GET['auth']) && $_GET['auth'] === 'callback' && isset($_GET['code'])) {
                $this->handle_oauth_callback($_GET['code']);
            }
            ?>
            
            <form method="post" action="options.php">
                <?php
                settings_fields('nolaholi_google_photos');
                do_settings_sections('nolaholi_google_photos');
                ?>
                
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="nolaholi_google_client_id">Client ID</label></th>
                        <td>
                            <input type="text" id="nolaholi_google_client_id" name="nolaholi_google_client_id" 
                                   value="<?php echo esc_attr(get_option('nolaholi_google_client_id')); ?>" 
                                   class="regular-text" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="nolaholi_google_client_secret">Client Secret</label></th>
                        <td>
                            <input type="text" id="nolaholi_google_client_secret" name="nolaholi_google_client_secret" 
                                   value="<?php echo esc_attr(get_option('nolaholi_google_client_secret')); ?>" 
                                   class="regular-text" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Authorization</th>
                        <td>
                            <?php if (get_option('nolaholi_google_refresh_token')): ?>
                                <p style="color: green;">✓ Authorized</p>
                                <button type="button" class="button" onclick="location.href='<?php echo $this->get_oauth_url(); ?>'">Re-authorize</button>
                            <?php else: ?>
                                <button type="button" class="button button-primary" onclick="location.href='<?php echo $this->get_oauth_url(); ?>'">Authorize with Google</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
                
                <?php submit_button('Save Settings'); ?>
            </form>
            
            <hr>
            
            <h2>Clear Cache</h2>
            <p>If photos aren't updating, you can clear the cache to force a refresh.</p>
            <form method="post">
                <input type="hidden" name="nolaholi_clear_cache" value="1" />
                <?php wp_nonce_field('nolaholi_clear_cache', 'nolaholi_cache_nonce'); ?>
                <button type="submit" class="button">Clear Photo Cache</button>
            </form>
            
            <?php
            if (isset($_POST['nolaholi_clear_cache']) && 
                wp_verify_nonce($_POST['nolaholi_cache_nonce'], 'nolaholi_clear_cache')) {
                $this->clear_all_cache();
                echo '<div class="notice notice-success"><p>Cache cleared successfully!</p></div>';
            }
            ?>
        </div>
        <?php
    }
    
    /**
     * Get OAuth authorization URL
     */
    private function get_oauth_url() {
        $client_id = get_option('nolaholi_google_client_id');
        $redirect_uri = admin_url('options-general.php?page=nolaholi-google-photos&auth=callback');
        
        $params = array(
            'client_id' => $client_id,
            'redirect_uri' => $redirect_uri,
            'response_type' => 'code',
            'scope' => 'https://www.googleapis.com/auth/photoslibrary.readonly',
            'access_type' => 'offline',
            'prompt' => 'consent'
        );
        
        return 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query($params);
    }
    
    /**
     * Handle OAuth callback
     */
    private function handle_oauth_callback($code) {
        $client_id = get_option('nolaholi_google_client_id');
        $client_secret = get_option('nolaholi_google_client_secret');
        $redirect_uri = admin_url('options-general.php?page=nolaholi-google-photos&auth=callback');
        
        $response = wp_remote_post('https://oauth2.googleapis.com/token', array(
            'body' => array(
                'code' => $code,
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'redirect_uri' => $redirect_uri,
                'grant_type' => 'authorization_code'
            )
        ));
        
        if (!is_wp_error($response)) {
            $body = json_decode(wp_remote_retrieve_body($response), true);
            if (isset($body['refresh_token'])) {
                update_option('nolaholi_google_refresh_token', $body['refresh_token']);
                update_option('nolaholi_google_access_token', $body['access_token']);
                update_option('nolaholi_google_token_expires', time() + $body['expires_in']);
                
                echo '<div class="notice notice-success"><p>Successfully authorized with Google!</p></div>';
            }
        }
    }
    
    /**
     * Get a valid access token
     */
    private function get_access_token() {
        $access_token = get_option('nolaholi_google_access_token');
        $expires = get_option('nolaholi_google_token_expires', 0);
        
        // If token is still valid, return it
        if ($access_token && time() < $expires) {
            return $access_token;
        }
        
        // Refresh the token
        $refresh_token = get_option('nolaholi_google_refresh_token');
        if (!$refresh_token) {
            return false;
        }
        
        $client_id = get_option('nolaholi_google_client_id');
        $client_secret = get_option('nolaholi_google_client_secret');
        
        $response = wp_remote_post('https://oauth2.googleapis.com/token', array(
            'body' => array(
                'refresh_token' => $refresh_token,
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'grant_type' => 'refresh_token'
            )
        ));
        
        if (!is_wp_error($response)) {
            $body = json_decode(wp_remote_retrieve_body($response), true);
            if (isset($body['access_token'])) {
                update_option('nolaholi_google_access_token', $body['access_token']);
                update_option('nolaholi_google_token_expires', time() + $body['expires_in']);
                return $body['access_token'];
            }
        }
        
        return false;
    }
    
    /**
     * Extract album ID from Google Photos URL
     */
    private function extract_album_id($url) {
        // Handle different Google Photos URL formats
        if (preg_match('/\/share\/([A-Za-z0-9_-]+)/', $url, $matches)) {
            return $matches[1];
        }
        if (preg_match('/album\/([A-Za-z0-9_-]+)/', $url, $matches)) {
            return $matches[1];
        }
        return false;
    }
    
    /**
     * Fetch photos from a Google Photos album
     * 
     * @param string $album_url The URL of the shared album
     * @return array|false Array of photo data or false on failure
     */
    public function fetch_album_photos($album_url) {
        if (empty($album_url)) {
            return false;
        }
        
        // Check cache first
        $cache_key = 'nolaholi_photos_' . md5($album_url);
        $cached_photos = get_transient($cache_key);
        
        if ($cached_photos !== false) {
            return $cached_photos;
        }
        
        // For publicly shared albums, we need to use a different approach
        // Google Photos API doesn't directly support fetching from shared album URLs
        // We'll need to use the album share token
        
        $photos = $this->scrape_shared_album($album_url);
        
        if ($photos) {
            set_transient($cache_key, $photos, self::CACHE_DURATION);
        }
        
        return $photos;
    }
    
    /**
     * Alternative method: Scrape shared album
     * This uses the public share URL to extract photo and video information
     */
    private function scrape_shared_album($album_url) {
        $response = wp_remote_get($album_url, array(
            'timeout' => 30,
            'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
        ));
        
        if (is_wp_error($response)) {
            return false;
        }
        
        $body = wp_remote_retrieve_body($response);
        
        // Extract photo URLs from the page
        // Google Photos embeds data in JavaScript variables
        preg_match_all('/\["(https:\/\/lh3\.googleusercontent\.com\/[^"]+)"/i', $body, $photo_matches);
        
        // Extract video URLs - look for video patterns
        preg_match_all('/\["(https:\/\/video\.googleusercontent\.com\/[^"]+)"/i', $body, $video_matches);
        preg_match_all('/\["(https:\/\/redirector\.googlevideo\.com\/[^"]+)"/i', $body, $video_matches2);
        
        $media = array();
        $seen = array();
        
        // Process photos
        if (!empty($photo_matches[1])) {
            foreach ($photo_matches[1] as $url) {
                // Clean up the URL
                $url = html_entity_decode($url);
                
                // Remove size parameters to get base URL
                $base_url = preg_replace('/=w\d+-h\d+(-[a-z]+)?$/', '', $url);
                
                // Avoid duplicates
                if (in_array($base_url, $seen)) {
                    continue;
                }
                $seen[] = $base_url;
                
                // Only include actual photo URLs (not icons, etc.)
                if (strpos($url, 'googleusercontent.com') !== false && 
                    strlen($base_url) > 100) {
                    
                    // Check if this might be a video thumbnail
                    $is_video_thumb = false;
                    if (strpos($base_url, '-rw') !== false || strpos($base_url, '-no') !== false) {
                        $is_video_thumb = true;
                    }
                    
                    $media[] = array(
                        'type' => $is_video_thumb ? 'video' : 'photo',
                        'thumbnail' => $base_url . '=w400-h400',
                        'medium' => $base_url . '=w1200-h1200',
                        'full' => $base_url . '=w2400-h2400',
                        'original' => $base_url,
                        'video_url' => $is_video_thumb ? $base_url . '=m18' : null, // m18 for video
                        'is_video_thumb' => $is_video_thumb
                    );
                }
            }
        }
        
        // Process videos
        if (!empty($video_matches[1])) {
            foreach ($video_matches[1] as $url) {
                $url = html_entity_decode($url);
                $base_url = preg_replace('/=.*$/', '', $url);
                
                if (in_array($base_url, $seen)) {
                    continue;
                }
                $seen[] = $base_url;
                
                if (strlen($base_url) > 100) {
                    $media[] = array(
                        'type' => 'video',
                        'thumbnail' => $base_url . '=w400-h400', // Video poster
                        'medium' => $base_url . '=w1200-h1200',
                        'full' => $base_url . '=w2400-h2400',
                        'original' => $base_url,
                        'video_url' => $base_url . '=m37', // m37 for higher quality video
                        'is_video_thumb' => true
                    );
                }
            }
        }
        
        // Process alternative video URLs
        if (!empty($video_matches2[1])) {
            foreach ($video_matches2[1] as $url) {
                $url = html_entity_decode($url);
                
                if (in_array($url, $seen)) {
                    continue;
                }
                $seen[] = $url;
                
                if (strlen($url) > 100) {
                    $media[] = array(
                        'type' => 'video',
                        'thumbnail' => null, // No thumbnail for these
                        'medium' => null,
                        'full' => null,
                        'original' => $url,
                        'video_url' => $url,
                        'is_video_thumb' => true
                    );
                }
            }
        }
        
        return array_slice($media, 0, 100); // Limit to 100 items
    }
    
    /**
     * Clear cache for a specific album
     */
    public function clear_album_cache($album_url) {
        $cache_key = 'nolaholi_photos_' . md5($album_url);
        delete_transient($cache_key);
    }
    
    /**
     * Clear all photo caches
     */
    public function clear_all_cache() {
        global $wpdb;
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_nolaholi_photos_%'");
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_nolaholi_photos_%'");
    }
}

// Initialize the class
new NOLA_Holi_Google_Photos();

