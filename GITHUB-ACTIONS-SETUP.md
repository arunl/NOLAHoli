# GitHub Actions Deployment Setup

This guide explains how to set up automated deployment of the NOLA Holi WordPress theme using GitHub Actions.

## Overview

The GitHub Actions workflow automatically deploys your theme to WordPress sites using **git pull**:

- **Merge to `main`** → Deploys to **public** site (www.nolaholi.org)
- **Push to other branches** → Deploys to **staging** site (staging2.nolaholi.com)
- **Manual trigger** → Deploy any branch to any site

### Deployment Method

The workflow uses **git-based deployment**:
1. SSH into your server
2. Navigate to theme directory
3. Pull latest changes from GitHub
4. Automatically stashes any local changes (from WP dashboard edits)
5. Applies stashed changes back after pull

**Benefits:**
- ✅ Bidirectional sync (push dashboard changes back to GitHub)
- ✅ Cleaner than tar/upload approach
- ✅ Preserves git history on server
- ✅ Easier rollbacks with git

## Prerequisites

1. GitHub repository with the theme
2. SSH access to your Dreamhost server
3. WordPress installed at both staging and public sites
4. Git repository cloned in WordPress themes directory on server
5. Server SSH key registered with GitHub (for pulling code)

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

### Step 3: Setup Git Repository on Server

SSH into your Dreamhost server and clone the repository into your WordPress themes directory:

```bash
# SSH to your server
ssh your_username@your_server.dreamhost.com

# Navigate to public site themes directory
cd ~/nolaholi.org/wp-content/themes

# Clone the repository (if not already cloned)
git clone git@github.com:arunl/NOLAHoli.git

# Repeat for staging site
cd ~/staging2.nolaholi.com/wp-content/themes
git clone git@github.com:arunl/NOLAHoli.git
```

**Get the full theme paths:**
```bash
# Public site theme path
cd ~/nolaholi.org/wp-content/themes/NOLAHoli && pwd
# Example: /home/username/nolaholi.org/wp-content/themes/NOLAHoli

# Staging site theme path
cd ~/staging2.nolaholi.com/wp-content/themes/NOLAHoli && pwd
# Example: /home/username/staging2.nolaholi.com/wp-content/themes/NOLAHoli
```

### Step 4: Register Server SSH Key with GitHub

The server needs to pull from GitHub, so add its SSH key to your GitHub account:

```bash
# On your Dreamhost server, generate SSH key (if not exists)
ssh-keygen -t ed25519 -C "dreamhost-server" -f ~/.ssh/id_ed25519 -N ""

# Display the public key
cat ~/.ssh/id_ed25519.pub
```

**Add to GitHub:**
1. Copy the public key output
2. Go to **GitHub.com** → **Settings** → **SSH and GPG keys**
3. Click **New SSH key**
4. Title: "Dreamhost Server - NOLA Holi"
5. Paste the public key
6. Click **Add SSH key**

**Test the connection:**
```bash
ssh -T git@github.com
# Should see: "Hi arunl! You've successfully authenticated..."
```

### Step 5: Configure GitHub Secrets

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
| `PUBLIC_THEME_PATH` | Full path to public theme | `/home/username/nolaholi.org/wp-content/themes/NOLAHoli` |
| `STAGING_THEME_PATH` | Full path to staging theme | `/home/username/staging2.nolaholi.com/wp-content/themes/NOLAHoli` |

#### How to Add Each Secret:

1. Click **New repository secret**
2. Enter the **Name** (e.g., `SSH_PRIVATE_KEY`)
3. Paste the **Value**
4. Click **Add secret**
5. Repeat for all secrets

### Step 6: Test the Workflow

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
         ├─ main branch? ──── YES ──→ Deploy to PUBLIC (git pull main)
         │
         └─ other branch? ─── YES ──→ Deploy to STAGING (git pull branch)
```

### Deployment Process

1. **Trigger:** Push to GitHub or manual workflow dispatch
2. **SSH to server:** Connect to Dreamhost server
3. **Navigate:** Go to theme directory
4. **Stash changes:** Save any local edits (from WP dashboard)
5. **Fetch & Pull:** Get latest code from GitHub
6. **Apply stash:** Reapply local changes if any
7. **Set permissions:** Fix file/directory permissions
8. **Verify:** Display deployment info

### Handling Local Changes

If you edit files via WordPress dashboard, the workflow:
1. **Auto-stashes** changes before pulling
2. **Pulls** latest code from GitHub
3. **Attempts to reapply** stashed changes
4. **Warns** if conflicts occur (manual resolution needed)

## Pushing Changes from Server to GitHub

One of the benefits of git-based deployment is the ability to push changes made on the server back to GitHub:

### Scenario: You edit theme files via WordPress dashboard

```bash
# SSH to your server
ssh your_username@your_server.dreamhost.com

# Navigate to theme directory
cd ~/your_site/wp-content/themes/NOLAHoli

# Check what changed
git status
git diff

# Stage your changes
git add .

# Commit with descriptive message
git commit -m "Fix: Update theme color via WP Customizer"

# Push to GitHub (creates a new branch for review)
git checkout -b dashboard-edits-$(date +%Y%m%d)
git push origin dashboard-edits-$(date +%Y%m%d)
```

**Then:** Create a Pull Request on GitHub to merge into main or your feature branch.

### Best Practice

Always commit dashboard changes to a new branch and review via PR before merging to main. This ensures:
- ✅ Changes are reviewed
- ✅ No accidental overwrites
- ✅ Full audit trail

## Rollback Instructions

If something goes wrong, you can quickly rollback:

### Method 1: Via Git (Recommended)

```bash
# SSH into your server
ssh your_username@your_server.dreamhost.com

# Go to theme directory
cd ~/your_site/wp-content/themes/NOLAHoli

# See recent commits
git log --oneline -10

# Rollback to specific commit
git reset --hard COMMIT_SHA

# Or go back one commit
git reset --hard HEAD~1

# Force push if needed (be careful!)
# git push --force origin main
```

### Method 2: Via Manual Deployment

1. Go to GitHub Actions
2. Find a working commit
3. Run workflow manually
4. Select correct environment
5. Deployment will pull that commit

## Troubleshooting

### Workflow Fails: "Permission denied (publickey)"

**Problem:** SSH key not properly configured

**Solution:**
1. Verify `SSH_PRIVATE_KEY` secret contains the entire private key
2. Ensure public key is in `~/.ssh/authorized_keys` on server
3. Check SSH key format (should start with `-----BEGIN OPENSSH PRIVATE KEY-----`)

### Workflow Fails: "Not a git repository"

**Problem:** Theme directory hasn't been cloned from GitHub

**Solution:**
```bash
ssh user@host
cd ~/your_site/wp-content/themes
git clone git@github.com:arunl/NOLAHoli.git
```

### Workflow Fails: "No such file or directory"

**Problem:** Incorrect theme path

**Solution:**
1. SSH into server: `ssh user@host`
2. Navigate to theme: `cd ~/your_site/wp-content/themes/NOLAHoli`
3. Run: `pwd` to get full path
4. Update `PUBLIC_THEME_PATH` or `STAGING_THEME_PATH` secret

### Server Can't Pull from GitHub

**Problem:** Server SSH key not registered with GitHub

**Solution:**
1. SSH to server
2. Run: `ssh -T git@github.com`
3. If it fails, add server's public key to GitHub:
   ```bash
   cat ~/.ssh/id_ed25519.pub
   ```
4. Add to: GitHub.com → Settings → SSH and GPG keys

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

