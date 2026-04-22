<?php 
// Memanggil konfigurasi database
require_once 'config/database.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>123Bookmark | Secure Personal Vault</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container">
        <header class="header">
            <h1 class="brand">123Bookmark</h1>
            <p style="color: #64748b; margin-bottom: 30px;">Professional URL Vault by Rolandino / SPY-E</p>
            
            <a href="javascript:(function(){var js=document.createElement('script');js.src='http://<?php echo $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']); ?>/bookmark.php?url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title);document.body.appendChild(js);})();" class="btn-bkm">
                DRAG TO BOOKMARKS BAR
            </a>
            
            <p style="font-size: 11px; color: #475569; margin-top: 15px;">
                Seret tombol di atas ke bar bookmark browser Anda untuk menyimpan link secara instan.
            </p>
        </header>

        <main class="grid">
            <?php
            try {
                // Mengambil data bookmark terbaru dari database
                $stmt = $pdo->query("SELECT * FROM bookmarks ORDER BY id DESC");
                $bookmarks = $stmt->fetchAll();

                if ($bookmarks):
                    foreach ($bookmarks as $row): 
            ?>
                <div class="card">
                    <img src="<?= htmlspecialchars($row['icon']) ?>" 
                         onerror="this.src='https://cdn-icons-png.flaticon.com/512/1243/1243933.png'" 
                         alt="icon">
                    
                    <div class="card-info">
                        <div class="card-title"><?= htmlspecialchars($row['title']) ?></div>
                        <a href="<?= htmlspecialchars($row['url']) ?>" target="_blank" class="card-url">
                            <?= htmlspecialchars($row['url']) ?>
                        </a>
                        <div style="font-size: 9px; color: #475569; margin-top: 5px;">
                            Saved on: <?= date('d M Y', strtotime($row['created_at'])) ?>
                        </div>
                    </div>
                </div>
            <?php 
                    endforeach;
                else:
            ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #64748b;">
                    Belum ada link yang diamankan. Mulai menabung URL sekarang!
                </div>
            <?php 
                endif;
            } catch (PDOException $e) {
                echo "<div style='color:red;'>Terjadi kesalahan sistem: " . $e->getMessage() . "</div>";
            }
            ?>
        </main>
    </div>

    <footer style="text-align: center; margin-top: 60px; padding-bottom: 40px; color: #475569; font-size: 12px;">
        &copy; <?= date('Y') ?> 123Bookmark - Developed by <strong>Rolandino (SPY-E)</strong>
    </footer>

</body>
</html>
