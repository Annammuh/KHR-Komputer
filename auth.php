<?php
session_start();

// Jika belum login → ke login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}

// Jika login tapi bukan admin → keluar dari dashboard!
if ($_SESSION['username'] !== 'admin@khrkomputer.com') {
    header("Location: home.php");
    exit();
}
?>