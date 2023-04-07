<? 
session_start(); 
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
<link rel="stylesheet" type="text/css" href="css_style_page.css" />

<style type="text/css">
</style>
</head>
<body id="Page0">
 <iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="PopCalendarXP/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
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
              <h2><img src="images/diagram-60.png" width="48" height="48" /> แจ้งชำระเงิน </h2>
          </div>
            <table height="400" border="0" cellpadding="0" cellspacing="0" style="border:0px; width:100%; padding:0px; margin:0px;">
              <tr>
                <td align="left" valign="top"><p>
                    <?PHP
				include "connect_db.php";
				$sql = mysqli_query($con,"SELECT * FROM ".$order." WHERE ord_id='".$_GET['ID']."'");
				$rs = mysqli_fetch_array($sql);
			 	$ord_idems= $rs['ord_idems'];
				$ord_id = $rs['ord_id'];
				
	 $sql_select2 = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_id='".$rs['ord_idmb']."'");
	$rs2 = mysqli_fetch_array($sql_select2);
				
				$sql_bnk = mysqli_query($con,"SELECT * FROM  ".$bank."  WHERE bn_id='".$_GET['Id_bn']."'");
				$rs_bnk = mysqli_fetch_array($sql_bnk);
				
			?>
                  </p>
                    <p style="padding:10px;"> <strong><img src="images/14724.png" width="16" height="16" />ใบสั่งชื่อเลขที่</strong> :
                      <?=sprintf("%05d",$rs['ord_id'])?>
                        <strong> </strong></p>
					  
					  <table width="100%" height="60" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="40" align="center" valign="middle"><div style="padding-top: 10px; font-weight: bold; font-size:14px;">ข้อมูลผู้สั่งซื้อสินค้า</div></td>
      </tr>
      <tr>
        <td height="25" align="center" valign="middle"><div style="padding: 10px; text-align:center;"><strong>ชื่อ - สกุล :</strong> 
        <?=$rs['mb_name']?> 
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
        <td height="25" colspan="4" align="center" valign="middle" bordercolor="#F5F5F5" bgcolor="#FFFFFF" class="sell1"><div align="right"><b>รวมราคา : </b></div></td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center"><u>
          <?=number_format($total_price,2)?>
        </u> บาท</div></td>
      </tr>
	  <tr>
	   <?PHP
					include "connect_db.php";
					$sql_EMS = mysqli_query($con,"SELECT * FROM ems WHERE ems_id = '".$ord_idems."'");
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
					  
			<div style="padding:5px; margin:5px; border:1px dashed #ccc; background:#f3f3f3;">	  
                  <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" id="form2" name="form2" onsubmit="return ChkText();">
                      <script language="JavaScript" type="text/javascript">
				  	function ChkText(){
							 if(document.form1.txt_bank.value=="0"){
									alert("กรุณาเลือก ธนาคารที่โอนด้วยนะ");
									return false;
							} 
							else if(document.form1.txtBanch.value==""){
									alert("กรุณากรอก สาขาด้วยนะ");
									document.form1.txtBanch.focus();
									return false;
							}
							else if(document.form1.txtPrice.value==""){
									alert("กรุณากรอก จำนวนเงินด้วยนะ");
									document.form1.txtPrice.focus();
									return false;
							}
							else if(document.form1.txtDate_start.value==""){
									alert("กรุณาเลือกวันที่ด้วยนะ");
									document.form1.txtDate_start.focus();
									return false;
							}
							else if(document.form1.txt_H.value=="0"){
									alert("กรุณาเลือก เวลาด้วยนะ");
									return false;
							}
							else if(document.form1.txt_I.value=="0"){
									alert("กรุณาเลือก นาทีด้วยนะ");
									return false;
							}
							else if(document.form1.txtNum.value==""){
									alert("กรุณากรอก เลขที่บัญชีด้วยนะ");
									document.form1.txtNum.focus();
									return false;
							}
							else {
									return true;
						}
					}
				  </script>
				   <a name="<?php echo $_GET['ID']; ?>" id="<?php echo $_GET['ID']; ?>"></a>
                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="21%" height="30"><div style="padding-right: 2px; text-align:right; font-weight:bold;">เลือกธนาคาร : </div></td>
                          <td width="79%" height="30">

<select name="txt_bank" id="txt_bank" onchange="window.location='payment_member_order1.php?ID=<?=$_GET['ID']?>&amp;Id_bn='+this.value+'#<?=$_GET['ID']?>'" style="width: 70%; height:22px;">
                              <option value="0">เลือกธนาคารที่คุณชำระเงิน</option>
                              <?PHP
							include "connect_db.php";
							$Query = mysqli_query($con,"SELECT * FROM ".$bank." ORDER BY bn_id ASC");
							while($rs=mysqli_fetch_array($Query)) {
									$id_type=$rs['bn_id'];
									$name_type=$rs['bn_bank'];
									
									if($_GET['Id_bn']==$id_type){
										echo  "<option value =".$id_type." selected>".$name_type."</option>";
									}else{
										echo  "<option value =".$id_type.">".$name_type."</option>";
									}
									
							}
						?>
                          </select>
</td>
                        </tr>
                        <tr>
                          <td height="30"><div style="padding-right: 2px; text-align:right; font-weight:bold;">สาขา : </div></td>
                          <td height="30"><input name="txtBanch" type="text" id="txtBanch" style="width: 50%;" value="<?=$rs_bnk['bn_branch']?>" /></td>
                        </tr>
                        <tr>
                          <td height="30"><div style="padding-right: 2px; text-align:right; font-weight:bold;">จำนวนเงินที่โอน : </div></td>
                          <?PHP
				include "connect_db.php";
				$sql_ord= mysqli_query($con,"SELECT * FROM ".$order." WHERE ord_id='".$_GET['ID']."'");
				$rs_ord = mysqli_fetch_array($sql_ord);
					  
					   ?>
                          <td height="30"><input name="txtPrice" type="text" id="txtPrice" style="width: 30%;" value="<?=number_format($rs_ord['ord_total'],2)?>" /></td>
                        </tr>
                        <tr>
                          <td height="30"><div style="padding-right: 2px; text-align:right; font-weight:bold;">วันที่โอน : </div></td>
                          <td height="30"><input name="txtDate_start" id="txtDate_start" size="11" readonly="readonly" />
                            <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.form2.txtDate_start);return false;" >
						  <img class="PopcalTrigger" align="absmiddle" src="PopCalendarXP/calbtn.gif" width="34" height="22" border="0" alt="" /></a> </td>
                        </tr>
                        <tr>
                          <td height="30"><div style="padding-right: 2px; text-align:right; font-weight:bold;">เวลาโดยประมาณ : </div></td>
                          <td height="30"><span style="padding:5px;">
                            <select name="txt_H">
                              <option value="0">เวลา</option>
                              <?PHP
						 	for($H=1; $H<=24; $H++){
							
								if($_POST['txt_H'] == $H){
									echo "<option value=".sprintf("%02d",$H)." selected='selected'>".sprintf("%02d",$H)."</option>";
								}else{
									echo "<option value=".sprintf("%02d",$H).">".sprintf("%02d",$H)."</option>";
									}
							}
						 ?>
                            </select>
                            :
                            <select name="txt_I">
                              <option value="0">นาที</option>
                              <?PHP
						 	for($I=1; $I<=60; $I++){
							
								if($_POST['txt_I'] == $I){
									echo "<option value=".sprintf("%02d",$I)." selected='selected'>".$I." นาที</option>";
								}else{
									echo "<option value=".sprintf("%02d",$I).">".$I." นาที</option>";
									}
							}
						 ?>
                            </select>
                          </span></td>
                        </tr>
                        <tr>
                          <td height="30"><div style="padding-right: 2px; text-align:right; font-weight:bold;">เลขที่บัญชี : </div></td>
                          <td height="30"><input name="txtNum" type="text" id="txtNum" style="width:50%;" value="<?=$rs_bnk['bn_number']?>" /></td>
                        </tr>
                        <tr>
                          <td height="30"><div style="padding-right: 2px; text-align:right; font-weight:bold;">รูปใบสริป : </div></td>
                          <td height="30"><input name="FileUpload" type="file" id="FileUpload" size="50" />
                              <input type="hidden" name="ord_id"  value="<?=$rs_ord['ord_id']?>"/>
                          <input type="hidden" name="bnk_id"  value="<?=$_GET['Id_bn']?>"/></td>
                        </tr>
                        <tr>
                          <td height="30">&nbsp;</td>
                          <td height="30">
						  <input type="submit" name="Submit" value="บันทึกข้อมูล"  class="txt_btn" /> 
						 <input  class="txt_btn" name="button" type="button" id="b" value="ย้อนกลับ" onclick="(history.back())"  /></td>
                        </tr>
                      </table>
                  </form>
				  </div>	
				 
                  <p class="ClearB">&nbsp;</p>
                  <p class="ClearB"></p></td>
              </tr>
            </table>            <p>&nbsp;</p></td>
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
        <?PHP
if($_POST){
	//ติดต่อฐานข้อมูล
	include "connect_db.php";
	$sql_bnk1 = mysqli_query($con,"SELECT * FROM  ".$bank."  WHERE bn_id='".$_POST['Id_bnk']."'");
	$rs_bnk1 = mysqli_fetch_array($sql_bnk1);
	$bnk_name = $rs_bnk1['bn_bank'];
				

	$FileName 	= $_FILES['FileUpload'] ['name'];
	$Filetype 		= $_FILES['FileUpload'] ['type'];
	$FileSize 		= $_FILES['FileUpload'] ['size'];
	$FileUpLoadtmp = $_FILES['FileUpload'] ['tmp_name'];
			
if(!empty($FileUpLoadtmp)){					 
	$array_last = explode(".",$FileName); // เป็น array หาจำนวน จุด . ของชื่อตัวแปร์		
	$c = count($array_last) - 1; //นับจำนวน จุด "." ของชื่อตัวแปร์ 
	$lname = strtolower($array_last [$c]); // หา นามสกุลไฟล์ ตัวสุดท้ายของ ตัวแปร์
	$NewFileupload = date("U"); 
	$NewFile = $NewFileupload.".$lname"; //รวม ชื่อและนามสกลุดไฟล์เข้าด้วยกัน 
	}else{
echo "<script>alert('กรุณาแนบไฟล์หลักฐานการโอนด้วยนะ')</script>";
echo "<meta http-equiv='refresh' content='0; url=payment_Member_order1.php?ID=".$_POST['ord_id']."&Id_bn=".$_POST['Id_bnk']."'>";
exit();
	}
	
	
	
$H = $_POST['txt_H'];
$I = $_POST['txt_I'];
$Ar_Date = explode("-",$_POST['txtDate_start']);
$Y = $Ar_Date[0];
$M = $Ar_Date[1];
$D = $Ar_Date[2];

$Date_pay = date("Y-m-d H:i:s", mktime(date("".$H."")+0, date("".$I."")+0, date("s")+0, date("".$M."")+0 , date("".$D."")+0, date("".$Y."")+0));
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));

if($date_money < $date_now){
echo "<script>alert('รูปแบบชำระเงินไม่ถูกต้อง ลองตรวจสอบอีกครั้ง')</script>";
echo "<meta http-equiv='refresh' content='0; url=payment_Member_order1.php?ID=".$_POST['ord_id']."&Id_bn=".$_POST['Id_bnk']."'>";
exit();
}
$status = "1"; //สถานะ
//เพิ่มข้อมูลลงในตาราง
		$sql_insert = mysqli_query($con,"INSERT INTO payment VALUES "
				."(0,
				'".$_POST['ord_id']."',
				'".$_POST['bnk_id']."', 
				'".$_POST['txtPrice']."', 
				'".$NewFile."', 
				'".$Date_pay."', 
				'".$DateTime."', 
				'".$status."')");

$last_id = mysql_insert_id();		

if($sql_insert){
	$sql_update = mysqli_query($con,"UPDATE ".$order." SET ord_status='1' WHERE ord_id='".$_POST['ord_id']."'");
			if($lname=="gif" or $lname=="jpg" or $lname=="jpeg" or $lname=="png"){
				//Upload File รูปภาพลงในโฟลเดอร์  Product
				$UploadFile = move_uploaded_file($FileUpLoadtmp, "payment/".$NewFile);					
			}		
	echo "<script>alert('บันทึกข้อมูลเสร็จแล้ว')</script>";
	echo "<meta http-equiv='refresh' content='0; url=member_order1.php'>";
}else{
	echo "<script>alert('error: บันทึกข้อมูลไม่ได้')</script>";
	echo "<meta http-equiv='refresh' content='0; url=member_order1.php'>";
	}		
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
