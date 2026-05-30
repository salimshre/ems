# EventHub Deployment Progress

Live site target:

```text
http://salimshre-ems.rf.gd/
```

Hosting provider:

```text
InfinityFree
```

## What Was Prepared Locally

The project was prepared for free PHP/MySQL hosting.

Added deployment documentation:

```text
FREE_DEPLOYMENT.md
```

Added Apache access-control files:

```text
.htaccess
asset/php/config/.htaccess
```

These help prevent directory listing and block direct access to sensitive/config-style files on Apache hosting.

Updated Git ignore rules:

```text
.gitignore
```

Ignored:

```text
asset/uploads/
asset/php/config/db.local.php
deploy/
```

Created deployment package:

```text
deploy/ems-upload.zip
```

The ZIP contains the files needed for upload:

```text
index.html
.htaccess
asset/
```

Created local production database config:

```text
asset/php/config/db.local.php
deploy/db.local.php
```

The config uses:

```text
MySQL Host: sql205.infinityfree.com
MySQL User: if0_42054561
MySQL Database: if0_42054561_ems
```

The password is intentionally not repeated in this markdown file.

Checked PHP syntax:

```text
asset/php/config/db.local.php
```

Result:

```text
No syntax errors detected
```

Checked the live domain from local machine:

```text
salimshre-ems.rf.gd
```

DNS result:

```text
185.27.134.24
```

HTTP/HTTPS result at the time of checking:

```text
Could not connect to server
```

This means the domain resolved, but InfinityFree's web server was not accepting HTTP/HTTPS traffic yet. That usually points to hosting activation/DNS propagation, not project code.

## What You Completed

Created/continued InfinityFree account using GitHub.

Created free InfinityFree website:

```text
salimshre-ems.rf.gd
```

Uploaded the deployment package contents into the hosting file manager.

Correct target folder:

```text
htdocs
```

Correct final structure should be:

```text
htdocs/index.html
htdocs/.htaccess
htdocs/asset/
```

You created the database config file on the server:

```text
htdocs/asset/php/config/db.local.php
```

You provided the InfinityFree MySQL details:

```text
MySQL Hostname: sql205.infinityfree.com
MySQL Username: if0_42054561
MySQL Database: if0_42054561_ems
MySQL Port: 3306
```

You confirmed the project files and database config were uploaded/created.

## Remaining Checks

Confirm the InfinityFree account status is active:

```text
InfinityFree Dashboard > Accounts > salimshre-ems.rf.gd
```

Confirm files are not nested inside an extra folder.

Correct:

```text
htdocs/index.html
htdocs/asset/php/auth.php
```

Wrong:

```text
htdocs/ems-upload/index.html
htdocs/ems-upload/asset/php/auth.php
```

Import the database if it has not already been imported:

```text
asset/pages/database.sql
```

Use InfinityFree phpMyAdmin and select:

```text
if0_42054561_ems
```

If phpMyAdmin rejects the database creation lines, remove these lines from the SQL before import:

```sql
CREATE DATABASE IF NOT EXISTS ems;
USE ems;
```

Wait for InfinityFree activation/DNS propagation if the site still shows a DNS or connection error.

InfinityFree commonly needs a few hours, and sometimes up to 72 hours, before a new free hosting account works everywhere.

## Test URLs

After the site starts loading, test:

```text
http://salimshre-ems.rf.gd/
http://salimshre-ems.rf.gd/asset/pages/sign.html
http://salimshre-ems.rf.gd/asset/pages/login.html
http://salimshre-ems.rf.gd/asset/pages/student.html
http://salimshre-ems.rf.gd/asset/pages/admin.html
```

## Test Accounts

Admin:

```text
Username: admin
Password: admin123
```

Student:

```text
Email: aarav@example.com
Password: password123
```

Admin signup code:

```text
ADMIN001
```

## Security Notes

The server database password was shared during setup. Change it later if InfinityFree allows changing MySQL passwords.

Remove or change sample users before sharing the site publicly.

Change the default admin signup code before using the site seriously.

