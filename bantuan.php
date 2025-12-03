<?php
session_start();
// di home.php
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header("Location: dashboard/index.php");
    exit();
}

// di login.php (setelah berhasil login)
$_SESSION['user_logged_in'] = true;

// di logout.php
unset($_SESSION['user_logged_in']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan & FAQ - KHR Komputer</title>
    <base href="/service_komputer/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="assets/bantuan.css">
</head>
<body>

<!-- Ganti bagian navbar di home.php (biasanya di paling atas) -->
<nav class="navbar">
    <div class="container">
        <div class="logo"><h1>KHR Komputer</h1></div>
        <ul class="nav-links">
            <li><a href="home.php">HOME</a></li>
            <li><a href="layanan.php">LAYANAN KAMI</a></li>
            <li><a href="pesan-jasa.php">PESAN JASA</a></li>
            <li><a href="bantuan.php" class="active">BANTUAN</a></li>
            <li><a href="contact.php">CONTACT</a></li>

            <!-- TOMBOL LOGIN / LOGOUT OTOMATIS (SAMA PERSIS STYLE-NYA) -->
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
                <?php if ($_SESSION['username'] === 'admin@khrkomputer.com'): ?>
                    <li><a href="dashboard/dashboard/index.php" class="btn-login">DASHBOARD</a></li>
                <?php else: ?>
                    <li><a href="logout.php" class="btn-login">LOGOUT</a></li>
                <?php endif; ?>
            <?php else: ?>
                <li><a href="dashboard/login.php" class="btn-login">LOGIN</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

    <!-- Hero Bantuan -->
    <section class="page-hero">
        <div class="container">
            <h1>Pusat Bantuan & FAQ</h1>
            <p>Temukan jawaban atas pertanyaan yang sering diajukan. Kami siap membantu Anda!</p>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="faq-grid">

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Berapa lama proses perbaikan?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Rata-rata <strong>1–3 hari kerja</strong> setelah barang sampai di tempat kami. Untuk kerusakan berat (contoh: motherboard) bisa sampai 5–7 hari.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Apakah ada garansi perbaikan?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p><strong>Ya, garansi hingga 30 hari</strong> untuk semua jenis perbaikan. Jika rusak lagi karena kesalahan kami, diperbaiki <strong>gratis 100%</strong>.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Apakah bisa antar jemput barang?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Bisa! Layanan antar jemput tersedia untuk wilayah kota (biaya mulai Rp20.000). Hubungi kami via WhatsApp untuk konfirmasi.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Apakah konsultasi dikenakan biaya?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p><strong>Gratis 100%</strong>! Cek kerusakan + estimasi biaya tanpa dipungut biaya apapun.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Apakah sparepart yang dipakai original?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, semua sparepart yang kami gunakan <strong>original atau grade A</strong> dengan garansi resmi distributor.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Bagaimana cara cek status perbaikan?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Setelah login di sistem, Anda bisa melihat status real-time di menu “Riwayat Service”. Atau hubungi kami langsung via WhatsApp.</p>
                    </div>
                </div>

            </div>

            <!-- Kontak Cepat -->
            <div class="help-contact">
                <h2>Masih belum menemukan jawaban?</h2>
                <p>Hubungi kami langsung, kami siap membantu 24/7!</p>
                <div class="contact-buttons">
                    <a href="https://wa.me/6281234567890" class="btn-whatsapp" target="_blank">
                        <i class="fab fa-whatsapp"></i> Chat via WhatsApp
                    </a>
                    <a href="tel:081234567890" class="btn-call">
                        <i class="fas fa-phone"></i> Telepon Langsung
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="assets/home.js"></script>
</body>
</html>