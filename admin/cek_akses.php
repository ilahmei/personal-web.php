<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

// Hanya admin saja
function hanyaAdmin() {
    if ($_SESSION['role'] != 'admin') {
        echo "<script>alert('Akses ditolak! Hanya untuk admin.');history.back();</script>";
        exit;
    }
}

// Admin dan editor
function hanyaAdminEditor() {
    if ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'editor') {
        echo "<script>alert('Akses ditolak! Hanya untuk admin/editor.');history.back();</script>";
        exit;
    }
}
?>