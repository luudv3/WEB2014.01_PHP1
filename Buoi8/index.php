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
            <th>avatar</th>
            <th>Thao tác</th>
        </tr>
        <?php
            // Kết nối tới CSDL
            include_once 'connection.php';
            // Truy vấn dữ liệu tới bảng nhanvien
            $sql = "SELECT * FROM nhanvien";
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
                <td><img style="width:100px" src="img/<?php echo $row['image'] ?>" alt=""></td>
                <td>
                    <a href="update.php">Sửa</a>
                    <a href="delete.php">xóa</a>
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