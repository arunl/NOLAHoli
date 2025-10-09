# NOLA Holi WordPress Theme

A vibrant, custom WordPress theme designed for the NOLA Holi Festival celebrating the Indian festival of colors in New Orleans with Mardi Gras flair.

## Theme Information

- **Theme Name:** NOLA Holi
- **Version:** 1.0.0
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

### Custom Post Types
1. **Sponsors** - Manage festival sponsors with tiers and logos
2. **Vendors** - Food and artisan vendor management
3. **Team Members** - Board of Directors and organizers
4. **Gallery** - Photo and video gallery items

### Custom Taxonomies
- **Sponsor Tiers** - Event, Diamond, Platinum, Gold, Silver, Friends
- **Gallery Years** - Organize gallery items by year

### Page Templates
1. **Home** (front-page.php) - Festival overview with hero, info, and CTAs
2. **About Holi** - Information about the festival's origins
3. **About NOLA Holi** - Local history and Michelle's story
4. **Parade** - Parade details and route information
5. **Festival** - Festival activities and details
6. **Sponsors** - Sponsorship tiers and current sponsors
7. **Vendors** - Vendor opportunities and policies
8. **Volunteers** - Volunteer sign-up and opportunities
9. **Organizers** - Board of Directors and team
10. **Gallery** - Photo/video galleries by year
11. **Contact** - Contact form and information

### Theme Customizer Options
- Event Date
- Rain Date
- Event Time
- Event Location
- Social Media Links (Facebook, Instagram, Twitter)

### JavaScript Features
- Mobile menu toggle
- Smooth scrolling for anchor links
- Sticky header on scroll
- Gallery year tabs
- Form validation
- Back to top button
- Scroll animations
- Active menu item highlighting

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
   - Add pages: Home, About Holi, About NOLA Holi, Parade, Festival, Sponsors, Vendors, Volunteers, Gallery, Contact

5. **Configure Theme Settings**
   - Go to Appearance → Customize
   - Set Event Information (dates, times, location)
   - Add Social Media URLs
   - Upload a logo (optional)

6. **Create Pages**
   For each page template, create a new page and assign the corresponding template:
   - Create page → Assign template from "Page Attributes" → "Template" dropdown
   
   Required pages:
   - Home (set as Front Page in Settings → Reading)
   - About Holi (Template: About Holi)
   - About NOLA Holi (Template: About NOLA Holi)
   - Parade (Template: Parade)
   - Festival (Template: Festival)
   - Sponsors (Template: Sponsors)
   - Vendors (Template: Vendors)
   - Volunteers (Template: Volunteers)
   - Organizers (Template: Organizers)
   - Gallery (Template: Gallery)
   - Contact (Template: Contact)

## Usage

### Adding Sponsors

1. Go to **Sponsors** in WordPress admin
2. Click "Add New Sponsor"
3. Enter sponsor name
4. Upload logo as Featured Image
5. Fill in sponsor details:
   - Website URL
   - Sponsor Tier (Event, Diamond, Platinum, Gold, Silver, Friends)
   - Year (2024, 2025, 2026, etc.)
6. Publish

### Adding Vendors

1. Go to **Vendors** in WordPress admin
2. Click "Add New Vendor"
3. Enter vendor information
4. Upload vendor logo/photo as Featured Image
5. Publish

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

### Adding Gallery Items

1. Go to **Gallery** in WordPress admin
2. Click "Add New Gallery Item"
3. Enter title
4. Upload image as Featured Image
5. Select Year taxonomy (2024, 2025, etc.)
6. Publish

### Customizing Event Information

1. Go to **Appearance → Customize**
2. Find "Event Information" section
3. Update:
   - Event Date
   - Rain Date
   - Event Time
   - Event Location
4. Click "Publish"

### Social Media Links

1. Go to **Appearance → Customize**
2. Find "Social Media" section
3. Add URLs for:
   - Facebook
   - Instagram
   - Twitter
4. Click "Publish"

## File Structure

```
nolaholi/
├── style.css                 # Main stylesheet with theme info
├── functions.php             # Theme functions and features
├── header.php               # Site header template
├── footer.php               # Site footer template
├── index.php                # Default blog template
├── front-page.php           # Home page template
├── page.php                 # Default page template
├── single.php               # Single post template
├── page-templates/          # Custom page templates
│   ├── template-about-holi.php
│   ├── template-about-nola-holi.php
│   ├── template-parade.php
│   ├── template-festival.php
│   ├── template-sponsors.php
│   ├── template-vendors.php
│   ├── template-volunteers.php
│   ├── template-organizers.php
│   ├── template-gallery.php
│   └── template-contact.php
├── js/
│   └── main.js              # JavaScript for interactive elements
└── README.md                # This file
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

### Fonts

The theme uses system fonts by default. To use custom fonts, edit the Google Fonts link in `functions.php`:

```php
wp_enqueue_style('nolaholi-fonts', 'https://fonts.googleapis.com/css2?family=Your+Font&display=swap', array(), null);
```

### Adding New Sections

To add new sections to any page template:

1. Open the desired template file in `page-templates/`
2. Add a new section using the existing structure:

```php
<section class="content-section bg-white">
    <div class="container">
        <h2 class="section-title text-center">Your Title</h2>
        <div class="section-divider"></div>
        <!-- Your content here -->
    </div>
</section>
```

## Recommended Plugins

While the theme works standalone, these plugins enhance functionality:

1. **Contact Form 7** - For contact forms
2. **Advanced Custom Fields (ACF)** - For additional custom fields
3. **Yoast SEO** - For search engine optimization
4. **Wordfence Security** - For site security
5. **WP Super Cache** - For performance optimization

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

The theme is optimized for performance with:
- Minimal external dependencies
- Efficient CSS and JavaScript
- Image lazy loading support
- Responsive images

## Accessibility

The theme follows WordPress accessibility standards:
- Semantic HTML5
- ARIA labels where appropriate
- Keyboard navigation support
- Screen reader friendly

## Updates & Maintenance

### Annual Updates

Each year, update the following:

1. **Event Dates**: Appearance → Customize → Event Information
2. **Sponsors**: Add new sponsors with current year
3. **Gallery**: Add new gallery items with current year
4. **Team Members**: Update board members if changed

### Content Updates

- **Festival Schedule**: Update Parade and Festival pages
- **Vendor Information**: Update vendor fees and policies
- **Volunteer Opportunities**: Refresh volunteer page content

## Troubleshooting

### Menu Not Showing
- Check if menu is created and assigned to "Primary Menu" location
- Clear cache if using caching plugin

### Custom Post Types Not Appearing
- Go to Settings → Permalinks
- Click "Save Changes" to flush rewrite rules

### Images Not Displaying Correctly
- Check image sizes: Appearance → Customize → Additional CSS
- Regenerate thumbnails using a plugin like "Regenerate Thumbnails"

### JavaScript Not Working
- Check browser console for errors
- Ensure jQuery is loaded
- Clear browser and site cache

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

```
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
```

## Changelog

### Version 1.0.0
- Initial release
- Custom page templates for all major sections
- Custom post types for Sponsors, Vendors, Team Members, Gallery
- Mardi Gras color scheme (purple, green, gold)
- Fully responsive design
- Mobile menu
- Gallery year tabs
- Form validation
- Smooth scrolling
- Back to top button

---

**Built with 💜💚💛 for NOLA Holi Festival**

*In loving memory of Michelle Lakhotia*

