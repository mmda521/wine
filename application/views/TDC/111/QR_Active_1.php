<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/colorpicker.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/datepicker.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/uniform.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/select2.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/matrix-style2.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/matrix-media.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/bootstrap-wysihtml5.css" />
<link href="../../../webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<style>
	.control-group .controls label{
		display:inline-block;
	}
</style>
</head>
<body>

<div id="content">
  <div id="content-header">
      <h1>二维码管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>二维码激活</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
            
            <div class="control-group">
              <label class="control-label">起始号段：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写需要激活的起始号段" name="startNo"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">结束号段：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写需要激活的结束号段" name="endNo"/>
              </div>
            </div>
           <div class="control-group">
              <label class="control-label">商品名称</label>
              <div class="controls">
                <select name="itemName">
              <?php 
                $query = $this->db->query('SELECT * FROM  tdc_gt_iteminfo');

				foreach ($query->result_array() as $row)
				{
				    echo "<option>".$row['TDC_GT_ItemID']."^".$row['TDC_GT_ItemName']."^".$row['TDC_GT_ItemNo']."</option>";

				}
                ?>
                </select>
              </div>
            </div>
            

            <div class="form-actions">
              <button type="submit" class="btn btn-success">激活</button>
              <a href="QR_Export">abc</a>
            </div>
            <?php 
	  		if(isset($_POST["startNo"])){
          class SysCrypt{
 private $crypt_key='lugang718admin';//密钥
 public function __construct($crypt_key){
  $this->crypt_key=$crypt_key;
 }
 public function encrypt($txt){
  srand((double)microtime()*1000000);
  $encrypt_key=md5(rand(0,32000));
  $ctr=0;
  $tmp='';
  for($i=0;$i<strlen($txt);$i++){
   $ctr=$ctr==strlen($encrypt_key)?0:$ctr;
   $tmp.=$encrypt_key[$ctr].($txt[$i]^$encrypt_key[$ctr++]);
  }
  return base64_encode(self::__key($tmp,$this->crypt_key));
 }
 public function decrypt($txt){
  $txt=self::__key(base64_decode($txt),$this->crypt_key);
  $tmp='';
  for($i=0;$i<strlen($txt);$i++){
   $md5=$txt[$i];
   $tmp.=$txt[++$i]^$md5;
  }
  return $tmp;
 }
 private function __key($txt,$encrypt_key){
  $encrypt_key=md5($encrypt_key);
  $ctr=0;
  $tmp='';
  for($i=0;$i<strlen($txt);$i++){
   $ctr=$ctr==strlen($encrypt_key)?0:$ctr;
   $tmp.=$txt[$i]^$encrypt_key[$ctr++];
  }
  return $tmp;
 }
 public function __destruct(){
  $this->crypt_key=NULL;
 }
}
	  		$startNo = $_POST['startNo'];
			$endNo = $_POST['endNo'];
			$arritemID = explode('^',$_POST['itemName']);
	  		$itemID = $arritemID[0];
			
//	  		$data = array(
//			'TDC_ItemID_Ref' => $itemID,
//			'TDC_Active' => 'Y'
//	  		);
        $sc=new SysCrypt('lugang718admin');
        
	  		$this->db->trans_start();
//        for ($i=$startNo;$i<=$endNo;$i++) {
//	  		$where = "TDC_No = $i";
//        $this->db->update('tdc_master',$data,$where);
//      }
      for ($i=$startNo;$i<=$endNo;$i++) {
            $query = $this->db->query("SELECT TDC_No FROM  tdc_master where TDC_No=$i");
            $row = $query->row_array();
           
            $encrypt=$sc->encrypt($row['TDC_No']);
            $data = array(
           'TDC_ItemID_Ref' => $itemID,
           'TDC_Active' => 'Y',
           'TDC_URL' => "http://fw.zzguojilugang.com/index.php/TDC_Mobile_01?tdcno=".$encrypt
        );
            $where = "TDC_No = $i";
            $this->db->update('tdc_master',$data,$where);
      }    
            

        

	  		$this->db->trans_complete();
	 		// echo $this->db->trans_status();
	  		}
	  		?>
            
          </form>
        </div>
      </div>
      
</div></div>

<script src="../../../webroot/TDC_Platform/js/jquery.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/jquery.ui.custom.js"></script> 
<script src="../../../webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/bootstrap-colorpicker.js"></script> 
<script src="../../../webroot/TDC_Platform/js/bootstrap-datepicker.js"></script> 
<script src="../../../webroot/TDC_Platform/js/jquery.toggle.buttons.html"></script> 
<script src="../../../webroot/TDC_Platform/js/masked.js"></script> 
<script src="../../../webroot/TDC_Platform/js/jquery.uniform.js"></script> 
<script src="../../../webroot/TDC_Platform/js/select2.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/matrix.js"></script> 
<script src="../../../webroot/TDC_Platform/js/matrix.form_common.js"></script> 
<script src="../../../webroot/TDC_Platform/js/wysihtml5-0.3.0.js"></script> 
<script src="../../../webroot/TDC_Platform/js/jquery.peity.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
