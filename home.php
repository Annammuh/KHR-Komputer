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
    <title>KHR Komputer - Service & Sparepart Terpercaya</title>
    
    <base href="/service_komputer/">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/home.css">
</head>
<body>

<!-- Ganti bagian navbar di home.php (biasanya di paling atas) -->
<nav class="navbar">
    <div class="container">
        <div class="logo"><h1>KHR Komputer</h1></div>
        <ul class="nav-links">
            <li><a href="home.php" class="active">HOME</a></li>
            <li><a href="layanan.php">LAYANAN KAMI</a></li>
            <li><a href="pesan-jasa.php">PESAN JASA</a></li>
            <li><a href="bantuan.php">BANTUAN</a></li>
            <li><a href="contact.php">CONTACT</a></li>

            <!-- TOMBOL LOGIN / LOGOUT OTOMATIS (SAMA PERSIS STYLE-NYA) -->
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
                <?php if ($_SESSION['username'] === 'admin@khrkomputer.com'): ?>
                    <li><a href="dashboard/index.php" class="btn-login">DASHBOARD</a></li>
                <?php else: ?>
                    <li><a href="logout.php" class="btn-login">LOGOUT</a></li>
                <?php endif; ?>
            <?php else: ?>
                <li><a href="dashboard/login.php" class="btn-login">LOGIN</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="text-side">
                    <p class="subtitle">SERVIS? TINGGAL ORDER AJA!</p>
                    <h1>Langsung di <span>KHR</span> Komputer</h1>
                    <p class="description">
                        Punya laptop/komputer yang sedang rusak atau sudah tidak terpakai dan ingin diperbaiki lagi?<br>
                        Bingung ingin memperbaikinya namun tidak mempunyai informasi terkait penyebabnya?<br>
                        <strong>Kami ada solusinya.</strong>
                    </p>
                    <a href="login.php" class="btn-primary">
                        Masuk ke Sistem (Admin / Customer)
                    </a>
                </div>
                <div class="image-side">
                    <img src="assets/images/logo-khr.png" alt="KHR Tech Computer Repair" class="main-logo">
                </div>
            </div>
        </div>
    </section>

    <!-- Keunggulan -->
    <section class="features" id="keunggulan">
        <div class="container">
            <h2 class="section-title">Mengapa Memilih KHR Komputer?</h2>
            <div class="features-grid">
                <div class="feature-card"><i class="fas fa-shield-alt"></i><h3>Garansi 30 Hari</h3><p>Perbaikan rusak lagi? Gratis diperbaiki ulang!</p></div>
                <div class="feature-card"><i class="fas fa-tools"></i><h3>Teknisi Berpengalaman</h3><p>Lebih dari 8 tahun menangani semua merek</p></div>
                <div class="feature-card"><i class="fas fa-tags"></i><h3>Harga Sparepart Termurah</h3><p>Harga grosir langsung dari distributor</p></div>
                <div class="feature-card"><i class="fas fa-clock"></i><h3>Proses Cepat</h3><p>Selesai dalam 1–3 hari kerja</p></div>
                <div class="feature-card"><i class="fas fa-headset"></i><h3>Konsultasi Gratis</h3><p>Cek kerusakan & estimasi biaya tanpa dipungut biaya</p></div>
                <div class="feature-card"><i class="fas fa-money-bill-wave"></i><h3>Transparan</h3><p>Tanpa biaya tersembunyi. Bayar sesuai kesepakatan</p></div>
            </div>
        </div>
    </section>

    <!-- Layanan Unggulan -->
    <section class="services" id="layanan">
        <div class="container">
            <h2 class="section-title">Layanan Unggulan Kami</h2>
            <div class="services-grid">
                <div class="service-card">
                    <i class="fas fa-laptop-medical"></i>
                    <h3>Service Laptop & PC</h3>
                    <p>Perbaikan hardware/software semua merek</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-microchip"></i>
                    <h3>Upgrade Hardware</h3>
                    <p>SSD, RAM, VGA, Processor — performa jadi ngebut!</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-box-open"></i>
                    <h3>Jual Sparepart Original</h3>
                    <p>Lengkap, bergaransi, harga bersaing</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class="testimonials" id="testimoni">
        <div class="container">
            <h2 class="section-title">Apa Kata Pelanggan Kami</h2>
            <div class="testimonial-slider">
                <div class="testimonial active">
                    <p>"Laptop saya mati total, dibawa kesini selesai 2 hari, sekarang lancar jaya!"</p>
                    <strong>— Mahes, Mahasiswa</strong>
                </div>
                <div class="testimonial">
                    <p>"Harga sparepart paling murah dibanding tempat lain. Recommended!"</p>
                    <strong>— Siti, Guru</strong>
                </div>
                <div class="testimonial">
                    <p>"Pelayanan ramah, transparan, dan garansi beneran dikasih. Mantap!"</p>
                    <strong>— Malik, Pegawai Swasta</strong>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <h2>KHR Komputer</h2>
                    <p>Service • Sparepart • Upgrade<br>Satu Tempat, Semua Solusi!</p>
                </div>
                <div class="footer-contact">
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Arief Rahman Hakim, Keputih, Sukolilo, Surabaya, 60111</p>
                    <p><i class="fas fa-phone"></i> 0812-3456-7890</p>
                    <p><i class="fas fa-envelope"></i> info@khrkomputer.com</p>
                </div>
            </div>
            <div class="copyright">
                © 2025 KHR Komputer. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/6281234567890" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script src="assets/home.js"></script>
</body>
</html>