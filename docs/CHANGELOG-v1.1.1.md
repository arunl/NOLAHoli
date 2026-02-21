# Changelog - Version 1.1.1

**Release Date:** October 10, 2025 (Evening Update)

## 🎥 Video Support & Enhanced Gallery Controls

This update adds comprehensive video support and user-friendly view controls to the gallery.

### ✨ New Features

#### 🎬 Full Video Support
- **Videos from Google Photos** are now automatically detected and displayed
- **Video indicator icon** (▶) appears on video thumbnails in the grid
- **Click to play** videos in the full-screen lightbox
- **Native video controls** (play, pause, volume, fullscreen, scrubbing)
- **Auto-play** when opening a video in lightbox
- **Space bar** to play/pause video (keyboard shortcut)
- **Download videos** just like photos

#### 🎯 View Toggle Control
- **Grid/Carousel Toggle** button on the gallery page
- **Switch between views** with a single click
- **Beautiful toggle buttons** with icons
- **Active state** shows which view you're in
- **Smooth transitions** between grid and carousel modes
- **Carousel scroll bar** styled in Mardi Gras colors

#### 🎨 Enhanced Carousel Mode
- **Horizontal scrolling** with smooth snap-to-item behavior
- **Custom scrollbar** (purple/green Mardi Gras colors)
- **Touch-friendly** swipe navigation on mobile
- **Larger items** (350px) for better viewing
- **Auto-scroll to start** when switching to carousel

### 🔧 Technical Improvements

#### Enhanced Media Detection
- Detects both `lh3.googleusercontent.com` (photos) and `video.googleusercontent.com` URLs
- Identifies video thumbnails by URL patterns (`-rw`, `-no`)
- Multiple video URL format support (`redirector.googlevideo.com`)
- Each media item has a `type` field (`photo` or `video`)

#### Lightbox Enhancements
- Supports both `<img>` and `<video>` elements
- Automatically switches between image and video display
- Pauses video when closing lightbox or navigating away
- Download button works for both photos and videos
- Keyboard controls enhanced (Space for video play/pause)

#### Grid/Carousel Implementation
- CSS classes: `.grid` and `.carousel`
- Dynamic class switching via JavaScript
- Maintains responsive behavior in both modes
- Optimized for performance (no re-rendering, just CSS)

### 📋 What Changed

**Modified Files:**
```
inc/google-photos-api.php           - Enhanced video detection
page-templates/template-gallery.php - Added view toggle, video support
js/main.js                          - Video playback, view switching
```

**New Features in Templates:**
- View toggle buttons with SVG icons
- Video indicator on thumbnails (▶ badge)
- Video element in lightbox
- Enhanced data attributes (data-type, data-video-url)

**New JavaScript Functions:**
- `initViewToggle()` - Handles grid/carousel switching
- Enhanced `initPhotoLightbox()` - Now handles videos
- `showMedia()` - Unified function for photos and videos

### 🎮 User Controls

#### Gallery Page
- **Year Tabs** - Switch between 2024, 2025, 2026 albums
- **View Toggle** - Switch between Grid and Carousel
- **Click to View** - Opens photo or video in lightbox

#### Lightbox
- **Navigation** - Previous/Next buttons and arrow keys
- **Close** - X button, overlay click, or ESC key
- **Video Controls** - Play, pause, volume, seek, fullscreen
- **Download** - Download original photo or video
- **Space Bar** - Play/pause video (keyboard shortcut)

### 🎨 Visual Enhancements

- Video thumbnails have a play button badge (▶) in top-right corner
- Videos show play icon (▶️) in overlay on hover
- Photos show magnify icon (🔍) in overlay on hover
- Carousel has custom scrollbar in Mardi Gras colors
- View toggle buttons have active state highlighting
- Smooth animations and transitions throughout

### 📱 Mobile Optimizations

- Touch/swipe support in carousel mode
- Responsive video player controls
- Optimized button sizes for touch
- Grid adapts to smaller screens (smaller tiles)
- Lightbox works perfectly on mobile

### 🚀 Performance

- Videos load on-demand (only when opened in lightbox)
- Lazy loading for thumbnails
- No impact on initial page load
- Cache works for both photos and videos
- Efficient DOM updates (class swapping, no re-rendering)

### 🐛 Bug Fixes

- Fixed lightbox not properly handling media types
- Fixed carousel not initializing with correct styles
- Fixed video auto-play issues
- Fixed download button for videos

### 📚 Usage

#### For Site Visitors
1. **Browse Gallery** - See photos and videos in grid or carousel
2. **Identify Videos** - Look for ▶ icon on thumbnails
3. **Click to View** - Opens in full-screen lightbox
4. **Control Videos** - Use standard video controls
5. **Navigate** - Use arrows, buttons, or swipe
6. **Download** - Click download button for originals

#### For Administrators
- No setup needed! Videos work automatically
- Upload videos to your Google Photos album
- Share the album URL (same as before)
- Theme detects and displays videos automatically
- Clear cache if videos don't appear (Settings → Google Photos API)

### 🔄 Upgrade Notes

- **No Breaking Changes** - Existing functionality preserved
- **Automatic Video Detection** - Works with existing album URLs
- **Cache Cleared** - May need to clear cache to see videos
- **Performance** - Same fast loading as before

### 🎯 What's Next

Future enhancements planned:
- Video thumbnails with poster frames
- Video streaming quality selection
- Advanced video analytics (watch time, completion rate)
- Video playlists
- Social sharing for specific videos

---

**Built with 💜💚💛 for NOLA Holi Festival**

*Bringing videos AND photos from your celebrations!*

