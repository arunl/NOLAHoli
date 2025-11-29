# News Management - Quick Start Guide

## 🚀 Getting Started

### First Time Setup
1. **Activate Permalinks**:
   - Go to WordPress Admin → Settings → Permalinks
   - Click "Save Changes" (this activates the `/news/` URL structure)

2. **Create Your First News Article**:
   - WordPress Admin → News → Add New
   - Fill in title and content
   - Set featured image
   - Click "Publish"

3. **View Your News**:
   - Visit: `https://nolaholi.org/news/`
   - Or click "View" next to your article

## ✨ Key Features at a Glance

| Feature | Where to Find It |
|---------|-----------------|
| Create News | Admin → News → Add New |
| Manage All News | Admin → News → Manage News |
| View News Archive | Visit `/news/` on your site |
| Configure Popup | Edit news item → Popup Settings (right sidebar) |
| Add Images | Edit news item → Additional Images section |
| Short Description | Edit news item → News Details section |

## 📝 Creating a News Article (30 seconds)

1. Click **News → Add New**
2. Enter **Title**: "Your News Title"
3. Add **Content**: Write your article
4. Set **Featured Image**: (right sidebar → Featured Image)
5. Add **Short Description**: For social media sharing (scroll down)
6. Click **Publish**

Done! Your news is now live.

## 🎯 Creating a Popup Banner (30 seconds)

1. Create or edit a news article (see above)
2. Scroll to **Popup/Highlight Settings** (right sidebar)
3. Check **"Show as popup above menu bar"**
4. ✨ **Dates auto-fill!** Start = today, End = +7 days (if empty)
5. Adjust dates as needed, or leave empty for indefinite display
6. Click **Publish** or **Update**

Done! Your popup will appear on all pages during the date range.

**💡 Multiple Popups**: You can enable multiple news items as popups. They'll automatically display as a carousel that rotates every 5 seconds!

### Date Behavior Options:
- **Both dates filled**: Shows only during that period
- **Both dates empty**: Shows indefinitely (until unchecked)
- **Only start date**: Shows from start date onward
- **Only end date**: Shows until end date

## 📊 Managing Multiple News Items

Go to **News → Manage News** to see:
- ✅ All news articles in one view
- 📅 Publication dates
- 🎯 Active popup status
- ⚙️ Quick edit popup settings
- 🔗 Direct links to edit/view

## 💡 Pro Tips

### Popup Best Practices
- **Duration**: 3-7 days is ideal
- **Timing**: Start showing 1 week before event
- **Content**: Keep titles short and action-oriented
- **Multiple Items**: Enable multiple news for auto-rotating carousel
- **Thumbnails**: Featured images appear as thumbnails in the carousel
- **Auto-Rotation**: Carousel switches every 5 seconds (pauses on hover)

### Social Sharing
- Add a **Short Description** (under 160 characters)
- Use a **Featured Image** (1200x630px ideal)
- Test sharing on Facebook/Twitter to see preview

### Additional Images
- Great for event photos, infographics, or multi-photo updates
- Shows as a gallery at bottom of article
- Up to 3 images per article

## 🔧 Quick Troubleshooting

| Problem | Solution |
|---------|----------|
| `/news/` shows 404 | Go to Settings → Permalinks → Save Changes |
| Popup not showing | Check dates include today + article is published |
| Images not uploading | Check file size (< 10MB) and format (JPG/PNG) |
| Can't access Manage News | Must be logged in as Administrator |

## 📱 Where News Appears

1. **News Archive**: `/news/` - Lists all articles
2. **Individual Pages**: `/news/article-name/` - Full article
3. **Popup Banner**: Above header (when configured)
4. **Social Shares**: Facebook, Twitter, WhatsApp, etc.

## 🎨 Customization

### Adding News to Menu
1. Go to **Appearance → Menus**
2. Add Custom Link: `/news/`
3. Label it: "News" or "Latest Updates"
4. Save menu

### Changing Popup Colors
Edit `header.php` around line 20:
```php
background: linear-gradient(135deg, var(--mardi-gras-purple) 0%, var(--mardi-gras-gold) 100%);
```

## 📖 More Help

- **Full Documentation**: See `NEWS-MANAGEMENT-GUIDE.md`
- **Implementation Details**: See `ISSUE-43-IMPLEMENTATION.md`
- **WordPress Support**: [wordpress.org/support](https://wordpress.org/support/)

## 📞 Common Questions

**Q: Can I schedule news for future publication?**
A: Yes! Use WordPress's built-in "Schedule" feature when publishing.

**Q: How many news items can I create?**
A: Unlimited! The system handles pagination automatically.

**Q: Can editors create news or only admins?**
A: Currently admins only. The manage interface is admin-only, but standard WordPress news creation works for editors.

**Q: Can I have multiple popups at once?**
A: Yes! Enable popup on multiple news items with overlapping dates. They'll display as an auto-rotating carousel.

**Q: How long are dismissed popups remembered?**
A: 7 days. After that, they'll show again if still active.

**Q: Can I embed videos in news articles?**
A: Yes! Use the WordPress editor to embed YouTube, Vimeo, etc.

---

**That's it! You're ready to start managing news for NOLA Holi. 🎉**

