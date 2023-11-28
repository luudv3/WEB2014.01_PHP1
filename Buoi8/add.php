<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>Tên nhân viên</p> <input type="text" name="ten_nhanVien">
        <p>Năm sinh</p> <input type="text" name="namSinh">
        <p>Quê quán</p> <input type="text" name="queQuan">
        <p>Số điện thoai</p> <input type="text" name="phone">
        <p>Ảnh</p> <input type="file" name="image">
        <br>
        <!-- Nút gửi thông tin -->
        <input type="submit" value="Thêm" name="gui">
    </form>

    <?php
        if(isset($_POST['gui'])){
            //Lấy thông tin từ các trường nhập liệu
            $ten_nhanVien = $_POST['ten_nhanVien'];
            $namSinh = $_POST['namSinh'];
            $queQuan = $_POST['queQuan'];
            $phone = $_POST['phone'];
            $name_img = $_FILES['image']['name'];
            $tmp_img = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_img, 'img/'.$name_img);

            // Kết nối CSDL
            include_once 'connection.php';
            // Tạo câu truy vấn
            $sql_insert = "INSERT INTO nhanvien (ten_nhanVien, namSinh, queQuan,
            phone, image)
            VALUES ('$ten_nhanVien', '$namSinh', '$queQuan', '$phone', '$name_img')";
            $resuilt = $conn->prepare($sql_insert);
            if($resuilt->execute()){
                header('location: index.php');
                //Nếu thêm thành công sẽ chuyển hướng qua trang index
            }
            else{
                echo "Không thêm được";
            }
            }
    ?>
</body>

</html>