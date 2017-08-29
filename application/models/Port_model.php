<?php
//用户表的数据库操作
class Port_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
   
   public function get_row($where = '')
   {
	   $query = $this->db->select('TDC_PortID')->from('tdc_portinfo')->where_in('TDC_PortName',$where)->get();
	   $list = $query->row_array();
	   return $list['TDC_PortID'];
   }
   
  
    public function get_data($where = '')
   {
	  $query = $this->db->select('*')->from('tdc_portinfo')->where_in('TDC_PortID',$where)->get();
	  $list = $query->row_array();
	  return $list;
   }
   public function poadd()
	{
		$query = $this->db->select('*')->from('tdc_portinfo')->get();
		$list = $query->result_array();
		return $list;		
	}
}
?>





