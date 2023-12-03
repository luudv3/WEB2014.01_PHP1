<?php
    session_start();
    // kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng tới trang login

    if (!isset($_SESSION['user']) && !isset($_SESSION['password'])) {
        header('location: login.php');
        exit();
    }
?>
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
        <input type="file" name="fileToUpload">
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
            <option value="<?php echo $row['id_phongBan']?>" 
            <?php echo $row['id_phongBan'] == $resuilt['id_phongBan'] ? "selected" : ""  ?>>
                        <?php echo $row['ten_phongBan'] ?>
            </option>
            <?php
                }
            ?>
         </select>
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
            $id_phongBan = $_POST['id_phongBan'];
            $img = $resuilt['image'];

            if (isset($_FILES['fileToUpload'])&& $_FILES["fileToUpload"]["tmp_name"]){
                //file chứa ảnh
                $target_dir = "img/";
                // lấy tên file ảnh
                $img = $_FILES["fileToUpload"] ["name"];
                // tạo đường dẫn ảnh
                $target_img = $target_dir . $img;
            
                if(move_uploaded_file($_FILES['fileToUpload'] ['tmp_name'], $target_img )){
                    echo "Tệp" .htmlspecialchars($img) . "đã tải lên thành công";
                }
                else {
                    echo "đã xảy ra lỗi khi tải lên";
                }
            }

            // Kết nối CSDL
            // include_once 'connection.php';
            // // Tạo câu truy vấn
            // $sql_insert = "INSERT INTO nhanvien (ten_nhanVien, namSinh, queQuan,
            // phone, image)
            // VALUES ('$ten_nhanVien', '$namSinh', '$queQuan', '$phone', '$name_img')";
            // $resuilt = $conn->prepare($sql_insert);

            $sql_update = "UPDATE nhanvien SET ten_nhanVien = '$ten_nhanVien',
            namSinh = '$namSinh',queQuan = '$queQuan', phone = '$phone', 
            image = '$img', id_phongBan = '$id_phongBan' WHERE id = '$id'";
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