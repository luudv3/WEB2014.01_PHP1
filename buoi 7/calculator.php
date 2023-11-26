<?php
// if (isset($_GET['so_a']) && ($_GET['so_b'])) {
//     // Gán biến cho các phần tử trong mảng $_GET truyền đến
//      $so_a = $_GET['so_a'];
//      $so_b = $_GET['so_b'];
    
//      $tong = $so_a + $so_b;
//      $hieu = $so_a - $so_b;
//      $thuong = $so_a/$so_b;
//      $tich = $so_a*$so_b;
//      // Sử dụng các dữ liệu được truyền từ form get
//      echo "Số a: ". $so_a . '<br>';
//      echo "Số b: ". $so_b . '<br>';
//      echo "Tổng: ". $tong . '<br>';
//      echo "Hiệu: ". $hieu . '<br>';
//      echo "Thương: ". $thuong . '<br>';
//      echo "Tích: ". $tich . '<br>';
     
     
//  }
// && và
// || Hoặc
if (isset($_POST['so_a']) || isset($_POST['so_b'])) {
    // Gán biến cho các phần tử trong mảng $_POST truyền đến
     $so_a = $_POST['so_a'];
     $so_b = $_POST['so_b'];
    
     echo "Số a: ". $so_a . '<br>';
     echo "Số b: ". $so_b . '<br>';
   
    if ($so_a == 0) {
        if($so_b == 0){
            echo "PT có vô số nghiệm";
        }else{
            echo "PT vô nghiệm";
        }
    }else{
        if($so_b == 0){
            echo "PT có nghiệm x = 0";
        }else{
            echo "PT có nghiệm là". -$so_b/$so_a;
        }
    }
     
     
 }
?>