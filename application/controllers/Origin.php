<?php
class Origin extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Origin_model');
	}
	public function Origininfo()
	{
	   $list['info']=$this->Origin_model->origininfo();
	   $this->load->view('TDC/TDC_Platform_OriginInfo',$list);
	}

	 public function OriginAdd()
  {
	 $this->load->view('TDC/TDC_Platform_OriginAdd'); 
  }

   public function do_OriginAdd()
  {
	  $oName=$this->input->get_post('originName');
	  $data=array(
	      'TDC_OriginName' => $oName,
	  );
	  $this->Origin_model->insert($data);
	  $this->load->view('TDC/TDC_Platform_OriginAdd_Result');
  }

   public function OriginUpdate()
   {
	  $originid=$this->input->get_post('originid');	 
	  $data['info']=$this->Origin_model->get_row_data($originid);
	   //PC::debug($data);
	  $this->load->view('TDC/TDC_Platform_OriginUpdate',$data);
   }

    public function do_OriginUpdate()
   {
	  $originid=$this->input->get_post('originid');	
	  $oName=$this->input->get_post('originName');	
	  $data=array(
	      'TDC_OriginName' => $oName,
	  );
	 $this->Origin_model->update($data,$originid);
	 $this->load->view('TDC/TDC_Platform_OriginUpdate_Result');
	}

	  public function OriginDel()
  {
	  $originid=$this->input->get_post('originid');
	  $this->Origin_model->delete($originid);
	  $this->load->view('TDC/TDC_Platform_OriginDel_Result');
  }   
   } 
?>