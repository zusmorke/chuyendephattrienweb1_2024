<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; // Khởi tạo người dùng
$id = NULL;

if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']); // Giải mã ID
    $user = $userModel->findUserById($id); // Tìm người dùng theo ID
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
<?php include 'views/header.php'?>
<div class="container">

    <?php if ($user && !empty($user[0])) { ?>
        <div class="alert alert-warning" role="alert">
            User Profile
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <span><?php echo htmlspecialchars($user[0]['name']); ?></span>
        </div>
        <div class="form-group">
            <label for="fullname">Fullname:</label>
            <span><?php echo htmlspecialchars($user[0]['fullname']); ?></span>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <span><?php echo htmlspecialchars($user[0]['email']); ?></span>
        </div>
        
        <div class="form-group">
            <label for="type">Type:</label>
            <span><?php echo htmlspecialchars($user[0]['type']); ?></span>
        </div>

        <a href="form_user.php?id=<?php echo base64_encode($user[0]['id']); ?>" class="btn btn-primary">Edit User</a>
        <a href="list_users.php" class="btn btn-secondary">Back to Users List</a>
        
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            User not found!
        </div>
        <a href="list_users.php" class="btn btn-secondary">Back to Users List</a>
    <?php } ?>
</div>
</body>
</html>