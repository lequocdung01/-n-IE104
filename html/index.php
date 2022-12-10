<?php
include('../inc/myconnect.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/product-male.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    include('../include/header.php');
    if(isset($_GET['quanly'])){
		$tam=$_GET['quanly'];
	}else{
		$tam='';
	}
	if($tam =='danhmuc')
	{
		include('../include/danhmuc.php');
	}else if($tam=='chitietsp'){
		include('../include/chitietsp.php');
	}elseif($tam=='giohang'){
		include('../include/giohang.php');
	}
	elseif($tam=='nhanthongbao'){
		include('../include/dangnhap.php');
	}
	elseif($tam=='xacnhan'){
		include('../include/xacnhan.php');
	}elseif($tam=='gioithieu'){
		include('../include/gioithieu.php');
	}
	else{
		include('../include/slider.php');
		include('../include/home.php');
	}
	include('../include/footer.php');
	?>
</body>

</html>