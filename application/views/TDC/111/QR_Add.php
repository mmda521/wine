<?php set_time_limit(0);?>
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
          <h5>二维码生成</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">生成数量</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写需要生成的二维码数量" name="qr_num"/>
              </div>
              
        <div class="control-group">
              <label class="control-label">二维码类型</label>
              <div class="controls">
                <select name="qrtype">
              
          <option>方形码</option>;
          <option>圆形码</option>;

                </select>
              </div>
            </div>
            
          
            <div class="form-actions">
              <button type="submit" class="btn btn-success">生成</button>
            </div>
            <?php 
	  		if(isset($_POST["qr_num"])){
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

	  		$qr_num = $_POST['qr_num'];
	  		$qr_type = $_POST['qrtype'];
        //$qrtype = $_POST['qrtype'];
	  		/*$data = array(
	  		'TDC_SellerName' => $sName,
	  		'TDC_ShopContactPerson' => $cPerson,
	  		'TDC_ShopPhoneNo' => $pNo,
	  		'TDC_ShopEmail' => $email
	  );*/

	$sc=new SysCrypt('lugang718admin');
	  $this->db->trans_start();
    Session_start();
    $_SESSION["qrNum"] = array();

    //获取数据库中最大id
    
    $queryID = $this->db->query("select max(TDC_No) from tdc_master");
    $MAXidArr = $queryID->row_array();
    $MAXid = $MAXidArr['max(TDC_No)'];
     
    for ($i=0;$i<$qr_num;$i++){ 
    //$fwid = sprintf("%013d",rand(1,100000000000000));
    //$fwid = mt_rand(1,10000000000000);
    $num_13 =  mt_rand(10,99)
		      . substr(sprintf('%010d',time() - 946656000),5)
		      .mt_rand(0,9)
		      . sprintf('%03d', (float) microtime() * 1000)
		      //. sprintf('%01d', (int) $i % 10)
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

   //  $data = array(
   //  'TDC_FWID' => $fwid,
   //  'TDC_TYPE' => $qr_type,
   //  'TDC_URL' => "http://fw.zzguojilugang.com/index.php/TDC_Mobile_01?tdcno=".$encrypt
   //    );
    
	  // $this->db->insert('TDC_master',$data);

    $tdc_url = "http://fw.zzguojilugang.com/index.php/TDC_Mobile_01?tdcno=".$encrypt;
    $sql = "INSERT ignore INTO  TDC_master (TDC_FWID, TDC_TYPE, TDC_URL) VALUES (\"".$fwid."\", \"".$qr_type."\", \"".$tdc_url."\")";
    $this->db->query($sql);

    $_SESSION["qrNum"][$i] = $this->db->insert_id();
  }
    $this->db->trans_complete();
	 // echo $this->db->trans_status();
    header('Location: QR_Add_Result');
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
