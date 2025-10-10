# 🚀 Deployment Quick Start

Quick reference for NOLA Holi theme deployment via GitHub Actions.

## 📦 Automatic Deployments

| Action | Destination | Trigger |
|--------|-------------|---------|
| Merge/Push to `main` | **Public Site** (www.nolaholi.org) | Automatic |
| Push to any other branch | **Staging Site** (staging2.nolaholi.com) | Automatic |

## 🎯 Manual Deployment

1. Go to **Actions** tab
2. Click **Deploy WordPress Theme**
3. Click **Run workflow** button
4. Choose:
   - Environment: `staging` or `public`
   - Branch: leave empty for current
5. Click green **Run workflow** button

## 🔑 Required GitHub Secrets

```
SSH_PRIVATE_KEY      = Your SSH private key
SSH_HOST             = your_server.dreamhost.com
SSH_USER             = your_username
SSH_PORT             = 22
PUBLIC_SITE_PATH     = /home/username/nolaholi.org
STAGING_SITE_PATH    = /home/username/staging2.nolaholi.com
```

## ✅ Deployment Checklist

- [ ] SSH key added to server's `~/.ssh/authorized_keys`
- [ ] All 6 secrets configured in GitHub
- [ ] WordPress paths are correct
- [ ] Test deployment with feature branch first
- [ ] Verify staging works before deploying to public

## 🔄 Rollback

```bash
ssh user@host
cd ~/your_site/wp-content/themes
mv NOLAHoli NOLAHoli-broken
mv NOLAHoli-backup-YYYYMMDD-HHMMSS NOLAHoli
```

## 📊 Monitor Deployments

**GitHub Actions:** `https://github.com/arunl/NOLAHoli/actions`

## 📚 Full Documentation

See [GITHUB-ACTIONS-SETUP.md](../GITHUB-ACTIONS-SETUP.md) for complete setup instructions.

---

**Need Help?** Check workflow logs or contact info@nolaholi.org

