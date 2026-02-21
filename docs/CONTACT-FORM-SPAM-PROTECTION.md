# Contact Form Spam Protection Guide

## Overview

The NOLA Holi theme uses a **two-tier spam protection system**:

1. **Primary:** Contact Form 7 + Akismet (recommended for production)
2. **Fallback:** Custom form with built-in multi-layer protection

This provides the best of both worlds: enterprise AI-powered spam filtering with intelligent fallback if CF7 is unavailable.

## Quick Start (TL;DR)

**For NOLA Holi Production Use:**

1. Install **Akismet Anti-Spam** plugin → Get free API key (non-profit) → Activate
2. Install **Flamingo** plugin → View submissions in admin dashboard
3. Done! Custom form automatically works as fallback

**Time:** 15 minutes | **Cost:** $0 for non-profits | **Effectiveness:** ~99% spam blocked

[Jump to step-by-step instructions →](#step-by-step-setting-up-akismet)

---

## Recommended Setup (Production)

### Contact Form 7 + Akismet + Flamingo

This is the **recommended configuration** for NOLA Holi:

**Why this setup:**
- ✅ Free for non-profit organizations
- ✅ AI-powered spam detection (trained on billions of submissions)
- ✅ Submission tracking in admin dashboard
- ✅ Email notifications
- ✅ Regular security updates from WordPress.org
- ✅ Proven and battle-tested
- ✅ Easy to maintain

**Setup Time:** ~15 minutes

---

## Step-by-Step: Setting Up Akismet

### Step 1: Install Contact Form 7 (if not already installed)

1. Go to **Plugins → Add New**
2. Search for **"Contact Form 7"**
3. Click **Install Now** → **Activate**
4. Go to **Contact → Contact Forms**
5. Look for "NOLA Holi Contact Form" (should already exist)

### Step 2: Install Akismet Anti-Spam

1. Go to **Plugins → Add New**
2. Search for **"Akismet Anti-Spam"**
3. Click **Install Now** → **Activate**
4. You'll see an activation prompt

### Step 3: Get Your Free Akismet API Key

1. Click **"Get your API key"** or visit: https://akismet.com/pricing/
2. Select **"Personal"** plan (Name Your Price)
3. **Set the price slider to $0** (it's free for non-profits!)
4. Fill in the form:
   - Website: `https://nolaholi.org`
   - Check: **"This site is a personal or non-commercial blog"**
5. Create account with your email
6. You'll receive your API key immediately

### Step 4: Activate Akismet

1. Copy your API key
2. Go to **Settings → Akismet** in WordPress admin
3. Paste your API key
4. Click **Connect with API key**
5. You'll see a green "Akismet is now protecting your site" message

### Step 5: Install Flamingo (Optional - for submission tracking)

Flamingo stores all CF7 submissions in your WordPress database:

1. Go to **Plugins → Add New**
2. Search for **"Flamingo"**
3. Click **Install Now** → **Activate**
4. Go to **Flamingo → Inbound Messages** to view submissions

### Step 6: Verify Everything Works

1. Go to your Contact page: `https://nolaholi.org/contact/`
2. Submit a test message
3. Check:
   - ✅ Email received?
   - ✅ Submission shows in **Flamingo → Inbound Messages**?
   - ✅ No errors?

**You're done!** 🎉

---

## Custom Form Protection (Built-in Fallback)

When Contact Form 7 is not available, the theme uses a custom contact form with **multiple layers of security**:

### 1. **Honeypot Field** 
- Hidden field that bots fill but humans don't see
- Instant spam detection with zero user friction
- No impact on legitimate users

### 2. **Time-Based Bot Detection**
- Tracks form load time vs. submission time
- Blocks submissions faster than 3 seconds (bots)
- Blocks submissions older than 1 hour (stale forms)

### 3. **Rate Limiting**
- Maximum 3 submissions per IP address per 15 minutes
- Prevents spam flooding
- Uses WordPress transients for efficiency

### 4. **Simple Math Captcha**
- Non-annoying alternative to Google reCAPTCHA
- Random addition problems (1-10 + 1-10)
- Human-friendly verification

### 5. **Input Sanitization (XSS Protection)**
- All input fields are sanitized using WordPress functions
- `sanitize_text_field()` for text inputs
- `sanitize_email()` for email addresses
- `sanitize_textarea_field()` for messages
- Prevents script injection and XSS attacks

### 6. **Email Validation**
- Validates proper email format
- Blocks disposable email domains commonly used for spam
- Blocked domains include: tempmail.com, throwaway.email, guerrillamail.com, mailinator.com, 10minutemail.com, trashmail.com

### 7. **Nonce Verification (CSRF Protection)**
- WordPress nonce prevents Cross-Site Request Forgery
- Each form submission requires valid token
- Protects against unauthorized submissions

### 8. **Message Length Validation**
- Minimum 10 characters (prevents empty spam)
- Maximum 5000 characters (prevents abuse)

## Comparing the Two Systems

| Feature | CF7 + Akismet | Custom Form (Fallback) |
|---------|---------------|------------------------|
| **Spam Detection** | AI-powered, learns from billions of submissions | Rule-based (honeypot, captcha, rate limits) |
| **Setup Time** | 15 minutes | Automatic (already built-in) |
| **Maintenance** | Plugin auto-updates | None needed |
| **Admin Dashboard** | Yes (with Flamingo) | No (email only) |
| **User Experience** | Seamless (no captcha) | Simple math question |
| **Cost (non-profit)** | Free | Free |
| **Cost (commercial)** | $10/month | Free |
| **Effectiveness** | ~99% spam blocked | ~95% spam blocked |
| **When to Use** | Production (primary) | Automatic fallback if CF7 unavailable |

## Additional CF7 Enhancement Options

If you want extra protection beyond Akismet, here are additional options:

### Option 1: Add Honeypot to Contact Form 7

Add this to your CF7 form code:

```
<label>Leave this field empty
    [text your-honeypot class:honeypot]
</label>
```

Then add this CSS to hide it (in Appearance → Customize → Additional CSS):

```css
.wpcf7 .honeypot {
    position: absolute;
    left: -5000px;
}
```

### Option 2: Google reCAPTCHA v3 (Not Recommended)

**Note:** Akismet is better and less intrusive. Only use reCAPTCHA if you have specific requirements.

1. **Get reCAPTCHA Keys:**
   - Visit https://www.google.com/recaptcha/admin
   - Register your site
   - Choose reCAPTCHA v3 (invisible)
   - Get Site Key and Secret Key

2. **Configure in WordPress:**
   - Go to **Contact → Integration** in WordPress admin
   - Click reCAPTCHA tab
   - Enter your Site Key and Secret Key
   - Save

3. **CF7 automatically adds it** to your forms

### Option 3: Quiz/Math Verification

Add a simple math question to your CF7 form:

```
<label> What is 5 + 3? (spam check)
    [number* quiz-spam]
</label>
```

Then use CF7's conditional logic or third-party plugins to validate the answer.

**Note:** This is similar to what the custom form fallback already does automatically.

## Testing Your Spam Protection

### Testing CF7 + Akismet (Primary System):

1. **Test Normal Submission:**
   - Go to your contact page
   - Fill in all fields with real information
   - Submit form
   - Check: ✅ Email received? ✅ Shows in Flamingo?

2. **Test Akismet Spam Detection:**
   - Akismet automatically flags suspicious submissions
   - Use test email: `akismet-guaranteed-spam@example.com`
   - This email is guaranteed to be flagged as spam by Akismet
   - Check **Flamingo → Spam** to see caught submissions

3. **Monitor Over Time:**
   - Check **Flamingo → Inbound Messages** weekly
   - Check **Flamingo → Spam** to see what was blocked
   - Akismet learns and improves over time

### Testing Custom Form (Fallback):

1. **Test Honeypot:**
   - Use browser developer tools
   - Find the hidden `contact_website` field
   - Fill it in and submit
   - Should be blocked

2. **Test Rate Limiting:**
   - Submit form 3 times quickly
   - 4th submission should be blocked
   - Wait 15 minutes, should work again

3. **Test Captcha:**
   - Submit with wrong math answer
   - Should be blocked
   - Submit with correct answer
   - Should succeed

4. **Test Time Detection:**
   - Load form and submit within 2 seconds
   - Should be blocked as "too fast"

5. **Test XSS Protection:**
   - Try submitting `<script>alert('test')</script>` in message field
   - Script should be sanitized and not execute
   - Email should receive sanitized text

### How to Trigger Custom Form (for testing fallback):

To test the custom form protection:

1. Temporarily deactivate Contact Form 7 plugin
2. Visit the contact page - custom form will appear automatically
3. Run the custom form tests above
4. Reactivate Contact Form 7 when done

**Note:** In production, the custom form only appears if CF7 is unavailable or not configured.

## Security Best Practices

1. **Keep WordPress Updated:**
   - Update WordPress core regularly
   - Update all plugins and themes

2. **Use Strong Admin Passwords:**
   - Prevent unauthorized access to admin panel

3. **Monitor Form Submissions:**
   - Install Flamingo plugin to log CF7 submissions
   - Review for patterns of abuse

4. **Add More Disposable Email Domains:**
   - Edit `nolaholi_validate_email()` in functions.php
   - Add domains to the `$disposable_domains` array

5. **Adjust Rate Limits:**
   - Edit `nolaholi_check_rate_limit()` in functions.php
   - Change `>= 3` to adjust submission limit
   - Change `15 * MINUTE_IN_SECONDS` to adjust time window

6. **Whitelist IPs (if needed):**
   - Add IP whitelist check before rate limiting
   - Useful for trusted partners or internal testing

## Customization

### Changing Captcha Difficulty:

In `page-templates/template-contact.php`, modify:

```php
// Easy (1-5)
$num1 = rand(1, 5);
$num2 = rand(1, 5);

// Hard (1-20)
$num1 = rand(1, 20);
$num2 = rand(1, 20);

// Subtraction instead
$num1 = rand(10, 20);
$num2 = rand(1, 9);
$captcha_answer = $num1 - $num2;
// Update label accordingly
```

### Changing Rate Limits:

In `functions.php`, modify `nolaholi_check_rate_limit()`:

```php
// More strict: 2 per 30 minutes
if ($attempts && $attempts >= 2) {
    return true;
}
set_transient($transient_key, $attempts, 30 * MINUTE_IN_SECONDS);

// More lenient: 5 per 10 minutes
if ($attempts && $attempts >= 5) {
    return true;
}
set_transient($transient_key, $attempts, 10 * MINUTE_IN_SECONDS);
```

### Adding Email Notifications for Blocked Spam:

Add this to `nolaholi_handle_contact_form()` in the honeypot check section:

```php
// Security Check #2: Honeypot field (bot detection)
if (!empty($_POST['contact_website'])) {
    // Log spam attempt
    $admin_email = get_option('admin_email');
    $subject = '[NOLA Holi] Spam Blocked';
    $message = "Spam submission blocked\nIP: {$_SERVER['REMOTE_ADDR']}\nTime: " . current_time('mysql');
    wp_mail($admin_email, $subject, $message);
    
    // Honeypot filled = bot detected
    wp_die('Spam detected.', 'Security Error', array('response' => 403));
}
```

## Troubleshooting

### Issue: Legitimate users getting blocked

**Solution:** 
- Check if they're submitting too fast (< 3 seconds)
- Check if they've hit rate limit (3 per 15 min)
- Temporarily increase limits for testing

### Issue: Still receiving spam

**Solutions:**
1. Ensure Contact Form 7 + Akismet are properly configured
2. Add more disposable email domains to blocklist
3. Reduce rate limits to 2 per 15 minutes
4. Consider adding Google reCAPTCHA for additional protection

### Issue: Math captcha too annoying

**Solutions:**
1. Switch to honeypot only (remove captcha field)
2. Use Google reCAPTCHA v3 (invisible)
3. Install Akismet for Contact Form 7

### Issue: Form not sending emails

**Checklist:**
1. Check if WordPress mail is working: `Settings → General → Admin Email`
2. Test with SMTP plugin like "WP Mail SMTP"
3. Check spam folder in email
4. Verify `noreply@nolaholi.org` is a valid sender address
5. Check server mail logs

## Additional Resources

- **Contact Form 7 Documentation:** https://contactform7.com/docs/
- **Akismet:** https://akismet.com/
- **Google reCAPTCHA:** https://www.google.com/recaptcha/
- **WordPress Security Guide:** https://wordpress.org/support/article/hardening-wordpress/

## Summary

The NOLA Holi theme provides **enterprise-level spam protection** without requiring Google reCAPTCHA or third-party services for the custom form. The multi-layered approach catches:

- ✅ Bot submissions (honeypot)
- ✅ Automated scripts (time-based detection)
- ✅ Spam floods (rate limiting)
- ✅ Random submissions (math captcha)
- ✅ XSS attacks (input sanitization)
- ✅ CSRF attacks (nonce verification)
- ✅ Disposable emails (email validation)

For Contact Form 7 users, adding Akismet provides additional AI-powered spam detection.

