# Issue #21 Implementation: Open Graph Meta Tags for URL Previews

## Overview
Implemented comprehensive Open Graph (OG) and Twitter Card meta tags to create rich, informative previews when the site URL is shared via email, text messages, and social media platforms.

## What Was Implemented

### 1. **Open Graph Meta Tags Function** (`functions.php`)
Added `nolaholi_open_graph_meta_tags()` function that:
- Dynamically generates meta tags based on page type (front page, posts, pages)
- Pulls event information from WordPress Customizer (event date, time, location)
- Uses custom page-specific descriptions for better context
- Includes site logo or featured images in previews
- Adds event-specific tags for date and location

### 2. **Dynamic Content by Page Type**

#### **Home Page**
- Title: "NOLA Holi - [Site Description]"
- Description: Includes event date, location, and invitation text
- Image: Site logo or celebration photo

#### **Individual Pages**
Custom descriptions for each page:
- **About Holi**: Information about the festival's history
- **About NOLA Holi**: Our story and mission
- **Festival**: Event details with date and location
- **Parade**: Parade-specific information
- **Gallery**: Photo gallery highlights
- **Sponsors**: Thank you message to sponsors
- **Vendors**: Vendor showcase information
- **Volunteers**: Call to action for volunteers
- **Contact**: Contact information

#### **Posts/Articles**
- Title: Post title
- Description: Post excerpt or trimmed content
- Image: Featured image if available
- Type: "article" (for proper categorization)

### 3. **Meta Tag Types Included**

#### Open Graph Tags
- `og:title` - Page/post title
- `og:description` - Dynamic description
- `og:type` - website/article
- `og:url` - Current page URL
- `og:site_name` - NOLA Holi
- `og:image` - Logo, featured image, or celebration photo
- `og:image:width` / `og:image:height` - Optimal dimensions
- `og:locale` - en_US
- `event:start_date` - Event date
- `event:location` - Event location

#### Twitter Card Tags
- `twitter:card` - summary_large_image
- `twitter:title` - Same as OG title
- `twitter:description` - Same as OG description
- `twitter:image` - Same as OG image
- `twitter:site` - Twitter handle (if configured)
- `twitter:creator` - Twitter handle (if configured)

#### SEO Meta Tags
- Standard `description` meta tag
- `keywords` meta tag with relevant terms
- Schema.org markup (itemprop tags)

## How It Works

1. **Automatic Integration**: The function hooks into `wp_head` action, automatically adding meta tags to every page
2. **Dynamic Content**: Reads from WordPress Customizer settings and page content
3. **Fallback Images**: Uses site logo → featured image → celebration photos (in that order)
4. **Twitter Integration**: Extracts Twitter handle from social media URL in Customizer

## Testing the Implementation

### Test with Social Media Debuggers:

1. **Facebook Sharing Debugger**
   - URL: https://developers.facebook.com/tools/debug/
   - Enter your site URL and click "Debug"
   - View the preview and meta tags detected
   - Click "Scrape Again" if you make changes

2. **Twitter Card Validator**
   - URL: https://cards-dev.twitter.com/validator
   - Enter your site URL
   - View the Twitter Card preview

3. **LinkedIn Post Inspector**
   - URL: https://www.linkedin.com/post-inspector/
   - Enter your site URL
   - See how LinkedIn will display your link

4. **Open Graph Checker**
   - URL: https://www.opengraph.xyz/
   - General purpose OG tag validator

### What to Check:
- ✅ Title displays correctly
- ✅ Description is informative and accurate
- ✅ Image appears and looks good
- ✅ Event date and location are included in description
- ✅ Different pages have appropriate, unique descriptions

## Recommendations for Enhanced Previews

### Creating a Custom Open Graph Image

For the best visual impact as described in Issue #21, create a custom OG image (1200x630px) that includes:

1. **NOLA Holi Logo** (top left or centered)
2. **"NOLA Holi Festival" text** (prominent, branded font)
3. **Event Date** (centered, large and clear)
4. **Location** (below date)
5. **"Presented by:" + Sponsor Logo** (bottom, appropriately scaled)
6. **Vibrant background** (colors theme, subtle patterns)

**Recommended Tools:**
- Canva (easiest, templates available)
- Adobe Photoshop or Illustrator
- Figma
- GIMP (free alternative)

**Image Specifications:**
- Dimensions: 1200 × 630 pixels
- Format: JPG or PNG
- Max file size: < 8 MB (smaller is better for load times)
- Save as: `/images/og-image.jpg` or `/images/og-default.jpg`

### Using the Custom Image

Once you create the custom OG image, update line 803 in `functions.php`:

```php
// Change from:
$default_image = get_template_directory_uri() . '/images/celebration-photo-1.jpg';

// To:
$default_image = get_template_directory_uri() . '/images/og-default.jpg';
```

### Page-Specific OG Images

For even more customization, you can:
1. Create unique OG images for key pages (festival, parade, gallery, etc.)
2. Add a custom field to pages for OG image selection
3. Use different images per year to keep content fresh

## Configuration in WordPress Admin

### Required Setup:

1. **Upload Site Logo**
   - Go to: Appearance → Customize → Site Identity
   - Upload logo (this becomes the default OG image if present)

2. **Set Event Information**
   - Go to: Appearance → Customize → Event Information
   - Update: Event Date, Event Time, Location

3. **Configure Social Media**
   - Go to: Appearance → Customize → Social Media
   - Add Twitter URL (enables Twitter handle in cards)

4. **Set Featured Images**
   - For posts/pages: Set featured image in the post editor
   - These automatically become the OG image for that content

## Browser Cache & Testing Notes

### Important:
- Social media platforms cache OG data aggressively (24-48 hours)
- Always use the debugger tools to refresh the cache
- Clear your browser cache when testing
- Wait 5-10 minutes for changes to propagate

### Force Update:
1. Update your content
2. Use Facebook Debugger to "Scrape Again"
3. Use Twitter Card Validator to refresh
4. Check in incognito/private browsing mode

## Files Modified

- ✅ `functions.php` - Added `nolaholi_open_graph_meta_tags()` function
- ✅ Connected to `wp_head` action (automatically executes)

## Files Not Modified

- ❌ `header.php` - Not needed; `wp_head()` hook handles insertion

## Benefits

1. **Better Sharing Experience**: Links look professional and informative
2. **Increased Click-Through**: Rich previews get more engagement
3. **Brand Consistency**: Every share promotes NOLA Holi properly
4. **SEO Benefits**: Meta tags help search engines understand content
5. **Platform Compatibility**: Works across email, SMS, social media, messaging apps

## Future Enhancements

Consider these additions:
- JSON-LD structured data for events
- Pinterest Rich Pins support
- WhatsApp preview optimization
- Custom OG images per content type
- Dynamic sponsor logo in OG images (requires image generation)
- A/B testing different preview styles

## Support

If previews don't appear correctly:
1. Verify WordPress Customizer settings are complete
2. Check that images are publicly accessible
3. Ensure HTTPS is working (mixed content blocks images)
4. Use debugger tools to see what platforms detect
5. Clear social media caches using debugger tools

---

**Issue**: #21
**Branch**: feature/issue-21-og-meta-tags
**Status**: Implemented ✅
**Date**: October 19, 2025

