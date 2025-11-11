<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $blood_type = $_POST['blood_type'];
    $phone_number = $_POST['phone_number'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("INSERT INTO donors (code, name, blood_type, phone_number, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$code, $name, $blood_type, $phone_number, $status]);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Donor</title>
</head>
<body>
    <h1>Add Donor</h1>
    <form action="add_donor.php" method="POST">
        <label for="code">Code</label>
        <input type="text" name="code" required><br>

        <label for="name">Name</label>
        <input type="text" name="name" required><br>

        <label for="blood_type">Blood Type</label>
        <input type="text" name="blood_type" required><br>

        <label for="phone_number">Phone Number</label>
        <input type="text" name="phone_number" required><br>

        <label for="status">Status</label>
        <input type="text" name="status" required><br>

        <button type="submit">Add Donor</button>
    </form>
</body>
</html>
