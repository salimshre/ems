<?php
function log_audit(string $action, string $entityType, ?int $entityId = null, array $details = []): void {
    $conn = getConn();
    $adminId = $_SESSION['admin_id'] ?? null;
    $userId = $_SESSION['user_id'] ?? null;
    $payload = $details ? json_encode($details) : null;

    $stmt = mysqli_prepare($conn,
        "INSERT INTO audit_logs (actor_admin_id, actor_user_id, action, entity_type, entity_id, details)
         VALUES (?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        return;
    }

    mysqli_stmt_bind_param($stmt, 'iissis', $adminId, $userId, $action, $entityType, $entityId, $payload);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
?>
