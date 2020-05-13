<?php 

    // echo session_save_path();
    include 'includes/conn.php';
    session_start();

    // $pdo = new Database(); objek sudah global di conn.php

    // Jika admin redirect ke halaman home untuk admin
    if (isset($_SESSION['admin'])) {
        header('location: admin/home.php');
    }

    // Jika user redirect ke halaman home untuk user
    if (isset($_SESSION['user'])) {
        $conn = $pdo->open();

        try {
            $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
            $stmt->execute(['id' => $_SESSION['user']]);
            $user = $stmt->fetch();
        }
        catch(PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
        $pdo->close();
    }
?>