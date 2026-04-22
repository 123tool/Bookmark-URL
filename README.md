# 🚀 123Bookmark v2.0 - Professional PHP Vault
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-8.x-blue.svg)](https://www.php.net/)

**123Bookmark** adalah aplikasi penyimpanan URL pribadi (Personal Bookmark Vault) yang didesain dengan antarmuka **Glassmorphism**. Proyek ini mendemonstrasikan integrasi *Bookmarklet* JavaScript dengan backend PHP modern.

## 🛠️ Tech Stack
- **Backend:** PHP 8.x (PDO MySQL).
- **Database:** MariaDB / MySQL.
- **Frontend:** HTML5, CSS3 (Modern Glassmorphism), Vanilla JS.
- **Security:** Prepared Statements, XSS Protection (Input Sanitization).

## 🌟 Fitur Utama
- **One-Click Save:** Simpan URL langsung dari browser tanpa membuka dashboard.
- **Auto-Favicon:** Mendapatkan icon website otomatis menggunakan Google Favicon API.
- **Anti-Duplicate:** Sistem validasi otomatis untuk mencegah penyimpanan URL yang sama.
- **Glassmorphism UI:** Desain dashboard transparan yang mewah dan responsif.

## 📂 Struktur Proyek
```text
├── config/        # Konfigurasi Database (PDO)
├── sql/           # Skema Database SQL
├── index.php      # Dashboard Utama
├── bookmark.php   # API Handler (Bookmarklet)
└── README.md      # Dokumentasi Proyek
