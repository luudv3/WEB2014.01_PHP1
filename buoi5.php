<?php
// Mảng là tập hợp các phần tử có hoặc không cùng kiểu dữ liệu
// Mảng có 2 thành phần giá trị và vị trí

// Khai báo mảng
$mang = array(1,3,5,7); //bản php phiên bản 5.
$mang1 = [2,4,6,7]; //
var_dump($mang1);   //var_dump : check lỗi
echo "<br>";
// Mảng trong php
// Mảng rỗng
$arr = [];
print_r($arr);
echo "<br>";

// Mảng tuần tự
$phone =['iphone', 'sony', 'oppo', 'samsung'];
echo $phone[0];
echo "<br>";
echo $phone[1];
echo "<br>";
echo $phone[2];
echo "<br>";
echo $phone[3];

echo "<br>";
// duyệt mảng qua for đếm các phần tử
// count đếm phần tử
for($i = 0;$i < count($phone); $i++){
    echo $phone[$i] . " , ";
}

// dùng foreach để duyệt mảng
// foreach (mảng cần duyệt as key) {
    // thực hiện công việc
//}
echo "<br>";
foreach($phone as $nyc){
    echo $nyc;
}
echo "<br>";
// tạo 1 mảng ngẫu nhiên gồm 10 số là số nguyên
// hiển thị các số lẻ theo 2 cách for và foreach
// Đếm và tính tổng các phần tử chẵn trong mảng

$number = [1,2,3,4,5,6,7,8,15,16];
$count = 0;
$sum = 0;

foreach ($number as $numbers){
    if ($numbers %2 == 0){
        $count++;
        $sum += $numbers;
    }
}
echo "Tổng các phần tử chẵn trong mảng là: " . $count; 
echo "<br>";
echo "Tổng giá trị các số chẵn trong mảng là :" . $sum;
//Tìm phần tử lớn nhất trong mảng

// Mảng liên hợp (mảng liên kết)
// là mảng mà các phần tử được chỉ định bơi cá key (duy nhất)
// Cách khai báo
// $tên_mảng = [key => giá trị];

echo "<br>";
$arr = [
    "tôi" => "I",
    "yêu" => "love",
    "em" => "you",
    2023 => "very much"
];
// In ra giá trị
// $ten_mảng[key];

//Cách 1:
echo $arr['tôi'] . $arr['yêu'] . $arr['em'] . $arr['2023']; 
echo "<br>";
// cách 2: foreach
foreach($arr as $key){
    echo $key;
    echo " ";
}
echo "<br>";
// lấy cả key và giá trị
foreach ($arr as $key => $value){
    echo "$key: $value";
    echo " ";
}
echo "<br>";
// mảng đa chiều
// là 1 mảng chứa 1 hoặc nhiều mảng trong nó
// mảng tuần tự 2 chiều
$arr1=[
    [1,2,3],
    [4,5,6],
    [7,8,9]
];
// in ra giá trị
// cú phap: $ten_mang[vị trí mảng cần truy cập][vị trí của phần tử]

echo $arr1[0][0] . "<br>";
echo $arr1[0][2] . "<br>";
echo $arr1[1][1] . "<br>";
echo $arr1[2][2] . "<br>";
// in ra số 3, 5, 9
// duyệt mảng bằng foreach
foreach($arr1 as $row) {
    print_r($row);
    echo "<br>";
    foreach($row as $value){
        echo $value . "<br>";
    }
}

// Tính tổng các phần tử trong mảng bằng foreach
// khai báo biến $sum
$sum = 0;
foreach($arr1 as $row){
    foreach ($row as $value){
        $sum += $value;
    }
}
echo "Tổng các phần tử là: $sum";
echo "<br>";
// mảng liên hợp 2 chiều
// đây chính là mảng dữ liệu mà database trả cho chúng ta
$students = [
    [
        "name" => "Nguyễn Văn A",
        "age" => 18,
        "diemTB" => 9
    ],
    [
        "name" => "Nguyễn Văn B",
        "age" => 15,
        "diemTB" => 7
    ],
    [
        "name" => "Nguyễn Văn C",
        "age" => 20,
        "diemTB" => 3
    ]
    ];
// in ra giá trị
// cú pháp: $ten_mang[vị trí mảng muốn truy cập][key]
echo $students[0]["name"] . "<br>";
// in ra toàn bộ thông tin của người thứ 3
echo $students[2]["name"] . "<br>";
echo $students[2]["age"] . "<br>";
echo $students[2]["diemTB"] . "<br>";

// duyệt mảng bằng foreach
foreach ($students as $student){
    // print_r($student);
    // echo "<br>";
    foreach ($student as $value){
        echo $value . "<br>";
    }
}
// 1 số phương thức làm việc với mảng

$mang = [1,2,3,4,5,6,7,8,9,9,9,10,11];
// lấy ra phần tử cuối mảng
//echo array_pop($mang);
// Thêm 1 phần tử hoặc nhiều phần từ vào cuối mảng
// echo array_push($mang, 12, 13, 14);

// xóa phần tử đầu tiên trong mảng
// echo array_shift($mang);

// Thêm 1 hoặc nhiều phần tử vào đầu mảng
// echo array_unshift($mang, 11, 12, 13);

//Loại bỏ các phần từ có giá trị bằng nhau nhưng mà vị trí vẫn được giữ nguyên
print_r(array_unique($mang));
echo "<br>";
print_r($mang);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Xin chào các bạn</h1>
    <?php foreach ($students as $st) : ?>

    <?php 
        $ten = $st["name"];
    ?>
    <h3>Họ và tên: <?php echo $ten ?></h3>
    <h3>Tuổi: <?php echo $st['age'] ?></h3>
    <h3 style="<?php echo "color: red;" ?>">Điểm Trung bình: <?php echo $st['diemTB'] ?></h3>
    <?php endforeach; ?>
</body>
</html>