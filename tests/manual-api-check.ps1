param(
    [string]$BaseUrl = "http://localhost/ems"
)

$ErrorActionPreference = "Stop"
$StudentCookie = Join-Path $env:TEMP "ems_student_test_cookie.txt"
$AdminCookie = Join-Path $env:TEMP "ems_admin_test_cookie.txt"

function Invoke-Json($Arguments) {
    $raw = & curl.exe -s @Arguments
    if (-not $raw) { throw "Empty response from curl" }
    return $raw | ConvertFrom-Json
}

function Assert-True($Condition, $Message) {
    if (-not $Condition) { throw "FAILED: $Message" }
    Write-Host "PASS: $Message"
}

$studentLogin = Invoke-Json @(
    "-c", $StudentCookie,
    "-X", "POST", "$BaseUrl/asset/php/auth.php",
    "-d", "action=login",
    "-d", "role=user",
    "-d", "email=aarav@example.com",
    "-d", "password=password123"
)
Assert-True $studentLogin.success "student login"

$studentCheck = Invoke-Json @("-b", $StudentCookie, "$BaseUrl/asset/php/auth.php?action=check")
$studentToken = $studentCheck.csrf_token
Assert-True ($studentCheck.user.role -eq "user" -and $studentToken) "student session and CSRF token"

$studentDashboard = Invoke-Json @("-b", $StudentCookie, "$BaseUrl/asset/php/dashboard.php?action=stats")
Assert-True (-not $studentDashboard.success) "student cannot access admin dashboard stats"

$csrfReject = Invoke-Json @(
    "-b", $StudentCookie,
    "-X", "POST", "$BaseUrl/asset/php/registrations.php",
    "-d", "action=register",
    "-d", "event_id=6"
)
Assert-True (-not $csrfReject.success) "mutation without CSRF is rejected"

$adminLogin = Invoke-Json @(
    "-c", $AdminCookie,
    "-X", "POST", "$BaseUrl/asset/php/auth.php",
    "-d", "action=login",
    "-d", "role=admin",
    "-d", "email=admin",
    "-d", "password=admin123"
)
Assert-True $adminLogin.success "admin login"

$adminCheck = Invoke-Json @("-b", $AdminCookie, "$BaseUrl/asset/php/auth.php?action=check")
$adminToken = $adminCheck.csrf_token
Assert-True ($adminCheck.user.role -eq "admin" -and $adminToken) "admin session and CSRF token"

$venue = Invoke-Json @(
    "-b", $AdminCookie,
    "-X", "POST", "$BaseUrl/asset/php/venues.php",
    "-d", "action=create",
    "-d", "name=API Test Venue",
    "-d", "capacity=25",
    "-d", "location=Test Block",
    "-d", "facilities=Projector",
    "-d", "csrf_token=$adminToken"
)
Assert-True $venue.success "admin can create venue"

$deleteVenue = Invoke-Json @(
    "-b", $AdminCookie,
    "-X", "POST", "$BaseUrl/asset/php/venues.php",
    "-d", "action=delete",
    "-d", "id=$($venue.venue_id)",
    "-d", "csrf_token=$adminToken"
)
Assert-True $deleteVenue.success "admin can delete venue"

Write-Host "Manual API checks completed."
