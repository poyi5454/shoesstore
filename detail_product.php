<?php 
session_start(); 
include "function.php";
include "function-page.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>ร้านค้าออนไลน์</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="images/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css_style_index.css" />
<link rel="stylesheet" type="text/css" href="css_style_menu.css" />
<link rel="stylesheet" type="text/css" href="css_style_board.css" />
<link rel="stylesheet" type="text/css" href="css_style_page.css" />
</head>
<body id="Page1">
<div id="container">
  <div id="bander_front">
    <?php include "bander_front.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?php include "menu_top1.php"; ?>
      	</p>
    </div>
  </div>
  
 <div class="menu_left"><!-- เมนูด้านซ้าย -->
	<?php  include "menu_left_front.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
	  <table width="100%" height="850" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><div class="title">
              <h2><img src="images/diagram-60.png" width="48" height="48" /> รายละเอียดสินค้า</h2>
          </div>
              <table border="0" cellpadding="0" cellspacing="0" style="border-top: 0px solid #eee; width:100%; padding:0px; margin:0px;">
                <tr>
                  <td align="left" valign="middle"><?php
//ติดต่อฐานข้อมูล
include "connect_db.php";

//
if(!isset($start)){
$start = 0;
}
$limit = 20;//$NUMMAX; // แสดงผลหน้าละกี่หัวข้อ
$Search = trim($_POST['txtSearch']); //ตัดซ่องวางของสตริง

if(!$_GET['ID']==""){
	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$product." WHERE prd_id='".$_GET['ID']."'"); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record 
	$Query = mysqli_query($con,"SELECT * FROM ".$product." WHERE prd_id='".$_GET['ID']."' ORDER BY prd_id DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง
}else{
	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$product.""); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record 
	$Query = mysqli_query($con,"SELECT * FROM ".$product." ORDER BY prd_id DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง
}



$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า
//
$cols = 1; 
$c = $cols;
?>
                    <table style="width: 100%; ">
                      <tr>
                        <?php
while($result = mysqli_fetch_array($Query)){
$detail_product = substr($result['prd_detail'], 0, 70) . "...";
$c --;2
?>
                        <td align="left" valign="top" id="prd_bottom">
						<div style="text-align:center; margin-top: 10px;"><a href="Product/<?php echo $result['prd_photo']; ?>" rel="lightbox" title="<?php echo $result['prd_name'];?>" > 
						  <?php
			 // ถ้ามีรูปสินค้าให้แสดง แต่ถ้าไม่มีให้ แสดงภาพรอรูป
			  if(!$result['prd_photo']==""){ ?>
						  <img  class="photo" src="Product/<?=$result['prd_photo']?>" width="170" height="204" border="0" /> </a>
                          <?php }else{ ?>
                          <a href="images/photo.jpg" rel="lightbox" title="รอรูปสินค้า" > <img class="photo" src="images/photo.jpg" width="170" height="204" border="0" /> </a>
                          <?php } ?>
						  <p style="padding:5px;">
						  <h2><?php echo $result['prd_name']; ?></h2> 
						  </p>
                          </div>
                                <div id="prd_line_height" style="padding:10px; font-size:15px;">
                                <ul id="prd_ul" style="margin-top: 10px;">
                                <!--   
								<li> <strong><?php echo $result['prd_name']; ?></strong> </li>
								-->
								  <li style="padding:5px;"><?php echo  $result['prd_detail']; ?></li>

								  <li> ราคา: <samp  style="color:red;">
                                    <b>฿<?php echo number_format($result['prd_price'],2); ?></b>
                                  </samp> บาท </li>
                        		 <li style="font-size:12px;"> <strong>สต๊อกสินค้า</strong> : <samp style="color:red;"><?php echo $result['prd_stock']; ?></samp> <strong>ชิ้น</strong></li>
									<li style="padding-top: 10px;">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="from1" id="from1" onsubmit="return chk_num();">

                                        <input name="add_basket" type="submit" id="add_basket" value="หยิบใส่ตระกร้า" class="txt_btn" />
										<input name="back" type="submit" id="back"  onClick="(history.back())" value="ย้อนกลับ" class="txt_btn" />
 
                                        <input type="hidden" name="ID" value="<?php echo $result['prd_id']; ?>" />
                              </form>
                                    </li>
                                </ul>
                            </div></td>
                            <?php
	if($c == 0) {
	$c = $cols;
?>
                      </tr>
                      <?php } } ?>
                    </table></td></tr>
              </table>
            <p>&nbsp;</p>
            <div class="title">
              <h2><img src="images/diagram-60.png" width="48" height="48" /> ข้อมูลสินค้า </h2>
            </div>            
            <table border="0" cellpadding="0" cellspacing="0" style="border-top: 0px solid #eee; width:100%; padding:0px; margin:0px;">
                <tr>
                  <td align="left" valign="middle"><?php
//ติดต่อฐานข้อมูล
include "connect_db.php";

//
if(!isset($start)){
$start = 0;
}
$limit = 10;//$NUMMAX; // แสดงผลหน้าละกี่หัวข้อ
$Search = trim($_POST['txtSearch']); //ตัดซ่องวางของสตริง

	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$product." WHERE(prd_name LIKE '%".$Search."%') "); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record 
	$Query = mysqli_query($con,"SELECT * FROM ".$product." WHERE(prd_name LIKE '%".$Search."%') ORDER BY prd_id DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง

$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า
//
$cols = 2; 
$c = $cols;
?>
                      <table style="width: 100%; ">
                        <tr>
                          <?php
while($result = mysqli_fetch_array($Query)){
$detail_product = substr($result['prd_detail'], 0, 33) . "...";
$c --;2
?>
<?PHP
if(!empty($result['prd_photo'])){
		        $xy = @getimagesize("Product/".$result['prd_photo']."");
                        $tx = $xy[0];
                        $ty = $xy[1];
	

			$x = 110;
			$y = $ty/$tx;
			$y = $y * 110;
}
?>
                          <td align="left" valign="top" id="prd_bottom"><div id="prd_photo">
                              <?PHP
			 // ถ้ามีรูปสินค้าให้แสดง แต่ถ้าไม่มีให้ แสดงภาพรอรูป
			  if(!$result['prd_photo']==""){ ?>
                              <a href="detail_product.php?ID=<?php echo $result['prd_id']; ?>"><img  class="photo" src="Product/<?php echo $result['prd_photo']; ?>" width="<?php echo $x; ?>" height="<?php echo $y; ?>"/></a>
                              <?php }else{ ?>
                              <a href="detail_product.php?ID=<?=$result['prd_id']?>"> <img class="photo" src="images/photo.jpg" width="110" height="132" border="0" /> </a>
                              <?php } ?>
                            </div>
                              <div id="prd_line_height">
                                <ul id="prd_ul" style="margin-top: 10px;">
                                  <li> <strong><u> <?php echo $result['prd_name']; ?></u></strong></li>
								  <li style="font-size:12px; padding:5px;"> <?php echo $detail_product; ?></li>

								  <li> ราคา: <samp  style="color:red;">
                                    <b>฿<?php echo number_format($result['prd_price'],2); ?></b>
                                  </samp> บาท </li>
								  
								   <li style="font-size:12px;"> สต๊อกสินค้า :<samp style="color:red;"><?php echo $result['prd_stock']; ?>
                                </samp>ชิ้น</li>
                         
								  <li style="padding-top: 10px;">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="from1" id="from1" onsubmit="return chk_num();">

                                        <input name="add_basket" type="submit" id="add_basket" value="หยิบใส่ตระกร้า" class="txt_btn" />
                                        <input name="btn_detail" type="submit" id="btn_detail" value="รายละเอียด" class="txt_btn" />
                                        <input type="hidden" name="ID" value="<?php echo $result['prd_id']; ?>" />
                              </form>
                                  </li>
                                </ul>
                            </div></td>
                          <?php
	if($c == 0) {
	$c = $cols;
?>
                        </tr>
                        <?php } } ?>
                    </table></td>
                </tr>
            </table>
            <p>&nbsp;</p></td>
        </tr>
      </table>
	  <p>&nbsp;</p>
    </div>
	  
<!-- เมนูด้านซ้าย -->
  <p style="clear:both;"></p>
<!-- ปิด เมนูด้านซ้าย -->
	  
  </div>
<div id="footer_front">
	<div class="data_footer">
      <p>
        <?PHP include "footer.php"; ?>
        <?PHP
			if($_POST['add_basket']){
				echo "<meta http-equiv='refresh' content='0; url=add_basket_product.php?ID=".$_POST['ID']."&txt_num=1'>";
			}else if($_POST['btn_detail']){
				echo "<meta http-equiv='refresh' content='0; url=detail_product.php?ID=".$_POST['ID']."'>";
			}
		?>
      </p>
      
	</div>
	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
