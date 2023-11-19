<?php 
// Vòng lặp for
// Cấu trúc vòng lặp for

// For (Giá trị khởi tạo; Điều kiện; Bước nhảy) {
// Thực hiện vòng lặp
//}

// sử dụng vòng lặp for in ra các số từ 1-5

for ($i =1;$i <=5; $i++ ){
    echo $i;
}

// sử dụng vòng lặp for in ra các số chẵn
// sử dụng vòng lặp for tính tổng liên tục
$n = 0;
for ($i =1; $i <= 10; $i++){
    $n += $i;
}
echo "<br>";
echo "Tổng các số từ 1 đến 10 là:" . $n;
echo "<br>";

// sử dụng vòng lặp for để in ra hình tam giác
$ChieuCao = 5;
for ($i =1; $i <= $ChieuCao; $i++){
    //echo "*";
    for ($j =1; $j <=$i; $j++){
        echo "*";
    }
    echo "<br>";
}

//LAB 1
//sử dụng vòng lặp for để in ra hình chữ nhật
//sử dụng vòng lặp for để in ra bảng cửu chương

for ($i = 1; $i <= 10; $i++) {
    //echo "Bảng cửu chương $i";
    echo "<br>";
    for ($j = 1; $j <= 10; $j++) {
        $kq = $i * $j;
        echo "$i x $j = $kq";
        echo "<br>";
    }
    echo "\n"; // Xuống dòng sau khi in xong 1 bảng cửu chương
}
?>