<?php
session_start();

// Cek login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo "<script>alert('Login dulu ya!'); window.location='login.php';</script>";
    exit();
}

include 'dashboard/koneksi.php';
$nama = $_SESSION['nama_lengkap'] ?? 'Pelanggan';
$email = $_SESSION['username'] ?? '';

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $perangkat = $_POST['perangkat'] ?? '';
    $layanan   = $_POST['layanan'] ?? '';
    $keluhan   = $_POST['keluhan'] ?? '';
    $foto      = $_FILES['foto'] ?? null;

    if (empty($perangkat) || empty($layanan) || empty($keluhan)) {
        $error = "Semua field wajib diisi!";
    } else {
        // Upload foto (jika ada)
        $foto_url = '';
        if ($foto && $foto['error'] == 0) {
            $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
            $allowed = ['jpg','jpeg','png','gif'];
            if (in_array(strtolower($ext), $allowed) && $foto['size'] <= 5*1024*1024) { // max 5MB
                $nama_file = "foto_" . time() . "_" . rand(1000,9999) . "." . $ext;
                $tujuan = "uploads/" . $nama_file;
                if (move_uploaded_file($foto['tmp_name'], $tujuan)) {
                    $foto_url = "http://localhost/service_komputer/" . $tujuan;
                }
            }
        }

        // Buat pesan WhatsApp
        $pesan = "*PESANAN JASA BARU - KHR KOMPUTER*%0A%0A";
        $pesan .= "Nama: *$nama*%0A";
        $pesan .= "Email: *$email*%0A";
        $pesan .= "Perangkat: *$perangkat*%0A";
        $pesan .= "Layanan: *$layanan*%0A%0A";
        $pesan .= "*Keluhan:*%0A$keluhan%0A%0A";
        if ($foto_url) {
            $pesan .= "Foto Kerusakan:%0A$foto_url%0A%0A";
        }
        $pesan .= "Terima kasih! Kami akan segera hubungi Anda.";

        $wa_url = "https://wa.me/6285778834935?text=" . $pesan; // GANTI NOMOR KAMU!
        header("Location: $wa_url");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesan Jasa - KHR Komputer</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* Style sama seperti sebelumnya + tambahan upload */
    *{margin:0;padding:0;box-sizing:border-box;}
    body{font-family:'Poppins',sans-serif;background:#f8fbff;color:#333;}
    .navbar{background:#0d47a1;padding:1.5rem 0;position:fixed;width:100%;top:0;z-index:1000;box-shadow:0 4px 20px rgba(0,0,0,0.2);}
    .container{max-width:1200px;margin:0 auto;padding:0 20px;display:flex;justify-content:space-between;align-items:center;}
    .logo h1{color:white;font-size:28px;font-weight:700;}
    .nav-links{list-style:none;display:flex;gap:30px;align-items:center;}
    .nav-links a{color:white;text-decoration:none;font-weight:500;}
    .btn-login{background:rgba(255,255,255,0.2);padding:12px 28px;border-radius:50px;font-weight:600;}
    .main{padding:140px 20px 80px;}
    .form-container{max-width:700px;margin:0 auto;background:white;padding:50px;border-radius:30px;box-shadow:0 20px 60px rgba(13,71,161,0.15);}
    h2{text-align:center;font-size:32px;margin-bottom:10px;color:#0d47a1;}
    .welcome{text-align:center;margin-bottom:40px;font-size:18px;color:#555;}
    .form-group{margin:25px 0;}
    .form-group label{display:block;margin-bottom:10px;font-weight:600;color:#0d47a1;}
    .form-group input,.form-group select,.form-group textarea{
      width:100%;padding:16px;border:2px solid #e0e0e0;border-radius:20px;font-size:16px;outline:none;transition:0.3s;
    }
    .form-group input:focus,.form-group select:focus,.form-group textarea:focus{border-color:#0d47a1;box-shadow:0 0 15px rgba(13,71,161,0.2);}
    .form-group textarea{height:160px;resize:none;}
    .file-upload{
      border:2px dashed #0d47a1;padding:30px;border-radius:20px;text-align:center;background:#f8fbff;cursor:pointer;transition:0.3s;
    }
    .file-upload:hover{background:#e3f2fd;}
    .file-upload input[type=file]{display:none;}
    .btn-submit{width:100%;padding:18px;background:#0d47a1;color:white;border:none;border-radius:50px;font-size:19px;font-weight:600;cursor:pointer;margin-top:20px;}
    .btn-submit:hover{background:#1565c0;transform:translateY(-5px);}
    .error{background:#e74c3c;color:white;padding:15px;border-radius:15px;margin:20px 0;text-align:center;}
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
  <div class="container">
    <div class="logo"><h1>KHR Komputer</h1></div>
    <ul class="nav-links">
      <li><a href="home.php">HOME</a></li>
      <li><a href="layanan.php">LAYANAN</a></li>
      <li><a href="pesan-jasa.php" class="active">PESAN JASA</a></li>
      <li><a href="bantuan.php">BANTUAN</a></li>
      <li><a href="contact.php">CONTACT</a></li>
      <li><a href="logout.php" class="btn-login">LOGOUT</a></li>
    </ul>
  </div>
</nav>

<div class="main">
  <div class="form-container">
    <h2>Pesan Jasa Service</h2>
    <p class="welcome">Halo <strong><?=htmlspecialchars($nama)?></strong>! Silakan isi form di bawah ini.</p>

    <?php if($error): ?><div class="error"><?=htmlspecialchars($error)?></div><?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Jenis Perangkat</label>
        <select name="perangkat" required>
          <option value="">-- Pilih Perangkat --</option>
          <option>Laptop</option>
          <option>Komputer/PC</option>
          <option>Printer</option>
          <option>Lainnya</option>
        </select>
      </div>

      <div class="form-group">
        <label>Jenis Layanan</label>
        <select name="layanan" required>
          <option value="">-- Pilih Layanan --</option>
          <option>Service / Perbaikan</option>
          <option>Upgrade Hardware</option>
          <option>Beli Sparepart</option>
          <option>Instal Ulang</option>
        </select>
      </div>

      <div class="form-group">
        <label>Keluhan / Permintaan</label>
        <textarea name="keluhan" placeholder="Jelaskan masalah Anda..." required></textarea>
      </div>

      <div class="form-group">
        <label>Lampirkan Foto Kerusakan (Opsional - maks 5MB)</label>
        <label class="file-upload">
          <i class="fas fa-cloud-upload-alt" style="font-size:40px;color:#0d47a1;margin-bottom:15px;"></i><br>
          <span style="color:#0d47a1;font-weight:600;">Klik untuk upload foto</span><br>
          <small style="color:#777;">JPG, PNG, GIF (maks 5MB)</small>
          <input type="file" name="foto" accept="image/*">
        </label>
      </div>

      <button type="submit" class="btn-submit">
        Kirim Pesanan via WhatsApp
      </button>
    </form>
  </div>
</div>
    <script src="assets/home.js"></script>
</body>
</html>