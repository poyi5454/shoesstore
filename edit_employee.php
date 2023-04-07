<?php 
include "session_admin.php";
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
<!--
.style2 {color: #FF0000}
-->
</style>
</head>
<body id="Page0">
<div id="container">
  <div id="bander_back">
    <?PHP include "bander_back.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?PHP include "menu_top2.php"; ?>
      	</p>
    </div>
  </div>
  
 <div class="menu_left"><!-- เมนูด้านซ้าย -->
	<?PHP  include "menu_left_back.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
	  <table width="100%" height="850" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" valign="top">
                <div class="title">
                    <h2><img src="images/pencil_48.png" width="48" height="48" />แก้ไขพนักงาน</h2>
                </div>
				<table width="99%" border="0" align="center" style="border-bottom: 1px solid #f3f3f3;">
<?PHP 
		include "connect_db.php";
		$sql2 = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_id = '".$_GET['ID']."'");
		$rs1 = mysqli_fetch_array($sql2);
		
						//แยกวันเดือนปี
		$Date_array = explode("-",$rs1['mb_birthday']);
		$year = $Date_array[0]+543;
		$month1 = $Date_array[1];
		$day = $Date_array[2];
	
		$birthday = "$day/$month1/$year";	//กำหนดวันเกิด เพื่อคำนวณอายุ
?>
                  <tr>
                    <td height="30" align="left" valign="top"><form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" id="FMemBer" name="FMemBer" onsubmit="return CHMEMBER();">
                        <script language="JavaScript" type="text/javascript">
				  	function CHMEMBER(){
							if(document.FMemBer.txtUser.value==""){
									alert("กรุณากรอก ชื่อที่ใช้ Login เข้าระบบด้วยนะ");
									document.FMemBer.txtUser.focus();
									return false;
							}
							else if(document.FMemBer.txtPass.value==""){
									alert("กรุณากรอก รหัสผ่าน ด้วยนะ");
									document.FMemBer.txtPass.focus();
									return false;
							} 
							else if(document.FMemBer.txtName.value==""){
									alert("กรุณากรอก ชื่อ-สกุล ด้วยนะ");
									document.FMemBer.txtName.focus();
									return false;
							}
							else if(document.FMemBer.txtSex.value==0){
									alert("กรุณาเลือกเพศด้วยนะ");
									return false;
							}
							else if(document.FMemBer.txtAge.value==""){
									alert("กรุณากรอก อายุ ด้วยนะ");
									document.FMemBer.txtAge.focus();
									return false;
							}
							else if(document.FMemBer.txtAddress.value==""){
									alert("กรุณากรอก ที่อยู่ด้วยนะ");
									document.FMemBer.txtAddress.focus();
									return false;
							}else if(document.FMemBer.txtTel.value==""){
									alert("กรุณากรอก เบอร์โทรที่สามารถติดต่อได้ด้วยนะ");
									document.FMemBer.txtTel.focus();
									return false;
							}else if(document.FMemBer.txtEmail.value==""){
									alert("กรุณากรอก อีเมล์ด้วยนะ");
									document.FMemBer.txtEmail.focus();
									return false;
							}
							else {
									return true;
						}
					}
				  </script>
                        <table width="99%" border="0" cellpadding="0" cellspacing="0">
                          <?php if($rs1['emp_stt']==2 or $rs1['emp_stt']=='N'){ ?>
                          <?php }else{ ?>
                          <input type="hidden" name="txtemp_stt2" value="1" />
                          <?php } ?>
                          <tr>
                            <td width="17%" height="25" align="right" valign="middle"><strong>Username  :</strong></td>
                            <td width="83%" height="25" align="left" valign="middle">
							<input name="txt_username" type="text" id="txt_username" style="width: 40%; color:#333;" value="<?=$rs1['mb_user']?>" disabled="disabled" />
							</td>
                          </tr>
                          <tr>
                            <td width="17%" height="25" align="right" valign="middle"><strong>Password : </strong></td>
                            <td width="83%" height="25" align="left" valign="middle"><input name="txtPass" type="text" id="txtPass" style="width: 40%" value="<?=$rs1['mb_pass']?>" />
                                <span class="style2">*</span></td>
                          </tr>
                          <tr>
                            <td width="17%" height="25" align="right" valign="middle"><strong>ชื่อ-สกุล  : </strong></td>
                            <td width="83%" height="25" align="left" valign="middle"><input name="txtName" type="text" id="txtName" style="width: 40%" value="<?=$rs1['mb_name']?>" />
                                <span class="style2">*</span></td>
                          </tr>
                          <tr>
                            <td height="25" align="right" valign="middle"><strong>เพศ : </strong></td>
                            <td height="25" align="left" valign="middle"><select name="txtSex" id="txtSex">
                                <?php if($rs1['mb_sex']=='m'){ ?>
                                <option value="m" selected="selected">ชาย</option>
                                <option value="f">หญิง</option>
                                <?php }else{ ?>
                                <option value="f" selected="selected">หญิง</option>
                                <option value="m">ชาย</option>
                                <?php } ?>
                              </select>
                                <span class="style2">*</span></td>
                          </tr>
                          <tr>
                              <td align="right" valign="middle"><strong>วันเกิด : </strong></td>
                              <td height="25" align="left" valign="middle"><input name="txt_birthday"  type="text" class="frm" id="datepicker-now" style="width: 100px; color:#000;" value="<?=$birthday?>" />
                                  <span class="style2">*</span></td>
                            </tr>
                          <tr>
                            <td height="25" align="right" valign="top"><strong>ที่อยู่ : </strong></td>
                            <td height="25" align="left" valign="middle"><textarea name="txtAddress" rows="5" id="txtAddress" style="width: 80%"><?=$rs1['mb_address']?>
                </textarea>
                                <span class="style2">*</span></td>
                          </tr>
                          <tr>
                            <td height="25" align="right" valign="middle"><strong>เบอร์โทร : </strong></td>
                            <td height="25" align="left" valign="middle"><label>
                              <input name="txtTel" type="text" id="txtTel" style="width:40%" value="<?=$rs1['mb_tel']?>" />
                              <span class="style2">*</span></label></td>
                          </tr>
                          <tr>
                            <td height="25" align="right" valign="middle"><strong>อีเมล์ : </strong></td>
                            <td height="25" align="left" valign="middle"><input name="txtEmail" type="text" id="txtEmail" style="width: 40%" value="<?=$rs1['mb_email']?>" />
                                <span class="style2">*</span></td>
                          </tr>
                          <tr>
                            <td height="25" align="right" valign="middle"><strong>รูป : </strong></td>
                            <td height="25" align="left" valign="middle"><?PHP
							if(!$rs1['mb_photo']==""){	?>
                              <ul style="list-style: none;">
                                <li id="liPhoto"> <a href="Member/<?=$rs1['mb_photo']?>" rel="lightbox" title="<?=$rs1['mb_name']?>" > <img class="photo" src="Member/<?=$rs1['mb_photo']?>" width="150" height="180" border="0" /> </a> </li>
                              </ul>
                              <p style="clear:left;"></p>
                              <div>
                                <input type="checkbox" name="checkbox" value="1" />
                                ลบรูป
                                <input name="FileUpload[]" type="file" id="FileUpload[]" size="30" />
                              </div>
                            <?php	}else{
								echo "
									<div>
      								<input name=\"FileUpload[]\" type=\"file\" id=\"FileUpload[]\" size=\"30\" />
									</div>
								";
								}
								
						 ?></td>
                          </tr>
                          <tr>
                            <td height="30" align="right" valign="middle">&nbsp;</td>
                            <td height="30" align="left" valign="middle"><input type="submit" name="Submit2" value="บันทึกข้อมูล" />
                                <input type="submit" name="Submit2" value="ล้างข้อมูล" />
                                <input type="hidden" name="m_page" value="<?=$_GET['m_page']?>" />
                                <input type="hidden" name="ID" value="<?=$_GET['ID']?>" />
                                <input type="hidden" name="photo" value="<?=$rs1['mb_photo']?>" /></td>
                          </tr>
                        </table>
                    </form></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><p>&nbsp;</p>
                        <p>&nbsp;</p></td>
                  </tr>
                </table>
				<p>&nbsp;</p>				
				<div class="title">
                    <h2><img src="images/diagram-14.png" width="48" height="48" />ข้อมูลพนักงาน</h2>
                </div>
				<p>&nbsp;</p>				
				<table border="0" cellpadding="0" cellspacing="0" style="border-top: 0px solid #eee; width:100%; padding:0px; margin:0px;">
                  <tr>
                    <td align="left" valign="middle"><?php
//ติดต่อฐานข้อมูล
include "connect_db.php";

//
if(!isset($start)){
$start = 0;
}
$limit = 5;//$NUMMAX; // แสดงผลหน้าละกี่หัวข้อ
$Search = trim($_POST['txtSearch']); //ตัดซ่องวางของสตริง

	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$member." WHERE mb_status ='2'"); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record 
	$Query = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_status ='2' ORDER BY mb_id DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง

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
$detail_product = substr($result['prd_detail'], 0, 70) . "";
$c --;2
?>
                            <td align="left" valign="top" id="prd_bottom"><div id="prd_photo" style="width: 130px;">
                                <?PHP
			 // ถ้ามีรูปสินค้าให้แสดง แต่ถ้าไม่มีให้ แสดงภาพรอรูป
			  if(!$result['mb_photo']==""){ ?>
								<a href="Member/<?=$result['mb_photo']?>" rel="lightbox" title="<?=$result['mb_name']?>" > 
										<img  class="photo" src="Member/<?=$result['mb_photo']?>" width="110" height="132" border="0" />								</a>
                                <?php }else{ ?>
                           		<a href="images/photo.jpg" rel="lightbox" title="รอรูปสินค้า" > <img class="photo" src="images/photo.jpg" width="110" height="132" border="0" /> </a>
                                <?php } ?>
                              </div>
                                <div id="prd_line_height">
                                  <ul id="prd_ul" style="margin-left: 70px;">
                                    <li><strong>Username</strong> :<?=$result['mb_user']?></li>
                                    <li><strong>ชื่อ-สกุล</strong>: <?=$result['mb_name']?></li>
                                    <li><strong>เพศ</strong>: <? if($result['mb_sex']=='m'){ echo "ชาย"; }else{  echo "หญิง";  } ?> </li>
                                    <li><strong>ที่อยู่</strong>: <?=$result['mb_address']?></li>
                                    <li><strong>เบอร์โทร</strong>: <?=$result['mb_tel']?> </li>
                                    <li><strong>Email </strong>: <?=$result['mb_email']?></li>
                                    <li style="padding-top:5px;">
						<?PHP if($_SESSION['sess_emp_status']=='1'){ ?>
									<a href="edit_employee.php?m_page=<?=$_GET['m_page']?>&ID=<?=$result['mb_id']?>"> แก้ไข </a> | 
									<a href="del_employee.php?m_page=<?=$_GET['m_page']?>&ID=<?=$result['mb_id']?>"  onclick="return confirm('ยืนยัน ลบพนักงาน <?=$result['mb_name']?> ออกจากระบบ')"> ลบ </a>		<?php }else{ ?>
									<a href="#" style="color:#333;"  onclick=" return confirm('สำหรับผู้ดูแลระบบเท่านั้น')"> แก้ไข </a> | 
									<a href="#" style="color:#333;"  onclick=" return confirm('สำหรับผู้ดูแลระบบเท่านั้น')"> ลบ </a>
							<?php } ?>
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
				<p><span style="padding-top:10px;">
                  <?php  
		if($total ==0){
			echo "<p style='color: red; font-size: 20px;'>ไม่มีข้อมูล</p>";
		}else{
		//echo "<hr>";
		$i=1;
		echo "<center>";
		//echo "หน้าแรก";
		echo "<ul id='ulBangNa' style='text-align: left;'>
				<li>
		";

		echo "<a href='?m_page=".$_GET['m_page']."&start=".$limit*($i-1)."&page=$i' style='border:0px;'><B>หน้าแรก</B></a>";
		echo "</li>";
		echo "<li id='liBangNa'>";
		for($i=1;$i<=$page;$i++){
if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
echo "<a href='?m_page=".$_GET['m_page']."&start=".$limit*($i-1)."&page=$i' style='border:0px;'><B id='onHoverN''>$i</B></a>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
}else{
echo "<a href='?m_page=".$_GET['m_page']."&start=".$limit*($i-1)."&page=$i' style='border:0px;'>$i</a>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
}
}  
echo "</li>";
echo "<li>";
//echo "หน้าสุดท้าย";
echo "<a href='?m_page=".$_GET['m_page']."&start=".$limit*($i-2)."&page=$i' style='border:0px;'><b>หน้าสุดท้าย</b></a>";
	
echo "
		</li>
		</ul>
		";
echo "</center>";
}
?>
                </span></p>				<p>&nbsp;</p></td>
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
if($_POST){
if(!is_numeric($_POST['txtTel'])) { 
							echo "<script>alert('กรุณากรอก - เบอร์โทร เป็นตัวเลขเท่านั้น')</script>"; exit();
							}	
checkemail($_POST['txtEmail']); // ตรวจสอบรูปแบบเมล์
	$sql_select2 = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_id='".$_POST['ID']."'");
	$rs2 = mysqli_fetch_array($sql_select2);
		
$date_ary = explode("/", $_POST['txt_birthday']);

$day = $date_ary[0];
$month = $date_ary[1];
$year = $date_ary[2]-543;


$birthday =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง
		
	if($_POST['checkbox']==1){
							@unlink("Member/".$_POST['photo']);
							$Null = "";
							$QueryDel = mysqli_query($con,"UPDATE  ".$member." SET mb_photo='".$Null."' WHERE mb_id='".$_POST['ID']."'");		
							
		$Date = date("Y-m-d");	
		$sql_update2 = mysqli_query($con,"UPDATE ".$member." SET "
							."  mb_pass ='".$_POST['txtPass']."', 
								mb_name ='".$_POST['txtName']."', 
								mb_sex ='".$_POST['txtSex']."', 
								mb_birthday ='".$birthday."', 
								mb_address ='".$_POST['txtAddress']."', 
								mb_tel ='".$_POST['txtTel']."', 	
								mb_email ='".$_POST['txtEmail']."' WHERE mb_id='".$_POST['ID']."'");
	
	echo "<script>alert('บันทึกข้อมูลเสร็จแล้ว')</script>";
	echo "<meta http-equiv='refresh' content='0; url=admin_employee.php?m_page=".$_POST['m_page']."'>";
	}else{
		$Date = date("Y-m-d");
		$sql_update2 = mysqli_query($con,"UPDATE ".$member." SET "
							." mb_pass ='".$_POST['txtPass']."', 
								mb_name ='".$_POST['txtName']."', 
								mb_sex ='".$_POST['txtSex']."', 
								mb_birthday ='".$birthday."', 
								mb_address ='".$_POST['txtAddress']."', 
								mb_tel ='".$_POST['txtTel']."', 	
								mb_email ='".$_POST['txtEmail']."' WHERE mb_id='".$_POST['ID']."'");
		
		if($_FILES){
		$NumFile = count($_FILES['FileUpload'] ['name']);

			for($i=0; $i<$NumFile; $i++){
				if($_FILES['FileUpload'] ['error'] [$i] !=0){
					continue;
				}
			
			$FileName 	= $_FILES['FileUpload'] ['name'] [$i];
			$Filetype 		= $_FILES['FileUpload'] ['type'] [$i];
			$FileSize 		= $_FILES['FileUpload'] ['size'] [$i];
	 		$FileUpLoadtmp = $_FILES['FileUpload'] ['tmp_name'] [$i];
 
			if($FileUpLoadtmp){					 
					$array_last = explode(".",$FileName); // เป็น array หาจำนวน จุด . ของชื่อตัวแปร์
				
							$c = count($array_last) - 1; //นับจำนวน จุด "." ของชื่อตัวแปร์ 
							$lname = strtolower($array_last [$c]); // หา นามสกุลไฟล์ ตัวสุดท้ายของ ตัวแปร์
							$NewFileupload = date("U"); 
						    $NewFile = $NewFileupload.$i.".$lname"; //รวม ชื่อและนามสกลุดไฟล์เข้าด้วยกัน \

						if($lname=="gif" or $lname=="jpg" or $lname=="jpeg" or $lname=="png"){
	
								if(move_uploaded_file($FileUpLoadtmp, "Member/".$NewFile)){
									@unlink("Member/".$_POST['photo']);
									 
									$update_photo = mysqli_query($con,"UPDATE ".$member." SET mb_photo='".$NewFile."'  WHERE mb_id='".$_POST['ID']."'");	
									
									}else{
									echo "NO sucsess <br />";
									}
								}
							}				
						}
					}
							if($sql_update2){
										echo "<script>alert('บันทึกข้อมูลเสร็จแล้ว')</script>";
										echo "<meta http-equiv='refresh' content='0; url=admin_employee.php?m_page=".$_POST['m_page']."'>";
									}else{
										echo "<script>alert('Error : บันทึกข้อมูลไม่ได้')</script>";
										echo "<meta http-equiv='refresh' content='0; url=admin_employee.php?m_page=".$_POST['m_page']."'>";
									}							
							}	
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
