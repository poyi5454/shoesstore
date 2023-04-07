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
<title>รายงาน</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="images/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="StyleMenu.css" />
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
width:760px; 
height:auto; 
margin-left: 20%; 
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
</style>
</head>
<body style="background:#fafafa; padding-top: 20px;"  onload="window.print(); window.close();">
<div id="PrintMember"><a href="#"onClick="window.print();"></a></div>
<div style="display:block; border:1px dotted #333; width:800px; height:auto; background:white; margin:0 auto;">
<div style="display:block; padding:5px; height:auto;">

  	<p style="display:block; padding-top: 10px; font-size:11px; text-align:right; padding-right: 10px;">&nbsp;</p>
 	<table width="100%" height="500" border="0" cellspacing="2">
      <tr>
        <td align="left" valign="top">
		  <div style="padding:10px; text-align:center; font-size:20px; border-bottom: 5px solid #ddd;">
		    <p>รายงานกาขายสินค้า</p>
		    <p style="font-size:15px;">ร้าน xxxxxxxxxxxxxxxxxxxxxxx </p>
		  </div>
		  <div style="padding:10px; text-align:left;">
		  	<p>
			วันที่ 
		   <samp style="color:red;"><?=displaydate($_GET['Date1'])?></samp> ถึงวันที่  <samp style="color:red;"><?=displaydate($_GET['Date2'])?></samp> 
		   <a href="print_report2.php?m_page=<?=$_GET['m_page']?>&Date1=<?=$date_back1?>&amp;Date2=<?=$date_now1?>" target="_blank"></a>		   </p>
		  </div>
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
	    <p>
 <?php  

//เลือกข้อมูลในตารางออกมาแสดงโดยใช้คำสั่ง SELECT 
$q="SELECT * FROM ".$order."  WHERE (ord_date BETWEEN '".$_GET['Date1']."' and '".$_GET['Date2']."' AND ord_status IN('3')) ORDER BY ord_id DESC";  

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
        </p>
	    <ul class="none" style="list-style:none;">
	      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="13%" height="30" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>รหัสใบสั่งซื้อ</strong></td>
              <td width="50%" align="left" valign="middle" bgcolor="#999999" class="sell"><strong>&nbsp;</strong><strong style="padding-left: 5px;">รายชื่อผู้สั่งซื้อ</strong></td>
              <td width="18%" align="center" valign="middle" bgcolor="#999999" class="sell"><strong>สถานะ</strong></td>
              <td width="19%" height="30" align="center" valign="middle" bgcolor="#999999" class="sellright"><span style="font-weight: bold">&nbsp;</span><strong>ราคา</strong></td>
            </tr>
            <?php
	}							
  $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
  $i=1;
  
// ทำการวนลูปข้อมูลในตารางออกมาแสดง
while($Result=mysqli_fetch_array($qr)){  
									$i;
									$id_ordin = sprintf("%05d",$Result['ord_id']);

?>
            <li>
              <tr>
                <td width="13%" height="22" align="center" valign="middle" bgcolor="#F0F0F0" class="sell1"><?=$id_ordin?></td>
                <td align="left" valign="middle" bgcolor="#F0F0F0" class="sell1">&nbsp;
                    <?=$Result['ord_name']?></td>
                <td align="center" valign="middle" bgcolor="#F0F0F0" class="sell1"><?PHP
// ถ้าสถานะเท่ากับ Y  คือ  ข้อมูลสั่งซื้อสิค้าใหม่ยังไม่ชำระเงิน
	if($Result['ord_status']=='Y'){
						echo "<samp style='color: red;'>ยังไม่ชำระเงิน</samp>";
						
						}else if($Result['ord_status']=='1'){ // 1 คือสถานะ คือ แจ้งชำระเงินผ่านหน้าเว็บไซต์
						echo "<samp style='color: green;'>กำลังตรวจสอบ</samp>";
						
						}else if($Result['ord_status']=='2'){ // 2 คือสถานะ คือ ตรวจสอบการชำระเงินแล้ว 
						echo "<samp style='color: blue;'>ชำระเงินแล้ว</samp>";
						
						}else if($Result['ord_status']=='3'){ // 3 คือสถานะ คือ อนุมัติสินค้าแล้ว
						echo "<samp style='color: #FF6600;'>อนุมัติสินค้าแล้ว</samp>";
						
						}else if($Result['ord_status']=='4'){ // 4 คือสถานะ รอส่งสินค้า
						echo "<samp style='color: #660033;'>รอส่งสินค้า</samp>";
						
						}else if($Result['ord_status']=='5'){ // 5 คือสถานะ ส่งสินค้าแล้ว
						echo "<samp style='color: #6633FF;'>ส่งสินค้าแล้ว</samp>";
						
						}else if($Result['ord_status']=='N'){ // N คือสถานะ ยกเลิกใบสั่งซื้อสินค้า
						echo "<samp style='color: #666;'>ยกเลิกแล้ว</samp>";
						
						}					
						else{
						echo "<samp style='color: red;'>ไม่มีข้อมูล</samp>";
						}
				?></td>
                <td height="22" align="center" valign="middle" bgcolor="#F0F0F0" class="sellright1" style="padding-left: 5px;"><?=number_format($Result['ord_total'],2)?>
                  บาท </td>
              </tr>
            </li>
	        <?PHP $no++; $i++?>
            <?php 
	
	$total_price= $total_price + $Result['ord_total'];
	 }
?>
            <tr>
              <td height="25" colspan="3" align="right" valign="middle" bgcolor="#FAFAFA" class="sell1"><div style="padding-right: 5px; font-weight:bold;">รายได้รวม</div></td>
              <td height="25" align="left" valign="middle" bgcolor="#FAFAFA" class="sellright1" style="padding-left: 5px; color:red;"><?=number_format($total_price,2)?>
                บาท </td>
            </tr>
          </table>
	      </ul>
	    <?php if($total>0){ ?>
        <div class="browse_page" style="margin-left: 5px;"></div>
        <?php } ?>
        <p>&nbsp;  </p></td>
      </tr>
    </table>
 	<p>&nbsp;</p>

  </div>
</div>
<div id="PrintMember"></div>
</body>
</html>
