<?php
    session_start();
    // kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng tới trang login

    if (!isset($_SESSION['user']) && !isset($_SESSION['password'])) {
        header('location: login.php');
        exit();
    }
?>
<?php
//validate : Không mhaapj thông tin => không cho thêm thông tin
$error = [];
if(isset($_POST['gui'])){
    //Lấy thông tin từ các trường nhập liệu
    $ten_nhanVien = $_POST['ten_nhanVien'];
    $namSinh = $_POST['namSinh'];
    $queQuan = $_POST['queQuan'];
    $phone = $_POST['phone'];
    $id_phongBan = $_POST['id_phongBan'];
    // kiểm tra đã nhập tên nhân viên chưa
    if(empty($ten_nhanVien)) {
        // nếu như tên để trống tả về true
        $error["ten_nhanVien"] = "Bạn chưa nhập tên";
    }
    // kiểm tra đã nhập năm sinh nhân viên chưa
    if(empty($namSinh)) {
        // nếu như tên để trống tả về true
        $error["namSinh"] = "Bạn chưa nhập năm sinh";
    }

    // valide quê quán
    if(empty($queQuan)) {
        // nếu như tên để trống tả về true
        $error["queQuan"] = "Bạn chưa nhập quê quán";
    }
    // valide số điện thoại
    if(empty($phone)) {
        // nếu như tên để trống tả về true
        $error["phone"] = "Bạn chưa nhập số điện thoại";
    } elseif (!is_numeric($phone)) {
        $error["phone"] = "số điện thoại không hợp lệ";
    }

    $name_img = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_img, 'img/'.$name_img);

    // Kết nối CSDL
    include_once 'connection.php';

    // Tạo câu truy vấn
    if (empty($error)) {
        $sql_insert = "INSERT INTO nhanvien (ten_nhanVien, namSinh, queQuan, phone, image, id_phongBan)
        VALUES ('$ten_nhanVien', '$namSinh', '$queQuan', '$phone', '$name_img', '$id_phongBan')";
        $resuilt = $conn->prepare($sql_insert);

        if($resuilt->execute()){
        header('location: index.php');
        // Nếu thêm thành công sẽ chuyển hướng qua trang index
            } else {
        echo "Không thêm được";
            }
        }
    }
       

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>Tên nhân viên</p>
        <input type="text" name="ten_nhanVien">
        <span style ="color:red";><?php echo isset($error["ten_nhanVien"]) ? $error["ten_nhanVien"] : '' ?></span>
        <p>Năm sinh</p>
        <input type="text" name="namSinh">
        <span style ="color:red";><?php echo isset($error["namSinh"]) ? $error["namSinh"] : '' ?></span>
        <p>Quê quán</p>
        <input type="text" name="queQuan">
        <span style ="color:red";><?php echo isset($error["queQuan"]) ? $error["queQuan"] : '' ?></span>
        <p>Số điện thoai</p>
        <input type="text" name="phone">
        <span style ="color:red";><?php echo isset($error["phone"]) ? $error["phone"] : '' ?></span>
        <p>Ảnh</p>
        <input type="file" name="image">
       
        <p>ID Phòng Ban</p>
         <!-- Sử dụng select để chọn id của phòng ban -->
         <select name="id_phongBan" id="">
            <?php
                // Kết nối tới CSDL
                include 'connection.php';
                $sql = "SELECT * FROM phongban";
                $kq = $conn->query($sql);
                foreach($kq as $row){
            ?>
            <!-- Hiển thị danh sách các phòng để chọn -->
            <option value="<?php echo $row['id_phongBan']?>">
                        <?php echo $row['ten_phongBan'] ?>
            </option>
            <?php
                }
            ?>
         </select>
        <br>
        <!-- Nút gửi thông tin -->
        <input type="submit" value="Thêm" name="gui">
    </form>
</body>

</html>