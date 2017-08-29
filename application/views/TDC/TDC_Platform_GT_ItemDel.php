<?php
	$itemid = $_GET['itemid'];
	$where = "TDC_GT_ItemID = $itemid";
	$this->db->trans_start();
	$this->db->delete('TDC_GT_ITEMINFO',$where);
	$this->db->trans_complete();
	header('Location: http://localhost/index.php/TDC_Platform_GT_ItemInfo');
	exit();
?>