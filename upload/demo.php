<?php

// Kiểm tra nếu có file tải lên
// Chuyển file vào img
if(isset($_FILES['fileToUpload'])){
    // file chứa ảnh
    $target_dir = "img/";
    // lấy tên file ảnh
    $img = $_FILES["fileToUpload"] ["name"];
    // tạo đường dẫn ảnh
    $target_img = $target_dir . $img;
if(move_uploaded_file($_FILES['fileToUpload'] ['tmp_name'], $target_img)){
    echo "Tệp" . htmlspecialchars($img). "đã tải lên thành công";
}
else{
    echo "Đã xảy ra lỗi khi tải lên";
}

}

?>

<form action="<?php echo $SERVER["PHP_SELF"]; ?>" method="POST" enctype='multipart/form-data'>
    <h2>Tải file lên</h2>
    Chọn file
    <input type="file" name="fileToUpload">
    <input type="submit" name="submit" value="tải">
</form>