# Google Photos API Integration Setup

This guide explains how to set up the Google Photos API integration for the NOLA Holi gallery.

## Overview

The NOLA Holi theme now includes automatic fetching of photos from Google Photos shared albums. Photos are displayed directly on your site in a beautiful grid or carousel layout with a full-featured lightbox viewer.

## Features

✅ **Automatic Photo Fetching** - Photos are automatically fetched from Google Photos shared albums  
✅ **Intelligent Caching** - Results are cached for 24 hours to improve performance  
✅ **Multiple Display Modes** - Grid view or carousel slider  
✅ **Beautiful Lightbox** - Full-screen photo viewer with navigation  
✅ **Keyboard Navigation** - Use arrow keys to navigate photos in lightbox  
✅ **Download Option** - Users can download original photos  
✅ **Responsive Design** - Works perfectly on all devices  
✅ **Lazy Loading** - Images load as needed for better performance  

## How It Works

The theme uses a web scraping approach to fetch publicly shared Google Photos albums. This method:

1. **No API Key Required** (initially) - Works with public share URLs
2. **No OAuth Setup** (for basic functionality) - Visitors don't need to authenticate
3. **Automatic Updates** - Photos added to the album appear on your site (after cache expires)
4. **Performance Optimized** - Results are cached to minimize requests

## Quick Setup (Basic - No API Key)

The theme will work immediately with public Google Photos share URLs:

1. **Go to Appearance → Customize → Photo Gallery** in WordPress
2. **Paste your Google Photos album share URLs** for each year
3. **Select display style** (Grid or Carousel)
4. **Done!** Photos will be fetched and displayed automatically

### Getting Album Share URLs

1. Open your album in Google Photos
2. Click the **Share** button
3. Toggle "Link sharing" to **On**
4. Click "Create link"
5. Copy the generated URL
6. Paste it into the theme customizer

## Advanced Setup (Optional - Full API Access)

For more control and reliability, you can set up official Google Photos API access:

### Step 1: Create a Google Cloud Project

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select an existing one
3. Name it something like "NOLA Holi Gallery"

### Step 2: Enable Google Photos Library API

1. In the Cloud Console, go to **APIs & Services → Library**
2. Search for "Photos Library API"
3. Click on it and click **Enable**

### Step 3: Create OAuth Credentials

1. Go to **APIs & Services → Credentials**
2. Click **Create Credentials** → **OAuth client ID**
3. Choose **Web application**
4. Add authorized redirect URIs:
   ```
   https://your-site.com/wp-admin/options-general.php?page=nolaholi-google-photos&auth=callback
   ```
   (Replace `your-site.com` with your actual domain)
5. Click **Create**
6. Note down your **Client ID** and **Client Secret**

### Step 4: Configure Theme Settings

1. In WordPress, go to **Settings → Google Photos API**
2. Enter your **Client ID** and **Client Secret**
3. Click **Save Settings**
4. Click **Authorize with Google**
5. Follow the OAuth flow to grant permissions
6. Once authorized, the theme will use the API for fetching photos

## Customization

### Display Style

You can choose between two display styles:

- **Grid View** - Photos in a responsive grid layout (default)
- **Carousel** - Horizontal scrolling carousel

Change this in **Appearance → Customize → Photo Gallery → Gallery Display Style**

### Cache Management

Photos are cached for 24 hours. To force a refresh:

1. Go to **Settings → Google Photos API**
2. Click **Clear Photo Cache**
3. Reload your gallery page

### Album URLs

Set album URLs for each year in **Appearance → Customize → Photo Gallery**:

- 2026 Google Photos Album URL
- 2025 Google Photos Album URL
- 2024 Google Photos Album URL

## Troubleshooting

### Photos Not Loading

1. **Check Album Privacy** - Make sure the album is set to "Anyone with the link"
2. **Clear Cache** - Go to Settings → Google Photos API → Clear Photo Cache
3. **Check URL** - Ensure you copied the complete share URL
4. **Check Browser Console** - Look for any JavaScript errors

### Blank Gallery Page

1. **Verify Page Template** - Make sure the page is using the "Gallery" template
2. **Check Permalinks** - Go to Settings → Permalinks and click "Save Changes"
3. **Check Album URLs** - Ensure at least one album URL is set in the customizer

### Images Loading Slowly

1. **Normal Behavior** - First load fetches from Google and may be slow
2. **Cache Kicks In** - Subsequent loads will be much faster (cached for 24 hours)
3. **Optimize Network** - Ensure your hosting has good connectivity

### API Rate Limits

If using the official API and hitting rate limits:

1. **Increase Cache Duration** - Edit `inc/google-photos-api.php` and increase `CACHE_DURATION`
2. **Request Quota Increase** - In Google Cloud Console, request higher quotas
3. **Use Basic Mode** - The web scraping approach (default) doesn't have rate limits

## Best Practices

### For Best Performance

1. ✅ Use reasonable album sizes (100-200 photos per album)
2. ✅ Let the cache do its job (24-hour default is good)
3. ✅ Compress images before uploading to Google Photos
4. ✅ Use Google Photos' "High Quality" setting (free unlimited storage)

### For Best User Experience

1. ✅ Organize photos by year in separate albums
2. ✅ Remove duplicate or low-quality photos
3. ✅ Keep album share links active (don't revoke)
4. ✅ Update album URLs in the customizer when creating new year albums

### Security

1. ✅ Only share albums you want publicly visible
2. ✅ Never include private/sensitive photos
3. ✅ Regularly review your shared albums
4. ✅ Keep WordPress and the theme updated

## Technical Details

### File Structure

```
inc/google-photos-api.php          - Main API handler class
page-templates/template-gallery.php - Gallery display template
js/main.js                          - Lightbox and interaction code
```

### Cache Storage

- **Method**: WordPress Transients API
- **Duration**: 24 hours (86400 seconds)
- **Key Format**: `nolaholi_photos_[MD5 of album URL]`
- **Storage**: WordPress options table

### Image Sizes

The theme fetches multiple sizes for each photo:

- **Thumbnail**: 400x400 (for grid display)
- **Medium**: 1200x1200 (for lightbox initial view)
- **Full**: 2400x2400 (for larger screens)
- **Original**: Full resolution (for download)

## Support

If you encounter issues:

1. Check this documentation
2. Review the [DEVELOPMENT-LOG.md](DEVELOPMENT-LOG.md) for detailed implementation notes
3. Enable WordPress debugging: `define('WP_DEBUG', true);` in `wp-config.php`
4. Check the browser console for JavaScript errors

## Changelog

### Version 1.1.0
- ✅ Added Google Photos API integration
- ✅ Implemented web scraping fallback for public albums
- ✅ Added photo caching system
- ✅ Created lightbox viewer with keyboard navigation
- ✅ Added grid and carousel display modes
- ✅ Implemented lazy loading for images
- ✅ Added download original photo feature

### Version 1.0.0
- Initial release with basic gallery functionality

---

**Last Updated**: October 10, 2025

