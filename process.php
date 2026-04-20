<?php
include 'db_connect.php';

if (!isset($_POST['submit'])) {
    header("Location: index.php");
    exit;
}

/* ── Input validation ── */
$title    = trim($_POST['title'] ?? '');
$category = $_POST['category'] ?? '';
$desc     = trim($_POST['description'] ?? '');

$allowed_categories = ['Business', 'Health', 'Education', 'Advocacy'];

if (empty($title) || empty($desc)) {
    header("Location: index.php?status=error&reason=empty");
    exit;
}

if (!in_array($category, $allowed_categories, true)) {
    header("Location: index.php?status=error&reason=invalid_category");
    exit;
}

if (mb_strlen($title) > 200 || mb_strlen($desc) > 2000) {
    header("Location: index.php?status=error&reason=too_long");
    exit;
}

/* ── Prepared statement (prevents SQL injection) ── */
$stmt = $conn->prepare(
    "INSERT INTO campaigns (title, category, description) VALUES (?, ?, ?)"
);

if (!$stmt) {
    header("Location: index.php?status=error");
    exit;
}

$stmt->bind_param("sss", $title, $category, $desc);

if ($stmt->execute()) {
    header("Location: index.php?status=success");
} else {
    header("Location: index.php?status=error");
}

$stmt->close();
$conn->close();