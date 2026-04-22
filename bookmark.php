<?php
require_once 'config/database.php';

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
$title = filter_input(INPUT_GET, 'title', FILTER_SANITIZE_STRING);

if ($url && $title) {
    // Cek Duplikasi
    $check = $pdo->prepare("SELECT id FROM bookmarks WHERE url = ?");
    $check->execute([$url]);
    
    if ($check->fetch()) {
        $msg = "URL sudah ada di vault!";
    } else {
        $domain = parse_url($url, PHP_URL_HOST);
        $icon = "https://www.google.com/s2/favicons?domain=$domain&sz=128";
        
        $stmt = $pdo->prepare("INSERT INTO bookmarks (title, url, icon) VALUES (?, ?, ?)");
        $stmt->execute([$title, $url, $icon]);
        $msg = "Link berhasil diamankan ke 123Bookmark!";
    }
    header('Content-Type: application/javascript');
    echo "alert('$msg');";
}
