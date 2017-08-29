<?php 

	if($_GET['tdcno'] == 'AmZSaFNsVGQGNFU '){
	Header("Location:http://fw.zzguojilugang.com/index.php/TDC_Mobile_x901?tdcno=AmZSaFNsVGQGNFU+");
	}
?>
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
	<h1 class="header" style="width: 1830px;">红酒商品</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;溯源查询</h1>
</header>

  <article style="padding:0 10px">
   <aside class="result">查询结果</aside>
   <div class="panel">
    <h2>红酒商品</h2>
        
    <ul id="foodInfo">
		<li>商品名称：<?php if(isset($TDC_GT_ItemName)) echo $TDC_GT_ItemName;?></li>
        <li>进口商/代理商：<?php if(isset($TDC_SellerName)) echo $TDC_SellerName;?></li>
        <li>出厂日期：<?php if(isset($TDC_GT_leaveFactoryDate)) echo $TDC_GT_leaveFactoryDate;?></li>
        <li>原产国（地）：<?php if(isset($TDC_OriginName)) echo $TDC_OriginName;?></li>		
		<li>扫码价（元）：<?php if(isset($TDC_GT_ItemPrice)) echo $TDC_GT_ItemPrice;?></li>
		<li>统一零售价（元）：<?php if(isset($TDC_GT_UnifyPrice)) echo $TDC_GT_UnifyPrice;?></li>			
		<!--<li>二维码序号：<?php if(isset($SearchNo)) echo sprintf("%013d",$SearchNo);?></li>-->
		<br>     
	</ul>
   </div>
					
	
	<!--<input type="hidden" value="912b26b4-ac23-40a4-9084-230f8f67c403" id="code" name="code">
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
	 
	    <button type="submit"  class="button login w50">查&nbsp;询 </button>
		<button onclick="doreset();return false;" class="button login w50">重&nbsp;置 </button>
	   
	  </div>
	  </form>
	 </li>	
	</ul>
				
  
	 <?php 
	/* if(isset($_POST["securityCode"])){
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
	} */

	 ?>
	 

   </div>-->
   <!--<footer>
   		<p>温馨提示：</p>
   		<p>更多进口商品信息，请微信搜索公众号：郑欧班列进口商品</p>
   		<p>郑州国际陆港开发建设有限公司</p>
   		<p>地址：河南省郑州市经济技术开发区经北四路与四港联动交叉口以西路北郑州国际陆港园区</p>
   </footer>-->
   
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