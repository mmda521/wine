<?php
//用户表的数据库操作
class Goods_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
   public function insert_import($data='')
   {
	   $query = $this->db->insert('tdc_gt_iteminfo',$data);
	   return 'ok';
   }
   public function iteminfo()
	{
		$query = $this->db->select('*')->from('tdc_gt_iteminfo')->get();
		$list = $query->result_array();
		return $list;		
	}
  public function itemnew($where = '')
  {
    $query = $this->db->select('*')->from('tdc_gt_iteminfo')->where('TDC_GT_ItemID',$where)->get();
    $list = $query->row_array();
    return $list;   
  }
  public function insert($data = '')
  {
      $this->db->insert('tdc_gt_iteminfo',$data);
	}
  public function update($data = '',$itemid)
  {
      $this->db->where('TDC_GT_ItemID', $itemid); 
      $this->db->update('tdc_gt_iteminfo', $data);  
  }
  public function delete($itemid)
  {
      $this->db->where_in('TDC_GT_ItemID',$itemid)->delete('tdc_gt_iteminfo');        
  }
  public function QR_Active($where = '')
  {
      $query = $this->db->select('*')->from('tdc_gt_iteminfo')->order_by('TDC_GT_ItemID','desc')->get();
      $list = $query->result_array();
      return $list;
  }
}
?>





