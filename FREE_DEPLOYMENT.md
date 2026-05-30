# Free Deployment Guide

This project needs PHP and MySQL, so do not use GitHub Pages, Netlify, or Vercel for the full app. Those are good for static pages, but this project has PHP endpoints under `asset/php/`.

The simplest free option is InfinityFree because it provides PHP, MySQL, free subdomains, SSL, and `.htaccess` support.

## 1. Create Free Hosting

1. Go to <https://www.infinityfree.com/>.
2. Create a free account.
3. Create a hosting account using a free subdomain.
4. Open the hosting control panel.

## 2. Create MySQL Database

1. In the hosting control panel, open MySQL Databases.
2. Create a database.
3. Save these values:
   - MySQL host
   - Database name
   - Database username
   - Database password

The host will usually not be `localhost` on free hosting. Use the exact host shown in the control panel.

## 3. Import Database

1. Open phpMyAdmin from the hosting control panel.
2. Select the database you created.
3. Import this file:

```text
asset/pages/database.sql
```

If phpMyAdmin rejects the first two lines, remove these lines from the SQL before importing:

```sql
CREATE DATABASE IF NOT EXISTS ems;
USE ems;
```

Free hosts usually create the database for you, so they may not allow `CREATE DATABASE`.

## 4. Add Production Database Config

Create this file on the hosting server:

```text
asset/php/config/db.local.php
```

Use this template and replace the values with the hosting control panel values:

```php
<?php
return [
    'host' => 'YOUR_MYSQL_HOST',
    'user' => 'YOUR_DATABASE_USERNAME',
    'pass' => 'YOUR_DATABASE_PASSWORD',
    'name' => 'YOUR_DATABASE_NAME',
];
```

Do not commit this file to GitHub. It is already ignored by `.gitignore`.

## 5. Upload Files

Upload the project files into the host website root, usually:

```text
htdocs
```

Upload these required items:

```text
index.html
.htaccess
asset/
```

Do not upload local-only folders unless you need them:

```text
.git/
Versions/
tests/
Documentation/
```

## 6. Create Upload Folders

On the hosting file manager, create these folders if they do not exist:

```text
asset/uploads/events
asset/uploads/profiles
```

Make sure PHP can write to them. If uploads fail, set permissions to `755` first. If the host still blocks writes, try `775`.

## 7. Admin Signup Code

By default, admin signup uses this code:

```text
ADMIN001
```

On hosts that support environment variables, set:

```text
EMS_ADMIN_SIGNUP_CODE
```

Many free shared hosts do not support custom environment variables. In that case, change the fallback value in:

```text
asset/php/auth.php
```

Look for:

```php
$signupCode = getenv('EMS_ADMIN_SIGNUP_CODE') ?: 'ADMIN001';
```

## 8. Test After Upload

Open your free hosting URL and test:

```text
/
/asset/pages/sign.html
/asset/pages/login.html
/asset/pages/student.html
/asset/pages/admin.html
```

Use these sample credentials only for testing:

```text
Admin username: admin
Admin password: admin123

Student email: aarav@example.com
Student password: password123
```

Change or remove the sample accounts before sharing the site publicly.

## 9. Common Problems

If the site loads but login fails:

- Check `asset/php/config/db.local.php`.
- Confirm the database was imported into the correct database.
- Confirm the database host is not left as `localhost`.

If profile or event image upload fails:

- Confirm `asset/uploads/events` and `asset/uploads/profiles` exist.
- Confirm folder permissions allow PHP writes.

If admin signup says the code is invalid:

- Use `ADMIN001`, or the custom value you configured.

