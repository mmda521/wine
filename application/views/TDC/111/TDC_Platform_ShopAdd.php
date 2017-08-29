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
      <h1>商家信息管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>新增商家</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">商家名称：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写商家名称" name="sellerName"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">联系人：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写联系人" name="contactPerson"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">联系电话</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="请填写联系电话"  name="phoneNo"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">邮箱</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写邮箱" name="email"/>
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php 
	  		if(isset($_POST["sellerName"])){
	  		$sName = $_POST['sellerName'];
	  		$cPerson = $_POST['contactPerson'];
	  		$pNo = $_POST['phoneNo'];
	  		$email = $_POST['email'];
	  		$data = array(
	  		'TDC_SellerName' => $sName,
	  		'TDC_ShopContactPerson' => $cPerson,
	  		'TDC_ShopPhoneNo' => $pNo,
	  		'TDC_ShopEmail' => $email
	  );
	  $this->db->trans_start();
	  $this->db->insert('TDC_SHOPINFO',$data);
	  $this->db->trans_complete();
	 // echo $this->db->trans_status();
    header('Location: http://fw.zzguojilugang.com/index.php/TDC_Platform_ShopAdd_Result');
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
