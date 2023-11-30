<?php
// Kết nối với CSDL
include_once 'connection.php';

// kiểm tra ID
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //id được truyền qua URL

    // Tạo truy vấn để thực hiện xóa
    $sql_delete = "DELETE FROM nhanvien WHERE id=$id";
    $resuilt = $conn->prepare($sql_delete);
    if($resuilt->execute()){
        header('location: index.php');
        //Nếu thêm thành công sẽ chuyển hướng qua trang index
    }
    else{
        echo "Không xóa được";
    }
}

?>