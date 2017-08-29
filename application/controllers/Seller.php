<?php
class Seller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Seller_model');
	}
	
	
   public function ShopInfo()
   {
	   $list['info']=$this->Seller_model->shopinfo();
	   $this->load->view('TDC/TDC_Platform_ShopInfo',$list);
   }

  
  public function ShopAdd()
  {
	 $this->load->view('TDC/TDC_Platform_ShopAdd'); 
  }
  
  
  public function do_ShopAdd()
  {
	  $sName=$this->input->get_post('sellerName');
	  $cPerson=$this->input->get_post('contactPerson');
	  $pNo=$this->input->get_post('phoneNo');
	  $email=$this->input->get_post('email');
	  $data=array(
	      'TDC_SellerName' => $sName,
		  'TDC_ShopContactPerson' => $cPerson,
		  'TDC_ShopPhoneNo' => $pNo,
		  'TDC_ShopEmail' => $email
	  );
	  $this->Seller_model->insert($data);
	  $this->load->view('TDC/TDC_Platform_ShopAdd_Result');
  }
   public function ShopUpdate()
   {
	  $shopid=$this->input->get_post('shopid');	 
	  $data['info']=$this->Seller_model->get_row_data($shopid);
	   //PC::debug($data);
	  $this->load->view('TDC/TDC_Platform_ShopUpdate',$data);
   }


   public function do_ShopUpdate()
   {
	  $shopid=$this->input->get_post('shopid');	
	  $sName=$this->input->get_post('sellerName');	
	  $cPerson=$this->input->get_post('contactPerson');	
	  $pNo=$this->input->get_post('phoneNo');	
	  $email=$this->input->get_post('email');
	  $data=array(
	      'TDC_SellerName' => $sName,
	      'TDC_ShopContactPerson' => $cPerson,
		  'TDC_ShopPhoneNo' => $pNo,
	  	  'TDC_ShopEmail' => $email
	  );
	 $this->Seller_model->update($data,$shopid);
	 $this->load->view('TDC/TDC_Platform_ShopUpdate_Result');
   } 


  public function ShopDel()
  {
	  $shopid=$this->input->get_post('shopid');
	  $this->Seller_model->delete($shopid);
	  $this->load->view('TDC/TDC_Platform_ShopDel_Result');
  }   
	
}

?>



