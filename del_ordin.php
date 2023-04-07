<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?PHP
include "connect_db.php";
//@unlink("UpFileUser/".$_GET['DelPhoto']);
$sql_del = mysqli_query($con,"DELETE FROM ".$order_in." WHERE ordin_id='".$_GET['ID']."'");

	if($sql_del) {
	
		$sql_del2 = mysqli_query($con,"DELETE FROM ".$order_in_detail." WHERE idord='".$_GET['ID']."'");
		
		echo "<script>alert('ลบข้อมูล เสร็จแล้ว')</script>";
		echo "<meta http-equiv='refresh' content='0; url=admin_order_in.php?m_page=".$_GET['m_page']."'>";
	} else {
		echo "<script>alert('Error: ลบข้อมูลไม่ได้')</script>";
		echo "<meta http-equiv='refresh' content='0; url=admin_order_in.php?m_page=".$_GET['m_page']."'>";
	}
?>
</body>
</html>
