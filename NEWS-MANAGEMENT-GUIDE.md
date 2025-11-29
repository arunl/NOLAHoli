# News Management System - User Guide

## Overview

The NOLA Holi website now includes a comprehensive news management system that allows you to:
- Create and manage news articles with rich media
- Display news items with a popup/banner above the menu
- Control when news popups are shown (date range)
- Optimize news articles for social media sharing
- Manage everything from a custom admin interface

## Features

### 1. **News Articles**
Each news article can include:
- **Title** - Main headline
- **Publication Date** - Custom publication date (defaults to post date)
- **Featured Image** - Main image shown at the top
- **Short Description** - 160-character preview for social sharing and excerpts
- **Long Description** - Full article content (using WordPress editor)
- **Additional Images** - Up to 3 extra images displayed in a gallery at the bottom

### 2. **Popup/Banner Display**
- News items can be displayed as a prominent banner above the menu bar
- Configurable display duration (start and end dates)
- Visitors can dismiss the banner (remembered for 7 days via cookie)
- Only one news item can be active at a time (most recent is shown)
- Mobile-responsive design

### 3. **Social Media Preview**
- Automatic Open Graph and Twitter Card meta tags
- Uses short description for preview text
- Featured image shown in social media links
- Optimized for sharing on Facebook, Twitter, LinkedIn, WhatsApp, email, etc.

### 4. **Admin Interface**
- Quick overview of all news items
- See which popups are active at a glance
- Quick edit popup settings without opening full editor
- Filter by publish status (published, draft, pending)

## How to Use

### Creating a News Article

#### Method 1: Using WordPress Dashboard (Recommended for Full Control)

1. **Navigate to News**
   - Log into WordPress admin
   - Click "News" in the left sidebar
   - Click "Add New News Item"

2. **Fill in Basic Information**
   - Enter a compelling **Title**
   - Add your main content in the **editor**
   - Set a **Featured Image** (this appears at the top)

3. **Configure News Details** (right sidebar)
   - **Publication Date**: Set a custom date or leave blank to use post date
   - **Short Description**: Write a 1-2 sentence preview (under 160 characters for best social sharing)

4. **Add Additional Images** (optional)
   - Scroll down to "Additional Images" section
   - Click "Select Image" for up to 3 additional photos
   - These appear in a gallery at the bottom of the article

5. **Configure Popup Settings** (right sidebar)
   - Check "Show as popup above menu bar" to enable
   - Set **Popup Start Date** - when the banner should start appearing
   - Set **Popup End Date** - when the banner should stop appearing
   - Note: Only one popup can be active at a time

6. **Publish**
   - Click "Publish" when ready to go live
   - Or "Save Draft" to work on it later

#### Method 2: Using the Manage News Interface (Recommended for Quick Updates)

1. **Navigate to Manage News**
   - Log into WordPress admin
   - Click "News" → "Manage News" in the left sidebar

2. **View All News Items**
   - See all news articles in a table format
   - Check publication dates, popup status, and duration at a glance

3. **Quick Edit Popup Settings**
   - Click "Quick Edit" on any news item
   - Toggle popup visibility
   - Update start/end dates
   - Click "Save Changes"

4. **Access Full Editor**
   - Click "Edit" to open the full WordPress editor
   - Click "View" to see the published article

### Managing Popup News

#### Best Practices
- **Timing**: Set popup to show 3-7 days before an event
- **Content**: Keep titles short and action-oriented
- **Updates**: Check "Manage News" regularly to see active popups
- **One at a Time**: Only one popup can be active - the most recent published item takes precedence

#### Example Popup Scenarios

**Scenario 1: Event Announcement**
- Title: "NOLA Holi 2026 Date Announced!"
- Short Description: "Join us March 7, 2026 at Washington Square Park for the biggest celebration yet!"
- Popup Duration: January 15 - March 7, 2026

**Scenario 2: Registration Opening**
- Title: "Vendor Registration Now Open"
- Short Description: "Apply now to be a vendor at NOLA Holi 2026. Limited spots available!"
- Popup Duration: February 1 - February 28, 2026

**Scenario 3: Last-Minute Update**
- Title: "Rain Date Change"
- Short Description: "Due to weather, we've moved to our rain date. See you March 8!"
- Popup Duration: March 6 - March 8, 2026 (short urgent notice)

### Viewing News

#### News Archive Page
- Accessible at: `https://nolaholi.org/news/`
- Shows all published news in a grid layout
- Most recent articles appear first
- Includes pagination for large numbers of articles

#### Individual News Pages
- Each article has its own URL: `https://nolaholi.org/news/article-title/`
- Displays featured image, publication date, and full content
- Shows additional images in a gallery
- Includes "Previous" and "Next" navigation
- "Back to All News" button

#### Homepage Integration (Optional)
You can add a link to the news page in your menu:
1. Go to "Appearance" → "Menus"
2. Add "News" as a custom link: `/news/`
3. Save menu

## Social Media Sharing

When someone shares a news article link:

### What They'll See
- **Title**: Article title
- **Description**: Short description (or auto-generated excerpt)
- **Image**: Featured image
- **URL**: Direct link to the article

### Where It Works
- Facebook
- Twitter/X
- LinkedIn
- WhatsApp
- Email clients
- Text messages (iMessage, etc.)
- Slack and other messaging apps

### Optimization Tips
- Keep short descriptions under 160 characters
- Use high-quality featured images (1200x630px ideal)
- Write compelling, action-oriented titles
- Test sharing on multiple platforms

## Technical Details

### Files Created/Modified
- `functions.php` - News post type, meta boxes, admin interface
- `single-news.php` - Individual news article template
- `archive-news.php` - News archive/listing template
- `header.php` - Popup banner display
- `NEWS-MANAGEMENT-GUIDE.md` - This documentation

### Database Fields
Custom meta fields stored for each news item:
- `_news_publication_date` - Custom publication date
- `_news_short_description` - Preview text for sharing
- `_news_image_1`, `_news_image_2`, `_news_image_3` - Additional image IDs
- `_news_enable_popup` - Whether to show as popup (1/0)
- `_news_popup_start` - Popup start date
- `_news_popup_end` - Popup end date

### Caching
- Active popup news is cached for 1 hour
- Cache is automatically cleared when news items are saved
- Dismissed popups are remembered via cookie for 7 days

### Permissions
- **Creating/Editing News**: Requires WordPress editor or administrator role
- **Managing News Interface**: Requires administrator role (manage_options capability)
- **Viewing News**: Public (no login required)

## Troubleshooting

### Popup Not Showing
1. Check that "Show as popup above menu bar" is enabled
2. Verify start and end dates include today's date
3. Make sure the article is published (not draft)
4. Clear your browser cookies if you dismissed it recently
5. Check that there isn't a more recent published popup taking precedence

### Images Not Appearing
1. Ensure featured image is set in the right sidebar
2. For additional images, check that image IDs are saved (click "Update")
3. Verify image file is uploaded to Media Library

### Social Sharing Preview Not Working
1. Add a short description (under 160 characters)
2. Set a featured image
3. Use Facebook's Sharing Debugger: https://developers.facebook.com/tools/debug/
4. Twitter Card Validator: https://cards-dev.twitter.com/validator
5. Clear social media cache (may take 24 hours to update)

### Admin Interface Not Visible
1. Ensure you're logged in as an administrator
2. Go to "News" → "Manage News" in the left sidebar
3. Check that the news post type is registered (should see "News" in admin menu)

## Future Enhancements

Potential features for future versions:
- News categories/tags for better organization
- Email notifications when news is published
- RSS feed for news items
- News widget for homepage
- Multi-language support
- Advanced scheduling (specific times, not just dates)
- Analytics integration to track news views

## Support

For questions or issues with the news management system:
1. Check this guide first
2. Review the WordPress documentation
3. Contact the site administrator or developer

## Changelog

### Version 1.0 (Initial Release)
- Custom news post type
- Admin interface for managing news
- Popup banner system with date-based display
- Social media sharing optimization
- Additional image gallery support
- News archive and single article templates

