 Done. I installed XAMPP, started Apache + MySQL, linked your Git repo into XAMPP, imported the database, and opened the app.

  Use this URL now:

  http://localhost/ems/

  Your repo still stays here:

  C:\Users\StudyAcer\Documents\GitHub\ems

  XAMPP serves it through this junction:

  C:\xampp\htdocs\ems -> C:\Users\StudyAcer\Documents\GitHub\ems

  I also fixed two project issues so login works:

  - asset/php/auth.php: changed redirects from /codefeat/... to /ems/...
  - asset/pages/database.sql: fixed seeded password hashes to match the documented sample passwords

  Tested credentials:

  - Admin: username admin, password admin123
  - Student: email aarav@example.com, password password123

  One thing: the XAMPP installer process still appears open. If you see its wizard window, finish or close it. Apache and MySQL are already running.