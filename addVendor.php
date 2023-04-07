<?php 
include 'conn.php';
 if(isset($_POST['vendor_code']) && isset($_POST['order_date']) && isset($_POST['vendor_name'])  && isset($_POST['vendor_address']) 
 && isset($_POST['vendor_tel']) && isset($_POST['admin_name'])){
 // sweet alert 
 echo '
 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 $vendor_code = $_POST['vendor_code'];
 $order_date = $_POST['order_date'];
 $vendor_name = $_POST['vendor_name'];
$vendor_address =  $_POST['vendor_address'];
$vendor_tel = $_POST['vendor_tel'];
$admin_name = $_POST['admin_name'];



$cmd = $conn->prepare("INSERT INTO vendor (vendor_code,vendor_name,vendor_address,vendor_tel,admin_add,order_date) value (:vendor_code,:vendor_name,:vendor_address,:vendor_tel,:admin_name,:order_date)");
$cmd->bindParam(':vendor_code', $vendor_code, PDO::PARAM_STR);
$cmd->bindParam(':vendor_name', $vendor_name, PDO::PARAM_STR);
$cmd->bindParam(':vendor_address', $vendor_address, PDO::PARAM_STR);
$cmd->bindParam(':vendor_tel', $vendor_tel, PDO::PARAM_STR);
$cmd->bindParam(':admin_name', $admin_name, PDO::PARAM_STR);
$cmd->bindParam(':order_date', $order_date, PDO::PARAM_STR);
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