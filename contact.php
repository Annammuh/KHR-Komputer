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
    <title>Contact - KHR Komputer</title>
    <base href="/service_komputer/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="assets/contact.css">
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
            <li><a href="bantuan.php">BANTUAN</a></li>
            <li><a href="contact.php"class="active">CONTACT</a></li>

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

    <!-- Hero Contact -->
    <section class="page-hero">
        <div class="container">
            <h1>Hubungi Kami</h1>
            <p>Kami siap membantu Anda kapan saja. Pilih cara termudah untuk menghubungi kami!</p>
        </div>
    </section>

    <!-- Contact Info + Map -->
    <section class="contact-info">
        <div class="container">
            <div class="contact-grid">

                <!-- Info Card -->
                <div class="contact-card">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h3>Alamat Toko</h3>
                            <p>Jl. Arief Rahman Hakim, No 113<br>Kel. Keputih, Kec. Sukolilo<br>Kota Surabaya, Jawa Timur 60111</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h3>Jam Operasional</h3>
                            <p>Senin–Sabtu: 09:00–18:00 WIB<br>Minggu & Tanggal Merah: Tutup</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h3>Telepon / WhatsApp</h3>
                            <p><a href="tel:081234567890">0812-3456-7890</a></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3>Email</h3>
                            <p><a href="mailto:info@khrkomputer.com">info@khrkomputer.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="map-wrapper">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.635940111297!2d112.79341361475736!3d-7.275573994733673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fba4c0e1b9c9%3A0x88d8c73b3e9d6e6e!2sPoliteknik%20Elektronika%20Negeri%20Surabaya%20(PENS)!5e0!3m2!1sid!2sid!4v1700000000000" 
                        width="100%" 
                        height="450" 
                        style="border:0; border-radius:20px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>

            <!-- Quick Contact Buttons -->
            <div class="quick-contact">
                <h2>Butuh Bantuan Sekarang?</h2>
                <div class="contact-buttons">
                    <a href="https://wa.me/6281234567890" class="btn-whatsapp" target="_blank">
                        <i class="fab fa-whatsapp"></i> Chat WhatsApp
                    </a>
                    <a href="tel:081234567890" class="btn-call">
                        <i class="fas fa-phone"></i> Telepon Langsung
                    </a>
                    <a href="pesan-jasa.php" class="btn-order">
                        <i class="fas fa-tools"></i> Pesan Jasa Online
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="assets/home.js"></script>
</body>
</html>