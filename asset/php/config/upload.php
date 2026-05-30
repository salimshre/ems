<?php
function save_uploaded_image(string $fieldName, string $existing = ''): string {
    return save_image_to_directory($fieldName, 'events', $existing);
}

function save_profile_image(string $fieldName, string $existing = ''): string {
    return save_image_to_directory($fieldName, 'profiles', $existing);
}

function save_image_to_directory(string $fieldName, string $folder, string $existing = ''): string {
    $existing = safe_existing_image_path($existing, $folder);

    if (empty($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] === UPLOAD_ERR_NO_FILE) {
        return $existing;
    }

    $file = $_FILES[$fieldName];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        respond(false, 'Image upload failed.', [], 400);
    }

    if ($file['size'] > 5 * 1024 * 1024) {
        respond(false, 'Image must be 5MB or smaller.', [], 400);
    }

    $info = getimagesize($file['tmp_name']);
    if (!$info) {
        respond(false, 'Uploaded file is not a valid image.', [], 400);
    }

    $extensions = [
        IMAGETYPE_JPEG => 'jpg',
        IMAGETYPE_PNG => 'png',
        IMAGETYPE_WEBP => 'webp',
        IMAGETYPE_GIF => 'gif',
    ];

    $imageType = $info[2];
    if (!isset($extensions[$imageType])) {
        respond(false, 'Only JPG, PNG, WEBP, and GIF images are allowed.', [], 400);
    }

    $uploadDir = dirname(__DIR__, 2) . '/uploads/' . $folder;
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0775, true)) {
        respond(false, 'Could not create upload directory.', [], 500);
    }

    $fileName = bin2hex(random_bytes(16)) . '.' . $extensions[$imageType];
    $target = $uploadDir . '/' . $fileName;

    if (!move_uploaded_file($file['tmp_name'], $target)) {
        respond(false, 'Could not save uploaded image.', [], 500);
    }

    return '../uploads/' . $folder . '/' . $fileName;
}

function safe_existing_image_path(string $path, string $folder = 'events'): string {
    $path = trim($path);
    if ($path === '') {
        return '';
    }
    if (preg_match('/^https?:\/\/[^\s"]+$/i', $path)) {
        return $path;
    }
    $pattern = '/^\.\.\/uploads\/' . preg_quote($folder, '/') . '\/[a-f0-9]+\.(jpg|png|webp|gif)$/i';
    if (preg_match($pattern, $path)) {
        return $path;
    }
    return '';
}
?>
