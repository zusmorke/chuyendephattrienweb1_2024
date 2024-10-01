<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; // Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']); // Giải mã ID một cách an toàn
    $user = $userModel->findUserById($id); // Cập nhật người dùng hiện tại
}

$errors = []; // Mảng để lưu trữ thông báo lỗi xác thực

if (!empty($_POST['submit'])) {
    // Xác thực tên: Chỉ cho phép a-z, A-Z, 0-9
    if (empty($_POST['name'])) {
        $errors[] = 'Tên là bắt buộc.';
    } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['name'])) {
        $errors[] = 'Tên chỉ được chứa chữ cái và số.';
    } elseif (strlen($_POST['name']) < 5) {
        $errors[] = 'Tên phải có ít nhất 5 ký tự.';
    } elseif (strlen($_POST['name']) > 15) {
        $errors[] = 'Tên không được vượt quá 15 ký tự.';
    }

    // Xác thực mật khẩu (chỉ nếu thêm người dùng mới hoặc mật khẩu được cập nhật)
    if (empty($id) || !empty($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors[] = 'Mật khẩu là bắt buộc.';
        } elseif (strlen($_POST['password']) < 6) {
            $errors[] = 'Mật khẩu phải có ít nhất 6 ký tự.';
        } elseif (!preg_match('/^[a-zA-Z0-9~!@#$%^&*()]+$/', $_POST['password'])) {
            $errors[] = 'Mật khẩu chỉ được chứa chữ cái, số và các ký tự đặc biệt ~!@#$%^&*().';
        } elseif (!preg_match('/[~!@#$%^&*()]/', $_POST['password'])) {
            $errors[] = 'Mật khẩu phải bao gồm ít nhất một ký tự đặc biệt: ~!@#$%^&*().';
        } elseif (!preg_match('/[A-Za-z]/', $_POST['password'])) {
            $errors[] = 'Mật khẩu phải bao gồm ít nhất một chữ cái.';
        } elseif (!preg_match('/[0-9]/', $_POST['password'])) {
            $errors[] = 'Mật khẩu phải bao gồm ít nhất một số.';
        }
    }
    // Nếu không có lỗi, tiếp tục cập nhật người dùng
    if (empty($errors)) {
        // Mã hóa mật khẩu trước khi lưu
        if (!empty($_POST['password'])) {
            $_POST['password'] = md5($_POST['password']); // Sử dụng md5 để mã hóa mật khẩu
        }

        // Tiến hành cập nhật người dùng
        if (!empty($id)) {
            $userModel->updateUser($_POST);
            $_SESSION['success'] = 'Cập nhật người dùng thành công.';
        }

        header('location: list_users.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
    <?php include 'views/meta.php'; ?>
</head>
<body>
    <?php include 'views/header.php'; ?>
    <div class="container">
        <div class="alert alert-warning" role="alert">
            User Profile
        </div>
        <!-- Display errors if any -->
        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo base64_encode($id); ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo htmlspecialchars($user[0]['name']); ?>'>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>