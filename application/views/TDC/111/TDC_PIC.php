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
      <h1>二维码展示</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
           <form action="#" method="post">
            
            	

              		<div class="controls" >
                	<input type="text"  placeholder="起始号段" name="startNum"/>
                    <input type="text"  placeholder="结束号段" name="endNum"/>
                    &nbsp;
                     &nbsp;
                      &nbsp;
                    <button type="submit" style="width:100px;height:30px;">查询</button>
              		</div>

           </form>
           </div>
          <div class="widget-content" style="position: relative;">
            <ul class="thumbnails">
            <?php 
			if(isset($_POST["startNum"])){

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

            
	  		$startNum = $_POST['startNum'];
			$endNum = $_POST['endNum'];
      
			for ($i=$startNum;$i<=$endNum;$i++) {
            $query = $this->db->query("SELECT TDC_No,TDC_FWID,TDC_TYPE FROM  tdc_master where TDC_No=$i");
			$row = $query->row_array();
      if ($row['TDC_No'] != 0) {
			$tdcno = sprintf("%013d",$row['TDC_No']);
      $fwno = sprintf("%013d",$row['TDC_FWID']);

$sc=new SysCrypt('lugang718admin');
$encrypt=$sc->encrypt($row['TDC_No']);

     //$encrypt = encrypt($row['TDC_No'],'E','lugang718admin');
      //$encrypt = $row['TDC_No'];
            if ($row['TDC_TYPE'] == '方形码'){
            echo "


              <li> <a> 
              
              <img  src=\"http://s.jiathis.com/qrcode.php?url=http://fw.zzguojilugang.com/index.php/TDC_Mobile_01?tdcno=".$encrypt."\" alt=\"\" 
              style=\"position:relative;left:155px;top:8px;width:120px;\" 

              >
              <img src=\"http://fw.zzguojilugang.com/webroot/TDC_Mobile/images/a11.png\"  />.
              </a>
           		   <br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				   序列号：&nbsp;&nbsp;&nbsp;".$tdcno."</a>
				   </br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				   </a>
              </li>

              ";
          }
          else if($row['TDC_TYPE'] == '圆形码'){

			echo "
			<li> <a> 
              
              <img  src=\"http://s.jiathis.com/qrcode.php?url=http://fw.zzguojilugang.com/index.php/TDC_Mobile_01?tdcno=".$encrypt."\" alt=\"\" 
              style=\"position:relative;left:155px;top:-8px;width:85px;\" 

              >
              <img src=\"http://fw.zzguojilugang.com/webroot/TDC_Mobile/images/a22.png\"    />.
              </a>
           		   <br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   
				   序列号：&nbsp;&nbsp;&nbsp;".$tdcno."</a>
				   </br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   </a>
              </li>
              ";

          }
      }
			}
			}
            ?>
            
              <!--
              <li class="span2"> <a> <img src="img/gallery/imgbox4.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/imgbox3.jpg"><i class="icon-search"></i></a> </div>
              </li>
            </ul>.
            
            <div class=\"actions\"> <a title=\"\" class=\"\" href=\"#\"><i class=\"icon-pencil\"></i></a> <a class=\"lightbox_trigger\" href=\"http://s.jiathis.com/qrcode.php?url=http://192.168.137.1/index.php/TDC_Mobile_01?tdcno=1\"><i class=\"icon-search\"></i></a> </div>
            			  <br>序列号：1234567890123</br>
			  <a>防伪码：1234567890123</a>

            
            <ul class="thumbnails">
              <li class="span1"> <a> <img src="img/gallery/imgbox1.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/imgbox3.jpg"><i class="icon-search"></i></a> </div>
              </li>        




<li> <a> 
              
              <img  src=\"http://s.jiathis.com/qrcode.php?url=http://192.168.137.1/index.php/TDC_Mobile_01?tdcno=".$row['TDC_No']."\" alt=\"\" 
              style=\"position:relative;left:155px;top:-8px;width:85px;\" 

              >
              <img  src=\"http://fw.zzguojilugang.com/webroot/TDC_Mobile/images/a22.png\" data-ke-src=\"透明3.jpg\"  />.
              </a>
           		   <br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   
				   序列号：&nbsp;&nbsp;&nbsp;".$tdcno."</a>
				   </br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   防伪码：&nbsp;&nbsp;&nbsp;".$row['TDC_FWID']."</a>
              </li>



               <li> <a> 
              
              <img  src=\"http://s.jiathis.com/qrcode.php?url=http://192.168.137.1/index.php/TDC_Mobile_01?tdcno=".$row['TDC_No']."\" alt=\"\" 
              style=\"position:relative;left:155px;top:8px;width:120px;\" 

              >
              <img  src=\"http://fw.zzguojilugang.com/webroot/TDC_Mobile/images/a11.png\" data-ke-src=\"透明3.jpg\"  />.
              </a>
           		   <br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				   序列号：&nbsp;&nbsp;&nbsp;".$tdcno."</a>
				   </br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				   防伪码：&nbsp;&nbsp;&nbsp;".$row['TDC_FWID']."</a>
              </li>
            -->
           </ul>
          </div>
        </div>
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
