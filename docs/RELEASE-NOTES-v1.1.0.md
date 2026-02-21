# NOLA Holi Theme v1.1.0 - Release Notes

**Release Date:** October 10, 2025

## 🎉 Major New Feature: Google Photos Integration

This release introduces automatic photo fetching from Google Photos shared albums, eliminating the need to manually upload hundreds of photos to WordPress!

### What's New

#### 🖼️ Automatic Photo Fetching
- Photos are automatically fetched from Google Photos shared albums
- Simply paste a share URL and photos appear on your site
- No manual uploading of individual images required
- Photos update automatically when you add them to the album (after cache expires)

#### 💎 Beautiful Photo Lightbox
- Full-screen photo viewer
- Keyboard navigation (Arrow keys, ESC to close)
- Touch/swipe support for mobile
- Photo counter (e.g., "5 / 42")
- Download original photo button
- Smooth animations and transitions

#### ⚡ Performance Optimizations
- **Intelligent Caching**: Photos cached for 24 hours to minimize API calls
- **Lazy Loading**: Images load as you scroll for faster page load
- **Multiple Image Sizes**: Thumbnail (400px), Medium (1200px), Full (2400px), Original
- **Responsive Images**: Automatically serves optimal size for each device

#### 🎨 Multiple Display Modes
- **Grid View**: Modern responsive grid layout (default)
- **Carousel**: Horizontal scrolling slider
- Switch between modes in the customizer

#### 🔧 Admin Features
- New settings page: **Settings → Google Photos API**
- Optional OAuth setup for advanced features
- One-click cache clearing
- Works immediately with public share URLs (no API key needed!)

### How It Works

The theme uses an intelligent approach:

1. **Basic Mode** (Default): Fetches photos from public share URLs
   - No setup required
   - Works immediately
   - Perfect for most users

2. **Advanced Mode** (Optional): Uses official Google Photos API
   - More reliable for high traffic sites
   - Better rate limiting
   - Requires OAuth setup

### Setup is Simple

1. Share your Google Photos album (toggle "Link sharing" ON)
2. Copy the share URL
3. Go to **Appearance → Customize → Photo Gallery**
4. Paste the URL
5. Done! Photos appear automatically

See [GOOGLE-PHOTOS-API-SETUP.md](GOOGLE-PHOTOS-API-SETUP.md) for detailed instructions.

## 🐛 Bug Fixes

- **Fixed**: Gallery page showing "Nothing Found" due to slug conflict with gallery custom post type
- **Solution**: Set `has_archive` to `false` for gallery CPT, allowing `/gallery/` page to work

## 🔧 Technical Changes

### New Files
```
inc/google-photos-api.php           - Google Photos API handler class
GOOGLE-PHOTOS-API-SETUP.md          - Comprehensive setup guide
RELEASE-NOTES-v1.1.0.md            - This file
```

### Modified Files
```
functions.php                       - Added Google Photos API integration
page-templates/template-gallery.php - Completely redesigned with API support
js/main.js                          - Added lightbox functionality
style.css                           - Updated version to 1.1.0
README.md                           - Added feature documentation
```

### Database Changes
- **Transients**: New cached data stored as `nolaholi_photos_[hash]`
- **Options**: New options for Google Photos API credentials (if using advanced mode)
- **Impact**: Minimal - only transients for caching

## 📦 Upgrade Instructions

### If You're Using the Theme

1. **Backup your site** (always a good practice!)
2. **Upload the new theme** via WordPress admin or FTP
3. **Activate** (or it auto-activates if replacing)
4. **Go to Appearance → Customize → Photo Gallery**
5. **Add your Google Photos album URLs**
6. **Test the gallery page** - photos should appear automatically!

### No Breaking Changes
- All existing functionality remains the same
- Custom post types still work
- Existing gallery items (if any) are unaffected
- Theme customizer settings are preserved

## 🎯 What's Next

### Planned for v1.2.0
- Video support in gallery (YouTube/Vimeo embeds)
- Social media share buttons in lightbox
- Instagram feed integration
- Advanced filtering (by event, by date)

### Planned for v2.0.0
- Block editor (Gutenberg) blocks
- Drag-and-drop page builder integration
- Advanced customizer controls
- Multi-language support (WPML/Polylang)

## 📚 Documentation

- **Setup Guide**: [GOOGLE-PHOTOS-API-SETUP.md](GOOGLE-PHOTOS-API-SETUP.md)
- **Theme Docs**: [README.md](README.md)
- **Development Log**: [DEVELOPMENT-LOG.md](DEVELOPMENT-LOG.md)

## 🙏 Credits

Special thanks to all the contributors and the NOLA Holi community!

## 📄 License

GPL v2 or later - Same as WordPress

## 💬 Support

Questions? Issues? Ideas?
- **Email**: info@nolaholi.org
- **Website**: https://www.nolaholi.org

---

**Built with 💜💚💛 for NOLA Holi Festival**

*Bringing the colors of Holi to New Orleans, one pixel at a time!*

