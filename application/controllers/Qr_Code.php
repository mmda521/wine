<?php
class Qr_Code extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Qr_Code_model');
		$this->load->model('Store_model');
		$this->load->model('Origin_model');
		$this->load->model('Port_model');
		$this->load->model('Seller_model');
		$this->load->model('Qr_Code_UseScale_model');
	}
	
	
   public function qr_add()
   {
	   $this->load->view('TDC/QR_Add');
   }

  
  public function do_qr_add()
  {
	  $qr_num=$this->input->get_post('qr_num');
	  $qr_type=$this->input->get_post('qrtype');
	  $function_type=$this->input->get_post('functiontype');
	  if(isset($qr_num))
	  {
		
		
		$sc=new SysCrypt('lugang718admin');
		$this->db->trans_start();
		$_SESSION['qrNum']=array();
		$MAXid = $this->Qr_Code_model->select_max();
	    //PC::debug($MAXid);
		for($i=0;$i<$qr_num;$i++)
		{
			$num_13 =  mt_rand(10,99)
		      . substr(sprintf('%010d',time() - 946656000),5)
		      .mt_rand(0,9)
		      . sprintf('%03d', (float) microtime() * 1000)
		      .mt_rand(10,99);
			$numToChar = array(
				'1'=>'a',
				'2'=>'b',
				'3'=>'c',
				'4'=>'d',
				'5'=>'e',
				'6'=>'f',
				'7'=>'g',
				'8'=>'h',
				'9'=>'i',
				'0'=>'j'
			);
          $charToNum = array(
				'a'=>'4',
				'b'=>'3',
				'c'=>'2',
				'd'=>'9',
				'e'=>'7',
				'f'=>'1',
				'g'=>'6',
				'h'=>'0',
				'i'=>'5',
				'j'=>'8',
			);
		  $char_13 = strtr($num_13,$numToChar);
          $fwid = strtr($char_13,$charToNum);
          $tdc_no = (string)($MAXid + $i + 1);
          $encrypt=$sc->encrypt($tdc_no);
          $tdc_url = "http://hj.zzguojilugang.com/index.php/Qr_Code/show?tdcno=".$encrypt;
                      
		  $data = array(
			  'TDC_FWID'=>$fwid,
			  'TDC_TYPE'=>$qr_type,
			  'TDC_URL'=>$tdc_url,
			  'Function_Type'=>$function_type,
		  );
		  $this->Qr_Code_model->insert_data($data);
		  $_SESSION["qrNum"][$i] = $this->db->insert_id();
		}
		 $this->db->trans_complete();
		 $this->load->view('TDC/QR_Add_Result');
	  }
  }
   
   
   
   
   public function qr_active()
   {
	   $list['info'] = $this->Store_model->select_data();
	   //PC::debug($list);
	   $this->load->view('TDC/QR_Active',$list);
   }
   
   
    public function do_qr_active()
   {
	   $startNo = $this->input->get_post('startNo');
	   $endNo = $this->input->get_post('endNo');
	   $itemName = $this->input->get_post('itemName');
	   $arritemID = explode('^',$itemName);
	   $itemID = $arritemID[0];
	   //PC::debug($itemID);
	   $this->db->trans_start();
	   for($i=$startNo;$i<=$endNo;$i++)
	   {
		   $data = array(
		     'TDC_ItemID_Ref' => $itemID,
			 'TDC_Active' => 'Y',
		   );
		  $this->Qr_Code_model->update_data($data,$i); 
	   }
	   $this->db->trans_complete();
	   $this->load->view('TDC/QR_Active_Result');
   }
   
   
   
   public function qr_Notactive()
   {
	   $this->load->view('TDC/QR_NotActive');
   }
   
   
   
    public function do_qr_Notactive()
   {
	   $startNo = $this->input->get_post('startNo');
	   $endNo = $this->input->get_post('endNo');
	   $data = array(
			'TDC_Active' => 'N',
            'TDC_Count' => 0,
            'TDC_FWTime' => NULL,
            'TDC_ItemID_Ref' => NULL
	  		);
       $this->db->trans_start();
	   for ($i=$startNo;$i<=$endNo;$i++)
	   {
		   $this->Qr_Code_model->update_data($data,$i);  
	   }
	   $this->db->trans_complete();
	   $this->load->view('TDC/QR_NotActive_Result');
   }
   
   
   
    public function qr_Transform()
   {
	   $this->load->view('TDC/QR_Transform');
   }
   
   
    public function do_qr_Transform()
   {
	   $startNo = $this->input->get_post('startNo');
	   $endNo = $this->input->get_post('endNo');
	   for ($i=$startNo;$i<=$endNo;$i++)
	   {
		   do
		   {
			  $this->db->trans_start();
			   $num_13 =  mt_rand(10,99)
              . substr(sprintf('%010d',time() - 946656000),5)
              .mt_rand(0,9)
              . sprintf('%03d', (float) microtime() * 1000)
              .mt_rand(10,99);
			  $numToChar = array(
				'1'=>'a',
				'2'=>'b',
				'3'=>'c',
				'4'=>'d',
				'5'=>'e',
				'6'=>'f',
				'7'=>'g',
				'8'=>'h',
				'9'=>'i',
				'0'=>'j'
			  );
			 $charToNum = array(
				'a'=>'4',
				'b'=>'3',
				'c'=>'2',
				'd'=>'9',
				'e'=>'7',
				'f'=>'1',
				'g'=>'6',
				'h'=>'0',
				'i'=>'5',
				'j'=>'8',
			  );

             $char_13 = strtr($num_13,$numToChar);
             $fwid = strtr($char_13,$charToNum);
			 $data = array(
             'TDC_FWID' => $fwid,
             );
            $sql = "update ignore tdc_master  set tdc_fwid={$fwid} where TDC_No ={$i}";
            $this->db->query($sql);
            $this->db->trans_complete();			  
		   }while ($this->db->trans_status() === FALSE);
	   }
	   $this->load->view('TDC/QR_Transform_Result');
   }
   
   
   
   public function qr_UseScale()
   {
	   $condition = array();
	   $condition1 = array();
	   $condition2 = array();
	   $condition3 = array();
	   $condition4 = array();
	   $condition1['TDC_Active'] = 'Y';
	   $condition2['TDC_Active'] = 'N';
	   $condition3['TDC_TYPE'] = '1';   //方形码
	   $condition4['TDC_TYPE'] = '2';
	  $a = $this->Qr_Code_UseScale_model->select_QRNum($condition);
	  $a1 = $this->Qr_Code_UseScale_model->select_QRNum($condition1);
	  $b=$a1/$a*100;
	  $c=round($b,2);
	  $a2 = $this->Qr_Code_UseScale_model->select_QRNum($condition2);
	  $a3 = $this->Qr_Code_UseScale_model->select_QRNum($condition3);
	  $a4 = $this->Qr_Code_UseScale_model->select_QRTypeNum($condition3,$condition1);
	  $b1=$a4/$a3*100;
	  $c1=round($b1,2);
	  $a5 = $this->Qr_Code_UseScale_model->select_QRTypeNum($condition3,$condition2);
	  $a6 = $this->Qr_Code_UseScale_model->select_QRNum($condition4);
	  $a7 = $this->Qr_Code_UseScale_model->select_QRTypeNum($condition4,$condition1);
	  $b2=$a7/$a6*100;
	  $c2=round($b2,2);
	  $a8 = $this->Qr_Code_UseScale_model->select_QRTypeNum($condition4,$condition2);
	  $list['a'] = $a;
	  $list['a1'] = $a1; 
	  $list['b'] = $b;
	  $list['c'] = $c;	
      $list['a2'] = $a2;
	  $list['a3'] = $a3; 
	  $list['a4'] = $a4;
	  $list['b1'] = $b1;
      $list['c1'] = $c1;
	  $list['a5'] = $a5; 
	  $list['a6'] = $a6;
	  $list['a7'] = $a7;
      $list['b2'] = $b2; 
	  $list['c2'] = $c2;
	  $list['a8'] = $a8;	
	  PC::debug($list);  
	   $this->load->view('TDC/TDC_UseScale',$list);
   }
   
   
   
    public function qr_pic()
   {
	   $this->load->view('TDC/TDC_PIC');
   }
   
   
    public function do_qr_pic()
   {
	   $startNum = $this->input->get_post('startNum');
	   $endNum = $this->input->get_post('endNum');
	   for ($i=$startNum;$i<=$endNum;$i++)
	   {
		    $list=$this->Qr_Code_model->select_search($i); 
			if($list['TDC_No'] != 0)
		   {
			  $tdcno = sprintf("%013d",$list['TDC_No']);
              $fwno = sprintf("%013d",$list['TDC_FWID']);
			  $Function_Type=$list['Function_Type'];
			  $TDC_TYPE=$list['TDC_TYPE'];
			  $sc=new SysCrypt('lugang718admin');
              $encrypt=$sc->encrypt($list['TDC_No']);

			  //PC::debug($encrypt);
				
		   }
		   $data['info'][$i]['TDC_TYPE']=$TDC_TYPE;
		   $data['info'][$i]['TDC_No']=$tdcno;
		   $data['info'][$i]['TDC_FWID']=$fwno;
		   $data['info'][$i]['Function_Type']=$Function_Type;
		   $data['info'][$i]['encrypt']=$encrypt;
	  }
	  //PC::debug($data);
	 $this->load->view('TDC/TDC_PIC',$data);
  }
  
  
  
   public function show()
  {
	  $tdcno = $this->input->get_post('tdcno');
	  $sc=new SysCrypt('lugang718admin');
	  $SearchNo=$sc->decrypt($tdcno);
	  $list=$this->Qr_Code_model->select_search($SearchNo);
	  $var=$this->Store_model->select_shopinfo($list['TDC_ItemID_Ref']);
	  $country=$this->Origin_model->get_data($var['TDC_GT_CountryOfOrigin_Ref']);
	  //$port=$this->Port_model->get_data($var['TDC_GT_PortOfShipment_Ref']);
	  $shop=$this->Seller_model->get_row_data($var['TDC_GT_ShopID_Ref']);
	  $data['SearchNo']=$SearchNo;
	  $data['TDC_GT_ItemName']=$var['TDC_GT_ItemName'];
	  $data['TDC_OriginName']=$country['TDC_OriginName'];
	  //$data['TDC_PortName']=$port['TDC_PortName'];
	  // $data['TDC_GT_InspectionDate']=$var['TDC_GT_InspectionDate'];
	  //$data['TDC_GT_InspectionNo']=$var['TDC_GT_InspectionNo'];
	 // $data['TDC_GT_DeclarationDate']=$var['TDC_GT_DeclarationDate'];
	 // $data['TDC_GT_DeclarationNo']=$var['TDC_GT_DeclarationNo'];
	  $data['TDC_SellerName']=$shop['TDC_SellerName'];
	  
	  $data['TDC_FWID']=$list['TDC_FWID'];
	  $data['TDC_Count']=$list['TDC_Count'];
	  $data['TDC_FWTime']=$list['TDC_FWTime'];
      $this->load->view('TDC/TDC_Mobile_01',$data);     
	  }
  
  public function qr_show()
  {
	  $tdcno = $this->input->get_post('tdcno');
	  $sc=new SysCrypt('lugang718admin');
	  $SearchNo=$sc->decrypt($tdcno);
	  $list=$this->Qr_Code_model->select_search($SearchNo);
	  $var=$this->Store_model->select_shopinfo($list['TDC_ItemID_Ref']);
	  $country=$this->Origin_model->get_data($var['TDC_GT_CountryOfOrigin_Ref']);
	  $port=$this->Port_model->get_data($var['TDC_GT_PortOfShipment_Ref']);
	  $shop=$this->Seller_model->get_row_data($var['TDC_GT_ShopID_Ref']);
	  $data['SearchNo']=$SearchNo;
	  $data['TDC_GT_ItemName']=$var['TDC_GT_ItemName'];
	  $data['TDC_OriginName']=$country['TDC_OriginName'];
	  $data['TDC_PortName']=$port['TDC_PortName'];
	  $data['TDC_GT_InspectionDate']=$var['TDC_GT_InspectionDate'];
	  $data['TDC_GT_InspectionNo']=$var['TDC_GT_InspectionNo'];
	  $data['TDC_GT_DeclarationDate']=$var['TDC_GT_DeclarationDate'];
	  $data['TDC_GT_DeclarationNo']=$var['TDC_GT_DeclarationNo'];
	  $data['TDC_SellerName']=$shop['TDC_SellerName'];
	  
	  $data['TDC_FWID']=$list['TDC_FWID'];
	  $data['TDC_Count']=$list['TDC_Count'];
	  $data['TDC_FWTime']=$list['TDC_FWTime'];
	   if($list['Function_Type']=='1')
	  { 
          $this->load->view('TDC/TDC_Mobile_01',$data);
      }
	  else
	  {
		  $this->load->view('TDC/TDC_Mobile_02',$data); 
	  }
	  
  }
  
  
  public function search_fwid()
  {
	  $securityCode = $this->input->get_post('securityCode');
	  $tdcno = $this->input->get_post('tdcno');
	  $list=$this->Qr_Code_model->select_search($tdcno);
	  $info['list']= $list;
	  $info['securityCode']= $securityCode;
	  $this->load->view('TDC/TDC_Mobile_01',$info);
  }
  
  
  
  public function search_active()
  {
	  $this->load->view('TDC/TDC_Search');
  }
  
  
   public function do_search_active()
  {
	  $startNum=$this->input->get_post('startNum');
	  $endNum=$this->input->get_post('endNum');
	  $total=$this->Qr_Code_model->select_total($startNum,$endNum);
	  $active=$this->Qr_Code_model->select_active($startNum,$endNum);
	  $noactive=$this->Qr_Code_model->select_noactive($startNum,$endNum);
	  $info['startNum']= $startNum;
	  $info['endNum']= $endNum;
	  $info['total']= $total;
	  $info['active']= $active;
	  $info['noactive']= $noactive; 
	  $this->load->view('TDC/TDC_Search',$info);
  }
  
    public function details1()
  {
	  $startNum=$this->input->get_post('startNum');
	  $endNum=$this->input->get_post('endNum');
	  $data['info']=$this->Qr_Code_model->select_active_data($startNum,$endNum);
	  $this->load->view('TDC/TDC_details1',$data);
  }
  
  
   public function details2()
  {
	  $startNum=$this->input->get_post('startNum');
	  $endNum=$this->input->get_post('endNum');
	  $data['info']=$this->Qr_Code_model->select_noactive_data($startNum,$endNum);
	  $this->load->view('TDC/TDC_details2',$data);
  }
	
}


  class SysCrypt
		 {
		  private $crypt_key='lugang718admin';//密钥
		  public function __construct($crypt_key)
		 {
		   $this->crypt_key=$crypt_key;
		 }
		 public function encrypt($txt)
		 {
		   srand((double)microtime()*1000000);
		   $encrypt_key=md5(rand(0,32000));
		   $ctr=0;
		   $tmp='';
		   for($i=0;$i<strlen($txt);$i++)
		  {
		    $ctr=$ctr==strlen($encrypt_key)?0:$ctr;
		    $tmp.=$encrypt_key[$ctr].($txt[$i]^$encrypt_key[$ctr++]);
		  }
		 return base64_encode(self::__key($tmp,$this->crypt_key));
		 }
		 public function decrypt($txt)
		 {
		   $txt=self::__key(base64_decode($txt),$this->crypt_key);
		   $tmp='';
		   for($i=0;$i<strlen($txt);$i++)
		   {
		     $md5=$txt[$i];
		     $tmp.=$txt[++$i]^$md5;
		   }
		  return $tmp;
		 }
		 private function __key($txt,$encrypt_key)
		 {
		   $encrypt_key=md5($encrypt_key);
		   $ctr=0;
		   $tmp='';
		   for($i=0;$i<strlen($txt);$i++)
		   {
		    $ctr=$ctr==strlen($encrypt_key)?0:$ctr;
		    $tmp.=$txt[$i]^$encrypt_key[$ctr++];
		   }
		  return $tmp;
		 }
		 public function __destruct()
		 {
		   $this->crypt_key=NULL;
		 }
		}
?>



