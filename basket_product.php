<?php 
include "session_user.php";
include "function.php";
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
<link rel="stylesheet" type="text/css" href="css_style_page.css" /></head>
<body id="Page1">
<div id="container">
  <div id="bander_front">
    <?PHP include "bander_front.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?PHP include "menu_top1.php"; ?>
      	</p>
    </div>
  </div>
  
 <div class="menu_left"><!-- เมนูด้านซ้าย -->
	<?PHP  include "menu_left_front.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
	  <table width="100%" height="850" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><div class="title">
              <h2><img src="images/diagram-60.png" width="48" height="48" /> ตะกร้าสินค้า </h2>
          </div>
            <form action="<?=$_SESSION['PHP_SELF']?>" method="post" name="FromSellPrd" id="FromSellPrd" onsubmit="return CHLSellprd();">
         <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#ECE9D8" bgcolor="#F5F5F5">
           <tr>
             <td class="sell" width="9%" height="30" bgcolor="#E9E3DB"><div align="center"><strong>ลบ</strong></div></td>
             <td class="sell" width="46%" height="30" bgcolor="#E9E3DB"><div align="left" style="padding-left: 5px;"><strong>รายการสินค้า</strong></div></td>
             <td  width="14%" bgcolor="#E9E3DB" class="sell"><div align="center"><strong>จำนวน</strong></div></td>
             <td class="sell"  width="15%" bgcolor="#E9E3DB"><div align="center"><strong>ราคา/หน่วย</strong></div></td>
             <td class="sellright"  width="16%" height="30" bgcolor="#E9E3DB"><div align="center"><strong>รวม</strong></div></td>
           </tr>
           <?php
if(count($_SESSION['sess_id'])=="0"){
echo "<script>alert('ไม่มีสินค้า')</script>";
echo "<meta http-equiv='refresh' content='0; url=product_new.php'>";
}else{
?>
<?PHP
	//หาภาษี
	for($i=0;$i<count($_SESSION['sess_id']);$i++){

	$total_unit_price = $_SESSION['sess_num'][$i] * $_SESSION['sess_price'][$i];
	$total_price = $total_price + $total_unit_price;

	?>
           <tr>
             <td  class="sell1" height="30" bgcolor="#FFFFFF">
			 <div style="text-align:center;">
			 <input type="checkbox" name="prd_del[]" value=<?=$_SESSION['sess_id'][$i]?> />
			 </div>			 </td>
             <td class="sell1" height="30" bgcolor="#FFFFFF">
			 <div style="padding-left: 5px;"><?php echo $_SESSION['sess_name'][$i]; ?></div>			 </td>
             <td height="30" bgcolor="#FFFFFF" class="sell1">
			 <div align="center">
			 <input type="text" name="prd_num[]" value="<?=$_SESSION['sess_num'][$i]?>" style="width: 40px; height: 19px; text-align:center; border: 1px solid #ccc;" />
			 </div></td>
             <td class="sell1" height="30" bgcolor="#FFFFFF">
			 <div align="center"><?php echo "".number_format($_SESSION['sess_price'][$i],2).""; ?> บาท </div></td>
             <td class="sellright1" height="30" bgcolor="#FFFFFF"><div align="center"><? echo "".number_format($total_unit_price,2).""; ?> บาท </div></td>
           </tr>
           <?php 
			} }
			?>
           <tr>
             <td class="sell1" height="25" colspan="4" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"><b>รวมราคา : </b></div></td>
             <td class="sellright1" height="25" bgcolor="#FFFFFF">
			 <div align="center"><u><?=number_format($total_price,2)?></u> บาท</div>			 </td>
           </tr>
		   
           <?php $_SESSION['sess_Total']=$total_price; ?>
           <tr>
             <td class="sell1" height="25" colspan="4" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"><b>ยอดที่ต้องสั่งซื้อ : </b></div></td>
             <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center" style="color:red; font-weight:bold;"><u>
                 <?=number_format($total_price,2)?></u> บาท</div></td>
           </tr>
		    <tr>
              <td height="25" colspan="5" align="right" valign="middle" bordercolor="#F5F5F5" bgcolor="#FFFFFF" class="sell1">
			  <div align="right"><strong style="color:red;">เลือกรูปแบบการจัดส่งสินค้า</strong> : 

                      <select name="txtEms">
					  <?PHP
					  include "connect_db.php";
					  $sql_ems = mysqli_query($con,"SELECT * FROM $ems ORDER BY ems_price ASC");
					  while($ems = mysqli_fetch_array($sql_ems )){
					  $ems_id = $ems['ems_id'];
					  $ems_name = $ems['ems_name'];
					  $ems_price = $ems['ems_price'];
					  	echo "<option value=".$ems_id.">".$ems_name." ราคา ".$ems_price." บาท</option>";
					  }
					  
					  ?>
                      </select>

                  </div>
			  </td>
              </tr>
           <tr>
             <td class="sellright1" height="50" colspan="5" align="center" bordercolor="#F5F5F5" bgcolor="#EAEAEA"><p><span style="border:0px;"><span style="text-align:right; padding-top:5px;"> </span>
               <input  type="submit" name="complete" value="สั่งซื้อสินค้า" />
               <input  type="submit" name="calculate" value="คำนวนใหม่" />
               <input name="btn_add"  type="submit" id="btn_add" value="ซื้อเพิ่ม" />
               <input type="hidden" name="ID" value="<?=$_GET['ID']?>" />
</span></p></td>
           </tr>
         </table>
		</form>
            <p>&nbsp;</p>
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
        <span style="padding-top:30px; text-align:center; font-size:11px; ">
        <?php
if($_POST){

	if(count($_POST['prd_del'])==0){
			    $_POST['prd_del']=array();
	}
		for($i=0; $i<count($_SESSION['sess_id']);$i++) {
				
				if (!in_array($_SESSION['sess_id'][$i], $_POST['prd_del'])){
				
					$_POST['temp_id'][]=$_SESSION['sess_id'][$i];
					$_POST['temp_name'][]=$_SESSION['sess_name'][$i];				
					$_POST['temp_price'][]=$_SESSION['sess_price'][$i];
					
					
					
					
					
								
					//ส่วนของการตรวจสอบ สินค้าที่ลูกค้าสั่งเกิน
					include "connect_db.php";
					if(!is_numeric($_POST['prd_num'][$i])){ // ตรวจสอบกรอกจำนวนสินค้าให้ถูก
								exit("<script>alert('กรุณากรอกจำนวนสินค้าให้ถูกด้วยนะ!');(history.back());</script>");
								}else if(strpos($_POST['prd_num'][$i],".") !== false){
								exit("<script>alert('กรุณากรอกจำนวนสินค้าให้ถูกด้วยนะ!');(history.back());</script>");
								}
										//ส่วนของการตรวจสอบ สินค้าที่ลูกค้าสั่งเกิน
										$sql = mysqli_query($con,"SELECT * FROM ".$product." WHERE prd_id='".$_SESSION['sess_id'][$i]."'");
											$rst = mysqli_fetch_array($sql);
											$stock = $rst['prd_stock'];
											$name = $rst['prd_name'];
											
										if($stock < $_POST['prd_num'][$i]){
											exit("<script>alert('สินค้า ".$name." ที่คุณสั่งซื้อไม่พอ คุณสามารถสั่งซื้อสินค้าได้ ".$stock."');(history.back());</script>");
											}else if($_POST['prd_num'][$i]<1){
											exit("<script>alert('กรุณากรอกจำนวนให้ถูกต้องด้วยนะ!');(history.back());</script>");
											}else{
											$_POST['temp_num'][]=$_POST['prd_num'][$i];
											}	//ส่วนของการตรวจสอบ stock
											
									
								//	$Query1 = mysqli_query($con,"SELECT * FROM ".$product." WHERE prd_id='".$_SESSION['sess_id'][$i]."'");
								//	$rs1 = mysqli_fetch_array($Query1);
									
								 
										$_POST['temp_num'][]=$_POST['prd_num'][$i];
								 
					
				}
			}
			
		$_SESSION['sess_id']=$_POST['temp_id'];
		$_SESSION['sess_name']=$_POST['temp_name'];
		$_SESSION['sess_price']=$_POST['temp_price'];
		$_SESSION['sess_num']=$_POST['temp_num'];
		
					////
					if($_POST['calculate']){
						echo "<meta http-equiv='refresh' content='0; url=basket_product.php'>";
					}else if($_POST['complete']){
						echo "<meta http-equiv='refresh' content='0; url=baskt_product_buy.php?EmsID=".$_POST['txtEms']."'>";
					}else if($_POST['btn_add']){
						echo "<meta http-equiv='refresh' content='0; url=product_new.php'>";
					}
					////
	}
?>
        </span></p>
      
	</div>
	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
