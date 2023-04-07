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
  	  <div class="title"> 
		    <h2><img src="images/pencil_48.png" width="48" height="48" /> แก้ไขประเภทสินค้า</h2>
      </div>
	  	  <p>&nbsp;</p>
<form action="<?PHP $_SERVER['PHP_SELF']?>" method="post"  id="form1"  name="form1" onsubmit="return CHLogIn();">
 <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
<?PHP
	include "connect_db.php";
		$sql = mysqli_query($con,"SELECT * FROM ".$product_type." WHERE type_id='".$_GET['ID']."'");
		$rs = mysqli_fetch_array($sql);
?>				  
                    <tr>
                      <td width="17%" height="25" align="right" valign="middle"><strong>ประเภทสินค้า : </strong></td>
                      <td width="83%" height="25"><input name="txt_name" type="text" id="txt_name"  style="width: 70%;" value="<?=$rs['type_name']?>"/></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" valign="middle">&nbsp;</td>
                      <td height="25"><input type="submit" name="Submit2" value="บันทึกข้อมูล" />
                      <input type="hidden" name="ID"  value="<?=$_GET['ID']?>"/></td>
                    </tr>
                  </table>
                  <script language="JavaScript" type="text/javascript">
				  	function CHLogIn(){
					
						if(document.form1.txt_name.value==""){
									alert("กรุณากรอกข้อมูล ประเภทสินค้าด้วยนะ");
									document.form1.txt_name.focus();
									return false;
							}else {
									return true;
							}
						
					}
				  </script>
      </form>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <div class="title">
            <h2><img src="images/icon-05.png" width="32" height="32" /> รายงานประเภทสินค้า </h2>
      </div>
	  	  <table width="90%" height="650" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" valign="top">
<?php  
	// ติดต่อฐานข้อมูล
	include "connect_db.php";
	$link= $connect;
?>

<?php     
// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า     
function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){     
    global $urlquery_str;  
	global $id_type;
    $pPrev=$chk_page-1;  
    $pPrev=($pPrev>=0)?$pPrev:0;  
    $pNext=$chk_page+1;  
    $pNext=($pNext>=$total_p)?$total_p-1:$pNext;       
    $lt_page=$total_p-4;  
    if($chk_page>0){    
        echo "<a  href='?s_page=$pPrev&urlquery_str=".$urlquery_str."' class='naviPN'>Prev</a>";  
    }  
    if($total_p>=11){  
        if($chk_page>=4){  
            echo "<a $nClass href='?s_page=0&urlquery_str=".$urlquery_str."'>1</a><a class='SpaceC'>. . .</a>";     
        }  
        if($chk_page<4){  
            for($i=0;$i<$total_p;$i++){    
                $nClass=($chk_page==$i)?"class='selectPage'":"";  
                if($i<=4){  
                echo "<a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";     
                }  
                if($i==$total_p-1 ){   
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";     
                }         
            }  
        }  
        if($chk_page>=4 && $chk_page<$lt_page){  
            $st_page=$chk_page-3;  
            for($i=1;$i<=5;$i++){  
                $nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";  
                echo "<a $nClass href='?s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";      
            }  
            for($i=0;$i<$total_p;$i++){    
                if($i==$total_p-1 ){   
                $nClass=($chk_page==$i)?"class='selectPage'":"";  
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";     
                }         
            }                                     
        }     
        if($chk_page>=$lt_page){  
            for($i=0;$i<=4;$i++){  
                $nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";  
                echo "<a $nClass href='?s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";     
            }  
        }          
    }else{  
        for($i=0;$i<$total_p;$i++){    
            $nClass=($chk_page==$i)?"class='selectPage'":"";  
            echo "<a href='?s_page=$i&urlquery_str=".$urlquery_str."' $nClass  >".intval($i+1)."</a> ";     
        }         
    }     
    if($chk_page<$total_p-1){  
        echo "<a href='?s_page=$pNext&urlquery_str=".$urlquery_str."'  class='naviPN'>Next</a>";  
    }  
}     
?>
</p>
<ul class="none">
				
 <?php  
 
$Search = trim($_POST['txtSearch']); //ตัดซ่องวางของสตริง

//เลือกข้อมูลในตารางออกมาแสดงโดยใช้คำสั่ง SELECT 
$q="SELECT * FROM ".$product_type." ORDER BY type_id ASC";  

//ทำการ query ข้อมูล
$qr=mysqli_query($con,$q);  
// นับจำนวนแถว หรือ คอลัมน์ ในตาราง
$total=mysqli_num_rows($qr);  

$e_page=20; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า     

//ตรวจสอบข้อมูลที่จะทำการแบ่งหน้า
if(!isset($_GET['s_page'])){     
    	$_GET['s_page']=0;     
		
		}else{     
    		$chk_page=$_GET['s_page'];       
 			   $_GET['s_page']=$_GET['s_page']*$e_page;     
		}  
			   
	$q.=" LIMIT ".$_GET['s_page'].",$e_page";  
	$qr=mysqli_query($con,$q);
	  
	if(mysqli_num_rows($qr)>=1){     
    $plus_p=($chk_page*$e_page)+mysqli_num_rows($qr);     
		}else{     
    $plus_p=($chk_page*$e_page);         //$plus_p มีค่าอยู่ที่ 100
	}    
	 
$total_p=ceil($total/$e_page);     
$before_p=($chk_page*$e_page)+1;    //$before_p มีค่าอยู่ที่ 50
?>

<?php  // ถ้าไม่มีข้อมูล และถ้ามีข้อมูลก็ให้แสดงข้อมูลออกเป็นตาราง
		if($total==0){
			echo "<div style='padding: 20px; color: red;'><h1>ไม่มีข้อมูล</h1></div>";
				}else{
		?>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="11%" height="30" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>ลำดับ</strong></td>
                      <td width="68%" height="30" align="left" valign="middle" bgcolor="#999999" class="sell"><span style="font-weight: bold">&nbsp;ข้อมูลประเภทสินค้า</span></td>
                      <td width="11%" height="30" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>แก้ไข</strong></td>
                      <td width="10%" height="30" align="center" valign="middle" bgcolor="#999999" class="sellright"><strong>ลบ</strong></td>
                    </tr>
                    <?php
	}							
  $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
  $i=1;
  
// ทำการวนลูปข้อมูลในตารางออกมาแสดง
while($Result=mysqli_fetch_array($qr)){  
									$i;
									$Name = $Result['name'];

?>
                    <li>
                      <tr>
                        <td width="11%" height="22" align="center" valign="middle" bgcolor="#F0F0F0" class="sell1"><?=$i?></td>
                        <td height="22" align="left" valign="middle" bgcolor="#F0F0F0" class="sell1" style="padding-left: 5px;"><?=$Result['type_name']?></td>
                        <td width="11%" height="22" align="center" valign="middle" bgcolor="#F0F0F0" class="sell1">
						<a href="edit_type.php?m_page=<?=$_GET['m_page']?>&ID=<?=$Result['type_id']?>">แก้ไข</a></td>
                        <td width="10%" height="22" align="center" valign="middle" bgcolor="#F0F0F0" class="sellright1">
						<a href="del_type.php?m_page=<?=$_GET['m_page']?>&ID=<?=$Result['type_id']?>"  onclick="return confirm('ยืนยันลบประเภท <?=$Result['type_name']?> ออกจากระบบ')">ลบ</a></td>
                      </tr>
                    </li>
                    <?PHP $no++; $i++?>
                    <?php } ?>
                  </table>
                </ul>
                <?php if($total>0){ ?>
                <div class="browse_page">
                  <?php     
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า     
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);       
  ?>
                </div>
              <?php } ?></td>
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
		//ติดต่อฐานข้อมูล
	  	include "connect_db.php";
		
		if($_POST){
		// แก้ไขข้อมูล
		$sql_update = mysqli_query($con,"UPDATE  ".$product_type." SET  type_name='".$_POST['txt_name']."'  WHERE type_id='".$_GET['ID']."'");
		
		// ถ้าแก้ไขข้อมูล
		if($sql_update){						
				echo "<script>alert('บันทึกข้อมูลเสร็จแล้ว')</script>";
				echo "<meta http-equiv='refresh' content='0; url=admin_add_type.php?m_page=3'>";
			}else{
				echo "<script>alert('Error: บันทึกข้อมูลไม่ได้')</script>";
				echo "<meta http-equiv='refresh' content='0; url=admin_add_type.php?m_page=3'>";
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
