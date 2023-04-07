<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="185" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<div class="title_data_type" style="margin-top: 5px;"><img src="images/icon-05.png" width="32" height="32" /><b> ประเภทสินค้า</b></div>
<ul class="ul_type" style="list-style:none;">
 <?PHP
include "connect_db.php";
	$sql_select = mysqli_query($con,"SELECT * FROM ".$product_type." ORDER BY type_id ASC");
		while($result = mysqli_fetch_array($sql_select)){
?>
		<li id="li_type"><a href="type_product.php?type_id=<?=$result['type_id']?>">
		<img src="images/bookmark_16.png" border="0" />  <?=$result['type_name']?> </a></li>
<?
}
?>
 </ul> 
        
</td>
 </tr>     
</table>
<br />
		<? if($_SESSION['sess_mb_id']==""){ ?>
		
  	<div class="title_data_type"><img src="images/diagram32.png" width="32" height="32" /><strong> ลงชื่อเข้าระบบ </strong></div>
	 
	 <form method="post" action="check_password.php" name="from_login1"  id="from_login1" onSubmit="return chk_txt();" style="padding-top: 5px; margin-left: 0px;">
           <table width="100%" border="0" cellpadding="0" cellspacing="0">
         <tr>
                   <td height="25" align="left" valign="middle" style="text-align:left; padding-left: 18px;">
				   <div style="font-size: 10px;">ชื่อเข้าใช้ระบบ</div>
				   <input name="txt_user" type="text" id="txt_user" style="width: 92%; background:#FFF; border:1px solid #ccc;" accesskey="p"/>		   </td>
</tr>
                 <tr>
                   <td height="25" align="left" valign="middle" style="text-align:left; padding-left: 18px;">
				   <div style="font-size: 10px;">รหัสผ่าน</div> 
				   <input name="txt_pass" type="password" id="txt_pass" style="width: 92%; background:#FFF; border:1px solid #ccc;" /></td>
         </tr>
                 <tr>
                   <td height="27" align="left" valign="middle" style="padding-left: 18px;">
				     <input type="submit" name="Login" id="Login" value="เข้าระบบ" class="buttom_login" style="border:1px solid #333; background:#DDD; color:#333;"/>
					 

  <input type="submit" name="register" id="register" value="สมัครสมาชิก" class="buttom_login" style="border:1px solid #333; background:#DDD; color:#333;"/>

				   
				   </td>
         </tr>
				 <? }else{?>
				   <tr>
                   <td colspan="2" style="border-bottom: 0px solid #ddd;">

<div class="title_data_type">
<img src="images/diagram_v2-29.png" width="32" height="32" />ยินดีต้อนรับ<br />
<b>คุณ : </b><?=$_SESSION['sess_mb_name']?></div> 
<br />
<div class="title_data_type"><img src="images/diagram_v2-29.png" width="32" height="32" /> สินค้าในตะกร้า</div> 
		  <ul class="ul_type">
		  <li id="li_type"><a href="basket_product.php">
		  <img src="images/icon-cart.gif" width="17" height="14" border="0" /> 
		   จำนวน [<?=count($_SESSION['sess_id'])?>] รายการ </a>		  </li>
			<li id="li_type"><a href="basket_product.php">
		  <img src="images/icon-cart.gif" width="17" height="14" border="0" /> 
		   ราคารวม : [<?=number_format($_SESSION['sess_Total'],2)?>] บาท</a>		  </li>
		  </ul>
<br />
<div class="title_data_type"><img src="images/clipboard_32.png" width="32" height="32" />ข้อมูลการสั่งซื้อ</div> 
		  <ul class="ul_type">
		  <li id="li_type"> <a href="member_order1.php"><img src="images/icon-02.png" width="16" height="16" border="0" /> ข้อมูลการสั่งซื้อสินค้า</a></li>
		  <li id="li_type"> <a href="member_order2.php"><img src="images/icon-02.png" width="16" height="16" border="0" /> แจ้งชำระเงิน</a></li>
 

		  <li id="li_type"> <a href="member_order4.php"><img src="images/icon-02.png" width="16" height="16" border="0" />  ใบสั่งซื้อ อนุมัติสินค้าแล้ว</a></li>
 
		  <li id="li_type"> <a href="member_order6.php"><img src="images/icon-02.png" width="16" height="16" border="0" /> รายงานยกเลิกใบสั่งซื้อ</a></li>
		  <li id="li_type"> <a href="member_main.php"><img src="images/icon-02.png" width="16" height="16" border="0" /> ข้อมูลส่วนตัว </a></li>
		  <li id="li_type"> <a href="logout.php"><img src="images/icon-02.png" width="16" height="16" border="0" /> ออกจากระบบ </a></li>
		  </ul>
		<?  } ?>
</p> </td>
                 </tr>
       </table>
</form>
<p>&nbsp;</p>

<div class="title_data_type">
<form id="form1" name="form1" method="post" action="index.php">
<img src="images/Search.png" />ชื่อสินค้า<br />
  <input name="txtSearch" type="text" id="txtSearch" style="width: 120px;" class="txt_frm" />
				    <input type="submit" name="Submit" value="ค้าหา" class="txt_btn" />
  </form>
</div>
<p>&nbsp;</p>
<div class="title_data_type" style="margin-top: 5px;"><img src="images/diagram-04.png" width="48" height="48" /><b> บทความ</b></div>
<ul class="ul_type">
		 <li id="li_type"> <a href="ex_order.php"><img src="images/bubble_16.png" width="16" height="16" border="0" /> วิธีการสั่งซื้อ </a></li>
		 <li id="li_type"> <a href="ex_payment.php"><img src="images/bubble_16.png" width="16" height="16" border="0" />  วิธีการชำระเงิน </a></li>

</ul>
<p>&nbsp;</p>
		<p>&nbsp;</p>