<?php
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function require_post(): void {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        respond(false, 'Method not allowed', [], 405);
    }
}

function require_csrf(): void {
    $token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
    $sessionToken = $_SESSION['csrf_token'] ?? '';

    if (!$token || !$sessionToken || !hash_equals($sessionToken, $token)) {
        respond(false, 'Invalid security token. Please refresh and try again.', [], 403);
    }
}

function require_role(string $role): void {
    if (($_SESSION['role'] ?? '') !== $role) {
        respond(false, 'Forbidden', [], 403);
    }
}
?>
