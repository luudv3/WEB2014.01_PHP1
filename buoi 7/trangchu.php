
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php">
        <button type="submit">Quay về trang form</button>
    </form>
    <?php
        // var_dump($_GET); // In ra dạng dữ liệu và giá trị
        // Của các biến được truyền vào qua phương thức GET
        $name = $_GET['ho_ten'];
        $sdt = $_GET['sdt'];
        echo "Đây là tên của tôi: ". $name . '<br>';
        
        echo "Đây là số điện thoại của tôi: ". $sdt;
    
    ?>
</body>
</html>