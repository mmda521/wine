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
	  		$qr_num = $_POST['qr_num'];
        $qrtype = $_POST['qrtype'];
	  		/*$data = array(
	  		'TDC_SellerName' => $sName,
	  		'TDC_ShopContactPerson' => $cPerson,
	  		'TDC_ShopPhoneNo' => $pNo,
	  		'TDC_ShopEmail' => $email
	  );*/
	  $this->db->trans_start();
    Session_start();
    $_SESSION["qrNum"] = array();
     
    for ($i=0;$i<$qr_num;$i++){ 
    //$fwid = sprintf("%013d",rand(1,100000000000000));
    $fwid = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    //$fwid = 9734236066534;
    $data = array(
    'TDC_FWID' => $fwid,
    'TDC_TYPE' => $qrtype
      );
	  $this->db->insert('TDC_master',$data);
    $_SESSION["qrNum"][$i] = $this->db->insert_id();
  }
    $this->db->trans_complete();
	 // echo $this->db->trans_status();
    header('Location: http://fw.zzguojilugang.com/index.php/QR_Add_Result');
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
