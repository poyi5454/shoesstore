<?PHP
session_start();
	include "connect_db.php";
if(!empty($_GET['TbName'])){

	if($_GET['sql']=="UPDATE"){
	
	 	$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
		$status = "2";
		$sql_update = mysqli_query($con,"UPDATE payment SET "." 
																pm_status ='".$status."' WHERE pm_id='".$_GET['ID']."'");
	
		if($sql_update){
			$sql = mysqli_query($con,"SELECT * FROM payment WHERE pm_id = '".$_GET['ID']."'");
			$rst = mysqli_fetch_array($sql);
			$ordID = $rst['pm_ord_id'];
	
		$status = "2";
		$sql_update = mysqli_query($con,"UPDATE tb_order SET "
													." ord_status ='".$status."' WHERE ord_id='".$ordID."'");
												
			exit("<script>(history.back());</script>");
			}else{
			exit("<script>alert('Error : ทำรายการไม่ได้! ');(history.back());</script>");
			}	
	
	}else if($_GET['sql']=="DEL"){
	
	
			$sql = mysqli_query($con,"SELECT * FROM payment WHERE pm_id = '".$_GET['ID']."'");
			$rst = mysqli_fetch_array($sql);
			$ordID = $rst['pm_ord_id'];
		
		$status = "Y";
		$sql_update = mysqli_query($con,"UPDATE tb_order SET "
													." ord_status ='".$status."' WHERE ord_id='".$ordID."'");
	
				// ลบข้อมูลตามรหัสที่ส่งมา 
		$Del = mysqli_query($con,"DELETE FROM payment  WHERE pm_id='".$_GET['ID']."'");
		
		
		if($Del){
		

			exit("<script>(history.back());</script>");
			}else{
			exit("<script>alert('Error : ทำรายการไม่ได้! ');(history.back());</script>");
			}	
	
	
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>ใบจัดซื้อสินค้า</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="images/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />
<style type="text/css">
h1, h2, h3, h4, h5, h6, ul, ol, hr, p,form {
	padding: 0;
	margin: 0;
	}
	body {
	height:auto;
	margin: auto;
	padding-right: 3px;
	font-family:Tahoma, Vernada, Arial, Helvetica, sans-serif;
	font-size: 13px;
}
table {
	border: 0px;
}
#PrintMember {
display:block; 
width:800px; 
height:auto;
margin: 0 auto;
text-align:left; 
padding-top:20px;
padding-bottom: 10px;
}
#PrintMember a:link {
text-decoration: none;
}
table td.sell {
border-left: 1px dotted #666;
border-top: 1px dotted #666;
border-bottom: 1px dotted #666;
}
table td.sellright {
border-left: 1px dotted #666;
border-top: 1px dotted #666;
border-bottom: 1px dotted #666;
border-right: 1px dotted #666;
}
table td.sell1 {
border-left: 1px dotted #666;
border-bottom: 1px dotted #666;
}
table td.sellright1 {
border-left: 1px dotted #666;
border-bottom: 1px dotted #666;
border-right: 1px dotted #666;
}

/* 
.txt_btn  {
  display: inline-block;
  *display: inline;
  padding: 3px 7px;
  margin-bottom: 0;
  *margin-left: .3em;
  font-size: 13px;
  line-height: 18px;
  color: #333333;
  text-align: center;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  vertical-align: middle;
  cursor: pointer;
  background-color: #f5f5f5;
  *background-color: #e6e6e6;
  background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
  background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
  background-repeat: repeat-x;
  border: 1px solid #cccccc;
  *border: 0;
  border-color: #e6e6e6 #e6e6e6 #bfbfbf;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  border-bottom-color: #b3b3b3;
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  *zoom: 1;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
     -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
          box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
}

.txt_btn:hover{
  color: #000;
  background-color: #e6e6e6;
  *background-color: #d9d9d9;
}
*/
</style>
</head>
<body style="background:#fafafa; padding-top: 20px;">
 <iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="PopCalendarXP/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<?PHP
	include "connect_db.php";
	include "function.php";
	$sql_select1 = mysqli_query($con,"SELECT * FROM ".$order." WHERE ord_id='".$_GET['ID']."'");
	$rs1 = mysqli_fetch_array($sql_select1);
	$status = $rs1['ord_status'];
	$ord_id=$rs1['ord_id'];
	
	$sql_select2 = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_id='".$rs1['ord_idmb']."'");
	$rs2 = mysqli_fetch_array($sql_select2);
	
	
?>
<div id="PrintMember">
 <?PHP
 if(empty($_GET['m_page'])){
 	 if($_GET['ord']==1){
	echo "<a href='member_order1.php'>&lt;-- ย้อนกลับ </a>";
	
	}else if($_GET['ord']==2){
		echo "<a href='member_order2.php'>&lt;-- ย้อนกลับ </a>";
		
	}else if($_GET['ord']==3){
		echo "<a href='member_order3.php'>&lt;-- ย้อนกลับ </a>";
		
	}else{
	echo "<a href='member_order1.php'>&lt;-- ย้อนกลับ </a>";
	}
	echo " | ";
 }


?>
<a href="#"onClick="window.print();"><img src="images/print001.png" width="22" height="22" border="0" /></a></div>
<div style="display:block; border:1px dotted #333; width:800px; height:auto; background:white; margin: 0 auto;">
<div style="display:block; padding:5px; height:auto;">

  	<p style="display:block; padding-top: 10px; font-size:11px; text-align:right; padding-right: 10px;">เลขที่ : 
    <?=sprintf("%05d",$_GET['ID'])?></p>
 	<div style="padding: 10px; text-align:center; font-size:20px;">
	<?PHP if($status=='Y'){ ?>
                <p>ใบสั่งซื้อ</p>
                <? }else if($status=='3'){ ?>
                <p>ใบส่งของ</p>
                 <? }else if($status=='N'){ ?>
               <p>ใบสั่งซื้อ ยกเลิกแล้ว</p>
                <? } ?>
 	  
 	  <p style="font-size:13px;">
	  <?PHP include "footer.php"; ?>
      </p>
 	</div>
	<table width="100%" height="24" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="75%" height="24" align="right" valign="middle"><div style="padding-right: 120px;"></div></td>
        <td width="25%" height="24" align="left" valign="middle"> <p style="display:block;  font-size:11px; text-align:right; padding-right: 10px;">วันที่ : 
       <?=displaydate($rs1['ord_date'])?></p></td>
      </tr>
    </table>
	<div style="border-top: 2px dotted #999;"></div>
	<table width="100%" height="60" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="40" align="center" valign="middle"><div style="padding-top: 10px; font-weight: bold; font-size:14px;">ข้อมูลผู้สั่งซื้อสินค้า</div></td>
      </tr>
      <tr>
        <td height="25" align="center" valign="middle"><div style="padding: 10px; text-align:center;"><strong>ชื่อ - สกุล :</strong> 
        <?=$rs2['mb_name']?> 
        <strong>ที่อยู่ :</strong> 
        <?=$rs2['mb_address']?> 
        <strong>เบอร์โทร :</strong> 
        <?=$rs2['mb_tel']?>
        <strong> อีเมล์ :</strong> 
        <?=$rs2['mb_email']?></div></td>
      </tr>
    </table>
	<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#ECE9D8" bgcolor="#F5F5F5">
      <tr>
        <td class="sell" width="10%" height="30" bgcolor="#CCCCCC"><div align="center"><strong>รหัสสินค้า</strong></div></td>
        <td width="51%" height="30" bgcolor="#CCCCCC" class="sell"><div align="left" style="padding-left: 5px;"><strong>รายการสินค้า</strong></div></td>
        <td class="sell"  width="10%" bgcolor="#CCCCCC"><div align="center"><strong>จำนวน</strong></div></td>
        <td class="sell"  width="13%" bgcolor="#CCCCCC"><div align="center"><strong>ราคา/หน่วย</strong></div></td>
        <td class="sellright"  width="16%" height="30" bgcolor="#CCCCCC"><div align="center"><strong>รวม</strong></div></td>
      </tr>

<?PHP
include "connect_db.php";
	$ii=1;
	$sql_select3 = mysqli_query($con,"SELECT * FROM ".$product.", ".$order_detail."  WHERE prd_id=od_id_prd AND od_id_ord='".$_GET['ID']."' ");
		while($rs3 = mysqli_fetch_array($sql_select3)){
				$code = sprintf("%05d",$rs3['prd_id']);
				$total_unit = ($rs3['od_num'] * $rs3['od_price']);
				$name = $rs3['prd_name'];
				$num = $rs3['od_num'];
				$price = $rs3['od_price'];
			
	?>
      <tr>
        <td  class="sell1" height="30" bgcolor="#FFFFFF"><div style="text-align:center;">
            <?=$code?>
        </div></td>
        <td height="30" bgcolor="#FFFFFF" class="sell1"><div style="padding-left: 5px;"><?=$name?></div></td>
        <td class="sell1" bgcolor="#FFFFFF"><div align="center"><span style="padding-left: 5px;">
          <?=$num?>
        </span></div></td>
        <td class="sell1" height="30" bgcolor="#FFFFFF"><div align="center"><span style="padding-left: 5px;">
          <?=number_format($price,2)?>
        </span> บาท </div></td>
        <td class="sellright1" height="30" bgcolor="#FFFFFF"><div align="center"><? echo "".number_format($total_unit,2).""; ?> บาท </div></td>
      </tr>
      <? 
		   $total_price = $total_price + $total_unit;
			} 
			?>
	<tr>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"></div></td>
        <td height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF" class="sell1">&nbsp;</td>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF">&nbsp;</td>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF">&nbsp;</td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF">&nbsp;</td>
	 </tr>
	 <tr>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"></div></td>
        <td height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF" class="sell1">&nbsp;</td>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF">&nbsp;</td>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF">&nbsp;</td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF">&nbsp;</td>
	 </tr>
      <tr>
        <td height="25" colspan="4" align="center" valign="middle" bordercolor="#F5F5F5" bgcolor="#FFFFFF" class="sell1"><div align="right"><b>รวมราคา : </b></div></td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center"><u>
          <?=number_format($total_price,2)?>
        </u> บาท</div></td>
      </tr>
	  <tr>
	   <?PHP
					include "connect_db.php";
					$sql_EMS = mysqli_query($con,"SELECT * FROM ems WHERE ems_id = '".$rs1['ord_idems']."'");
					$rs = mysqli_fetch_array($sql_EMS);
					$ems_name = $rs['ems_name'];
					 $ems_price = $rs['ems_price'];
					 
					 $Total = $total_price+$ems_price;
				 ?>
        <td height="25" colspan="4" align="center" valign="middle" bordercolor="#F5F5F5" bgcolor="#FFFFFF" class="sell1"><div align="right"><b><strong>จัดส่งแบบ</strong>
              <?=$ems_name?>
: </b></div></td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center"><u>
          <?=number_format($ems_price,2)?>
        </u>บาท</div></td>
      </tr>
      <tr>
        <td class="sell1" height="25" colspan="4" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"><b>ยอดที่ต้องชำระ : </b></div></td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center" style="color:red; font-weight:bold;"><u>
            <?=number_format($Total,2)?>
        </u> บาท</div></td>
      </tr>
    </table>
	<p>&nbsp;</p>
	
	<div style="padding:5px; margin:5px;">
	
	<?php
$sql_pay = mysqli_query($con,"SELECT * FROM payment  WHERE pm_ord_id='".$ord_id."'");
$num_pay = mysqli_num_rows($sql_pay);
if($num_pay>0){
?>		
<div style="border:1px solid #ddd; padding: 5px; margin-top: 5px;">
		 	 <div style="border-bottom: 1px dashed #bbb; padding:5px; margin-bottom: 5px;">
		  		 <h3 style="color:red;">ข้อมูลการชำระเงิน</h3>
			 </div>
			 <table width="100%" border="0" cellpadding="0" cellspacing="0 "  style="clear:both">
        <tr>
          <td width="13%" align="center" valign="middle" class="txt_top1">วันที่ชำระเงิน</td>
          <td width="10%" align="center" valign="middle" class="txt_top1">จำนวนเงิน</td>
          <td width="63%" align="left" valign="middle" class="txt_top1">ชื่อธนาคาร.  ชื่อบัญชี.  เลขที่บัญชี.  สาขา </td>
          <td width="14%" align="center" valign="middle" class="txt_top2">ตรวจสอบ</td>
          </tr>
		  <?php
			   while($rst = mysqli_fetch_array($sql_pay)){
			    		$pm_id = $rst['pm_id'];
						$pm_ord_id = $rst['pm_ord_id'];
						$pm_bank_id = $rst['pm_bank_id'];
						$pm_price = $rst['pm_price'];
						$pm_pay = $rst['pm_pay'];
						$pm_date = $rst['pm_date'];
						$pm_status = $rst['pm_status'];
					 	$pm_photo = $rst['photo'];
			if(!empty($pm_photo)){
		$img = "payment  /".$pm_photo."";
		}else{
		$img = "images/photo.jpg";
		}
						
						// สถานะชำระเงิน
						if($pm_status=="1"){
							$payStt= "<input name=\"button\" type=\"button\" class=\"button_txt\" onclick=\"javascript:if(confirm('ยืนยันการชำระเงิน')==true){window.location='print.php?ID=".$pm_id."&TbName=payment&sql=UPDATE';}\" value=\"ยืนยัน\" style='font-size: 11px;' />";
							
							$payDel= " <input name=\"button\" type=\"button\" class=\"button_txt\" onclick=\"javascript:if(confirm('ยืนยัน ลบข้อมูลการแจ้งชำระเงิน')==true){window.location='print.php?ID=".$pm_id."&TbName=payment&sql=DEL';}\" value=\"ลบ\" style='font-size: 11px;' />";
							
						}else if($pm_status=="2"){
							$payStt= "<samp style='color: blue;'>ชำระเงินแล้ว</samp>";
							$payDel ="";
							$totalP = $total3-$pmPrice;
						}else{
							$payStt= "<samp style='color: red;'>ไม่มีข้อมูล</samp>";
						}
						
						$sql_bnk= mysqli_query($con,"SELECT * FROM bank WHERE bn_id='".$pm_bank_id."'");
						$bnk = mysqli_fetch_array($sql_bnk);
						$bn_bank = $bnk['bn_bank'];
						$bn_name = $bnk['bn_name'];
						$bn_number = $bnk['bn_number'];
						$bn_branch = $bnk['bn_branch'];
						
			   ?>
		  <tr>
          <td width="13%" align="center" valign="middle" class="txt_report-1"><?=displaydate($pm_pay)?></td>
          <td width="10%" align="right" valign="middle" class="txt_report-1">
		  <samp style="color:red;"><?=number_format($pm_price,2)?></samp>
		  <p>
		  
		  
		  </td>
          <td align="left" valign="middle" class="txt_report-1"><b><?=$bn_bank?></b> | <?=$bn_name?> | <?=$bn_number?> | <?=$bn_branch?></td>
          <td width="14%" align="center" valign="middle" class="txt_report-2">
		  <?php if(!empty($_SESSION["sess_emp_id"])){ ?>
		  <?=$payStt?><?=$payDel?>
		  <?php }else{ ?>
		  
		  <?php } ?>
		  
		  <br />
		  <?php if(!empty($pm_photo)){ ?>
		  <a href="<?=$img?>" rel="lightbox" title="จำนวน:( <?=number_format($pm_price,2)?> )">
		 หลักฐาน		</a>
		<?php }else{ 
		
	 echo $payStt;
		
		} ?>	
		  </p>
		  
		  </td>
          </tr>
		<? } ?>  
		  </table>
      </div>	
<? } ?>
	
	</div>
	
	
	
	<div>
	  <div>
	    <div style="display:block; padding:5px; height:auto;">
		<? if(!empty($_SESSION['sess_emp_id'])){ //ถ้ามีข้อมูลที่อยู่ใน sess_emp_id  ?>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return ChkText();">
		สถานะใบสั่งซื้อ : 
		<?PHP if($status=='2'){ ?>
                <input name="btm_product" type="submit" id="btm_product" class="txt_btn"  value="อนุมัติสินค้าทั้งหมด" />
                <? }else if($status=='3'){ ?>
                <input name="btm_product" type="submit" id="btm_product" disabled="disabled" class="txt_btn" style="color:#0066FF;"  value="อนุมัติสินค้าแล้ว" />
                 <? }else if($status=='N'){ ?>
                <input name="btm_product" type="submit" id="btm_product" disabled="disabled" class="txt_btn" style="color:#0066FF;"  value="ยกเลิกใบสั่งซื้อแล้ว" />
                <? } ?>
				
		        <input name="btn_back" type="submit" id="btn_back" class="txt_btn" value="&lt;&lt; ย้อนกลับ" />
                <input type="hidden" name="ord_id" value="<?=$_GET['ID']?>" />
                <input type="hidden" name="ord" value="<?=$_GET['ord']?>" />
                <input type="hidden" name="m_page" value="<?=$_GET['m_page']?>" />
        </form>
		<p>&nbsp;</p>
	      <p>&nbsp;</p>
		<? } ?>
	      
	      <p>&nbsp;</p>
        </div>
      </div>
	  <div id="div"></div>
	</div>
  </div>
</div>
<div id="PrintMember"></div>
        <?PHP
include "connect_db.php";
if($_POST['btn_back']){ // ย้อนกลับ

			 if($_POST['ord']==101){
				echo "<meta http-equiv='refresh' content='0;url=admin_main.php?m_page=".$_POST['m_page']."'>" ; exit();
			}else if($_POST['ord']==11){
				echo "<meta http-equiv='refresh' content='0;url=admin_order1.php?m_page=".$_POST['m_page']."'>" ; exit();
			}else if($_POST['ord']==22){
				echo "<meta http-equiv='refresh' content='0;url=admin_order2.php?m_page=".$_POST['m_page']."'>" ; exit();
			}else if($_POST['ord']==33){
				echo "<meta http-equiv='refresh' content='0;url=admin_order3.php?m_page=".$_POST['m_page']."'>" ; exit();
			}else if($_POST['ord']==44){
				echo "<meta http-equiv='refresh' content='0;url=admin_order4.php?m_page=".$_POST['m_page']."'>" ; exit();
			}else if($_POST['ord']==55){
				echo "<meta http-equiv='refresh' content='0;url=admin_order5.php?m_page=".$_POST['m_page']."'>" ; exit();
			}else if($_POST['ord']==66){
				echo "<meta http-equiv='refresh' content='0;url=admin_order6.php?m_page=".$_POST['m_page']."'>" ; exit();
			}else if($_POST['ord']==77){
				echo "<meta http-equiv='refresh' content='0;url=admin_order7.php?m_page=".$_POST['m_page']."'>" ; exit();
			}else{
				echo "<meta http-equiv='refresh' content='0;url=admin_main.php?m_page=".$_POST['m_page']."'>" ; exit();
			}
}else if($_POST['btm_product']){// อนุมัติสินค้า

			$sql = mysqli_query($con,"UPDATE ".$order." SET ord_status='3' WHERE ord_id='".$_POST['ord_id']."'");
									
			$sql_detail = mysqli_query($con,"SELECT * FROM ".$order_detail." WHERE od_id_ord='".$_POST['ord_id']."'");
									
			while($rsd = mysqli_fetch_array($sql_detail)){
							$num_prd = $rsd['od_num'];
												
										$sql_prd = mysqli_query($con,"SELECT * FROM ".$product." WHERE prd_id = '".$rsd['od_id_prd']."'");
										$rsp = mysqli_fetch_array($sql_prd);
										$prd_stock = $rsp['prd_stock'];
										$prd_sell = $rsp['prd_sell'];
										
										$up_stock = $prd_stock - $num_prd;
										$up_sell = $prd_sell + $num_prd;
										
					$sql_update_prd= mysqli_query($con,"UPDATE ".$product." SET  prd_sell ='".$up_sell."', prd_stock ='".$up_stock."' WHERE prd_id = '".$rsd['od_id_prd']."'");
					$sql_update_detail= mysqli_query($con,"UPDATE ".$order_detail." SET od_approve='".$num_prd."' WHERE od_id_prd= '".$rsd['od_id_prd']."' AND od_id_ord='".$_POST['ord_id']."'");
					$sql2 = mysqli_query($con,"UPDATE ".$order_detail." SET od_status='Y' WHERE od_id_ord='".$_POST['ord_id']."'");
					}				
									if($sql2){						
											echo "<script>alert('อนุมัติสินค้าทั้งหมดแล้ว')</script>";
											echo "<meta http-equiv='refresh' content='0;url=admin_main.php?m_page=".$_POST['m_page']."'>";
											exit();		
										}else{
											echo "<script>alert('ผิดพลาด : ไม่สามารถอนุมัติสินค้าได้')</script>";
											echo "<meta http-equiv='refresh' content='0;url=admin_main.php?m_page=".$_POST['m_page']."'>";
											exit();	
											}
			
	}
			?>
</body>
</html>
