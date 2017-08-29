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
<!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
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
                  <th>原产国名称</th>
                  <th>操作</th>

                </tr>
              </thead>
              <tbody>
              <?php
                foreach ($info as $key => $value) {
                    echo 
          "
          <tr class=\"gradeA\">
            <td width=\"30%\">".$value['TDC_OriginName']."</td>
            <td width=\"30%\"><a href=\"OriginUpdate?originid=".$value['TDC_OriginID']."\"  style=\"color:blue\">编辑</a>  
             <a href=\"OriginDel?originid=".$value['TDC_OriginID']."\"  style=\"color:blue\" onclick=\"javascript:if(confirm('确定要删除此信息吗？')){alert('删除成功！');return true;}return false;\">删除</a>
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
