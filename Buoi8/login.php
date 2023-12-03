<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="">User</label>
            <input type="text" name="username">
        </div>

        <div>
            <label for="">Password</label>
            <input type="text" name="password">
        </div>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
<?php
    if(isset($_POST['login'])) { // Kiển tra người dùng đã nhấn nút đăng nhập hay chưa
        // lấy giá trị tên đăng nhaapj từ form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // kieermn tra tên đăng nhập và mật khẩu có khố hay không
        if($username == 'admin' && $password == '123'){
            $_SESSION['username'] = $username; // lưu tên đăng nhập vào sesion
            $_SESSION['password'] = $password; // lưu giá trị mật khẩu vào sesion
            header('location:index.php'); 
            // chuyển hướng đến trang index.php sau khi đăngh nhập thành công
        } else {
            echo "incorrect password"; // thông báo lỗi nếu đăng nhập sai tài khaorn hoặc mật khẩu
        }
    }
?>