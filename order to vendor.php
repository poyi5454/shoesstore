<?php 
echo "HI";
include 'conn.php';
 if(isset($_POST['order_name']) && isset($_POST['order_details']) && isset($_POST['order_code'])  && isset($_POST['order_qty']) 
 && isset($_POST['order_price'])){
 // sweet alert 
 echo '
 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 $order_name = $_POST['order_name'];
 $order_details = $_POST['order_details'];
 $order_code = $_POST['order_code'];
$order_qty = $_POST['order_qty'];
$order_price = $_POST['order_price'];
echo  $order_name;



$cmd = $conn->prepare("INSERT INTO admin_oder (order_name,order_details,order_code,order_qty,order_price) value (:order_name,:order_details,:order_code,:order_qty,:order_price)");
$cmd->bindParam(':order_name', $order_name, PDO::PARAM_STR);
$cmd->bindParam(':order_details', $order_details, PDO::PARAM_STR);
$cmd->bindParam(':order_code', $order_code, PDO::PARAM_STR);
$cmd->bindParam(':order_qty', $order_qty, PDO::PARAM_STR);
$cmd->bindParam(':order_price', $order_price, PDO::PARAM_STR);
$result = $cmd->execute();
if($result){
    echo'<script>
                  setTimeout(function() {
                  swal({
                    title: "Success!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                    text: "Redirecting", //ข้อความเปลี่ยนได้ตามการใช้งาน
                    type: "success", //success, warning, danger
                    timer: 1000, //
                    showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                  }, function(){
                    window.location.href = "http://localhost/project/admin_oder.php?m_page=1"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                    });
                });
              </script>
                
                
                ';
       
            }else{
               echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "error",
                          text: "Pleass try agin",

                          type: "error"
                      }, function() {
                          window.location = "http://localhost/project/admin_oder.php?m_page=1"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            }
}


?>