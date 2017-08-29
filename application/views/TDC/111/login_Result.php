<?php
	/*
	$username = $_POST['username'];
	$userpw = $_POST['userpw'];
	
	if ($username == "admin" ) {
		if ($userpw == "admin718") {
			

			header('Location: http://localhost/index.php/index');
		}
		else {
			header('Location: http://localhost/index.php/login');
		}
	}
	else {
		header('Location: http://localhost/index.php/login');
	}
	//$where = "TDC_ShopID = $shopid";
	//$this->db->trans_start();
	//$this->db->delete('tdc_shopinfo',$where);
	//$this->db->trans_complete();
	//header('Location: http://localhost/index.php/TDC_Platform_ShopInfo');
	exit();
	*/

	session_start();
	if (isset($_POST['username'])) {
    $user = $_POST['username'];
    $password = $_POST['userpw'];
    if ($user == 'admin' && $password == 'admin718') {//验证正确
        $_SESSION['user'] = $user;
        //跳转到首页
        header('location:index');
    }else{
        //echo "<script>alert('登录失败，用户名或密码不正确');</script>";
        header('location:login');
    }
}
exit();
?>