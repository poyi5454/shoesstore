<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?PHP
 include "connect_db.php";
			
			if(!empty($_GET['ID_admin'])){ //ตรวจสอบข้อมูลจาก $_GET['ID_admin'] ถ้ามีให้ทำคำสั่งด้านล่างนี้
			$sql_select = mysqli_query($con,"SELECT * FROM ".$order." WHERE ord_id='".$_GET['ID_admin']."'");
			$rs2 = mysqli_fetch_array($sql_select);
			$Name = $rs2['ord_id'];
			
			// ลบข้อมูลในตาราง order
			$sql_delete = mysqli_query($con,"DELETE FROM ".$order." WHERE ord_id='".$rs2['ord_id']."'");
			
			//$sql_select = mysql_query("SELECT * FROM ".$payment." WHERE pm_Order_id ='".$rs2['ord_id']."'");
			//$rs_pmt =mysql_fetch_array($sql_select);
			// ลบข้อมูลในตาราง payment และรูปภาพ
			//@unlink("payment/".$rs_pmt['Image_Receipt']);
			//$sql_delete2 = mysql_query("DELETE FROM ".$payment." WHERE pm_Order_id ='".$rs2['ord_id']."'");
			
				if($sql_delete) {
				$sql_delete3 = mysqli_query($con,"DELETE FROM ".$order_detail." WHERE od_id_ord='".$rs2['od_id']."'");
					echo "<script>alert('ลบข้อมูล ใบสั่งซื้อสินค้า ".sprintf("%05d",$Name)." ออกจากระบบแล้ว')</script>";
					
					echo "<meta http-equiv='refresh' content='0; url=admin_main.php?m_page=".$_GET['m_page']."'>";
				}else{
					echo "<script>alert('Error: ลบข้อมูลไม่ได้')</script>";
					echo "<meta http-equiv='refresh' content='0; url=admin_main.php?m_page=".$_GET['m_page']."'>";
				}
				
				
			}else if(!empty($_GET['IDMb'])){//ตรวจสอบข้อมูลจาก $_GET['IDMb'] ถ้ามีให้ทำคำสั่งด้านล่างนี้
			
				$sql_select = mysqli_query($con,"SELECT * FROM ".$order." WHERE ord_id='".$_GET['IDMb']."'");
				$rs2 = mysqli_fetch_array($sql_select);
				$Name = $rs2['ord_id'];
				
				$sql_delete = mysqli_query($con,"DELETE FROM ".$order." WHERE ord_id='".$rs2['ord_id']."'");
				
				if($sql_delete){
					$sql_delete2 = mysqli_query($con,"DELETE FROM ".$order_detail." WHERE od_id_ord='".$rs2['ord_id']."'");
					
					//$sql_select1 = mysql_query("SELECT * FROM ".$payment." WHERE pm_Order_id ='".$rs2['ord_id']."'");
					//$rs_pmt =mysql_fetch_array($sql_select1);
					
					// ลบข้อมูลในตาราง payment และรูปภาพ
					//@unlink("payment/".$rs_pmt['Image_Receipt']);
					//$sql_delete3 = mysql_query("DELETE FROM ".$payment." WHERE pm_Order_id ='".$rs2['ord_id']."'");
					
						echo "<script>alert('ลบข้อมูล ใบสั่งซื้อสินค้า ".sprintf("%05d",$Name)." ออกจากระบบแล้ว')</script>";
						echo "<meta http-equiv='refresh' content='0; url=member_order1.php'>";
					} else {
						echo "<script>alert('Error: ลบข้อมูลไม่ได้')</script>";
						echo "<meta http-equiv='refresh' content='0; url=member_order1.php'>";
					}
			}
?>
</body>
</html>
