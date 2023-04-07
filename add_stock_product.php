<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>
<?PHP
	include "connect_db.php";

$_GET['ID'];


if(!is_numeric($_POST['txt_num'])) { 
echo "<script>alert('กรุณากรอกราคาสินค้าให้ถูกต้องด้วยนะ')</script>"; 
echo "<meta http-equiv='refresh' content='0; url=admin_product.php?m_page=".$_GET['m_page']."'>";
 exit();
}							
if($_POST['txt_num']<=0){
echo "<script>alert('กรุณากรอกราคาสินค้าให้ถูกต้องด้วยนะ')</script>";
echo "<meta http-equiv='refresh' content='0; url=admin_product.php?m_page=".$_GET['m_page']."'>";
 exit();
}
$Num = $_POST['txt_num'];

$sql_select = mysqli_query($con,"SELECT * FROM ".$product." WHERE prd_id='".$_GET['ID']."'");
$rs2 = mysqli_fetch_array($sql_select);

$stock = $rs2['prd_stock']+$Num;

$sql_update = mysqli_query($con,"UPDATE ".$product." SET prd_stock='".$stock."' WHERE prd_id='".$_GET['ID']."'");


if(sql_update){
	echo "<script>alert('เพิ่มสินค้าเข้าสต๊อกแล้ว')</script>";
	echo "<meta http-equiv='refresh' content='0; url=admin_product.php?m_page=".$_GET['m_page']."'>";
}else{
	echo "<script>alert('ไม่สามารถเพิ่มสินค้าได้')</script>";
	echo "<meta http-equiv='refresh' content='0; url=admin_product.php?m_page=".$_GET['m_page']."'>";
}

?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
