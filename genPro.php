<?php
session_start();
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
?>
<?php
if(count($_POST)>0){
  $_SESSION['sv_code'][time()]=$_POST['v_code'];
    $_SESSION['ses_ordername'][time()]=$_POST['order_name'];
    $_SESSION['ses_orderdetails'][time()]=$_POST['order_details'];
    $_SESSION['ses_proname'][time()]=$_POST['pro_name'];
    $_SESSION['ses_ordercode'][time()]=$_POST['order_code'];
    $_SESSION['ses_orderqty'][time()]=$_POST['order_qty'];
    $_SESSION['ses_orderprice'][time()]=$_POST['order_price'];
}
if($_GET['clear']){
  unset($_SESSION['sv_code']);
    unset($_SESSION['ses_ordername']);
    unset($_SESSION['ses_orderdetails']);  
    unset($_SESSION['ses_proname']);     
    unset($_SESSION['ses_ordercode']); 
    unset($_SESSION['ses_orderqty']);  
    unset($_SESSION['ses_orderprice']);    
}
?>
<?php if(isset($_GET['showDtata'])){ ?>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td width="12%" height="10" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>รหัสใบสั่งซื้อ</strong></td>
                          <td width="13%" height="30" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>ชื่อสินค้า</strong></td>
                          <td width="11%" height="30" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>ข้อมูล</strong></td>
                          <td width="15%" height="30" align="center" valign="middle" bgcolor="#999999" class="sellright"><strong>สินค้า(CODE)</strong></td>
                          <td width="15%" height="30" align="center" valign="middle" bgcolor="#999999" class="sellright"><strong>จำนวน</strong></td>
                          <td width="15%" height="30" align="center" valign="middle" bgcolor="#999999" class="sellright"><strong>ราคา/หน่วย</strong></td>
                          <td width="15%" height="30" align="center" valign="middle" bgcolor="#999999" class="sellright"><strong>ผู้จัดซื้อสินค้า</strong></td>
  </tr>
<?php
$i=1;
if(count($_SESSION['ses_proname'])>0){
    foreach($_SESSION['ses_proname'] as $key=>$value){
?>  
  <tr>
    <td align="center"><?=$i?></td>
    <td align="left"> &nbsp; <?=$_SESSION['ses_ordername'][$key]?></td>
    <td align="left"> &nbsp; <?=$_SESSION['ses_orderdetails'][$key]?></td>
    <td align="left"> &nbsp; <?=$_SESSION['ses_ordercode'][$key]?></td>
    <td align="left"> &nbsp; <?=$_SESSION['ses_orderqty'][$key]?></td>
    <td align="left"> &nbsp; <?=$_SESSION['ses_orderprice'][$key]?></td>
    <td align="left"> &nbsp; <?=$_SESSION['ses_proname'][$key]?></td>
  </tr>
<?php
        $i++;
    }
 } ?>  
   <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
   
  </tr>
</table>
<input type="button" name="Clear" id="Clear" value="Clear"></td>

<!-- <form  method="post" action="" style="margin-top:30px;">
<div style="margin-top:30px;">
     <button type="submit"> Submit </button>
     </form> -->
</div>
<?php } ?>

<?php 
include 'conn.php';
 if(isset($_POST['v_code'])  && isset($_POST['pro_name']) && isset($_POST['order_name']) && isset($_POST['order_details']) && isset($_POST['order_code'])  && isset($_POST['order_qty']) 
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
$v_code = $_POST['v_code'];
$order_admin_by	 = $_POST['pro_name'];



$cmd = $conn->prepare("INSERT INTO admin_oder (v_code,order_admin_by,order_name,order_details,order_code,order_qty,order_price) value (:v_code,:order_admin_by,:order_name,:order_details,:order_code,:order_qty,:order_price)");
$cmd->bindParam(':order_name', $order_name, PDO::PARAM_STR);
$cmd->bindParam(':order_admin_by', $order_admin_by, PDO::PARAM_STR);
$cmd->bindParam(':v_code', $v_code, PDO::PARAM_STR);
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