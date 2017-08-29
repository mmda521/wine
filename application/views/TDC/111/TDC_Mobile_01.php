<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<!-- saved from url=(0066)http://sy.kjb2c.com/fwm.do?id=912b26b4-ac23-40a4-9084-230f8f67c403 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">
    
    <meta name="viewport" content="width=device-width">
    <title>防伪码查询</title>
	<link rel="stylesheet" type="text/css" href="../../../webroot/TDC_Mobile/fwmreset.css">
	<link rel="stylesheet" type="text/css" href="../../../webroot/TDC_Mobile/fwm3.css">
	<script src="../../../webroot/TDC_Mobile/jquery.js" type="text/javascript"></script>
	<script src="../../../webroot/TDC_Mobile/checkbox.js" type="text/javascript"></script>
	
	<link rel="stylesheet" type="text/css" href="../../../webroot/TDC_Mobile/lightbox.css">
	<script src="../../../webroot/TDC_Mobile/jquery-1.11.0.min.js"></script>
	<script src="../../../webroot/TDC_Mobile/lightbox.js"></script>
		
	<script language="javascript">
		$(document).ready(function(){
		function RWidth(){
		var W=$(window).width();
		$(".list_in").find("li.right").css("width",parseInt(W)-20-90);
		$(".content").css("width",parseInt(W)-20);
		$("h1.header").css("width",parseInt(W)-90);
		}
		RWidth()
		$(window).resize(function(){RWidth()});
		});
	</script>
</head>
<body>
<header class="d">
	<h1 class="header" style="width: 1830px;">郑州国际陆港进口商品防伪溯源查询</h1>
</header>

  <article style="padding:0 10px">
   <aside class="result">查询结果</aside>
   <div class="panel">
    <h2>进口商品官方溯源信息</h2>
    <?php

	//$SearchNo = $_POST['find2'];
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
  $txt=str_replace(' ','+',$txt);
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
	$sc=new SysCrypt('lugang718admin');
	$SearchNo=$sc->decrypt($_GET['tdcno']);
	//$SearchNo = $_GET['tdcno'];
	//$SearchNo = 10;
	//$this->load->database();
	$queryFirst = $this->db->query("SELECT *  FROM tdc_master where TDC_No= $SearchNo ");

    $rowFirst = $queryFirst->row();
	
	if ($rowFirst->TDC_Active=='Y'){
		
		$itemid = $rowFirst-> TDC_ItemID_Ref;
		$query = $this->db->query("SELECT *  FROM tdc_gt_iteminfo where TDC_GT_ItemID = $itemid"); 
		$row = $query->row_array();
		
		
		
		//原产地
		$originid = $row['TDC_GT_CountryOfOrigin_Ref'];
		$queryOriginName = $this->db->query("SELECT TDC_OriginName FROM  tdc_origininfo where TDC_OriginID=$originid");
		$rowOriginName = $queryOriginName->row_array();
		$OriginName = $rowOriginName['TDC_OriginName'];
					
		//启运港
		$portid = $row['TDC_GT_PortOfShipment_Ref'];
		$queryPortName = $this->db->query("SELECT TDC_PortName FROM  tdc_portinfo where TDC_PortID=$portid");
		$rowPortName = $queryPortName->row_array();
		$PortName = $rowPortName['TDC_PortName'];
					
		//售卖平台
		$pfid = $row['TDC_GT_SalePlatform_Ref'];
		$queryPURL = $this->db->query("SELECT TDC_PlatFormURL FROM  tdc_platforminfo where TDC_PlatFormID=$pfid");
		$rowPURL = $queryPURL->row_array();
		$PURL = $rowPURL['TDC_PlatFormURL'];
					
					
		//所属商家
		$shopid = $row['TDC_GT_ShopID_Ref'];
		$querySName = $this->db->query("SELECT TDC_SellerName FROM  tdc_shopinfo where TDC_ShopID=$shopid");
		$rowSName = $querySName->row_array();
		$SName = $rowSName['TDC_SellerName'];		
		
		
		
		
	 ?>
    <ul id="foodInfo">
		<li>商品名称：<?php echo $row['TDC_GT_ItemName'];?></li>
		<li>原产国（地）：<?php echo $OriginName;?></li>
		<li>进口商/代理商：<?php echo $SName;?></li>			
		<li>启运地：<?php echo $PortName;?></li>
		<li>报检日期：<?php echo $row['TDC_GT_InspectionDate'];?></li>
		<li>报检单号：<?php echo $row['TDC_GT_InspectionNo'];?></li>
		<li>报关日期：<?php echo $row['TDC_GT_DeclarationDate'];?></li>
		<li>报关单号：<?php echo $row['TDC_GT_DeclarationNo'];?></li>		
		<li>二维码序号：<?php echo sprintf("%013d",$rowFirst->TDC_No);?></li>
		<br>
          <?php
		}
		else 
		echo "您输入的溯源码无效！" ;
	   ?>
	</ul>
   </div>
					
	
	<input type="hidden" value="912b26b4-ac23-40a4-9084-230f8f67c403" id="code" name="code">
   <div class="panel bggray">
    <h2>防伪查询</h2>
    <ul>
	 <li class="s_title" style="text-align:left">验证真伪，请先扫描二维码，然后刮开涂层，输入13位数字防伪溯源码。</li>
	 <form action="#" method="post">
	 <li>
	 	<input type="text" autocomplete="off" placeholder="请输入13位数字防伪溯源码" name="securityCode" id="securityCode" value="">
	 </li>	
	 <li class="s_title" style="text-align:left;font-size:11px;">如有疑问，请在工作日时间，拨打400-6822-718咨询(工作日：周一至周五，上午8:00至22:00)。</li>
	 
	 <li class="s_button">
	  <div class="align">
		<a id="wait" href="javascript:void(0)" class="button login w50" style="display:none;width:150px;background:gray;"></a>
	  <!-- <a id="cx" href="javascript:void(0)" onclick="doSubmit();return false;" class="button login w50">查&nbsp;询</a>
<a href="javascript:void(0)" onclick="doreset();return false;" class="button login w50">重&nbsp;置</a>
	   -->
	    <button type="submit"  class="button login w50">查&nbsp;询 </button>
		<button onclick="doreset();return false;" class="button login w50">重&nbsp;置 </button>
	   
	  </div>
	  </form>
	 </li>	
	</ul>
				
    <!--<div class="panel" id="fwm2" style="display: none">
     <h3>查询结果</h3>
     <ul>
     	<li>&nbsp;</li>
	 <li id="fwinfo"></li> 
    <li id="fwinfo">-->
	 <?php 
	if(isset($_POST["securityCode"])){
	 	echo "<div class=\"panel\" id=\"fwm2\">
     <h3>查询结果</h3>
     <ul>
     	<li>&nbsp;</li>
	 <li id=\"fwinfo\">";
	 //防伪码和序列号匹配
	 $FWNo = $_POST['securityCode'];
	 $no = $rowFirst->TDC_FWID;
	 if ($no == $FWNo){
		//$queryFW = $this->db->query("SELECT * FROM tdc_master where TDC_FWID= $FWNo ");
    	//$rowFW = $queryFW->row();
		
		

		if ($rowFirst->TDC_Count+1 == 1 ) {
			echo "您好，您通过手机网页查询本款商品，经系统核对，本款商品系通过正规渠道进口，请按标签所示保质期限使用。该防伪码总共被查询1次，查询有效！";
		    $data = array(
		    	'TDC_Count' => $rowFirst->TDC_Count+1,
		    	'TDC_FWTime' => date('y-m-d H:i:s',time())
		    	);
    		$where = "TDC_FWID= $FWNo";
    		$this->db->update('TDC_Master',$data,$where);
		}
		else {
    		echo "这不是第一次查询，首次查询时间为".$rowFirst->TDC_FWTime."<br>请致电400-6822-718进行咨询";
    		$data = array('TDC_Count' => $rowFirst->TDC_Count+1);
    		$where = "TDC_FWID= $FWNo";
    		$this->db->update('TDC_Master',$data,$where);

    	}
	}
    else {
echo "您好，经系统核对，您所输入的防伪溯源码与二维码顺序号不对应，请重新扫描对应的二维码后，输入验证。";
}
	 echo "</li> 
	 </ul>
  	
   </div>";
	}

	 ?>
	  	<!--</li> 
	 </ul>
    </div>  	
  
   </div>-->  

   </div>
   <footer>
   		<p>温馨提示：跨境商品促销信息，请关注郑欧商城微信订阅号：<a href="weixin://profile/郑欧商城网">郑欧商城网</a></p>
   		<p>郑州国际陆港开发建设有限公司</p>
   		<p>地址：地址：河南郑州经济技术开发区经北四路与四港联动交叉口以西路北（国际陆港园区）</p>
   </footer>
   
  	</article>





<script type="text/javascript" language="javascript">

	var wait=60;
	function time() {
		if (wait == 0) {
			$("#wait").hide();
		    $("#cx").show();
			wait = 60;
		} else {
			$("#wait").html(wait+"秒后可重新查询");
			$("#wait").show();
			$("#cx").hide();
			
			wait--;
			setTimeout(function(){
				time();
			},
			1000);
		}
	}
	
function doSubmit(){

	var securityCode = $("#securityCode").val();
	
	
	if(securityCode.length==13){
	
		time();//定时
		//alert(location.href);
     	//$.post("#fwm2",{securityCode:$("#securityCode").val()})
		//$("#fwm2").show();
	
	   var params={}; 
       
        params.securityCode=securityCode;
        params.code=$("#code").val();
	

       $.post('index.php/TDC_FW', {a:1}, function(text) {
 			//if (data == '1') {
 			alert("ok");
			$("#fwinfo").html("您好，您在"+''+"通过手机网页查询，经过验证，"+''+"防伪溯源码无效，请确认是否重新扫描了二维码并且仔细核对13位防伪溯源码数字输入是否正确。");
        	$("#fwm2").show();
			//}
		
		/*
		//	var status=data.status;
        //	var date=data.totay;
        // 	var color = "#190707";
       //  	var count = data.queryCount;
         	if(count>=5&&count<10)color="#04B431";
         	if(count>=10)color="#0404B4";
			
        	if(status=='0'){
        		$("#fwinfo").html("<img src='/theme/default/images/wrong.jpg' />您好，您在"+''+"通过手机网页查询，经过验证，"+data.securityCode+"防伪溯源码无效，请确认是否重新扫描了二维码并且仔细核对13位防伪溯源码数字输入是否正确。");
        		$("#fwm2").show();
            }else if(status=='2'){
        		$("#fwinfo").html("<img src='/theme/default/images/gantan.png' />您好，经系统核对，您所输入的防伪溯源码："+data.securityCode+"与二维码顺序号不对应，请重新扫描与"+data.securityCode+"对应的二维码后，输入验证。");
        		$("#fwm2").show();
            }else{
            	if(data.queryCount!='1'){
            		$("#fwinfo").html("<img src='/theme/default/images/gantan.png' />"+data.msg);
            		$("#fwm2").show();
            	}else{
            		$("#fwinfo").html("<img src='/theme/default/images/right.jpg' />您好，您在"+date+"通过手机网页查询本款商品，经系统核对，本款商品系通过正规渠道进口，请按标签所示保质期限使用。"+data.securityCode+"该防伪码总共被查询<font color=\""+color+"\">"+data.queryCount+"</font>次。查询有效！");
            		$("#fwm2").show();
                }
                
                var filePath=data.filePath;
				if(filePath!=""){
					$("#ciqFile").attr("href",filePath); 
					$("#ciqFile").attr("style","text-decoration:underline;cursor:hand;color:green"); 
					$("#ciqFile").attr("target","_blank"); 
				}
				  
        	}
        */	
        }, 'json');
        		
	}else{
		alert("防伪码必须是13位");
	}    
}

function doreset(){
	$("#securityCode").val("");
	$("#securityCode").focus();
}

</script>
</body></html>