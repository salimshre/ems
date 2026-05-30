# EventHub

EventHub is a college event management system with a public landing page, student portal, admin dashboard, PHP backend endpoints, and a MySQL database schema.

## Features

- Public landing page for event discovery
- Student signup and login
- Student event browsing, registration, cancellation, and profile view
- Admin dashboard for events, venues, registrations, and overview stats
- MySQL schema with sample users, admins, venues, events, and registrations

## Project Structure

```text
.
|-- index.html
|-- asset/
|   |-- css/
|   |-- js/
|   |-- pages/
|   |   |-- admin.html
|   |   |-- database.sql
|   |   |-- login.html
|   |   |-- sign.html
|   |   `-- student.html
|   `-- php/
|       |-- auth.php
|       |-- dashboard.php
|       |-- events.php
|       |-- profile.php
|       |-- registrations.php
|       |-- venues.php
|       `-- config/
|           `-- db.php
|-- Documentation/
`-- Versions/
```

## Requirements

- PHP 8.0 or newer
- MySQL or MariaDB
- A local server such as XAMPP, WAMP, Laragon, or Apache with PHP enabled
- phpMyAdmin or another MySQL client

## Setup

1. Copy the project into your web server document root.

   Example for XAMPP:

   ```text
   C:\xampp\htdocs\ems
   ```

2. Create and seed the database.

   Open phpMyAdmin, create or select a database named `ems`, then run:

   ```text
   asset/pages/database.sql
   ```

3. Check the database connection settings in:

   ```text
   asset/php/config/db.php
   ```

   Default local settings:

   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'ems');
   ```

4. Open the app through the local server.

   ```text
   http://localhost/ems/
   ```

## Important Notes

- The active application code is in the project root and `asset/`.
- `Versions/` contains older or alternate copies and should not be treated as the production source.
- `Documentation/all_code.md` is a generated archive-style code dump. Use the actual source files for edits.
- The database seed currently includes sample credentials for development only. Do not use those credentials in production.

## Review Notes

Before using this outside a local demo, move database credentials out of source code and replace development sample credentials with environment-specific accounts.

## Main Pages

- Landing page: `index.html`
- Login: `asset/pages/login.html`
- Signup: `asset/pages/sign.html`
- Student portal: `asset/pages/student.html`
- Admin dashboard: `asset/pages/admin.html`
