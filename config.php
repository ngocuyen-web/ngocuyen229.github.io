<?php
$host = 'localhost';
$dbname = 'blood_donation';
$username = 'root'; // Tên người dùng MySQL
$password = '12345678'; // Mật khẩu (mặc định trên XAMPP là trống)

try {
    // Kết nối đến MySQL
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
