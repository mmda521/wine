<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/uniform.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/select2.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/matrix-style2.css" />
<link rel="stylesheet" href="../../../webroot/TDC_Platform/css/matrix-media.css" />
<!--<link href="../../../webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />-->
</head>
<body>

<div id="content">
  <div id="content-header">
      <h1>表格</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding"> 
            <table class="table table-bordered data-table">
            
              <thead>
                <tr>
                  <th>商品名称</th>
                  <th>商品编号</th>
                  <th>扫码价（元）</th>
                  <th>统一零售价（元）</th>
                  <th>原产地</th>
                  <th>出厂日期</th>
 				          <th>进口商家</th>
                  <th></th>

                </tr>
              </thead>
              <tbody>
              <?php
               	 foreach ($list as $key=>$value)
               	 {
                   
                    $OriginName = $list1[$key]['TDC_OriginName'];                  
                    $SName =  $list2[$key]['TDC_SellerName']; 	

                	//表格显示
				    echo 
					"
					<tr class=\"gradeA\">
						<td width=\"20%\">".$value['TDC_GT_ItemName']."</td><!--商品名称-->             
						<td>".$value['TDC_GT_ItemNo']."</td>			<!--商品编号-->
						<td>".$value['TDC_GT_ItemPrice']."</td>   <!--扫码价（元）-->
						<td>".$value['TDC_GT_UnifyPrice']."</td>  <!--统一零售价（元）-->
						<td>".$OriginName."</td>					        <!--原产地-->
						<td>".$value['TDC_GT_leaveFactoryDate']."</td>	<!--出厂日期-->
						<td>".$SName."</td>							<!--进口商家-->
						<td>
							<a href=\"GoodsUpdate?itemid=".$value['TDC_GT_ItemID']."\"  style=\"color:blue\">编辑</a>  
							<a href=\"GoodsDel?itemid=".$value['TDC_GT_ItemID']."\"  style=\"color:blue\" onclick=\"javascript:if(confirm('确定要删除此信息吗？')){alert('删除成功！');return true;}return false;\">删除</a>
							</td>						
					</tr>
					";
				       }
            ?>
              
                 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../../../webroot/TDC_Platform/js/jquery.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/jquery.ui.custom.js"></script> 
<script src="../../../webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/jquery.uniform.js"></script> 
<script src="../../../webroot/TDC_Platform/js/select2.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/jquery.dataTables.min.js"></script> 
<script src="../../../webroot/TDC_Platform/js/matrix.js"></script> 
<script src="../../../webroot/TDC_Platform/js/matrix.tables.js"></script>
</body>
</html>
