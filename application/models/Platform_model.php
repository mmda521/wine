<?php
class Platform_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_data($where = '')
	{
		$query = $this->db->select('*')->from('tdc_platforminfo')->where('TDC_PlatFormID',$where)->get();
		$list = $query->row_array();
		return $list;		
	}
    public function ppadd()
	{
		$query = $this->db->select('*')->from('tdc_platforminfo')->get();
		$list = $query->result_array();
		return $list;		
	}
}
?>