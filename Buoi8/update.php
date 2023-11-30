<?php
    // Kết nối tới CSDL
    include_once 'connection.php';
    // kiểm tra xem id có tồn tại hay không
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_select = "SELECT * FROM nhanvien WHERE id = $id";
        $resuilt = $conn->query($sql_select)->fetch();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cập nhật thông tin nhân viên</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $resuilt['id'] ?>">
        <p>Tên nhân viên</p> <input type="text" name="ten_nhanVien" value="<?php echo $resuilt['ten_nhanVien'] ?>">
        <p>Năm sinh</p> <input type="text" name="namSinh" value="<?php echo $resuilt['namSinh'] ?>">
        <p>Quê quán</p> <input type="text" name="queQuan" value="<?php echo $resuilt['queQuan'] ?>">
        <p>Số điện thoai</p> <input type="text" name="phone" value="<?php echo $resuilt['phone'] ?>">
        <p>Ảnh</p> <img style="width:100px" src="img/<?php echo $resuilt['image'] ?>" alt="">
        <br>
        <!-- Nút gửi thông tin -->
        <input type="submit" value="cập nhật" name="gui">
    </form>

    <?php
        if(isset($_POST['gui'])){
            //Lấy thông tin từ các trường nhập liệu
            $ten_nhanVien = $_POST['ten_nhanVien'];
            $namSinh = $_POST['namSinh'];
            $queQuan = $_POST['queQuan'];
            $phone = $_POST['phone'];
            $name_img = $resuilt['image'];

            // Kết nối CSDL
            // include_once 'connection.php';
            // // Tạo câu truy vấn
            // $sql_insert = "INSERT INTO nhanvien (ten_nhanVien, namSinh, queQuan,
            // phone, image)
            // VALUES ('$ten_nhanVien', '$namSinh', '$queQuan', '$phone', '$name_img')";
            // $resuilt = $conn->prepare($sql_insert);

            $sql_update = "UPDATE nhanvien SET ten_nhanVien = '$ten_nhanVien',
            namSinh = '$namSinh',queQuan = '$queQuan', phone = '$phone', 
            image = '$name_img' WHERE id = '$id'";
            $resuilt = $conn->prepare($sql_update);
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