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
<link rel="stylesheet" type="text/css" href="css_style_page.css" />
<?php include "inc_js_datepicker.php"; ?>
<style type="text/css">
.style2 {color: #FF0000}
</style>
</head>
<body id="Page0">
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
              <h2><img src="images/pencil_48.png" width="48" height="48" /> แก้ไขข้อมูลส่วนตัว </h2>
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
                <td height="30" align="left" valign="top"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="FMemBer" name="FMemBer" onsubmit="return CHMEMBER();">
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
                        <td width="83%" height="25" align="left" valign="middle"><input name="txt_username" type="text" id="txt_username" style="width: 40%; color:#333;" value="<?=$rs1['mb_user']?>" disabled="disabled" />
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
                        <td height="25" align="right" valign="middle"><strong>วันเกิด : </strong></td>
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
                        <td height="25" align="left" valign="middle">
                          <input name="txtTel" type="text" id="txtTel" style="width:40%" value="<?=$rs1['mb_tel']?>" maxlength="10" />
                          <span class="style2">*</span></td>
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
                            <input type="hidden" name="m_page" value="<?php echo $_GET['m_page']; ?>" />
                            <input type="hidden" name="ID" value="<?php echo $_GET['ID']; ?>" />
                            <input type="hidden" name="photo" value="<?php echo $rs1['mb_photo']; ?>" /></td>
                      </tr>
                    </table>
                </form></td>
              </tr>
              <tr>
                <td align="left" valign="top"><p>&nbsp;</p>
                    <p>&nbsp;</p></td>
              </tr>
            </table>
            <p></p>
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
        <?PHP
if($_POST){


if(!is_numeric($_POST['txtTel'])) { 
							echo "<script>alert('กรุณากรอก - เบอร์โทร เป็นตัวเลขเท่านั้น')</script>"; exit();
							}	
// checkemail($_POST['txtEmail']); // ตรวจสอบรูปแบบเมล์

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
	echo "<meta http-equiv='refresh' content='0; url=member_main.php'>";
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
										echo "<meta http-equiv='refresh' content='0; url=member_main.php'>";
									}else{
										echo "<script>alert('Error : บันทึกข้อมูลไม่ได้')</script>";
										echo "<meta http-equiv='refresh' content='0; url=member_main.php'>";
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
