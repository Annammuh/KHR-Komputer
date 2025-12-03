<?php
// proses-pesan.php
// Ganti nomor WhatsApp di bawah ini dengan nomor kamu (format internasional tanpa +)
$nomorWA = "6281234567890"; // Contoh: 6281234567890 ← UBAH INI!

if ($_POST) {
    // Ambil data dari form
    $nama       = htmlspecialchars($_POST['nama'] ?? '');
    $wa         = htmlspecialchars($_POST['wa'] ?? '');
    $perangkat  = htmlspecialchars($_POST['perangkat'] ?? '');
    $layanan    = htmlspecialchars($_POST['layanan'] ?? '');
    $keluhan    = htmlspecialchars($_POST['keluhan'] ?? '');

    // Validasi sederhana
    if (empty($nama) || empty($wa) || empty($layanan) || empty($keluhan)) {
        die("
            <h2 style='text-align:center; margin-top:100px; font-family:Arial;'>
                Semua field wajib diisi! 
                <br><br>
                <a href='pesan-jasa.php' style='color:#0d47a1; text-decoration:underline;'>Kembali ke Form</a>
            </h2>
        ");
    }

    // Format pesan WhatsApp
    $pesan = "*PESANAN JASA BARU - KHR KOMPUTER*%0A%0A";
    $pesan .= "Nama: *$nama*%0A";
    $pesan .= "No. WhatsApp: *$wa*%0A";
    $pesan .= "Perangkat: *$perangkat*%0A";
    $pesan .= "Layanan: *$layanan*%0A%0A";
    $pesan .= "*Keluhan / Permintaan:*%0A";
    $pesan .= "$keluhan%0A%0A";
    $pesan .= "Terima kasih telah mempercayakan perbaikan ke KHR Komputer! Kami akan segera menghubungi Anda dalam 1×24 jam.";

    // URL WhatsApp (langsung buka chat + isi pesan)
    $urlWA = "https://wa.me/{$nomorWA}?text=" . $pesan;

    // Redirect langsung ke WhatsApp
    header("Location: $urlWA");
    exit();
} else {
    // Jika langsung buka file ini tanpa POST
    header("Location: pesan-jasa.php");
    exit();
}
?>