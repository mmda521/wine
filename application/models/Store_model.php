<?php
//用户表的数据库操作
class Store_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
   
    public function select_data()
	{
      $query = $this->db->select('*')->from('tdc_gt_iteminfo')->order_by('TDC_GT_ItemID','desc')->get();
	  $list = $query->result_array();
	  return $list;
	}
	
	
	public function select_shopinfo($where = '')
	{
		$query = $this->db->select('*')->from('tdc_gt_iteminfo')->where_in('TDC_GT_ItemID',$where)->get();
		$list = $query->row_array();
		return $list;
	}
}
?>





