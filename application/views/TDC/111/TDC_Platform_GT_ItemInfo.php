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
<link href="../../../webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
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
                  <th>原产地</th>
 				  <th>启运港</th>
                  <th>售卖平台</th>
                  <th>报检日期</th>
                  <th>报检单号</th>
 				  <th>报关日期</th>
                  <th>报关单号</th>
 				  <th>所属商家</th>
                  <th></th>

                </tr>
              </thead>
              <tbody>
              <?php
			  	 $query = $this->db->query('SELECT * FROM  tdc_gt_iteminfo');
				 foreach ($query->result_array() as $row)
				{
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
					
					//表格显示
				    echo 
					"
					<tr class=\"gradeA\">
						<td width=\"10%\">".$row['TDC_GT_ItemName']."</td>               
						<td>".$row['TDC_GT_ItemNo']."</td>			<!--商品名称-->
						<td>".$OriginName."</td>					<!--原产地-->
						<td>".$PortName."</td>						<!--启运港-->
						<td>".$PURL."</td>							<!--售卖平台-->
						<td>".$row['TDC_GT_InspectionDate']."</td>	<!--报检日期-->
						<td>".$row['TDC_GT_InspectionNo']."</td>	<!--报检单号-->
						<td>".$row['TDC_GT_DeclarationDate']."</td>	<!--报关日期-->
						<td>".$row['TDC_GT_DeclarationNo']."</td>	<!--报关单号-->
						<td>".$SName."</td>							<!--所属商家-->
						<td>
							<a href=\"TDC_Platform_GT_ItemUpdate?itemid=".$row['TDC_GT_ItemID']."\"  style=\"color:blue\">编辑</a>  
							<a href=\"TDC_Platform_GT_ItemDel?itemid=".$row['TDC_GT_ItemID']."\"  style=\"color:blue\" onclick=\"javascript:if(confirm('确定要删除此信息吗？')){alert('删除成功！');return true;}return false;\">删除</a>
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
