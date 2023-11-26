<?php
// Kiểm tra nếu có file tải lên
// chuyển file vào img

if (isset($_FILES['fileToUpload'])){
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
?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" 
enctype="multipart/form-data">
    <h2>Tải tệp lên</h2>
    Chọn file tải lên:
    <input type="file" name="fileToUpload">
    <input type="submit" name="submit" value="tải file">
</form>