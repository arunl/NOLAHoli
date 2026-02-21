# NOLA Holi WordPress Theme

A vibrant, custom WordPress theme designed for the NOLA Holi Festival celebrating the Indian festival of colors in New Orleans with Mardi Gras flair.

## Theme Information

- **Theme Name:** NOLA Holi
- **Version:** 1.4.1
- **Author:** NOLA Holi Team
- **License:** GPL v2 or later
- **Description:** A modern, responsive WordPress theme featuring Mardi Gras colors (purple, green, gold) designed specifically for the NOLA Holi Festival website

## Features

### Design & Layout
- **Mardi Gras Color Palette**: Purple, green, and gold throughout
- **Fully Responsive**: Mobile-first design that works on all devices
- **Modern UI/UX**: Clean, vibrant, and user-friendly interface
- **Custom Page Templates**: Specialized templates for different content types
- **Hero Sections**: Eye-catching hero banners on major pages
- **Dynamic Event Year**: Marketing text automatically updates based on event date

### Custom Post Types
1. **Sponsors** - Manage festival sponsors with tiers, logos, and year
2. **Vendors** - Food and artisan vendor management
3. **Team Members** - Board of Directors and organizers
4. **Gallery** - Photo and video gallery items
5. **News** - Festival news and announcements with popup carousel

### Sponsor Management
- **Year-based organization** - Sponsors tagged by year for historical tracking
- **Multi-year display** - Sponsors page shows year selector tabs
- **Tier system** - Supports both 2025 (Diamond, Platinum) and 2026+ (Presenting, Parade, Entertainment, VIP) tier structures
- **Admin columns** - Tier and Year visible in sponsor list
- **Header "Presented By"** - Automatically shows current year's presenting sponsor

### Page Templates
1. **Home** (front-page.php) - Festival overview with hero, info, and CTAs
2. **About Holi** - Information about the festival's origins
3. **About NOLA Holi** - Local history and Michelle's story
4. **Parade** - Parade details and route information
5. **Festival** - Festival activities and details
6. **Sponsors** - Sponsors by year with tier grouping
7. **Sponsorship Packet** - Marketing page for potential sponsors
8. **Vendors** - Vendor opportunities and policies
9. **Volunteers** - Volunteer sign-up and opportunities
10. **Organizers** - Board of Directors and team
11. **Performers** - Performance application information
12. **Gallery** - Photo/video galleries by year (Google Photos integration)
13. **Contact** - Contact form and FAQ

### Theme Customizer Options
- Event Date (drives dynamic year across site)
- Rain Date
- Event Time
- Event Location
- Social Media Links (Facebook, Instagram, Twitter)
- Photo Gallery Settings (Album URLs by year)

### JavaScript Features
- Mobile menu toggle with dropdown support
- Smooth scrolling for anchor links
- Sticky header on scroll
- Gallery year tabs
- Photo lightbox viewer with keyboard navigation
- Form validation
- Back to top button
- Scroll animations
- Active menu item highlighting
- News popup carousel

### Google Photos Integration
- **Automatic Photo Fetching** - Photos automatically fetched from Google Photos shared albums
- **Multiple Display Modes** - Grid view or carousel slider
- **Intelligent Caching** - 24-hour cache for optimal performance
- **Full-Featured Lightbox** - View photos in full-screen with navigation
- **Keyboard Navigation** - Arrow keys to navigate photos
- **Download Support** - Users can download original photos
- **Lazy Loading** - Images load as needed for better performance

See [docs/GOOGLE-PHOTOS-API-SETUP.md](docs/GOOGLE-PHOTOS-API-SETUP.md) for detailed configuration instructions.

## Installation

### Requirements
- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

### Installation Steps

1. **Download the Theme**
   - Download the theme files or clone from repository

2. **Upload to WordPress**
   ```
   wp-content/themes/nolaholi/
   ```

3. **Activate the Theme**
   - Log in to WordPress admin
   - Navigate to Appearance → Themes
   - Find "NOLA Holi" and click "Activate"

4. **Set Up Menus**
   - Go to Appearance → Menus
   - Create a new menu or edit existing
   - Assign to "Primary Menu" location

5. **Configure Theme Settings**
   - Go to Appearance → Customize
   - Set Event Information (dates, times, location)
   - Add Social Media URLs
   - Upload a logo (optional)

6. **Create Pages**
   For each page template, create a new page and assign the corresponding template:
   - Create page → Assign template from "Page Attributes" → "Template" dropdown

## Usage

### Adding Sponsors

1. Go to **Sponsors** in WordPress admin
2. Click "Add New Sponsor"
3. Enter sponsor name
4. Upload logo as Featured Image
5. In the **Sponsor Details** meta box (below content), fill in:
   - Website URL
   - Sponsor Tier (select from 2026+ or 2025 Historical tiers)
   - Year (2025, 2026, etc.)
   - Display Order (optional, for ordering within tier)
6. Publish

**Note:** The Sponsors page automatically shows year tabs when sponsors exist for multiple years, defaulting to the most recent year.

### Updating for a New Year

When preparing for a new festival year:

1. **Update Event Date** - Appearance → Customize → Event Information
   - This automatically updates the year across all marketing pages
2. **Add New Sponsors** - Create sponsor entries with the new year
3. **Update Sponsorship Packet** - Edit `page-templates/template-sponsorship-packet.php` if tier structure changes
4. **Update Google Photos** - Add new album URL in Customizer → Photo Gallery

### Adding Team Members

1. Go to **Team Members** in WordPress admin
2. Click "Add New Member"
3. Enter member name
4. Upload photo as Featured Image
5. Fill in:
   - Role/Position
   - Display Order (for sorting)
   - Bio (in content area)
6. Publish

### Adding News

1. Go to **News** in WordPress admin
2. Click "Add New"
3. Enter headline and content
4. Upload featured image
5. Configure popup settings if desired
6. Publish

## File Structure

```
nolaholi/
├── style.css                    # Main stylesheet with theme info
├── functions.php                # Theme functions and features
├── header.php                   # Site header template
├── footer.php                   # Site footer template
├── index.php                    # Default blog template
├── front-page.php               # Home page template
├── page.php                     # Default page template
├── single.php                   # Single post template
├── single-news.php              # Single news post template
├── archive-news.php             # News archive template
├── screenshot.png               # Theme screenshot
├── README.md                    # This file
├── inc/                         # Additional functionality
│   └── google-photos-api.php    # Google Photos API integration
├── page-templates/              # Custom page templates
│   ├── template-about-holi.php
│   ├── template-about-nola-holi.php
│   ├── template-parade.php
│   ├── template-festival.php
│   ├── template-sponsors.php
│   ├── template-sponsorship-packet.php
│   ├── template-vendors.php
│   ├── template-volunteers.php
│   ├── template-organizers.php
│   ├── template-performers.php
│   ├── template-gallery.php
│   └── template-contact.php
├── js/
│   └── main.js                  # JavaScript functionality
├── images/                      # Theme images
└── docs/                        # Documentation
    ├── DEVELOPMENT-LOG.md
    ├── GOOGLE-PHOTOS-API-SETUP.md
    ├── GALLERY-SETUP.md
    ├── NEWS-MANAGEMENT-GUIDE.md
    ├── SPONSORSHIP-TIERS-GUIDE.md
    └── ... (other docs)
```

## Customization

### Colors

The theme uses CSS custom properties (variables) for easy color customization. Edit in `style.css`:

```css
:root {
    --mardi-gras-purple: #5E2B7A;
    --mardi-gras-green: #00843D;
    --mardi-gras-gold: #FFC107;
}
```

### Sponsor Tiers

Tiers are defined in two places:

1. **Admin dropdown** - `functions.php` in `nolaholi_sponsor_meta_box()`
2. **Display names** - `page-templates/template-sponsors.php` in `nolaholi_get_tier_name()`

When adding new tier structures for future years, update both locations.

## Recommended Plugins

While the theme works standalone, these plugins enhance functionality:

1. **Contact Form 7** - For contact forms (auto-detected and styled)
2. **Yoast SEO** - For search engine optimization
3. **Wordfence Security** - For site security
4. **WP Super Cache** - For performance optimization

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Troubleshooting

### Sponsors Not Showing for New Year
- Ensure sponsors have the correct Year value in their Sponsor Details
- The page defaults to the most recent year with sponsors

### Menu Not Showing
- Check if menu is created and assigned to "Primary Menu" location
- Clear cache if using caching plugin

### Custom Post Types Not Appearing
- Go to Settings → Permalinks
- Click "Save Changes" to flush rewrite rules

## Support

For questions or issues with this theme:
- **Email**: info@nolaholi.org
- **Website**: https://www.nolaholi.org

## Credits

- **Design & Development**: NOLA Holi Team
- **Inspired By**: Michelle Lakhotia's vision
- **Color Palette**: New Orleans Mardi Gras tradition
- **Cultural Inspiration**: Indian Holi festival

## License

This theme is licensed under the GPL v2 or later.

---

**Built with 💜💚💛 for NOLA Holi Festival**

*In loving memory of Michelle Lakhotia*
