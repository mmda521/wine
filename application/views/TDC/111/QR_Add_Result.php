<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/matrix-style2.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/matrix-media.css" />
<link href="../../../webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="content">
  <div id="content-header">
      <h1>二维码管理</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>生成结果</h5>
          </div>
          <div class="widget-content">
            <div class="error_ex">
              <h1>√</h1>
              <h3>
              <?php 
                session_start();
                $size = count($_SESSION["qrNum"]);
               // for ($i=0;$i<$size;$i++) {
               //   if($i%10==0) {echo "<br>";}
               //   echo $_SESSION["qrNum"][$i]." ";
               // }
                echo "成功生成".$size."个二维码"."<br>";
                echo "生成的号段为：".$_SESSION["qrNum"][0]."--".$_SESSION["qrNum"][$size-1];
              ?>
              </h3>
              
              <a class="btn btn-warning btn-big"  href="QR_Add">继续生成</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--
<p>Access to this page is forbidden</p>
-->
<script src="../../../webroot/TDC_Platform/js/jquery.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/jquery.ui.custom.js"></script> 
<script src="../../../webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/maruti.html"></script>
</body>
</html>