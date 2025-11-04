# Contact Form Spam Protection Guide

## Overview

The NOLA Holi theme includes comprehensive spam protection for the contact form, protecting against bots, spam submissions, and various attacks including XSS (Cross-Site Scripting).

## Custom Form Protection (Built-in)

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

## Contact Form 7 Spam Protection

If you're using Contact Form 7, you can add additional spam protection:

### Option 1: Built-in Spam Filtering (Akismet)

Contact Form 7 integrates with Akismet automatically:

1. **Install Akismet Plugin:**
   - Go to Plugins → Add New
   - Search for "Akismet Anti-Spam"
   - Install and activate

2. **Get Akismet API Key:**
   - Sign up at https://akismet.com/
   - Free for personal/non-commercial sites
   - Paid plans available for commercial sites

3. **Configure Akismet:**
   - Go to Settings → Akismet
   - Enter your API key
   - Save settings

4. **Enable in Contact Form 7:**
   - Akismet automatically filters CF7 submissions
   - No additional configuration needed

### Option 2: Add Honeypot to Contact Form 7

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

### Option 3: Google reCAPTCHA v3 (Invisible)

1. **Install reCAPTCHA Plugin:**
   - Go to Plugins → Add New
   - Search for "Contact Form 7 reCAPTCHA"
   - Install "ReCaptcha v2 for Contact Form 7" or similar

2. **Get reCAPTCHA Keys:**
   - Visit https://www.google.com/recaptcha/admin
   - Register your site
   - Choose reCAPTCHA v3 (invisible, no checkbox)
   - Get Site Key and Secret Key

3. **Configure in WordPress:**
   - Go to Contact → Integration in WordPress admin
   - Enter your Site Key and Secret Key
   - Save

4. **Add to Form:**
   ```
   [recaptcha]
   ```

### Option 4: Quiz/Math Verification

Add a simple math question to your CF7 form:

```
<label> What is 5 + 3? (spam check)
    [number* quiz-spam]
</label>
```

Then use CF7's conditional logic or third-party plugins to validate the answer.

### Option 5: Really Simple CAPTCHA

1. **Install Plugin:**
   - Go to Plugins → Add New
   - Search for "Really Simple CAPTCHA"
   - Install and activate

2. **Add to Form:**
   ```
   [captchac captcha-1]
   [captchar captcha-1]
   ```

## Testing Your Spam Protection

### Testing Custom Form:

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

### Testing CF7:

1. Enable CF7 mail logging (use plugin like "Flamingo")
2. Test various spam scenarios
3. Check if Akismet catches them
4. Review blocked submissions

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

