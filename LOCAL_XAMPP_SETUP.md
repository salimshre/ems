# Local XAMPP Setup for EventHub EMS

This guide documents how this repository was set up locally on Windows with XAMPP.

Repository path:

```text
C:\Users\StudyAcer\Documents\GitHub\ems
```

Local app URL:

```text
http://localhost/ems/
```

## What Was Installed

XAMPP was installed to:

```text
C:\xampp
```

This provides:

- Apache
- PHP 8.2.12
- MariaDB/MySQL
- phpMyAdmin

## How the Repo Is Served

The Git repository was not copied into XAMPP. Instead, a Windows junction was created:

```text
C:\xampp\htdocs\ems -> C:\Users\StudyAcer\Documents\GitHub\ems
```

That means you keep editing the normal GitHub repo folder, and Apache serves the same files at:

```text
http://localhost/ems/
```

To recreate the junction manually, run PowerShell as needed:

```powershell
New-Item -ItemType Junction -Path C:\xampp\htdocs\ems -Target C:\Users\StudyAcer\Documents\GitHub\ems
```

If `C:\xampp\htdocs\ems` already exists, remove or rename it first.

## Start Apache and MySQL

Option 1: Use the XAMPP Control Panel:

```text
C:\xampp\xampp-control.exe
```

Start:

- Apache
- MySQL

Option 2: Start from PowerShell:

```powershell
Start-Process -WindowStyle Hidden -FilePath C:\xampp\apache_start.bat
Start-Process -WindowStyle Hidden -FilePath C:\xampp\mysql_start.bat
```

Check Apache:

```powershell
curl.exe -I http://localhost/ems/
```

Expected result includes:

```text
HTTP/1.1 200 OK
```

Check MySQL:

```powershell
& C:\xampp\mysql\bin\mysqladmin.exe -uroot ping
```

Expected result:

```text
mysqld is alive
```

## Database Setup

The project expects this database:

```text
ems
```

The seed file is:

```text
asset\pages\database.sql
```

To import or re-import it:

```powershell
& C:\xampp\mysql\bin\mysql.exe -uroot --execute="source C:/Users/StudyAcer/Documents/GitHub/ems/asset/pages/database.sql"
```

To verify tables and counts:

```powershell
& C:\xampp\mysql\bin\mysql.exe -uroot -D ems -e "SHOW TABLES; SELECT COUNT(*) AS users FROM users; SELECT COUNT(*) AS admins FROM admin; SELECT COUNT(*) AS events FROM events;"
```

Expected tables:

- `admin`
- `events`
- `registrations`
- `users`
- `venues`

## App URLs

Landing page:

```text
http://localhost/ems/
```

Login:

```text
http://localhost/ems/asset/pages/login.html
```

Signup:

```text
http://localhost/ems/asset/pages/sign.html
```

Student dashboard:

```text
http://localhost/ems/asset/pages/student.html
```

Admin dashboard:

```text
http://localhost/ems/asset/pages/admin.html
```

phpMyAdmin:

```text
http://localhost/phpmyadmin/
```

## Test Credentials

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

Other seeded student emails:

```text
priya@example.com
rohan@example.com
```

They use the same password:

```text
password123
```

## Project Fixes Made During Setup

The following files were updated so the local setup works under `/ems/`:

```text
asset/php/auth.php
asset/pages/database.sql
```

Changes:

- Redirects were changed from `/codefeat/...` to `/ems/...`.
- Seeded password hashes were corrected so the documented sample passwords work.

## Stop Apache and MySQL

Option 1: Use the XAMPP Control Panel and click `Stop` for Apache and MySQL.

Option 2: Stop from PowerShell:

```powershell
Start-Process -WindowStyle Hidden -FilePath C:\xampp\apache_stop.bat
Start-Process -WindowStyle Hidden -FilePath C:\xampp\mysql_stop.bat
```

## Common Issues

If `http://localhost/ems/` does not load:

1. Make sure Apache is running.
2. Make sure the junction exists at `C:\xampp\htdocs\ems`.
3. Make sure nothing else is using port `80`.

Check port `80`:

```powershell
Get-NetTCPConnection -LocalPort 80 -ErrorAction SilentlyContinue
```

If login fails with database errors:

1. Make sure MySQL is running.
2. Make sure the `ems` database exists.
3. Re-import `asset\pages\database.sql`.

If PHP files download or show source instead of running:

1. Make sure you are using `http://localhost/ems/`, not opening files directly from Explorer.
2. Make sure Apache is running from XAMPP.


# FAQ

## How XAMPP is accessed from `C:\Users\StudyAcer\Documents\GitHub\ems`?

It is so because when a shortcut file of `ems` is created and added to `C:\xampp\htdocs\ems`, it will automatically be fetched.
