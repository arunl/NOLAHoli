# Google Photos Gallery Integration

## 🎉 New Feature: Easy Gallery Management

Instead of manually uploading photos one by one, your gallery now pulls images directly from Google Photos albums!

## ✨ Benefits

- ✅ **No Manual Uploads**: Just paste album URLs, done!
- ✅ **Automatic Updates**: Add photos to Google Photos album, they appear automatically
- ✅ **Easy Management**: Update album URL once per year, not hundreds of photos
- ✅ **Better Performance**: Images hosted on Google's CDN
- ✅ **Visitor Friendly**: People can view full albums, download photos, etc.

---

## 📋 How to Set Up

### Step 1: Get Your Google Photos Album URL

1. Go to [Google Photos](https://photos.google.com)
2. Select an album (or create a new one for NOLA Holi)
3. Click the **Share** button
4. Click **Create link** (or **Get link**)
5. Copy the shareable URL

**Example URL:**
```
https://photos.app.goo.gl/A7k1H1NdwU7wUvjLA
```

### Step 2: Add to WordPress

1. Log in to WordPress admin
2. Go to **Appearance → Customize**
3. Find **Photo Gallery** section
4. Paste your album URL in the appropriate year field:
   - **2026 Google Photos Album URL**
   - **2025 Google Photos Album URL**
   - **2024 Google Photos Album URL**
5. Click **Publish**

### Step 3: View Your Gallery

Visit your Gallery page and you'll see:
- Year tabs for each album
- Embedded album preview
- Button to open full album in Google Photos

---

## 🎨 Display Options

You have two display styles (currently set up for future enhancement):

### Grid View (Default)
- Photos displayed in a responsive grid
- Clean, organized layout
- Easy to browse

### Carousel (Coming Soon)
- Slideshow presentation
- Auto-advance option
- Full-screen viewing

To change display style:
1. **Appearance → Customize → Photo Gallery**
2. **Gallery Display Style** dropdown
3. Select Grid View or Carousel
4. Click **Publish**

---

## 📅 Adding New Years

When you need to add 2027, 2028, etc.:

### Option 1: Use Existing Fields
Update the year in the customizer and change the URL

### Option 2: Add New Year Fields (Developer)
Edit `functions.php` and add new customizer settings:

```php
// 2027 Gallery URL
$wp_customize->add_setting('nolaholi_gallery_2027', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('nolaholi_gallery_2027', array(
    'label'       => __('2027 Google Photos Album URL', 'nolaholi'),
    'section'     => 'nolaholi_gallery',
    'type'        => 'url',
    'description' => __('Paste the shareable link from Google Photos', 'nolaholi'),
));
```

Then update `template-gallery.php` to include the 2027 section.

---

## 🔄 Updating Photos

### To Add Photos to Existing Album:
1. Open your Google Photos album
2. Click **Add Photos**
3. Upload new photos
4. **Done!** They appear automatically on your site

### To Change Album for a Year:
1. **Appearance → Customize → Photo Gallery**
2. Update the URL for that year
3. Click **Publish**
4. New album appears instantly

---

## 💡 Best Practices

### Album Organization
```
Google Photos Albums:
├── NOLA Holi 2024
│   └── (inaugural festival photos)
├── NOLA Holi 2025
│   └── (second festival photos)
└── NOLA Holi 2026
    └── (upcoming festival photos)
```

### Photo Tips
- **Share Settings**: Make sure album link sharing is enabled
- **Privacy**: Albums are view-only for visitors
- **Quality**: Google Photos maintains high quality
- **Organization**: Use descriptive album names
- **Quantity**: No limit on photos per album

### Naming Convention
```
Album Names (in Google Photos):
- NOLA Holi 2024 - Inaugural Festival
- NOLA Holi 2025 - Celebration of Colors
- NOLA Holi 2026 - [Year Theme]
```

---

## 🎯 Features

### Automatic Features:
- ✅ Year-based tabs
- ✅ Responsive embedded viewer
- ✅ Direct link to full album
- ✅ Beautiful card display
- ✅ Mobile-friendly
- ✅ Pre-loaded with 2024 & 2025 albums

### What Visitors Can Do:
- Browse photos in embedded viewer
- Click to open full album in Google Photos
- Download photos (if you allow)
- View in slideshow mode
- Share specific photos

---

## 📱 Mobile Experience

The gallery is fully responsive:
- **Desktop**: Large embedded viewer with tabs
- **Tablet**: Medium viewer, stacked layout
- **Mobile**: Compact viewer, tap to expand

---

## 🔒 Privacy & Permissions

### Album Sharing Settings:
- **Link Sharing**: Anyone with link can view
- **Download**: You control in Google Photos settings
- **Commenting**: You can enable/disable
- **Adding Photos**: Only you can add (unless you grant permission)

### Recommended Settings:
1. ✅ Link sharing: ON
2. ✅ Allow download: Your choice
3. ✅ Allow comments: Your choice
4. ❌ Collaboration: OFF (unless you want others to add photos)

---

## 🚀 Quick Start Checklist

- [ ] Organize photos into Google Photos albums by year
- [ ] Get shareable link for each album
- [ ] Go to Appearance → Customize → Photo Gallery
- [ ] Paste album URLs for each year
- [ ] Choose display style (grid or carousel)
- [ ] Click Publish
- [ ] Visit Gallery page to verify
- [ ] Share with team!

---

## 📞 Troubleshooting

### Album Not Showing?
- Check that link sharing is enabled in Google Photos
- Verify URL is correct in Customizer
- Clear browser cache and refresh

### Photos Not Updating?
- New photos appear automatically (may take a few minutes)
- Clear cache if needed
- Verify album link hasn't changed

### Embedded Viewer Not Working?
- Check that album is public/link-shared
- Try opening album URL directly in browser
- Some browsers block iframes - test in different browser

---

## 🎨 Current Setup

Your theme comes pre-configured with:

**2025 Album:**
```
https://photos.app.goo.gl/A7k1H1NdwU7wUvjLA
```

**2024 Album:**
```
https://photos.google.com/share/AF1QipMXoU__flN42f4HOvc_3Ue8HkTyXWUEHWSLuJulorUazYVGVsRzijEKD6GjA48MGA/...
```

These are already set as defaults. You can update or change them anytime!

---

## 🎯 Future Enhancements

Potential additions:
- Lightbox popup for full-screen viewing
- Advanced carousel with auto-play
- Photo filters and categories
- Social media sharing buttons
- Photo contest integration
- Volunteer photo submissions

---

## 📝 Version Info

**Feature Added:** v1.1.0  
**Date:** October 2024  
**Files Modified:**
- `functions.php` - Added customizer settings
- `page-templates/template-gallery.php` - New Google Photos integration

---

## ❓ Questions?

Need help setting up your gallery?
- **Email:** info@nolaholi.org
- **Check README.md** for general theme documentation

---

**Enjoy your hassle-free gallery management!** 🎨📸

No more tedious individual uploads - just paste a link and you're done! 🎉

