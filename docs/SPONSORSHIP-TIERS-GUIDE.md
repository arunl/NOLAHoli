# Sponsorship Tiers Guide

## Overview

The NOLAHoli theme uses a **year-aware sponsorship tier system** that preserves historical tier names and structures while allowing for changes in future years. This ensures that sponsors from previous years are displayed with their correct tier names without requiring database changes.

## How It Works

### Database Structure

Sponsors are stored with:
- `_sponsor_tier` (meta key): A tier key (e.g., `event`, `gold`, `diamond`)
- `_sponsor_year` (meta key): The year they sponsored (e.g., `2025`, `2026`)
- `_sponsor_website` (meta key): Their website URL
- `_sponsor_display_order` (meta key): Display order within tier

**Important**: The tier KEY in the database never changes, even when tier names change. Only the display name changes based on the year.

## Tier Structure by Year

### 2025 Tiers (Historical)
| Tier Key | Display Name | Amount |
|----------|-------------|--------|
| `event` | Event Sponsors | $10,000+ |
| `diamond` | Diamond Sponsors | $5,000 |
| `platinum` | Platinum Sponsors | $2,500 |
| `gold` | Gold Sponsors | $1,000 |
| `silver` | Silver Sponsors | $500 |
| `friends` | Friends of NOLA Holi | $100-$499 |

### 2026+ Tiers (Current)
| Tier Key | Display Name | Amount | Limit |
|----------|-------------|--------|-------|
| `event` | Presenting Sponsors | $15,000 | 1 |
| `parade` | Parade Sponsors | $7,500 | 1 |
| `entertainment` | Entertainment Sponsors | $5,000 | 4 |
| `vip` | VIP Experience Sponsors | $3,500-$5,000 | 4 |
| `gold` | Gold Sponsors | $2,500 | No Limit |
| `silver` | Silver Sponsors | $1,000 | No Limit |
| `friends` | Friends of NOLA Holi | $100+ | No Limit |

## Files Involved

### 1. `page-templates/template-sponsorship-packet.php`
Contains the **current sponsorship package information** for potential sponsors. This should always show the most recent tier structure (2026+ in this case).

### 2. `page-templates/template-sponsors.php`
Displays existing sponsors grouped by tier. Uses the `nolaholi_get_tier_name()` function to display year-appropriate tier names:
- 2025 sponsors with tier key `event` → displayed as "Event Sponsors"
- 2026 sponsors with tier key `event` → displayed as "Presenting Sponsors"

### 3. `functions.php`
Contains the sponsor post type, meta boxes, and tier dropdown. The dropdown includes:
- **Current tiers** (2026+) - for new sponsors
- **Historical tiers** (2025) - for legacy data or corrections

### 4. `style.css`
Contains tier styling classes (e.g., `.tier-event`, `.tier-gold`, `.tier-vip`)

## How to Add a New Year's Tiers

When creating new tier structure for a future year (e.g., 2027):

### Step 1: Update `template-sponsors.php`

Add the new year's tier mapping to the `nolaholi_get_tier_name()` function:

```php
function nolaholi_get_tier_name($tier_key, $year) {
    // 2025 tier names (original structure)
    $tiers_2025 = array(
        'event' => 'Event Sponsors',
        // ... existing 2025 tiers
    );
    
    // 2026 tier names
    $tiers_2026 = array(
        'event' => 'Presenting Sponsors',
        // ... existing 2026 tiers
    );
    
    // 2027+ tier names (NEW)
    $tiers_2027_plus = array(
        'event' => 'Premier Sponsors', // Example new name
        // ... new tier structure
    );
    
    // Select appropriate tier structure based on year
    if ($year <= 2025) {
        return isset($tiers_2025[$tier_key]) ? $tiers_2025[$tier_key] : ucfirst($tier_key) . ' Sponsors';
    } elseif ($year == 2026) {
        return isset($tiers_2026[$tier_key]) ? $tiers_2026[$tier_key] : ucfirst($tier_key) . ' Sponsors';
    } else {
        return isset($tiers_2027_plus[$tier_key]) ? $tiers_2027_plus[$tier_key] : ucfirst($tier_key) . ' Sponsors';
    }
}
```

### Step 2: Update Tier Configuration

Add any new tier keys to `$all_tier_config` array with their color and order:

```php
$all_tier_config = array(
    'new_tier_key' => array(
        'color' => '#HEX_COLOR',
        'order' => 1  // Lower numbers appear first
    ),
    // ... existing tiers
);
```

### Step 3: Update `style.css`

Add CSS for any new tier classes:

```css
.tier-new-tier-key {
    border-top-color: #HEX_COLOR;
}
```

### Step 4: Update `functions.php`

Add the new tiers to the admin dropdown under a new optgroup:

```php
<optgroup label="2027+ Tiers (Current)">
    <option value="new_tier_key">New Tier Name ($amount)</option>
    <!-- ... -->
</optgroup>
```

Move the previous "Current" optgroup to "Historical" section.

### Step 5: Update `template-sponsorship-packet.php`

Replace the sponsorship package information with the new year's tier structure, benefits, and pricing.

## Best Practices

1. **Never delete historical tier configurations** - Keep them in `$all_tier_config` for proper display of old sponsors
2. **Always use tier keys consistently** - The same tier key can have different names in different years
3. **Document tier changes** - Add comments noting when tiers changed
4. **Test with historical data** - Verify that old sponsors still display correctly with their original tier names
5. **Update admin instructions** - Keep the helper text in the admin dropdown up to date

## Key Functions

### `nolaholi_get_tier_name($tier_key, $year)`
Returns the appropriate tier display name based on the tier key and year.

**Parameters:**
- `$tier_key` (string): The database tier key (e.g., 'event', 'gold')
- `$year` (int): The sponsor year (e.g., 2025, 2026)

**Returns:** (string) The display name for that tier in that year

## Troubleshooting

### Issue: Old sponsors showing under wrong tier names
**Solution**: Check the `nolaholi_get_tier_name()` function - ensure the year threshold is correct and the tier key exists in the appropriate year's array.

### Issue: New tier not displaying
**Solution**: 
1. Verify the tier key exists in `$all_tier_config`
2. Add the tier to both current and historical sections as needed
3. Check that CSS class exists in `style.css`

### Issue: Tiers appearing in wrong order
**Solution**: Adjust the `order` value in `$all_tier_config` - lower numbers appear first.

## Future Improvements

Potential enhancements for this system:
- Admin page to manage tier structures per year
- Automatic archiving of tier structures
- Visual tier comparison between years
- Import/export tier configurations

