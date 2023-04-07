<?PHP
include "connect_db.php";
$sql_emp = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_id='".$_SESSION['sess_emp_id']."'");
$rs_emp = mysqli_fetch_array($sql_emp);

if($rs_emp['mb_status']=='1'){
	$txt_status = "ผู้ดูแลระบบ";
	
}else if($rs_emp['mb_status']=='2'){
	$txt_status = "พนักงาน";	
}
?>
<img src="images/diagram_v2-29.png" width="32" height="32" />
<p style="font-size:13px; padding:2px; font-weight:bold;">
<samp style="font-size:13px; color:#993300;">สถานะ :</samp>
<?=$txt_status?>
</p>
<p style="font-size:12px; padding-left: 5px; text-align:left;  color:#993300;">
<img src="images/0025_bullet.png" width="12" height="12" /><strong> คุณ :</strong> <samp style="color:#000;"><?=$rs_emp['mb_name']?></samp></p>

<div style="border:1px solid #ddd; padding:5px; margin:5px; line-height:20px;">
	<table width="99%" height="22" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="23"><img src="images/icon-02.png" width="16" height="16" /> <a href="admin_profile.php?m_page=1&ID=<?=$_SESSION['sess_emp_id']?>"> ข้อมูลส่วนตัว</a></td>
      </tr>
	 <!-- 
      <tr>
        <td height="23"><a href="buy_product1.php?m_page=<?=$_GET['m_page']?>"><img src="images/diagram_v2-29.png" border="0" />จัดซื้อ[
    <?=count($_SESSION['sess_prd_id'])?>
    ] รายการ </a></td>
      </tr>
	  -->
    </table>
</div>
<br />


<p style="font-size:20px; padding:5px; font-weight:bold;"><img src="images/diagram_v2-29.png" width="32" height="32" /> เมนูหลัก</p>

<?PHP if($_GET['m_page']==1){ ?>

<div class="title_data_type"><img src="images/diagram_v2-28.png" width="32" height="32" /> ใบสั่งซื้อ</div>
   <ul class="ul_type" style="margin-top: 3px; margin-left: 5px;">
 		 <li id="li_type"> <a href="admin_order1.php?m_page=1"><img src="images/icon-02.png" width="16" height="16" border="0"/> ใบสั่งซื้อ ยังไม่อนุมัติ</a></li>
		<li id="li_type"> <a href="admin_order2.php?m_page=1"><img src="images/icon-02.png" width="16" height="16" border="0"/> ใบสั่งซื้อ แจ้งชำระเงิน</a></li>
		<li id="li_type"> <a href="admin_order3.php?m_page=1"><img src="images/icon-02.png" width="16" height="16" border="0"/> ใบสั่งซื้อ ชำระเงินแล้ว</a></li>
		 <li id="li_type"> <a href="admin_order4.php?m_page=1"><img src="images/icon-02.png" width="16" height="16" border="0"/> ใบสั่งซื้อ อนุมัติแล้ว </a></li>
		 <li id="li_type"> <a href="admin_order6.php?m_page=1"><img src="images/icon-02.png" width="16" height="16" border="0"/> รายการยกเลิกใบสั่งซื้อ </a></li>
</ul>
<p>&nbsp;</p>

<? }else if($_GET['m_page']==2){ ?>
<div class="title_data_type"><img src="images/diagram_v2-28.png" width="32" height="32" /> รายงาน</div>
   <ul class="ul_type" style="margin-top: 3px; margin-left: 5px;">
 		 <li id="li_type"> <a href="admin_report1.php?m_page=2"><img src="images/icon-02.png" width="16" height="16" border="0"/> รายงาน-การขายสินค้า </a></li>
</ul>
<p>&nbsp;</p>



<? }else if($_GET['m_page']==3){ ?>

<div class="title_data_type"><img src="images/diagram_v2-28.png" width="32" height="32" /> ระบบสินค้า</div>
   <ul class="ul_type" style="margin-top: 3px; margin-left: 5px;">
 		 <li id="li_type"> <a href="admin_add_type.php?m_page=3"><img src="images/icon-02.png" width="16" height="16" border="0"/> เพิ่มประเภทสินค้า </a></li>
		 <li id="li_type"> <a href="admin_add_product.php?m_page=3"><img src="images/icon-02.png" width="16" height="16" border="0"/> เพิ่มสินค้า </a></li>
</ul>
<p>&nbsp;</p>

<div style="padding:10px; font-size:15px; font-weight:bold; color:#FF0000; border-bottom: 1px solid #ddd;">
				  <select name="select_year" id="select_year" onchange="window.location='admin_product_type.php?m_page=3&ID='+this.value+''" style="width: 170px; height:22px;">
 <option value="0">เลือกดูสินค้าตามประเภทสินค้า</option>
 <?PHP
							include "connect_db.php";
							$Query = mysqli_query($con,"SELECT * FROM ".$product_type." ORDER BY type_id ASC");
							while($rs=mysqli_fetch_array($Query)) {
									$id_type=$rs['type_id'];
									$name_type=$rs['type_name'];
									
									if($_GET['ID']==$id_type){
										echo  "<option value =".$id_type." selected>".$name_type."</option>";
									}else{
										echo  "<option value = ".$id_type.">".$name_type."</option>";
									}
							}
						?>
</select>
</div>
<div class="title_data_type"><img src="images/diagram_v2-28.png" width="32" height="32" /> ข้อมูลสินค้า</div>
   <ul class="ul_type" style="margin-top: 3px; margin-left: 5px;">
		 <li id="li_type"> <a href="admin_product_new.php?m_page=3"><img src="images/icon-02.png" width="16" height="16" border="0"/> สินค้ามาใหม่ </a></li>
		 <li id="li_type"> <a href="admin_product_sell.php?m_page=3"><img src="images/icon-02.png" width="16" height="16" border="0"/> สินค้าขายดี </a></li>
</ul>
				


<? }else if($_GET['m_page']==4){ ?>

<div class="title_data_type"><img src="images/diagram_v2-28.png" width="32" height="32" /> ตรวจรับสินค้า</div>
   <ul class="ul_type" style="margin-top: 3px; margin-left: 5px;">
 		 <li id="li_type"> <a href="admin_check_product1.php?m_page=4"><img src="images/icon-02.png" width="16" height="16" border="0"/> ยังไม่ตรวจรับสินค้า</a></li>
		 <li id="li_type"> <a href="admin_check_product2.php?m_page=4"><img src="images/icon-02.png" width="16" height="16" border="0"/> ตรวจรับสินค้าแล้ว</a></li>
</ul>
<p>&nbsp;</p>

<? } ?>
<p>&nbsp;</p>
<div class="title_data_type"><img src="images/diagram_v2-28.png" width="32" height="32" /> ธนาคาร</div>
   <ul class="ul_type" style="margin-top: 3px; margin-left: 5px;">
 		 <li id="li_type"> <a href="admin_bank.php?m_page=3"><img src="images/icon-02.png" width="16" height="16" border="0"/> ข้อมูลธนาคาร </a></li>
		 <li id="li_type"> <a href="admin_add_bank.php?m_page=3"><img src="images/icon-02.png" width="16" height="16" border="0"/> เพิ่มธนาคาร </a></li>
</ul>
<p>&nbsp;</p>

<div class="title_data_type"><img src="images/diagram_v2-28.png" width="32" height="32" /> รูปแบบจัดส่งสินค้า</div>
   <ul class="ul_type" style="margin-top: 3px; margin-left: 5px;">
 		 <li id="li_type"> <a href="admin_format_ems.php?m_page=3"><img src="images/icon-02.png" width="16" height="16" border="0"/> ข้อมูลการจัดส่ง </a></li>
		 <li id="li_type"> <a href="admin_add_format_ems.php?m_page=3"><img src="images/icon-02.png" width="16" height="16" border="0"/> เพิ่มรูปแบบการจัดส่ง</a></li>
</ul>
<p>&nbsp;</p>

