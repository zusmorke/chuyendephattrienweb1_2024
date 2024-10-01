<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$id = NULL;

// Lấy ID người dùng từ URL
if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']); // Giải mã ID
}

// Khởi tạo mảng lưu trữ thông báo lỗi
$errors = [];

// Kiểm tra nếu form đã được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem biến password có tồn tại không
    if (isset($_POST['password'])) {
        $password = $_POST['password'];

        // Tìm người dùng theo ID
        $user = $userModel->findUserById($id);

        // Kiểm tra mật khẩu (sử dụng md5 để mã hóa mật khẩu nhập vào)
        if ($user && md5($password) === $user[0]['password']) {
            // Nếu mật khẩu đúng, tiến hành xóa người dùng
            $userModel->deleteUserById($id);
            $_SESSION['success'] = 'User deleted successfully.';
            header('location: list_users.php');
            exit;
        } else {
            $errors[] = 'Mật khẩu không đúng. Vui lòng thử lại.';
        }
    } else {
        $errors[] = 'Vui lòng nhập mật khẩu.';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Xóa người dùng</title>
    <?php include 'views/meta.php'; ?>
</head>

<body>
    <?php include 'views/header.php'; ?>
    <div class="container">
        <div class="alert alert-warning" role="alert">
            Xác nhận xóa người dùng
        </div>
        <!-- Hiển thị lỗi nếu có -->
        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="password">Nhập mật khẩu của bạn để xác nhận:</label>
                <input type="password" name="password" class="form-control" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-danger">Xóa người dùng</button>
            <a href="list_users.php" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>

</html>