<?php
class Goods extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct(); 
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Goods_model');
		$this->load->model('Origin_model');
		$this->load->model('Port_model');
    $this->load->model('Platform_model');
		$this->load->model('Seller_model');
	}
   public function GoodsInfo()
    {
        $condition = array();
		$list = $this->Goods_model->iteminfo($condition);
		foreach ($list as $key => $value)
		{
        $list1[$key]=$this->Origin_model->get_data($value['TDC_GT_CountryOfOrigin_Ref']);
        $list2[$key]=$this->Seller_model->get_row_data($value['TDC_GT_ShopID_Ref']);
    }
        $list0['list1'] = $list1;
		    $list0['list2'] = $list2;
	      $list0['list'] = $list;
	    //PC::debug($list0);
        $this->load->view('TDC/TDC_Platform_GT_ItemInfo',$list0);		
    }
    public function Goodsadd()
    {
        $list1 = $this->Origin_model->oadd(); 
        $list2 = $this->Seller_model->shopinfo(); 
      
        $list0['list1'] = $list1;
        $list0['list2'] = $list2;
        $this->load->view('TDC/TDC_Platform_GT_ItemAdd',$list0);
    }
     public function do_Goodsadd(){
     	 error_reporting(0);
     	 $condition = array();
       $iName = $this->input->get_post('itemName');
        if(!empty($iName)) {
            $condition['TDC_GT_ItemName'] = $iName;
        }else {
            //echo result_to_towf_new('1', 0, '商品名不能为空', NULL);
            exit();
        }
       $itemNo = $this->input->get_post('itemNo');
       $itemPrice = $this->input->get_post('itemPrice');
       $itemUfPrice = $this->input->get_post('itemUfPrice');
       $origin = $this->input->get_post('countryOfOrigin');//原产国
       $arrcOrigin = explode('^',$origin);
       $cOrigin = $arrcOrigin[0];
      
       $lfdate = $this->input->get_post('leaveFactoryDate');//出厂日期
       $leaveFDate = explode('/',$lfdate);
       $lDate=$leaveFDate[2]."-".$leaveFDate[0]."-".$leaveFDate[1];

       $id = $this->input->get_post('shopID');
       $arrsID = explode('/',$id);
       $sID =$arrsID[0];
		//	PC::($condition);
			
	  		$data = array(
			'TDC_GT_ItemName' => $iName,
			'TDC_GT_ItemNo' => $itemNo,
      'TDC_GT_ItemPrice' =>$itemPrice,
      'TDC_GT_UnifyPrice' =>$itemUfPrice,
			'TDC_GT_CountryOfOrigin_Ref' => $cOrigin,
			'TDC_GT_leaveFactoryDate' => $lDate,
			'TDC_GT_ShopID_Ref' => $sID
	  		);
       //  PC::debug($data);
	    $this->Goods_model->insert($data);
      $this->load->view('TDC/TDC_Platform_GT_ItemAdd_Result',$condition);
    }
    public function GoodsUpdate()
    {
        $itemid = $this->input->get_post("itemid");	
        $condition = array();
	      $list['info'] = $this->Goods_model->itemnew($itemid);  
        $list1 = $this->Origin_model->oadd(); 
        $list2 = $this->Seller_model->shopinfo(); 
       
        $list['list1'] = $list1;
        $list['list2'] = $list2;
	      $this->load->view('TDC/TDC_Platform_GT_ItemUpdate', $list);
     }
    public function do_GoodsUpdate()
    {
       error_reporting(0);
       $itemid = $this->input->get_post("itemid");	
	    
       $iName = $this->input->get_post('itemName');
       $itemNo = $this->input->get_post('itemNo');
       $itemPrice = $this->input->get_post('itemPrice');
       $itemUfPrice = $this->input->get_post('itemUfPrice');
       $origin = $this->input->get_post('countryOfOrigin');//原产国
       $arrcOrigin = explode('^',$origin);
       $cOrigin = $arrcOrigin[0];
      
       $lfdate = $this->input->get_post('leaveFactoryDate');//出厂时间
       $leaveFDate = explode('/',$lfdate);
       $lDate=$leaveFDate[2]."-".$leaveFDate[0]."-".$leaveFDate[1];

       $id = $this->input->get_post('shopID');
       $arrsID = explode('/',$id);
       $sID =$arrsID[0];
     
        $data = array(
      'TDC_GT_ItemID' => $itemid,
      'TDC_GT_ItemName' => $iName,
      'TDC_GT_ItemNo' => $itemNo,
      'TDC_GT_ItemPrice' =>$itemPrice,
      'TDC_GT_UnifyPrice' =>$itemUfPrice,
      'TDC_GT_CountryOfOrigin_Ref' => $cOrigin,
      'TDC_GT_leaveFactoryDate' => $lDate,
      'TDC_GT_ShopID_Ref' => $sID
        );
       $this->Goods_model->update($data,$itemid); 
        $this->load->view('TDC/TDC_Platform_GT_ItemUpdate_Result');
     }

     public function GoodsDel()
    { 
        $itemid = $this->input->get_post("itemid");
        $list['info'] = $this->Goods_model->delete($itemid);  
        $condition = array();
        $list = $this->Goods_model->iteminfo($condition);
        foreach ($list as $key => $value)
        {
            $list1[$key]=$this->Origin_model->get_data($value['TDC_GT_CountryOfOrigin_Ref']);
            $list2[$key]=$this->Seller_model->get_row_data($value['TDC_GT_ShopID_Ref']);
        }
            $list0['list1'] = $list1;
            $list0['list2'] = $list2;
            $list0['list'] = $list;
            //PC::debug($list0);
            $this->load->view('TDC/TDC_Platform_GT_ItemInfo',$list0);
          }
          public function Waiting()
          {
            $this->load->view('TDC/waiting');
          }
        }
?>
