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
<body id="Page6">
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
          <td align="left" valign="top"><div class="title">
                <h2><img src="images/diagram-14.png" width="48" height="48" />ข้อมูลรูปแบบการจัดส่งสินค้า</h2>
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
 

	$Qtotal = mysqli_query($con,"SELECT * FROM  ems "); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record 
	$Query = mysqli_query($con,"SELECT * FROM ems ORDER BY ems_id ASC LIMIT $start,$limit"); //คิวรี่คำสั่ง

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
$c --;2
?>
                          <td align="left" valign="top" id="prd_bottom">
						  <div id="prd_photo" style="width: 55px;">
						  	 <img src="images/diagram-64.png" width="48" height="48" border="0" />
						  </div>
						  
                              <div id="prd_line_height">
                                <ul id="prd_ul" style="margin-left: 70px;">
								
                                  <li><strong>จัดส่งแบบ</strong> :<?=$result['ems_name']?> </li>
                                  <li><strong>ราคา</strong> : <samp style="color:red;"><?=number_format($result['ems_price'],2)?> </samp> บาท</li>
								  
                                  <li style="padding-top:5px;"> 
								  <a href="edit_format_ems.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$result['ems_id']?>">แก้ไข</a> | 
								  <a href="del_format_ems.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$result['ems_id']?>"  onclick="return confirm('ยืนยัน ลบรูปแบบการจัดส่ง <?=$result['ems_name']?> ออกจากระบบ')"> ลบ </a> </li>
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
              </span></p>
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
      </p>
      
	</div>
	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
