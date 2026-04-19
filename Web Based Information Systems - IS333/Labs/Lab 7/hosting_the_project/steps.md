# InfinityFree PHP Project Hosting Guide (Markdown)

```markdown
# InfinityFree PHP Project Hosting Guide

This comprehensive guide walks you through hosting your PHP project on InfinityFree, including account creation, database setup, project configuration, file upload, and testing. Follow each step exactly as described.

## Prerequisites
- Your PHP project ready with database scripts in `db_scripts/1-db_creation.sql` and `db_scripts/2-data_sample.sql`
- Project folder `using_env/` (will rename to `first_project`) containing `.env` file with database placeholders
- Web browser and file access to your project files

## Step 1: Account Registration
1. Visit [https://www.infinityfree.com/](https://www.infinityfree.com/)
2. Click **"Sign Up"** or **"Create Free Account"** button
3. Fill in your email address and create a strong password
4. Complete CAPTCHA verification if required
5. Check your email inbox and click the verification link
6. Login with your newly created account credentials

## Step 2: Create Hosting Account
7. In the dashboard, click **"Hosting Accounts"**
8. Click **"Create Account"** button
9. Select the **InfinityFree** free plan and click **"Create Now"**
10. **Choose your subdomain** (e.g., `myfirstproject.rf.gd`) - check availability
11. Fill in hosting account details (password, etc.) and click **"Create Account"**
12. **Wait 2-5 minutes** for account activation (refresh page if needed)

## Step 3: Access Control Panel
13. Go to **"Hosting Accounts"** → Select your created account → Click **"Control Panel"**
14. Approve any security prompts (click **"I Approve"** if shown)
15. This opens your **cPanel** dashboard

## Step 4: Create MySQL Database
16. In cPanel, scroll to **"Databases"** section → Click **"MySQL Databases"**
17. In **"Create New Database"** field, enter database name (e.g., `first_project_db`)
18. Click **"Create Database"**
19. Find your database under **"Current Databases"** → Click **"Admin"** (phpMyAdmin)
20. **Bookmark this phpMyAdmin URL** for Step 5

## Step 5: Create Tables & Sample Data
21. In phpMyAdmin, click **"SQL"** tab
22. **Copy entire content** from `db_scripts/1-db_creation.sql`
23. **Paste** into SQL query box → Click **"Go"** to execute
24. Verify tables created successfully (check left sidebar)
25. **Copy entire content** from `db_scripts/2-data_sample.sql`
26. **Paste** into SQL query box → Click **"Go"** to execute
27. Verify sample data inserted (click table → **"Browse"** tab)

## Step 6: Get Database Credentials
28. Return to InfinityFree **Client Area** → **"Hosting Accounts"** → Your account → **"Overview"**
29. Click **"MySQL Databases"** or **"Database Details"**
30. **Note down exactly** (screenshot recommended):
    - **Database Name**: `uXXXXXX_first_project_db`
    - **Username**: `uXXXXXX_dbuser` 
    - **Password**: (generated/shown)
    - **Hostname**: `sqlXXX.infinityfree.net` (NOT localhost)

## Step 7: Configure Project Environment
31. Open your project folder `using_env/.env` file in text editor
32. Replace these placeholders with your Step 6 details:
    ```env
    DB_HOST=sqlXXX.infinityfree.net
    DB_NAME=uXXXXXX_first_project_db  
    DB_USER=uXXXXXX_dbuser
    DB_PASS=your_actual_password_here
    ```
33. **Save** the `.env` file
34. **Rename** `using_env` folder to `first_project`

## Step 8: Upload Project Files
35. In Client Area → **"Hosting Accounts"** → Your account → **"File Manager"**
36. **Double-click** `htdocs` folder
37. **Select all files** (Ctrl+A) → **Delete** default files (index.html, etc.)
38. Click **"Upload"** button → **"Folder"** option
39. **Browse** and select your `first_project` folder
40. **Wait for upload completion** (progress bar)
41. Verify all files uploaded to `htdocs/first_project/`

## Step 9: Test Your Project
42. Client Area → **"Hosting Accounts"** → Your account → **"Overview"**
43. Under **"Domains"** section, copy your domain (e.g., `myfirstproject.rf.gd`)
44. Open browser → Type: `https://myfirstproject.rf.gd/first_project`
45. **Test all features** using navigation links:
   - Home page loads
   - Database-driven pages work
   - Forms submit/process data
   - CRUD operations function

## Troubleshooting Common Issues

| Issue | Solution |
|-------|----------|
| 404 Error | Check folder name matches URL exactly |
| Database Connection Error | Verify `.env` credentials match Step 6 exactly |
| phpMyAdmin Access Denied | Create new database user in cPanel → Add to database with ALL privileges |
| Files not uploading | Increase PHP upload limits in cPanel → "MultiPHP INI Editor" |
| White screen | Add `ini_set('display_errors', 1); error_reporting(E_ALL);` to top of index.php |

## Security Checklist
- [ ] Use strong passwords for hosting account AND database
- [ ] Delete default cPanel files from htdocs
- [ ] Verify `.env` file permissions: 644
- [ ] Enable SSL (cPanel → "SSL/TLS" → "Manage SSL")
- [ ] Remove error reporting from production code

## Final URL Format
```
https://YOUR_SUBDOMAIN.rf.gd/first_project
```

Your PHP project is now live on InfinityFree with full MySQL database functionality!
```