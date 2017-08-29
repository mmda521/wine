<?php
	$shopid = $_GET['shopid'];
	$where = "TDC_ShopID = $shopid";
	$this->db->trans_start();
	$this->db->delete('tdc_shopinfo',$where);
	$this->db->trans_complete();
	header('Location: http://localhost/index.php/TDC_Platform_ShopInfo');
	exit();
?>