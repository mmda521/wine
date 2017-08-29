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
          <form action="#" method="post" class="form-horizontal">
            
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
              <label class="control-label">原产地</label>
              <div class="controls">
                <select name="countryOfOrigin">
              <?php 
                $query = $this->db->query('SELECT * FROM  tdc_origininfo');

				foreach ($query->result_array() as $row)
				{
				    echo "<option>".$row['TDC_OriginID']."^".$row['TDC_OriginName']."</option>";

				}
                ?>

                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">启运港</label>
              <div class="controls">
                <select name="portOfShipment">
                <?php
                $query = $this->db->query('SELECT * FROM  tdc_portinfo');

				foreach ($query->result_array() as $row)
				{
				    echo "<option>".$row['TDC_PortID']."^".$row['TDC_PortName']."</option>";

				}
                ?>

                </select>
              </div>
            </div>
              <div class="control-group">
              <label class="control-label">售卖平台</label>
              <div class="controls">
                <select name="salePlatform">
                <?php
                $query = $this->db->query('SELECT * FROM  tdc_platforminfo');

				foreach ($query->result_array() as $row)
				{
				    echo "<option>".$row['TDC_PlatFormID']."^".$row['TDC_PlatFormURL']."</option>";

				}
                ?>

                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">报检日期</label>
              <div class="controls">
                <div  data-date="12-02-2012" class="input-append date datepicker">
                  <input readonly type="text" value=""  data-date-format="mm-dd-yyyy" class="span11" name="inspectionDate">
                  <span class="add-on"><i class="icon-th"></i></span> </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">报检单号</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写报检单号" name="inspectionNo"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">报关日期</label>
              <div class="controls">
                <div  data-date="12-02-2012" class="input-append date datepicker">
                  <input readonly type="text" value=""  data-date-format="mm-dd-yyyy" class="span11" name="declarationDate">
                  <span class="add-on"><i class="icon-th"></i></span> </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">报关单号</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写报关单号" name="declarationNo"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">所属商家</label>
              <div class="controls">
                <select name="shopID">
                <?php
                $query = $this->db->query('SELECT * FROM  tdc_shopinfo');

				foreach ($query->result_array() as $row)
				{
				    echo "<option>".$row['TDC_ShopID']."^".$row['TDC_SellerName']."</option>";

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
            <?php 
	  		if(isset($_POST["itemName"])){
	  		$iName = $_POST['itemName'];
			$itemNo = $_POST['itemNo'];
			$arrcOrigin = explode('^',$_POST['countryOfOrigin']);
	  		$cOrigin = $arrcOrigin[0];
			$arrportOfShipment = explode('^',$_POST['portOfShipment']);
	  		$pShipment = $arrportOfShipment[0];
			$arrsalePlatform = explode('^',$_POST['salePlatform']);
	  		$sPlatform = $arrsalePlatform[0];
      $arriDate=explode('/',$_POST['inspectionDate']);
      $iDate=$arriDate[2]."-".$arriDate[0]."-".$arriDate[1];
      //$iDate=substr($_POST['inspectionDate'],7,4)."-".substr($_POST['inspectionDate'],1,2)."-".substr($_POST['inspectionDate'],4,2);
			$iNo = $_POST['inspectionNo'];
      $arrdDate=explode('/',$_POST['declarationDate']);
      $dDate=$arrdDate[2]."-".$arrdDate[0]."-".$arrdDate[1];
      //$dDate=substr("{$_POST['declarationDate']}",7,4)."-".substr("{$_POST['declarationDate']}",1,2)."-".substr("{$_POST['declarationDate']}",4,2);
			$dNo = $_POST['declarationNo'];
			$arrsID = explode('^',$_POST['shopID']);
			$sID =$arrsID[0];
	  		$data = array(
			'TDC_GT_ItemName' => $iName,
			'TDC_GT_ItemNo' => $itemNo,
			'TDC_GT_CountryOfOrigin_Ref' => $cOrigin,
			'TDC_GT_PortOfShipment_Ref' => $pShipment,
			'TDC_GT_SalePlatform_Ref' => $sPlatform,
			'TDC_GT_InspectionDate' => $iDate,
			'TDC_GT_InspectionNo' => $iNo,
			'TDC_GT_DeclarationDate' => $dDate,
			'TDC_GT_DeclarationNo' => $dNo,
			'TDC_GT_ShopID_Ref' => $sID
	  		);
	  		$this->db->trans_start();
	  		$this->db->insert('TDC_GT_ITEMINFO',$data);
	  		$this->db->trans_complete();
	 		// echo $this->db->trans_status();
			//printf("{$_POST['inspectionDate']}");
      //printf("{$_POST['declarationDate']});"
        header('Location: http://fw.zzguojilugang.com/index.php/TDC_Platform_GT_ItemAdd_Result');
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
