<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET-POST trong php</title>
</head>
<body>
    <!-- form là một biểu mẫu cho phép nhập dữ liệu
    form được xác định bằng thẻ <form action=""></form> -->
    
    <!-- Trong form có 2 thành phần chính là action và method  -->
    <!-- Form thì có 2 loại là form GET và form POST  -->

    <!-- action -->
    <!-- dùng để xác định nơi mà dữ liệu sẽ gửi đến khi ấn submit -->
    <!-- nếu action="" thì đích đến chính là trang chứa form  -->

    <!-- <form action="trangchu.php" method="">
        <button type="submit">Gửi đi em ơi</button>
    </form> -->


    <!-- method -->
    <!-- Xác định phương thức gửi dữ liệu đi  -->
    <!-- là GET POST -->



    <!-- FORM GET  -->
    <!-- <form action="" method="get">
        <label for="">Tài khoản:</label>
        <input type="text" name="username">
        <br>
        <label for="">Mật khẩu:</label>
        <input type="password" name="pass">
        <br>
        <button type="submit">Gửi dữ liệu đi</button>
    </form> -->

    <!-- <form action="calculator.php" method="get">
        <label for="">Nhập số a:</label>
        <input type="number" name="so_a">
        <label for="">Nhập số b:</label>
        <input type="number" name="so_b">
        <button type="submit">Tính toán dữ liệu</button>
    </form> -->
    <br>
    <?php
        // var_dump($_GET); // In ra dạng dữ liệu và giá trị
        // Của các biến được truyền vào qua phương thức GET

        // Kiểm tra xem có dữ liệu GET truyền vào không 
        // isset kiểm tra nó có truyền vào không
        // empty kiểm tra xem có rỗng không
        if (!empty($_GET['ho_ten']) && ($_GET['sdt'])) {
           // Gán biến cho các phần tử trong mảng $_GET truyền đến
            $name = $_GET['ho_ten'];
            $sdt = $_GET['sdt'];

            // Sử dụng các dữ liệu được truyền từ form get
            echo "Đây là tên của tôi: ". $name . '<br>';
            
            echo "Đây là số điện thoại của tôi: ". $sdt;
        }
        

        // Ví dụ: Tạo form get gồm
        // Nhập số a
        // nhập số b 
        // Truyền dữ liệu sang trang calculator.php 
        // Tính tổng a,b
        // Tính tích a,b 
        // Tính thương a,b 
        // Tính hiệu a,b 

    ?>

     <!-- FORM POST  -->
     <form action="calculator.php" method="post">
        <label for="">Nhập số a:</label>
        <input type="number" name="so_a">
        <label for="">Nhập số b:</label>
        <input type="number" name="so_b">
        <button type="submit">Tính toán dữ liệu</button>
    </form>


    <!-- PHÂN BIỆT GET POST  -->
    <!-- GET gửi dữ liệu công khai trên params - thanh url
    GET có thể không cần sử dụng form - chỉ thêm dữ liệu vào thanh URL 
    GET sẽ bị lưu lịch truy cập => Dễ bị khai thác  -->
    <!-- POST gửi dữ liệu qua body(http) một cách ẩn danh 
    và không bị lưu vào lịch sử truy cập
    POST yêu cầu phải dùng form thì mới gửi dữ liệu đi được -->

    <!-- Ví dụ: =
    Bài 1: Tạo form sử dụng phương thức GET  để truyền vào:
        - Tên của bạn
        - Năm sinh của bạn(1999)
        - Quê quán 
        - Tên NYC
    Gửi dữ liệu sang trang thongtin.php hiển thị:
        - Tên của bạn 
        - Tuổi của bạn(21)
        - Quê quán
        - Tên NYC

    Bài 2: Tạo form sử dụng POST để truyền vào biến a và b 
    => Giải phương trình bậc 1  -->

</body>
</html>