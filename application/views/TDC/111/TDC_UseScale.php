<?php
session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    echo "登录成功：".$_SESSION['user'];
}else{
    echo "你还没有登录，<a href='login'>请登录</a>";
    exit();
}
?>
<?php set_time_limit(120);?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
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
              <?php
			
			  $sql="select count(TDC_No) as QRtotalNum from tdc_master ";
			  $query=$this->db->query($sql);
			  $row=$query->row();
			  $a=$row->QRtotalNum;
			  //echo '二维码总数'.($row->QRtotalNum).'个,';
			  
			   $sql1="select count(TDC_Active) as QRNum from tdc_master where TDC_Active='Y'";
			  $query1=$this->db->query($sql1);
			  $row1=$query1->row();
			  $a1=$row1->QRNum;
			  $b=$a1/$a*100;
			  $c=round($b,2);
			  //echo '二维码已激活'.($row1->QRNum).'个,';
			  
			  $sql2="select count(TDC_Active) as NoQRNum from tdc_master where TDC_Active='N'";
			  $query2=$this->db->query($sql2);
			  $row2=$query2->row();
			  $a2=$row2->NoQRNum;
			  //echo '二维码未激活'.($row2->NoQRNum).'个</br>';
			  
			  $sql3="select count(TDC_TYPE) as QRSquaretotalNum from tdc_master where TDC_TYPE='方形码'";
			  $query3=$this->db->query($sql3);
			  $row3=$query3->row();
			  $a3=$row3->QRSquaretotalNum;
			  //echo '二维码共有方形码'.($row3->QRSquaretotalNum).'个,';
			  
			   $sql4="select count(TDC_TYPE) as QRSquareNum from tdc_master where  TDC_TYPE='方形码' and TDC_Active='Y'";
			  $query4=$this->db->query($sql4);
			  $row4=$query4->row();
			  $a4=$row4->QRSquareNum;
			   $b1=$a4/$a3*100;
			  $c1=round($b1,2);
			  //echo '二维码方形码已激活'.($row4->QRSquareNum).'个,';
			  
			  $sql5="select count(TDC_TYPE) as NoQRSquareNum from tdc_master where TDC_TYPE='方形码' and TDC_Active='N'";
			  $query5=$this->db->query($sql5);
			  $row5=$query5->row();
			  $a5=$row5->NoQRSquareNum;
			  //echo '二维码方形码未激活'.($row5->NoQRSquareNum).'个</br>';
			  
			  $sql6="select count(TDC_TYPE) as QRCircletotalNum from tdc_master where TDC_TYPE='圆形码'";
			  $query6=$this->db->query($sql6);
			  $row6=$query6->row();
			  $a6=$row6->QRCircletotalNum;
			 // echo '二维码共有圆形码'.($row6->QRCircletotalNum).'个,';
			  
			   $sql7="select count(TDC_TYPE) as QRCircleNum from tdc_master where  TDC_TYPE='圆形码' and TDC_Active='Y'";
			  $query7=$this->db->query($sql7);
			  $row7=$query7->row();
			  $a7=$row7->QRCircleNum;
			  $b2=$a7/$a6*100;
			  $c2=round($b2,2);
			  //echo '二维码圆形码已激活'.($row7->QRCircleNum).'个,';
			  
			  $sql8="select count(TDC_TYPE) as NoQRCircleNum from tdc_master where TDC_TYPE='圆形码' and TDC_Active='N'";
			  $query8=$this->db->query($sql8);
			  $row8=$query8->row();			 
			  $a8=$row8->NoQRCircleNum;
			 // echo '二维码圆形码未激活'.($row8->NoQRCircleNum).'个';
			  
			  ?>
<div id="content">
<div class="container-fluid">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>二维码使用比例情况</h5>
          </div>
          <div class="widget-content">
            <ul class="unstyled">
              <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span><?php echo $c.'%'; ?> <span class="pull-right strong"><?php echo '二维码总共'.$a.'个,已激活'.$a1.'个,未激活'.$a2.'个'; ?></span>
                <div class="progress progress-striped ">
                  <div style="width: <?php echo $c.'%'; ?>;" class="bar"></div>
                </div>
              </li>
              <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span><?php echo $c1.'%'; ?><span class="pull-right strong"><?php echo '方形码总共'.$a3.'个,已激活'.$a4.'个,未激活'.$a5.'个'; ?></span>
                <div class="progress progress-success progress-striped ">
                  <div style="width: <?php echo $c1.'%'; ?>;" class="bar"></div>
                </div>
              </li>
              <li> <span class="icon24 icomoon-icon-arrow-down-2 red"></span><?php echo $c2.'%'; ?> <span class="pull-right strong"><?php echo '圆形码总共'.$a6.'个,已激活'.$a7.'个,未激活'.$a8.'个'; ?></span>
                <div class="progress progress-warning progress-striped ">
                  <div style="width: <?php echo $c2.'%'; ?>;" class="bar"></div>
                </div>
              </li>              
            </ul>
          </div>
        </div>
	</div>
</div>
<script src="../../../webroot/TDC_Platform/js/jquery.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/jquery.ui.custom.js"></script> 
<script src="../../../webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/matrix.js"></script>
</body>
</html>
