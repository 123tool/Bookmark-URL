<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>123Bookmark | Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root { --glass: rgba(255, 255, 255, 0.05); --border: rgba(255, 255, 255, 0.1); }
        body { 
            margin: 0; padding: 40px; font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0f172a; color: #f8fafc;
        }
        .container { max-width: 1000px; margin: 0 auto; }
        .header {
            background: var(--glass); backdrop-filter: blur(20px);
            padding: 40px; border-radius: 24px; border: 1px solid var(--border);
            text-align: center; margin-bottom: 40px;
        }
        .btn-bkm {
            display: inline-block; padding: 12px 28px; background: #38bdf8;
            color: #0f172a; border-radius: 12px; text-decoration: none;
            font-weight: 800; cursor: move;
        }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .card {
            background: var(--glass); backdrop-filter: blur(10px); border: 1px solid var(--border);
            padding: 20px; border-radius: 18px; display: flex; align-items: center; gap: 15px;
        }
        .card img { width: 48px; height: 48px; border-radius: 10px; }
        .card-title { font-weight: 600; font-size: 14px; margin-bottom: 4px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .card-url { font-size: 11px; color: #94a3b8; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin:0; color:#38bdf8">123Bookmark</h1>
            <p style="color:#64748b">PHP Version - Secure URL Vault</p>
            <br>
            <a href="javascript:(function(){var js=document.createElement('script');js.src='http://<?php echo $_SERVER['HTTP_HOST']; ?>/bookmark.php?url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title);document.body.appendChild(js);})();" class="btn-bkm">DRAG TO BOOKMARKS BAR</a>
        </div>

        <div class="grid">
            <?php
            $stmt = $pdo->query("SELECT * FROM bookmarks ORDER BY id DESC");
            while ($row = $stmt->fetch()): ?>
                <div class="card">
                    <img src="<?= $row['icon'] ?>" alt="icon">
                    <div style="overflow:hidden">
                        <div class="card-title"><?= htmlspecialchars($row['title']) ?></div>
                        <a href="<?= $row['url'] ?>" target="_blank" class="card-url"><?= $row['url'] ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
