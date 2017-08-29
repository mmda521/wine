<?php
//用户表的数据库操作
class Origin_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
   
   public function get_row($where = '')
   {
	   $query = $this->db->select('TDC_OriginID')->from('tdc_origininfo')->where_in('TDC_OriginName',$where)->get();
	   $list = $query->row_array();
	   return $list['TDC_OriginID'];
   }
   
   
   public function get_data($where = '')
   {
	  $query = $this->db->select('*')->from('tdc_origininfo')->where_in('TDC_OriginID',$where)->get();
	  $list = $query->row_array();
	  return $list;
   }
   
 
   
    public function oadd()
	{
		$query = $this->db->select('*')->from('tdc_origininfo')->get();
		$list = $query->result_array();
		return $list;		
	}
	 public function origininfo()
	{
		$query = $this->db->select('*')->from('tdc_origininfo')->get();
		$list = $query->result_array();
		return $list;		
	}

	 public function insert($data='')
   {
	   $query = $this->db->insert('tdc_origininfo',$data);
	   return 'ok';
   }

    public function get_row_data($where='')
   {
	   $query=$this->db->select('*')->from('tdc_origininfo')->where_in('TDC_OriginID',$where)->get();
	   $list=$query->row_array();
	   return $list;
   }

    public function update($data='',$originid)
   {
	  $this->db->where('TDC_OriginID',$originid);
	  $this->db->update('tdc_origininfo',$data);
	  return 'ok';
   }

    public function delete($shopid)
   {	   
	   $this->db->where_in('TDC_OriginID',$shopid)->delete('tdc_origininfo');
	   return 'ok';
   }
	
}





