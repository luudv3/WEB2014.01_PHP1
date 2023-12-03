<?php
    session_start();
    // kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng tới trang login

    if (!isset($_SESSION['user']) && !isset($_SESSION['password'])) {
        header('location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin nhân viên</title>
</head>

<body>
    <!-- Tạo bảng để hiển thị thông tin nhân viên -->
    <table border="1">
        <!-- Định đạng các tiêu đề của cột -->
        <tr>
            <th>STT</th>
            <th>Họ tên NV</th>
            <th>Năm sinh</th>
            <th>Quê quán</th>
            <th>Số điện thoại</th>
            <th>Phòng Ban</th>
            <th>avatar</th>
            <th>Thao tác</th>
        </tr>
        <?php
            // Kết nối tới CSDL
            include_once 'connection.php';
            // Truy vấn dữ liệu tới bảng nhanvien
            //$sql = "SELECT * FROM nhanvien";
            $sql = "SELECT n.*, p.ten_phongBan FROM nhanvien n
            LEFT JOIN phongban p ON n.id_phongBan = p.id_phongBan
            ";

            $kq = $conn->query($sql);
            foreach($kq as $row){
                //Hiển thị thông tin từng cột của nhân viên
                ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['ten_nhanVien'] ?></td>
                <td><?php echo $row['namSinh'] ?></td>
                <td><?php echo $row['queQuan'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['ten_phongBan'] ?></td>
                <td><img style="width:100px" src="img/<?php echo $row['image'] ?>" alt=""></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id'] ?>">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xóa không')" 
                    href="delete.php?id=<?php echo $row['id'] ?>">Xóa</a>
                </td>
            </tr>
            <?php
             }
            ?>
    </table>
    <!-- Tạo link thêm mới nhân viên -->
    <a href="add.php">Thêm nhân viên</a>
</body>

</html>