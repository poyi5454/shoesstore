<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?PHP
//ติดต่อฐานข้อมูล
 include "connect_db.php";

	//ตรวจสอบว่า $_GET['ID'] มีข้อมูลไหม ถ้ามีให้ทำงานใน ปีกกา
	if(!empty($_GET['ID'])){
			$sql_update = mysqli_query($con,"UPDATE ".$order." SET ord_status='N' WHERE ord_id='".$_GET['ID']."'");
			if($sql_update){
			echo "<script>alert('การยกเลิกใบสั่งซื้อสำเร็จ')</script>";
			echo "<meta http-equiv='refresh' content='0; url=member_order1.php'>";
			}else{
			echo "<script>alert('ไม่สามารถยกเลิกใบสั่งซื้อได้')</script>";
			echo "<meta http-equiv='refresh' content='0; url=member_order1.php'>";
			}
			//ตรวจสอบว่า $_GET['ID_admin'] มีข้อมูลไหม ถ้ามีให้ทำงานใน ปีกกา
		}else if(!empty($_GET['ID_admin'])){
			$sql_update = mysqli_query($con,"UPDATE ".$order." SET ord_status='N' WHERE ord_id='".$_GET['ID_admin']."'");
				if($sql_update){
				echo "<script>alert('การยกเลิกใบสั่งซื้อสำเร็จ')</script>";
				echo "<meta http-equiv='refresh' content='0; url=admin_main.php?m_page=".$_GET['m_page']."'>";
				}else{
				echo "<script>alert('ไม่สามารถยกเลิกใบสั่งซื้อได้')</script>";
				echo "<meta http-equiv='refresh' content='0; url=admin_main.php?m_page=".$_GET['m_page']."'>";
			}
		}

?>
</body>
</html>
