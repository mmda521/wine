<?php
/* session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    echo "登录成功：".$_SESSION['user'];
}else{
    echo "你还没有登录，<a href='login'>请登录</a>";
    exit();
} */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>二维码系统后台</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-media.css" />
    <link href="<?php echo base_url(); ?>/webroot/TDC_Platform/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <!--Header-part-->
    <div id="header">
      <h1><a href="index.php">二维码系统后台</a></h1>
    </div>
    <!--close-Header-part--> 

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li  class="dropdown" id="profile-messages" >
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
                    <i class="icon icon-user"></i>&nbsp;
                    <span class="text">欢迎你，admin</span>&nbsp;
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> 个人资料</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-check"></i> 我的任务</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url("Login/logout");?>"><i class="icon-key"></i> 退出系统</a></li>
                </ul>
            </li>
            <li class="dropdown" id="menu-messages">
                <a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle">
                    <i class="icon icon-envelope"></i>&nbsp;
                    <span class="text">我的消息</span>&nbsp;
                    <span class="label label-important">4</span>&nbsp; 
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> 新消息</a></li>
                    <li class="divider"></li>
                    <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> 收件箱</a></li>
                    <li class="divider"></li>
                    <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> 发件箱</a></li>
                    <li class="divider"></li>
                    <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> 回收站</a></li>
                </ul>
            </li>
            <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">&nbsp;设置</span></a></li>
            <li class=""><a title="" href="<?php echo site_url("Login/logout");?>"><i class="icon icon-share-alt"></i> <span class="text">&nbsp;退出系统</span></a></li>
        </ul>
    </div>
    <!--close-top-Header-menu-->

    <!--start-top-serch-->
    <div id="search">
        <input type="text" placeholder="搜索..."/>
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <!--close-top-serch-->

    <!--sidebar-menu-->
    <div id="sidebar" style="OVERFLOW-Y: auto; OVERFLOW-X:hidden;">
        <ul>
            <li class="submenu active">
                <a class="menu_a" link="<?php echo site_url("Login/index");?>"><i class="icon icon-home"></i> <span>控制面板</span></a> 
            </li>
           
            <li class="submenu"> 
                <a href="#">
                    <i class="icon icon-stop"></i> 
                    <span>商家信息管理</span> 
                    <span class="label label-important">1</span>
                </a>
                <ul>
                    <li><a class="menu_a" link="<?php echo site_url("Seller/ShopInfo");?>"><i class="icon icon-caret-right"></i>商家信息总览</a></li>
                    <li><a class="menu_a" link="<?php echo site_url("Seller/ShopAdd");?>"><i class="icon icon-caret-right"></i>新增商家信息</a></li>
                </ul>
            </li>
			 <li class="submenu"> 
                <a href="#">
                    <i class="icon icon-stop"></i> 
                    <span>原产国信息管理</span> 
                    <span class="label label-important">2</span>
                </a>
                <ul>
                    <li><a class="menu_a" link="<?php echo site_url("Origin/Origininfo");?>"><i class="icon icon-caret-right"></i>原产国信息总览</a></li>
                    <li><a class="menu_a" link="<?php echo site_url("Origin/OriginAdd");?>"><i class="icon icon-caret-right"></i>新增原产国信息</a></li>
                </ul>
            </li>
            <li class="submenu"> 
                <a href="#">
                    <i class="icon icon-stop"></i> 
                    <span>商品信息管理</span> 
                    <span class="label label-important">3</span>
                </a>
                <ul>
                    <li><a class="menu_a" link="<?php echo site_url('Goods/GoodsInfo');?>"><i class="icon icon-caret-right"></i>一般贸易商品</a></li>
                    <li><a class="menu_a" link="<?php echo site_url('Goods/Goodsadd');?>"><i class="icon icon-caret-right"></i>增加商品信息</a></li>
                </ul>
            </li>
                        <li class="submenu"> 
                <a href="#">
                    <i class="icon icon-stop"></i> 
                    <span>二维码管理</span> 
                    <span class="label label-important">4</span>
                </a>
                <ul>
                    <li><a class="menu_a" link="<?php echo site_url("Qr_Code/qr_add");?>"><i class="icon icon-caret-right"></i>二维码生成</a></li>
                    <li><a class="menu_a" link="<?php echo site_url("Qr_Code/qr_active");?>"><i class="icon icon-caret-right"></i>二维码激活</a></li>
                    <li><a class="menu_a" link="<?php echo site_url("Qr_Code/qr_Notactive");?>"><i class="icon icon-caret-right"></i>二维码回收</a></li>
                    <!--<li><a class="menu_a" link="<?php echo site_url("Qr_Code/qr_pic");?>"><i class="icon icon-caret-right"></i>二维码展示</a></li>
                    <li><a class="menu_a" link="QR_Info"><i class="icon icon-caret-right"></i>已生成二维码查询</a></li>-->
					<li><a class="menu_a" link="<?php echo site_url("Qr_Code/qr_Transform");?>"><i class="icon icon-caret-right"></i>二维码更新</a></li>
					<li><a class="menu_a" link="<?php echo site_url("Export/export_info");?>"><i class="icon icon-caret-right"></i>导出excel</a></li>
					<li><a class="menu_a" link="<?php echo site_url("Qr_Code/search_active");?>"><i class="icon icon-caret-right"></i>号段激活情况</a></li>
					<!--<li><a class="menu_a" link="<?php echo site_url("Qr_Code/qr_UseScale");?>"><i class="icon icon-caret-right"></i>使用比例</a></li>-->

                    
                </ul>
            </li>
        </ul>
    </div>
    <!--sidebar-menu-->

    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
          <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
        </div>
        <!--End-breadcrumbs-->
        <iframe src="<?php echo site_url("Login/index");?>" id="iframe-main" frameborder='0' style="width:100%;"></iframe>
    </div>
    <!--end-main-container-part-->

    <script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/excanvas.min.js"></script> 
    <script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.min.js"></script> 
    <script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.ui.custom.js"></script> 
    <script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/nicescroll/jquery.nicescroll.min.js"></script> 
    <script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.js"></script> 


    <script type="text/javascript">

    //初始化相关元素高度
    function init(){
        $("body").height($(window).height()-80);
        $("#iframe-main").height($(window).height()-90);
        $("#sidebar").height($(window).height()-50);
    }

    $(function(){
        init();
        $(window).resize(function(){
            init();
        });
    });

    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {
        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {
            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();            
            } 
            // else, send page to designated URL            
            else {  
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }

    // uniform使用示例：
    // $.uniform.update($(this).attr("checked", true));
    </script>
</body>
</html>
