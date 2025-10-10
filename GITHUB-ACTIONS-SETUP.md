# GitHub Actions Deployment Setup

This guide explains how to set up automated deployment of the NOLA Holi WordPress theme using GitHub Actions.

## Overview

The GitHub Actions workflow automatically deploys your theme to WordPress sites:

- **Merge to `main`** → Deploys to **public** site (www.nolaholi.org)
- **Push to other branches** → Deploys to **staging** site (staging2.nolaholi.com)
- **Manual trigger** → Deploy any branch to any site

## Prerequisites

1. GitHub repository with the theme
2. SSH access to your Dreamhost server
3. WordPress installed at both staging and public sites

## Setup Instructions

### Step 1: Generate SSH Key for Deployment

On your local machine or the server:

```bash
# Generate SSH key pair (without passphrase for automation)
ssh-keygen -t ed25519 -C "github-actions-deploy" -f ~/.ssh/github_deploy_key -N ""

# Display the private key (you'll need this for GitHub)
cat ~/.ssh/github_deploy_key

# Display the public key (you'll add this to server)
cat ~/.ssh/github_deploy_key.pub
```

### Step 2: Add SSH Public Key to Dreamhost Server

1. **Login to your Dreamhost server:**
   ```bash
   ssh your_username@your_server.dreamhost.com
   ```

2. **Add the public key to authorized_keys:**
   ```bash
   # Create .ssh directory if it doesn't exist
   mkdir -p ~/.ssh
   chmod 700 ~/.ssh
   
   # Add the public key
   echo "YOUR_PUBLIC_KEY_HERE" >> ~/.ssh/authorized_keys
   chmod 600 ~/.ssh/authorized_keys
   ```

3. **Test the connection:**
   ```bash
   ssh -i ~/.ssh/github_deploy_key your_username@your_server.dreamhost.com
   ```

### Step 3: Get Your WordPress Paths

On your Dreamhost server, find the full paths to your WordPress installations:

```bash
# Public site
pwd  # When in public site directory
# Example: /home/username/nolaholi.org

# Staging site
pwd  # When in staging directory
# Example: /home/username/staging2.nolaholi.com
```

### Step 4: Configure GitHub Secrets

1. **Go to your GitHub repository**
2. Click **Settings** → **Secrets and variables** → **Actions**
3. Click **New repository secret**
4. Add the following secrets:

| Secret Name | Description | Example Value |
|-------------|-------------|---------------|
| `SSH_PRIVATE_KEY` | Private key from Step 1 | Contents of `github_deploy_key` |
| `SSH_HOST` | Dreamhost server hostname | `yourdomain.dreamhost.com` |
| `SSH_USER` | Your Dreamhost username | `your_username` |
| `SSH_PORT` | SSH port (usually 22) | `22` |
| `PUBLIC_SITE_PATH` | Full path to public WordPress | `/home/username/nolaholi.org` |
| `STAGING_SITE_PATH` | Full path to staging WordPress | `/home/username/staging2.nolaholi.com` |

#### How to Add Each Secret:

1. Click **New repository secret**
2. Enter the **Name** (e.g., `SSH_PRIVATE_KEY`)
3. Paste the **Value**
4. Click **Add secret**
5. Repeat for all secrets

### Step 5: Test the Workflow

#### Test Automatic Deployment (Feature Branch → Staging)

```bash
# Create and push a test branch
git checkout -b test-deployment
git commit --allow-empty -m "Test: GitHub Actions deployment"
git push origin test-deployment
```

Check GitHub Actions:
1. Go to **Actions** tab in your repository
2. You should see the workflow running
3. It should deploy to **staging** site

#### Test Automatic Deployment (Main → Public)

```bash
# Merge to main (via Pull Request or direct merge)
git checkout main
git merge test-deployment
git push origin main
```

This should deploy to **public** site.

#### Test Manual Deployment

1. Go to **Actions** tab in your repository
2. Click **Deploy WordPress Theme** workflow
3. Click **Run workflow**
4. Select:
   - **Environment**: staging or public
   - **Branch**: leave empty or specify branch name
5. Click **Run workflow**

## How It Works

### Automatic Deployment Flow

```
┌─────────────────┐
│  Git Push       │
└────────┬────────┘
         │
         ├─ main branch? ──── YES ──→ Deploy to PUBLIC
         │
         └─ other branch? ─── YES ──→ Deploy to STAGING
```

### Deployment Process

1. **Checkout code** from specified branch
2. **Determine environment** (staging or public)
3. **Create package** (remove .git, .github, docs)
4. **Upload to server** via SSH/SCP
5. **Backup existing theme** (keeps last 3 backups)
6. **Deploy new theme**
7. **Set permissions** (755)
8. **Cleanup** temporary files

### Backups

The workflow automatically creates timestamped backups:
- Location: `wp-content/themes/NOLAHoli-backup-YYYYMMDD-HHMMSS`
- Keeps: Last 3 backups
- Auto-cleanup: Older backups deleted automatically

## Rollback Instructions

If something goes wrong, you can quickly rollback:

### Method 1: Via SSH

```bash
# SSH into your server
ssh your_username@your_server.dreamhost.com

# Go to themes directory
cd ~/your_site/wp-content/themes

# List backups
ls -l NOLAHoli-backup-*

# Restore a backup
mv NOLAHoli NOLAHoli-broken
mv NOLAHoli-backup-YYYYMMDD-HHMMSS NOLAHoli
```

### Method 2: Via Manual Deployment

1. Go to GitHub Actions
2. Find a working commit
3. Run workflow manually
4. Select correct environment
5. Enter commit SHA or branch name

## Troubleshooting

### Workflow Fails: "Permission denied (publickey)"

**Problem:** SSH key not properly configured

**Solution:**
1. Verify `SSH_PRIVATE_KEY` secret contains the entire private key
2. Ensure public key is in `~/.ssh/authorized_keys` on server
3. Check SSH key format (should start with `-----BEGIN OPENSSH PRIVATE KEY-----`)

### Workflow Fails: "No such file or directory"

**Problem:** Incorrect WordPress path

**Solution:**
1. SSH into server: `ssh user@host`
2. Navigate to WordPress root: `cd ~/your_site`
3. Run: `pwd` to get full path
4. Update `PUBLIC_SITE_PATH` or `STAGING_SITE_PATH` secret

### Theme Not Updating on Site

**Problem:** Browser or WordPress cache

**Solution:**
1. Clear WordPress cache (if using caching plugin)
2. Hard refresh browser (Ctrl+Shift+R or Cmd+Shift+R)
3. Check WordPress admin: Appearance → Themes

### Workflow Runs for Documentation Changes

**Problem:** Deployment triggered by README updates

**Solution:** Already handled! The workflow ignores:
- `*.md` files (documentation)
- `.gitignore` changes

### Multiple Deployments Running

**Problem:** Pushing multiple commits quickly

**Solution:** 
- GitHub Actions queues deployments automatically
- They run sequentially (safe)
- Latest commit always wins

## Security Best Practices

### ✅ DO

- Use SSH keys without passphrase for automation
- Restrict SSH key to deployment-only user (if possible)
- Keep secrets in GitHub Secrets (encrypted)
- Regularly rotate SSH keys (every 6-12 months)
- Review workflow logs after deployment

### ❌ DON'T

- Commit SSH keys to repository
- Share SSH private key
- Use your personal SSH key for automation
- Store credentials in workflow files
- Give deployment key unnecessary permissions

## Monitoring Deployments

### View Deployment Status

1. Go to GitHub repository
2. Click **Actions** tab
3. See all workflow runs:
   - ✅ Green = Success
   - ❌ Red = Failed
   - 🟡 Yellow = Running

### Get Notifications

1. Go to **Settings** → **Notifications**
2. Enable: **Actions** notifications
3. You'll receive email for:
   - Failed deployments
   - Successful manual deployments

## Advanced Configuration

### Deploy Only Specific File Types

Edit `.github/workflows/deploy.yml`:

```yaml
on:
  push:
    paths:
      - '**.php'      # Only PHP files
      - '**.js'       # Only JS files
      - '**.css'      # Only CSS files
      - '!**.md'      # Ignore markdown
```

### Add Deployment Slack Notifications

Add this step to workflow:

```yaml
- name: Notify Slack
  if: always()
  uses: 8398a7/action-slack@v3
  with:
    status: ${{ job.status }}
    webhook_url: ${{ secrets.SLACK_WEBHOOK }}
```

### Custom Deployment Branch Names

To deploy `develop` branch to staging:

```yaml
on:
  push:
    branches:
      - main      # → public
      - develop   # → staging
      - 'feature/**'  # → staging
```

## FAQ

**Q: Can I deploy to a different theme folder?**  
A: Yes! Just update the deployment script to use a different folder name.

**Q: How long does deployment take?**  
A: Typically 30-60 seconds, depending on theme size and server.

**Q: Can I deploy multiple themes?**  
A: Yes! Create separate workflows or add multi-theme support.

**Q: Does this work with other hosts (not Dreamhost)?**  
A: Yes! Works with any host that supports SSH access.

**Q: Can I test locally before pushing?**  
A: Yes! Use `act` to run GitHub Actions locally: https://github.com/nektos/act

**Q: What if deployment fails mid-way?**  
A: Backups are created before deployment, so you can rollback easily.

## Support

### Issues or Questions?

1. Check workflow logs in Actions tab
2. Review this documentation
3. Create an issue on GitHub
4. Contact: info@nolaholi.org

## Changelog

### Version 1.0 (October 10, 2025)
- Initial GitHub Actions deployment setup
- Automatic deployment for main and feature branches
- Manual deployment workflow
- Automatic backups with cleanup
- Comprehensive error handling

---

**Built for NOLA Holi Festival** 💜💚💛

