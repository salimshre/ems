# EventHub Session Notes

## Project State

Project path:

```text
C:\Users\StudyAcer\Documents\GitHub\ems
```

Local XAMPP app:

```text
http://localhost/ems/
```

Live deployed app:

```text
http://sagar0.com.np/
```

The app is a PHP/MySQL Event Management System with:

- Public landing page
- Student signup/login/profile/event registration
- Admin dashboard/event/venue/registration/admin management
- MySQL database schema in `asset/pages/database.sql`
- Local database config through `asset/php/config/db.local.php`

## Work Completed In This Session

Local setup and docs:

- XAMPP setup documented in `LOCAL_XAMPP_SETUP.md`
- Free hosting deployment documented in `FREE_DEPLOYMENT.md`
- Deployment progress recorded in `DEPLOYMENT_PROGRESS.md`

Security and backend fixes:

- Added CSRF helpers in `asset/php/config/security.php`
- Added CSRF checks to mutating PHP actions
- Restricted admin-only routes/actions
- Removed plaintext admin password fallback
- Added hashed admin/student credentials in database seed
- Added transaction-safe registration capacity handling
- Added audit logging support in `asset/php/config/audit.php`
- Added `audit_logs` table to `asset/pages/database.sql`
- Added database local config pattern via `asset/php/config/db.local.example.php`

Student fixes:

- Student logout works from `asset/pages/student.html`
- Student welcome name displays the actual logged-in user
- Student profile picture upload works through profile page
- Student can cancel registrations from the registered section

Admin fixes:

- Admin signup is enabled from signup page
- Admin signup code defaults to `ADMIN001`
- Admin management endpoint added in `asset/php/admins.php`
- Admin dashboard has admin management UI

Frontend/content fixes:

- Contact section added to `index.html`
- Event detail modal added to student portal
- Event image upload support added for admin event creation/update
- XSS-sensitive rendering paths hardened in frontend JS

Deployment files:

- `.htaccess` added at project root
- `asset/php/config/.htaccess` added to block config folder access
- `deploy/ems-upload.zip` was generated for InfinityFree upload
- `deploy/db.local.php`, `deploy/db-check.php`, and `deploy/health-check.php` were generated as deployment helpers
- `deploy/` is ignored in `.gitignore`

## Deployment Notes

InfinityFree was first attempted with:

```text
salimshre-ems.rf.gd
```

That domain resolved but did not accept HTTP/HTTPS at the time, likely due to hosting activation/server-side delay.

The project was then deployed successfully to:

```text
http://sagar0.com.np/
```

Production database config on server:

```text
htdocs/asset/php/config/db.local.php
```

Known production database values:

```text
MySQL Hostname: sql205.infinityfree.com
MySQL Username: if0_42054561
MySQL Database: if0_42054561_ems
MySQL Port: 3306
```

Do not commit or expose the database password.

Database issue found and fixed:

- PHP and MySQL connection worked
- Tables were missing
- Importing `asset/pages/database.sql` into `if0_42054561_ems` fixed the app

Temporary diagnostic files were used:

```text
htdocs/health-check.php
htdocs/db-check.php
```

They should be deleted from the live server after testing.

## Useful Test Accounts

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

Change these before public use.

## Important Follow-Ups

- Delete `health-check.php` and `db-check.php` from live `htdocs`
- Change default/sample passwords
- Change the admin signup code before public use
- Avoid committing `asset/php/config/db.local.php`
- Rebuild/reupload deployment ZIP after future code changes

