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
<link rel="stylesheet" type="text/css" href="css_style_page.css" /></head>
<body id="Page4">
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
                    <h2><img src="images/diagram-60.png" width="48" height="48" />ข้อมูลใบจัดซื้อสินค้าเข้าร้าน</h2>
                </div>
				<div style="padding:10px; font-size:15px; font-weight:bold; color:#FF0000; border-bottom: 1px solid #ddd;">
				  <form id="form1" name="form1" method="post" action="admin_order_in.php?page=<?=$_GET['page']?>">
				    <img src="images/Search.png" />รหัสใบจัดซื้อ : 
				    <input name="txtSearch" type="text" id="txtSearch" style="width: 200px;" />
				    <input type="submit" name="Submit" value="ค้าหา" />
				  </form>
			    
			    </div>
                <p>&nbsp;</p>
                <p>
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
        echo "<a  href='?m_page=".$_GET['m_page']."&s_page=$pPrev&urlquery_str=".$urlquery_str."' class='naviPN'>Prev</a>";  
    }  
    if($total_p>=11){  
        if($chk_page>=4){  
            echo "<a $nClass href='?m_page=".$_GET['m_page']."&s_page=0&urlquery_str=".$urlquery_str."'>1</a><a class='SpaceC'>. . .</a>";     
        }  
        if($chk_page<4){  
            for($i=0;$i<$total_p;$i++){    
                $nClass=($chk_page==$i)?"class='selectPage'":"";  
                if($i<=4){  
                echo "<a $nClass href='?m_page=".$_GET['m_page']."&s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";     
                }  
                if($i==$total_p-1 ){   
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?m_page=".$_GET['m_page']."&s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";     
                }         
            }  
        }  
        if($chk_page>=4 && $chk_page<$lt_page){  
            $st_page=$chk_page-3;  
            for($i=1;$i<=5;$i++){  
                $nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";  
                echo "<a $nClass href='?m_page=".$_GET['m_page']."&s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";      
            }  
            for($i=0;$i<$total_p;$i++){    
                if($i==$total_p-1 ){   
                $nClass=($chk_page==$i)?"class='selectPage'":"";  
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?m_page=".$_GET['m_page']."&s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";     
                }         
            }                                     
        }     
        if($chk_page>=$lt_page){  
            for($i=0;$i<=4;$i++){  
                $nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";  
                echo "<a $nClass href='?m_page=".$_GET['m_page']."&s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";     
            }  
        }          
    }else{  
        for($i=0;$i<$total_p;$i++){    
            $nClass=($chk_page==$i)?"class='selectPage'":"";  
            echo "<a href='?m_page=".$_GET['m_page']."&s_page=$i&urlquery_str=".$urlquery_str."' $nClass  >".intval($i+1)."</a> ";     
        }         
    }     
    if($chk_page<$total_p-1){  
        echo "<a href='?m_page=".$_GET['m_page']."&s_page=$pNext&urlquery_str=".$urlquery_str."'  class='naviPN'>Next</a>";  
    }  
}     
?>
                </p>
<ul class="none">
                  <?php  
 
$Search = trim($_POST['txtSearch']); //ตัดซ่องวางของสตริง

if($_POST){
//ทำให้เป็นจำนวนเต็มเพื่อใช้คนหา ตามรหัส
$num_search =  number_format($Search);
}
//เลือกข้อมูลในตารางออกมาแสดงโดยใช้คำสั่ง SELECT 
$q="SELECT * FROM ".$order_in." WHERE (ordin_id LIKE '%".$num_search."%') ORDER BY ordin_id DESC";  

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
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="13%" height="30" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>รหัสใบจัดซื้อ</strong></td>
                      <td width="25%" align="left" valign="middle" bgcolor="#999999" class="sell"><strong>&nbsp;ชื่อผู้เพิ่มสินค้า</strong></td>
                      <td width="17%" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>วันที่สั่งซื้อ</strong></td>
                      <td width="14%" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>ราคาต้นทุน</strong></td>
                      <td width="14%" height="30" align="center" valign="middle" bgcolor="#999999" class="sell"><span style="font-weight: bold">&nbsp;</span><strong>สถานะ</strong></td>
                      <td width="10%" height="30" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>ข้อมูล</strong></td>
                      <td width="7%" height="30" align="center" valign="middle" bgcolor="#999999" class="sellright"><strong>ลบ</strong></td>
                    </tr>
                    <?php
	}							
  $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
  $i=1;
  
// ทำการวนลูปข้อมูลในตารางออกมาแสดง
while($Result=mysqli_fetch_array($qr)){  
									$i;
									$id_ordin = sprintf("%05d",$Result['ordin_id']);

?>
                    <li>
                      <tr>
                        <td width="13%" height="22" align="center" valign="middle" bgcolor="#F0F0F0" class="sell1"><?=$id_ordin?></td>
                        <td align="left" valign="middle" bgcolor="#F0F0F0" class="sell1">&nbsp;                          <?=$Result['name_emp']?></td>
                        <td align="center" valign="middle" bgcolor="#F0F0F0" class="sell1"><?=displaydate($Result['date_now'])?></td>
                        <td align="center" valign="middle" bgcolor="#F0F0F0" class="sell1"><?=number_format($Result['ordin_capital'],2)?></td>
                        <td height="22" align="center" valign="middle" bgcolor="#F0F0F0" class="sell1" style="padding-left: 5px;">
						
						<?php
						
						if($Result['ordin_status']=='N'){
						echo "<samp style='color: red;'>รอสินค้าเข้า</samp>";
						}else if($Result['ordin_status']=='Y'){
						echo "<samp style='color: green;'>ตรวจรับแล้ว</samp>";
						}else{
						echo "<samp style='color: red;'>ผิดพลาด</samp>";
						}
						
						?>
						
						</td>
                        <td width="10%" height="22" align="center" valign="middle" bgcolor="#F0F0F0" class="sell1">
						[<a href="print_check_ordin.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$Result['ordin_id']?>">ข้อมูล</a>]
						</td>
                        <td width="7%" height="22" align="center" valign="middle" bgcolor="#F0F0F0" class="sellright1">
						[<a href="del_ordin.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$Result['ordin_id']?>"  onclick="return confirm('ยืนยันลบใบจัดซื้อเลขที่ <?=$id_ordin?> ออกจากระบบ')">ลบ</a>]
						</td>
                      </tr>
                    </li>
                    <?PHP $no++; $i++?>
                    <?php } ?>
                  </table>
                </ul>
                <?php if($total>0){ ?>
                <div class="browse_page" style="margin-left: 5px;">
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
      </p>
      
	</div>
	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
