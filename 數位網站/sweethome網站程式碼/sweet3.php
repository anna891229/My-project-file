<?php
 $check = $_COOKIE['item'];
 $num=0;
 if($check != null){
	 for($i=1;$i<19;$i++){
		 if($check[$i]!=""){
			 $num+=1;
		 }
	}
 }
 else{
	 $num=0;
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sweety 奶酪</title>
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

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="question.php">Q & A</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                  
                </div>
            </div>
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
					<span class="text-muted px-2">|</span>
					<?php if($_COOKIE["passed"]=="TRUE"){?>
						
                        <a class="text-dark" href="logout.php">登出</a>
					<?php } ?>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-9 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Sweety</span>store</h1>
                </a>
            </div>
           
            <div class="col-lg-3 col-6 text-right">
                
                 <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?= $num ;?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Sweety</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
        
						
                        <a href="new.php" class="nav-item nav-link">最新消息</a>
						<div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">商品總覽 <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="sweet1.php" class="dropdown-item">提拉米蘇</a>
                                <a href="sweet2.php" class="dropdown-item">肉桂捲</a>
                                <a href="sweet3.php" class="dropdown-item">奶酪</a>
								<a href="sweet4.php" class="dropdown-item">布朗尼</a>
								<a href="sweet5.php" class="dropdown-item">瑪德蓮</a>
								<a href="sweet6.php" class="dropdown-item">達克瓦茲</a>
                            </div>
                        </div>
						<a href="c_member.php" class="nav-item nav-link">會員專區</a>
                        <a href="aboutus.php" class="nav-item nav-link">關於我們</a>
                        <a href="question.php" class="nav-item nav-link">常見問題</a>
                        
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
                            <a href="index.php" class="nav-item nav-link">首頁</a>
                        
                            <a href="sweet3.php" class="nav-item nav-link active">奶酪</a>
                            
                        </div>
                        <?php if($_COOKIE["passed"]!="TRUE"){?>
						
						<div class="navbar-nav ml-auto py-3">
                            <a href="login.html" class="nav-item nav-link">登入 & 註冊</a>
                        </div> 

						<?php } else{ ?>
						<div class="navbar-nav ml-auto py-3">
						<?php echo "Welcome   ".$_COOKIE["id"]." " ?>
						</div>
						<?php } ?>
                    </div>
                </nav>
				<div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
						<div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/sweet3-0.JPG" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                              
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">奶酪</h3>
									<h4 class="text-light text-uppercase font-weight-medium mb-3">滑、嫩、香、純、濃</h4>
                         
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/sweet3-0-1.JPG" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="display-4 text-white font-weight-semi-bold mb-4">完全不添加一滴水</h4>
                                    <h4 class="display-5 text-white font-weight-semi-bold mb-4">使用天然的香草莢</h4>

                                </div>
                            </div>
                        </div>
						<div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/sweet3-1.JPG" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
									<h3 class="text-light text-uppercase font-weight-medium mb-3">每一口都感受得到</h3>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">淡淡香草味搭配軟嫩奶酪</h3>

                                </div>
                            </div>
						
                        </div>
						<div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/sweet3-2.JPG" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
									
									<h3 class="display-3 text-white font-weight-semi-bold mb-4">交織出前所未見甜蜜新滋味</h3>
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">奶酪內有黑色小點點是天然的珍貴香草籽，請安心食用</h4>

                                </div>
                            </div>
						
                        </div>
						
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
				</div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">奶酪</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">首頁</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">商品總覽</p>
				<p class="m-0 px-2">-</p>
                <p class="m-0">奶酪</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                   
                    <div class="col-lg-4 col-md-6 col-sm-16 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="img/sweet3-1.JPG" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">原味奶酪</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>NT$50.00</h6>
                                </div>
                            </div>
                            <a href = "c_buy.php?id=7">
                                <button><i class="fas fa-shopping-cart text-primary mr-1"></i>加入購物車</button>
							</a>	
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-16 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="img/sweet3-2.JPG" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">百香果奶酪</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>NT$55.00</h6>
                                </div>
                            </div>
                            <a href = "c_buy.php?id=8">
                                <button><i class="fas fa-shopping-cart text-primary mr-1"></i>加入購物車</button>
							</a>	
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-16 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="img/sweet3-3.JPG" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">草莓奶酪</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>NT$55.00</h6>
                                </div>
                            </div>
                            <a href = "c_buy.php?id=9">
                                <button><i class="fas fa-shopping-cart text-primary mr-1"></i>加入購物車</button>
							</a>	
                        </div>
                    </div>
                    
					
                    
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">Sweety</span>Store</h1>
                </a>
                <p>歡迎來到Sweety store</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>台北市中正區貴陽街一段56號</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>Sweetystore@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>(02)52152120</p>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>首頁</a>
                            <a class="text-dark mb-2" href="aboutus.php"><i class="fa fa-angle-right mr-2"></i>關於我們</a>
                            <a class="text-dark mb-2" href="question.php"><i class="fa fa-angle-right mr-2"></i>常見問題</a>
                            <a class="text-dark mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>購物車</a>
                        
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid-2" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


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
</body>

</html>