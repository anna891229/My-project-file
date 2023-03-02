<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");
	$sql = "SELECT * FROM `new_information` ORDER BY `new_information`.`date` DESC,`new_information`.`time` DESC";
	// 用mysqli_query方法執行(sql語法)將結果存在變數中
	$result= mysqli_query($link,$sql);
	$total_records = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sweety Administrator news</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-9 d-none d-lg-block">
                <a href="admin.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Sweety</span>store</h1>
                </a>
            </div>
           
         
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Sweety管理</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
        
						
                        <a href="a_member.php" class="nav-item nav-link">會員管理</a>
						<a href="admin_news.php" class="nav-item nav-link">消息管理</a>
						<a href="a_order.php" class="nav-item nav-link">訂單管理</a>
                        <a href="a_item.php" class="nav-item nav-link">商品庫存管理</a>
      
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Sweety</span>Store</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="admin.php" class="nav-item nav-link ">管理首頁</a>  
							<a href="admin_news.php" class="nav-item nav-link active">消息管理</a>
                        </div>
                        <div class="navbar-nav ml-auto py-3">
							<?php echo "Welcome   ".$_COOKIE["id"]." " ?>
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
	
	<!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">管理消息</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="admin.php">管理首頁</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">管理消息</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

	<table class="table table-bordered text-center mb-0">
				<thead class="bg-secondary text-dark">
                        <tr>
                            <th>日期</th>
                            <th>上傳時間</th>
                            <th>標題</th>
							<th>內容</th>
                        </tr>
                 </thead>
                    <tbody class="align-middle">
					<?php for ($i=0;$i<$total_records;$i++) {        
						$row = mysqli_fetch_assoc($result);
					?>
					<form>
                        <tr >
                            <td class="align-middle" ><?= $row['date']; ?></td>
                            <td class="align-middle" ><?= $row['time']; ?></td>
							<td class="align-middle" ><?= $row['title']; ?></td>							
                            <td class="align-middle" ><?= $row['information']; ?></td>
                        </tr>  
					</form>
					<?php } ?> 
                        
                    </tbody>
     </table>


    <!-- Contact Start -->
    <div class="row px-xl-5">
	<div class="col-lg-4 mb-3">
		
        <form action="a_add_news.php" method="post" align="center">
		<h4>
			<p>  </p>
			<td align = "right">~~新增訊息~~</td>
			<p>  </p>
			<p>消息標題 : </p>
			<p><textarea name="title" rows="2" cols="30"></textarea></p>

			<p>消息內容 : </p>
			<p><textarea name="information" rows="8" cols="30"></textarea></p>

			<p><input type="submit" value="新增消息"></p>
		</h4>
		</form>
	</div>
	<div class="col-lg-4 mb-3">
		<form action="a_update_news.php" method="post" align="center">
		<h4>
			<p>  </p>
			<td align = "right">~~修改訊息~~</td>
			<p>  </p>
			<p>原消息標題 : </p>
			<p><textarea name="title0" rows="2" cols="30"></textarea></p>
			<p>修改之消息標題 : </p>
			<p><textarea name="title" rows="2" cols="30"></textarea></p>
			<p>修改之消息內容 : </p>
			<p><textarea name="information" rows="8" cols="30"></textarea></p>

			<p><input type="submit" value="修改消息"></p>
		</h4>
		</form>
	</div>
	<div class="col-lg-3 mb-3">
		<form action="a_del_news.php" method="post" align="center">
		<h4>
			<p>  </p>
			<td align = "right">~~刪除訊息~~</td>
			<p>  </p>
			<p>消息標題 : </p>
			<p><textarea name="title0" rows="2" cols="30"></textarea></p>
			<p><input type="submit" value="刪除消息"></p>
		</h4>
		</form>
	</div>
        
    </div>
    <!-- Contact End -->


  


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
	<!--font-awesome-->
	<script src="https://kit.fontawesome.com/99d94897d1.js" crossorigin="anonymous"></script>
</body>

</html>