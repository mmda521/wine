<?php
//用户表的数据库操作
class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	  
	 
    /*从用户表查询数据 */	 
	public function search_user($where)
	{
		$query = $this->db->select('*')->from('tdc_user')->where($where)->get();
		$list = $query->row_array();
		return $list;		
	}

	
	
	
public function search_user_Password($username,$userpassword){
        	$query = $this->db->select('*')->from('tdc_user')->where('User_Id',$username)->where('User_Password',$userpassword)->get();
            $list = $query->row_array();
			//PC::debug($query);
            return $list;
    	}	
	
	
}





