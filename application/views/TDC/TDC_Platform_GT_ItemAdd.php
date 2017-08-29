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
      <h1>商品信息管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>商品信息提交</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="<?php echo site_url('Goods/do_Goodsadd'); ?>"" method="post" class="form-horizontal">
            
            <div class="control-group">
              <label class="control-label">商品名称：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写商品名称" name="itemName"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">商品编号：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写商品编号" name="itemNo"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">扫码价（元）：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写商品扫码价" name="itemPrice"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">统一零售价（元）：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写商品统一零售价" name="itemUfPrice"/>
              </div>
            </div>
           <div class="control-group">
              <label class="control-label">原产地</label>
              <div class="controls">
                <select name="countryOfOrigin">
               <?php
                    foreach ($list1 as $key => $value) 
                    {
                        echo "<option>".$value['TDC_OriginID']."^".$value['TDC_OriginName']."</option>";
                    }
              ?>
                </select>
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">出厂日期</label>
              <div class="controls">
                <div  data-date="12-02-2012" class="input-append date datepicker">
                  <input readonly type="text" value=""  data-date-format="mm-dd-yyyy" class="span11" name="leaveFactoryDate">
                  <span class="add-on"><i class="icon-th"></i></span> </div>
              </div>
            </div>
           
             <div class="control-group">
              <label class="control-label">进口商家</label>
              <div class="controls">
                <select name="shopID">
                <?php
                    foreach ($list2 as $key => $value)
                    {
                        echo "<option>".$value['TDC_ShopID']."^".$value['TDC_SellerName']."</option>";
                    }
                ?>
                <!--  <option>郑欧贸易</option> 
                  <option>万国优品</option>-->
                 
                </select>
              </div>
            </div> 
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
           
            
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
