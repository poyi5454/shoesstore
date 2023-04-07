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
.style2{ color:red; }
</style>
</head>
<body id="Page3">
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
	  <table width="100%" height="650" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><div class="title">
            <h2><img src="images/pencil_48.png" width="48" height="48" /> แก้ไขสินค้า</h2>
          </div>
		  <form action="<?PHP $_SERVER['PHP_SELF']?>" method="post"  id="form1"  name="form1" enctype="multipart/form-data" onsubmit="return chk_txt();">
            <p>
              <script language="JavaScript" type="text/javascript">
				  	function chk_txt(){
					 if(document.form1.txt_name.value==""){
									alert("กรุณากรอก ชื่อสินค้าด้วยนะ");
									document.form1.txt_name.focus();
									return false;
						}
						else if(document.form1.txt_type.value=="0"){
									alert("กรุณาเลือกประเภทสินค้าด้วยนะ");
									return false;
							}
							else if(document.form1.txt_detail.value==""){
									alert("กรุณากรอก กรอกรายละเอียดสินค้าในถูกต้องด้วยนะ");
									document.form1.txt_detail.focus();
									return false;
							} 
							else if(document.form1.txt_price.value==""){
									alert("กรุณากรอก ราคาขายหน้าร้านด้วยนะ");
									document.form1.txt_price.focus();
									return false;
							}
							else if(document.form1.txt_stock.value==""){
									alert("กรุณากรอก จำนวนสินค้าด้วยนะ");
									document.form1.txt_stock.focus();
									return false;
							}
							else {
									return true;
							}
						
					}
				  </script>
              </p>
            <p>&nbsp;</p>
 <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
 <?PHP
 	include "connect_db.php";
	$sql_select = mysqli_query($con,"SELECT * FROM $product WHERE prd_id='".$_GET['ID']."'");
	$rs = mysqli_fetch_array($sql_select);
 ?>
    <tr>
      <td width="17%" height="25" align="right" valign="middle"><strong>ชื่อสินค้า : </strong></td>
      <td width="83%" height="25"><input name="txt_name" type="text" id="txt_name"  style="width: 70%;" value="<?=$rs['prd_name']?>"/>
          <span class="style2">*</span></td>
    </tr>
    <tr>
      <td height="25" align="right" valign="middle"><strong>ประเภทสินค้า : </strong></td>
      <td height="25"><select name="txt_type" id="txt_type" style="width: 50%; height:22px;">
        <?php
							include "connect_db.php";
							$sql_select2 = mysqli_query($con,"SELECT * FROM ".$product_type."");
							while($rs2=mysqli_fetch_array($sql_select2)) {
									$id =$rs2['type_id'];
									$name =$rs2['type_name'];
									
								if($rs['prd_type']==$id){
										echo  "<option value =".$id." selected>".$name."</option>";
									}else{
										echo  "<option value =".$id.">".$name."</option>";
									}	
							}
						?>
      </select>
          <span class="style2">*</span></td>
    </tr>
    <tr>
      <td height="25" align="right" valign="top"><strong>รายละเอียด : </strong></td>
      <td height="25"><textarea name="txt_detail" rows="5" id="txt_detail" style="width: 85%;"><?=$rs['prd_detail']?></textarea>
          <span class="style2">*</span></td>
    </tr>
    <tr>
      <td height="25" align="right" valign="middle"><strong>ราคาขาย : </strong></td>
      <td height="25"><input name="txt_price"  type="number" min="1" max="1000000"  id="txt_price"  style="width:20%;" value="<?=$rs['prd_price']?>"/>
          <span class="style2">*</span></td>
    </tr>
	 <tr>
      <td height="25" align="right" valign="middle"><strong>จำนวน : </strong></td>
      <td height="25"><input name="txt_stock"  type="number" min="1" max="1000000"  id="txt_stock"  style="width:20%;" value="<?=$rs['prd_stock']?>"/>
          <span class="style2">*</span></td>
    </tr>
    <tr>
      <td height="25" align="right" valign="middle"><strong>รูปสินค้า : </strong></td>
      <td height="25">
	  <?PHP
if(!empty($rs['prd_photo'])){
		        $xy = @getimagesize("Product/".$rs['prd_photo']."");
                        $tx = $xy[0];
                        $ty = $xy[1];
	

			$x = 200;
			$y = $ty/$tx;
			$y = $y * 200;
}
?>
	  <?PHP
							if(!$rs['prd_photo']==""){	?>
							<ul style="list-style: none;">
					  						<li id=\"liPhoto\">
										
												<a href="Product/<?=$rs['prd_photo']?>" rel="lightbox" title="<?=$rs['prd_name']?>" >
												<img class="photo" src="Product/<?=$rs['prd_photo']?>" width="<?=$x?>" height="<?=$Y?>"/>									</a>										</li>
					  					</ul>
										<p style="clear:left;"></p>	
										<div>
											<input type="checkbox" name="checkbox" value="1" />ลบรูป
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
      <td height="25" align="right" valign="middle">&nbsp;</td>
      <td height="25"><input type="submit" name="Submit2" value="บันทึกข้อมูลสินค้า" />
        <input type="hidden" name="m_page" value="<?=$_GET['m_page']?>" />
        <input type="hidden" name="ID" value="<?=$_GET['ID']?>" />
		<input type="hidden" name="photo" value="<?=$rs['prd_photo']?>" />		</td>
    </tr>
  </table>
</form>
	  
		  <p>&nbsp;</p></td>
        </tr>
      </table>
	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
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


if(!is_numeric($_POST['txt_price'])) { 
echo "<script>alert('กรุณากรอกราคาสินค้าให้ถูกต้องด้วยนะ')</script>"; exit();
}							
if($_POST['txt_price']<=0){
echo "<script>alert('กรุณากรอกราคาสินค้าให้ถูกต้องด้วยนะ')</script>"; exit();
}

	//	ติดต่อฐานข้อมูล
	include "connect_db.php";		
			
	if($_POST['checkbox']==1){
							@unlink("Product/".$_POST['photo']);
							$Null = "";
							$sql_update1 = mysqli_query($con,"UPDATE ".$product." SET prd_photo='".$Null."' WHERE prd_id='".$_POST['ID']."'");		
								
	$Date = date("Y-m-d");	
	$sql_update2 = mysqli_query($con,"UPDATE ".$product." SET "
							
							." prd_name ='".$_POST['txt_name']."', 
								prd_type ='".$_POST['txt_type']."', 
								prd_detail ='".$_POST['txt_detail']."', 
								prd_stock  ='".$_POST['txt_stock']."', 
								prd_price  ='".$_POST['txt_price']."' WHERE prd_id='".$_POST['ID']."'");
								
	echo "<script>alert('บันทึกข้อมูลเสร็จแล้ว')</script>";
	echo "<meta http-equiv='refresh' content='0; url=admin_product.php?m_page=".$_POST['m_page']."'>";
	}else{

	$sql_update2 = mysqli_query($con,"UPDATE ".$product." SET "
							
							." prd_name ='".$_POST['txt_name']."', 
								prd_type ='".$_POST['txt_type']."', 
								prd_detail ='".$_POST['txt_detail']."', 
								prd_stock  ='".$_POST['txt_stock']."', 
								prd_price  ='".$_POST['txt_price']."' WHERE prd_id='".$_POST['ID']."'");
		
							if($sql_update2){
										echo "<script>alert('บันทึกข้อมูลเสร็จแล้ว')</script>";
										echo "<meta http-equiv='refresh' content='0; url=admin_product.php?m_page=".$_POST['m_page']."'>";
									}else{
										echo "<script>alert('Error : บันทึกข้อมูลไม่ได้')</script>";
										echo "<meta http-equiv='refresh' content='0; url=admin_product.php?m_page=".$_POST['m_page']."'>";
									}							
							}	
						}
						
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
	
								if(move_uploaded_file($FileUpLoadtmp, "Product/".$NewFile)){ 
									 @unlink("Product/".$_POST['photo']);
									$QueryPHO = mysqli_query($con,"UPDATE ".$product." SET prd_photo='".$NewFile."'  WHERE prd_id='".$_POST['ID']."'");		
								}else{
									echo "NO sucsess <br />";
								}
							}
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
