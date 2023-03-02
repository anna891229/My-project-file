<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");
	$passed = $_COOKIE["passed"];
	if($passed != "TRUE"){
		header("location:login.html");
		exit();
	}
	$buyitemid = $_COOKIE['item'];
	$buyitemcount = $_COOKIE['itemcount'];
	$buyitemprice=$_COOKIE['itemprice'];
	$buyitemname = $_COOKIE['buyname'];
	$len = count($_COOKIE['item']);
	$total = $_COOKIE['total'];
	$subtotal=$_COOKIE['subtotal'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sweety - shopping cart</title>
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
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-9 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
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
                         
                        </div>
                     <div class="navbar-nav ml-auto py-3">
							<?php echo "Welcome   ".$_COOKIE["id"]." " ?>
                        </div>   
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">結帳</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">首頁</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">結帳</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">收貨地址&收件人資訊</h4>
					<form  action ="c_addorder.php" method="POST">
					
							<div class="col-md-6 form-group">
								<label>姓名</label>
								<input class="form-control" name="name" type="text" placeholder="John">
							</div>
							<div class="col-md-6 form-group">
								<label>E-mail</label>
								<input class="form-control" name="email" type="text" placeholder="example@email.com">
							</div>
							<div class="col-md-6 form-group">
								<label>市話/手機</label>
								<input class="form-control" name="phone" type="text" placeholder="+123 456 789">
							</div>
							<div class="col-md-6 form-group">
								<label>取貨地址</label>
								<input class="form-control" name="address" type="text" placeholder="台北市中正區貴陽街一段56號">
							</div>
							<div class="card-header bg-secondary border-0">
								<h4 class="font-weight-semi-bold m-0">付款方式</h4>
							</div>
							<div class="card-body">
								<div class="form-group">
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="payment" id="task" value="task">
										<label class="custom-control-label" for="task">貨到付款</label>
									</div>
								</div>
								<div class="form-group">
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="payment" id="bank" value="bank">
										<label class="custom-control-label" for="bank">銀行轉帳</label>
									</div>
								</div>
						   
							</div>
							<div class="col-md-6 form-group">
									<button type="submit" class="form-control btn btn-primary submit px-3">送出訂單</button>
							</div>
						   
					
					</form>
                </div>
                
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">訂單內容</h4>
                    </div>
                    <div class="card-body">
				
                        <h5 class="font-weight-medium mb-3">產品*數量</h5>
						<?php
						for ($i=1;$i<19;$i++){
							if ($buyitemid[$i]!=""){
								$sub = (int)$buyitemcount[$i]*(int)$buyitemprice[$i];
								$str = $buyitemname[$i]." x ".$buyitemcount[$i];
						?>
						
						<div class="d-flex justify-content-between">
                            <p><?= $str;?></p>
							<p><?= "$".$sub;?></p>
                        </div>
						<?php }} ?>
						 
                      
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">小計</h6>
                            <h6 class="font-weight-medium"><?= $subtotal?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">運費</h6>
                            <h6 class="font-weight-medium">$30</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">總額</h5>
                            <h5 class="font-weight-bold"><?= $total;?></h5>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Checkout End -->


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
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>首頁</a>
                            <a class="text-dark mb-2" href="aboutus.html"><i class="fa fa-angle-right mr-2"></i>關於我們</a>
                            <a class="text-dark mb-2" href="question.html"><i class="fa fa-angle-right mr-2"></i>常見問題</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>購物車</a>
                        
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
	<script src="js/shopCart.js"></script>
</body>

</html>