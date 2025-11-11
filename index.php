<?php
require_once 'config.php';  // Đảm bảo đã kết nối với cơ sở dữ liệu

// Lấy danh sách người hiến máu từ cơ sở dữ liệu
$stmt = $pdo->query("SELECT * FROM donors");
$donors = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Sử dụng fetchAll để lấy tất cả bản ghi

// Kiểm tra xem $donors có dữ liệu không
if (!$donors) {
    $donors = [];  // Nếu không có dữ liệu, gán $donors là một mảng rỗng
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Donor Management Logo" width="150" height="auto">
        <h1>Donor Management</h1>
        <button onclick="window.location.href='add_donor.php'">Add</button>
    </header>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Name</th>
                <th>Blood Type</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donors as $index => $donor): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo htmlspecialchars($donor['code']); ?></td>
                <td><?php echo htmlspecialchars($donor['name']); ?></td>
                <td><?php echo htmlspecialchars($donor['blood_type']); ?></td>
                <td><?php echo htmlspecialchars($donor['phone_number']); ?></td>
                <td><?php echo htmlspecialchars($donor['status']); ?></td>
                <td>
                    <a href="edit_donor.php?id=<?php echo $donor['id']; ?>">Edit</a>
                    <a href="delete_donor.php?id=<?php echo $donor['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
