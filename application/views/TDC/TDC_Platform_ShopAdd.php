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
<!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->

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
          <form action="<?php echo site_url('Seller/do_ShopAdd') ?>"string";" method="post" class="form-horizontal">
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
           
          </form>
        </div>
      </div>


      
</div></div>

</body>
</html>
