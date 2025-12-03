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
    <title>Layanan Kami - KHR Komputer</title>
    <base href="/service_komputer/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="assets/layanan.css">
</head>
<body>

<!-- Ganti bagian navbar di home.php (biasanya di paling atas) -->
<nav class="navbar">
    <div class="container">
        <div class="logo"><h1>KHR Komputer</h1></div>
        <ul class="nav-links">
            <li><a href="home.php">HOME</a></li>
            <li><a href="layanan.php" class="active">LAYANAN KAMI</a></li>
            <li><a href="pesan-jasa.php">PESAN JASA</a></li>
            <li><a href="bantuan.php">BANTUAN</a></li>
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
    <!-- Hero Layanan -->
    <section class="page-hero">
        <div class="container">
            <h1>Layanan Kami</h1>
            <p>Semua solusi perbaikan laptop, komputer, upgrade hardware, dan penjualan sparepart original dengan harga terbaik dan garansi terpercaya.</p>
        </div>
    </section>

    <!-- Daftar Layanan -->
    <section class="services-detail">
        <div class="container">
            <div class="services-grid">

                <!-- Layanan 1 -->
                <div class="service-item">
                    <div class="service-header">
                        <i class="fas fa-laptop-medical"></i>
                        <h3>Service Laptop & Komputer</h3>
                    </div>
                    <div class="service-body">
                        <div class="price">Mulai Rp75.000</div>
                        <ul class="features-list">
                            <li>Ganti LCD / touchscreen</li>
                            <li>Perbaikan motherboard</li>
                            <li>Instal ulang Windows / Linux</li>
                            <li>Hilangkan virus & malware</li>
                            <li>Service engsel, keyboard, baterai</li>
                        </ul>
                        <a href="https://wa.me/6281234567890" class="btn-primary">Pesan Sekarang</a>
                    </div>
                </div>

                <!-- Layanan 2 -->
                <div class="service-item">
                    <div class="service-header">
                        <i class="fas fa-microchip"></i>
                        <h3>Upgrade Hardware</h3>
                    </div>
                    <div class="service-body">
                        <div class="price">Mulai Rp350.000</div>
                        <ul class="features-list">
                            <li>Upgrade SSD NVMe (cepat banget!)</li>
                            <li>Tambah RAM sampai 32GB</li>
                            <li>Ganti VGA / GPU</li>
                            <li>Upgrade processor</li>
                            <li>Optimasi performa gaming/office</li>
                        </ul>
                        <a href="https://wa.me/6281234567890" class="btn-primary">Pesan Sekarang</a>
                    </div>
                </div>

                <!-- Layanan 3 -->
                <div class="service-item">
                    <div class="service-header">
                        <i class="fas fa-box-open"></i>
                        <h3>Jual Sparepart Original</h3>
                    </div>
                    <div class="service-body">
                        <div class="price">Harga Grosir</div>
                        <ul class="features-list">
                            <li>LCD, baterai, keyboard semua merek</li>
                            <li>SSD, HDD, RAM, VGA</li>
                            <li>Charger original & adaptor</li>
                            <li>Garansi resmi distributor</li>
                            <li>Stok lengkap & ready</li>
                        </ul>
                        <a href="https://wa.me/6281234567890" class="btn-primary">Lihat Katalog</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="assets/js/home.js"></script>
</body>
</html>