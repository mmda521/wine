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
              <label class="control-label">起始号段：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写需要更新的起始号段" name="startNo"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">结束号段：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写需要更新的结束号段" name="endNo"/>
              </div>
            </div>
            
          
            <div class="form-actions">
              <button type="submit" class="btn btn-success">更新</button>
            </div>
            <?php 
	  		if(isset($_POST["startNo"])){
	  		$startNo = $_POST['startNo'];
        $endNo = $_POST['endNo'];
	  		/*$data = array(
	  		'TDC_SellerName' => $sName,
	  		'TDC_ShopContactPerson' => $cPerson,
	  		'TDC_ShopPhoneNo' => $pNo,
	  		'TDC_ShopEmail' => $email
	  );*/

    

    for ($i=$startNo;$i<=$endNo;$i++) {
          do {
          $this->db->trans_start();
            $query = $this->db->query("SELECT TDC_No FROM  tdc_master where TDC_No=$i");
            $row = $query->row_array();
    //$fwid = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
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
    $data = array(
    'TDC_FWID' => $fwid,
      );
            $where = "TDC_No = $i";
            //$this->db->update('tdc_master',$data,$where);
            $sql = "update ignore tdc_master  set tdc_fwid=$fwid where $where";
            $this->db->query($sql);
            
          }while ($this->db->trans_status() === FALSE);
          $this->db->trans_complete();
      }    



	 // echo $this->db->trans_status();
    header('Location: QR_Transform_Result');
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
