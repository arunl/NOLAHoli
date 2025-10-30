# Contact Form 7 Auto-Detection Implementation

## Overview
This document describes the automatic Contact Form 7 detection and fallback system implemented for the NOLA Holi theme's contact page.

## Problem Solved
Previously, the contact page used a hardcoded Contact Form 7 form ID and a manual boolean flag to switch between Contact Form 7 and a custom form. This approach had several issues:
- Required manual code editing to switch between form types
- Hardcoded form IDs would break if forms were recreated
- No feedback to administrators about configuration issues
- Required technical knowledge to configure

## Solution
Implemented an intelligent auto-detection system that:
1. Automatically detects if Contact Form 7 is installed and active
2. Searches for Contact Form 7 forms by name (no hardcoded IDs)
3. Falls back gracefully to a custom form if CF7 is unavailable
4. Provides helpful admin notices about form configuration status

## Implementation Details

### New Functions (in `functions.php`)

#### 1. `nolaholi_get_contact_form_7_id()`
Searches for a Contact Form 7 form by title and returns its ID.

**Search Priority:**
1. "NOLA Holi Contact Form" (preferred)
2. "Contact form 1" (default CF7 form name)
3. "Contact Form 1" (alternative capitalization)
4. "Contact Form" (generic fallback)

**Fallback Behavior:**
If no form matches the preferred names, it returns the first available CF7 form, ensuring the site remains functional even with custom form names.

**Return Value:**
- `int` - Form ID if found
- `false` - If Contact Form 7 is not active or no forms exist

#### 2. `nolaholi_check_contact_form_7_status()`
Checks the overall status of Contact Form 7 configuration.

**Returns an array with:**
- `available` (bool) - Whether CF7 is ready to use
- `form_id` (int|false) - The form ID if available
- `message` (string) - Human-readable status message
- `form_name` (string) - The actual form name being used

**Status Messages:**
- Plugin not installed: Informs admin CF7 isn't available
- Forms not found: Suggests creating a form with the correct name
- Using non-preferred name: Recommends renaming for consistency
- Configured correctly: Confirms everything is working

#### 3. `nolaholi_display_cf7_admin_notice()`
Displays contextual admin notices on the contact page (only visible to logged-in administrators).

**Notice Types:**
1. **Info (Blue)** - CF7 not installed, using custom form
2. **Warning (Yellow)** - CF7 installed but misconfigured
3. **Tip (Yellow)** - CF7 working but using non-preferred form name
4. **No Notice** - Everything configured correctly

**Features:**
- Only visible to users with `manage_options` capability (admins)
- Only shown when user is logged in
- Includes helpful links to create forms
- Color-coded for easy recognition

### Template Changes (in `page-templates/template-contact.php`)

**Before:**
```php
<?php if (true) // Manual flag ?>
    <?php echo do_shortcode('[contact-form-7 id="a531477" title="Contact form 1"]'); ?>
<?php } else { ?>
    <!-- Custom form -->
<?php } ?>
```

**After:**
```php
<?php 
// Display admin notice
nolaholi_display_cf7_admin_notice();

// Check CF7 status
$cf7_status = nolaholi_check_contact_form_7_status();

if ($cf7_status['available'] && $cf7_status['form_id']) : ?>
    <!-- Contact Form 7 with dynamic ID -->
    <?php echo do_shortcode('[contact-form-7 id="' . esc_attr($cf7_status['form_id']) . '"]'); ?>
<?php else : ?>
    <!-- Custom fallback form -->
<?php endif; ?>
```

## How It Works

### For Regular Visitors
The system is completely transparent - visitors see the appropriate form without any indication of which system is being used.

### For Administrators

#### Scenario 1: CF7 Not Installed
**What Happens:**
- Custom form is displayed
- Admin sees blue info notice: "Contact Form 7 plugin is not installed. Using the built-in custom contact form."

**To Enable CF7:**
1. Install and activate Contact Form 7 plugin
2. Create a form named "NOLA Holi Contact Form" or "Contact form 1"
3. Form will automatically be detected and used

#### Scenario 2: CF7 Installed, No Forms Created
**What Happens:**
- Custom form is displayed
- Admin sees yellow warning: "Contact Form 7 is installed but no contact forms found."
- Notice includes a direct link to create a new form

**To Enable CF7:**
1. Click the "Create a Contact Form 7 form" link
2. Name the form "NOLA Holi Contact Form" or "Contact form 1"
3. Configure the form as needed
4. Form will automatically be detected and used

#### Scenario 3: CF7 Installed with Custom Form Name
**What Happens:**
- Contact Form 7 form is displayed (working)
- Admin sees yellow tip: "Using Contact Form 7 form '[Your Form Name]'. For best results, rename it to 'NOLA Holi Contact Form'."

**Optional Action:**
- Rename the form to the preferred name for consistency
- Or leave as-is - it's working fine

#### Scenario 4: CF7 Properly Configured
**What Happens:**
- Contact Form 7 form is displayed
- No admin notice shown (everything is working correctly)

## Benefits

### 1. Zero Configuration Required
- Works out of the box with default Contact Form 7 installation
- No code editing needed to switch between forms
- No hardcoded IDs to maintain

### 2. Graceful Degradation
- Always displays a working contact form
- Automatically falls back to custom form if CF7 unavailable
- Site never breaks due to form configuration issues

### 3. Clear Admin Feedback
- Administrators always know what form is being used
- Helpful suggestions for improving configuration
- Direct links to fix issues

### 4. Flexible Form Naming
- Works with multiple form name variations
- Falls back to first available form if no match
- Reduces chance of configuration errors

### 5. No Manual Intervention
- Automatically detects plugin status on every page load
- No caching issues or stale configuration
- Adapts immediately to plugin changes

## Technical Considerations

### Performance
The functions check Contact Form 7 status on each page load, but only for the contact page. The queries are lightweight:
- Checking if CF7 exists: `function_exists('wpcf7')` - very fast
- Getting forms: Standard WordPress `get_posts()` query
- Admin notices: Only shown to logged-in administrators

### Security
- All outputs are properly escaped using `esc_html()`, `esc_attr()`, `esc_url()`
- Admin notices only shown to users with `manage_options` capability
- Form IDs validated before use

### Compatibility
- Works with any version of Contact Form 7 that uses the standard post type
- Compatible with WordPress 5.0+
- No conflicts with other plugins

## Testing

### Test Case 1: Fresh Install (No CF7)
1. Visit contact page as admin
2. Should see custom form
3. Should see blue info notice about CF7 not installed

### Test Case 2: CF7 Installed, No Forms
1. Install and activate Contact Form 7
2. Visit contact page as admin
3. Should see custom form
4. Should see yellow warning with link to create form

### Test Case 3: CF7 with Default Form
1. Install CF7 and create form named "Contact form 1"
2. Visit contact page as admin
3. Should see Contact Form 7 form
4. Should see no admin notice (or success message)

### Test Case 4: CF7 with Custom Name
1. Install CF7 and create form with different name
2. Visit contact page as admin
3. Should see Contact Form 7 form (working)
4. Should see yellow tip about renaming

### Test Case 5: Regular Visitor
1. Visit contact page as non-logged-in user
2. Should see appropriate form
3. Should see no admin notices

## Future Enhancements

Possible improvements for future versions:
1. Add caching for form ID lookup to improve performance
2. Add option in WordPress Customizer to select preferred form
3. Add admin dashboard widget showing form status
4. Add email notification when form configuration changes
5. Support for multiple contact forms on different pages

## Related Files
- `functions.php` - Helper functions
- `page-templates/template-contact.php` - Contact page template
- `style.css` - Contact Form 7 button styles

## Version History
- **v1.2** (Current) - Automatic detection and admin notices
- **v1.1** - Manual toggle with hardcoded form ID
- **v1.0** - Custom form only

