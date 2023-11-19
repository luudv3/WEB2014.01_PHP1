<?php
//Function: gọi là hàm dùng để đóng gói 1 chức năng
// trong chương trình

// Cấu trúc:
// fuction tenham(){
//  khối lệnh
//}
// gọi hàm
/*
4 loại hàm:
    + Hàm không có tham số và không có giá trị trả về
    sử dụng hàm không có return hiển thị giá trị ra màn hình
    + Hàm không có tham số và có giá trị trả về
    + Hàm có tham số và không có giá trị trả về
    + Hàm có tham số và có giá trị trả về 
*/
//Hàm không có tham số và không có giá trị trả về

function hello(){
    echo "xin chào";
}
hello();
echo "<br>";
// Tinh tổng 2 biến
function sum(){
    $a = 5;
    $b = 6;
    $tong = $a + $b;
    echo "kết quả: " . $tong;
}
sum();
echo "<br>";
//Hàm không có tham số và có giá trị trả về
// Tinh tổng 2 biến
function sum1(){
    $a = 5;
    $b = 6;
    $tong = $a + $b;
    echo "kết quả: " . $tong;
    return $tong;
}
sum1();

//Hàm có tham số và không có giá trị trả về
echo "<br>";
function tinhTong($a, $b){ // tham số
    $tong = $a + $b;
    echo $tong;
}
tinhTong(7, 8);

//Hàm có tham số và có giá trị trả về
echo "<br>";
function tinhTong1($a, $b){ // tham số
    $tong = $a + $b;
    echo $tong;
    return $tong;
}
tinhTong1(7, 8);

// Lab 2:
// Sử dụng hàm không có tham số và hàm không có tham số
//Tính phương trình bậc 1
// sử dụng hàm có tham số có giá trị trả về
// Tính diện tích hình thang
// Kiểm tra số truyền vào có phải là số nguyên tố hay không
// sử dụng 2 cách: hàm trả về và hàm không trả về
?>