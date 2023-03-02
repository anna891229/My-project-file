<?php
	require_once("connect.php");
	header("Content-Type: text/html; charset=utf-8");
	$passed = $_COOKIE["passed"];
	if($passed != "TRUE"){
		header("location:login.html");
		exit();
	}
	$check = $_COOKIE['item'];
	if($check != null){
	 $num = count($check);
	}
	else{
		echo "<script type = 'text/javascript'>";
		echo "alert('購物車現無商品');";
		echo "history.back();";
		echo "</script>";
	}
	
	$buyitemid = $_COOKIE['item'];
	$buyitemcount = $_COOKIE['itemcount'];
	$buyitemprice= $_COOKIE['itemprice'];
	$buyitemname = $_COOKIE['buyname'];
	
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sweety - cart</title>
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
	<script src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery-3.6.2.min.js"></script>

<script type="text/javascript"> 
$(function(){ 
  $(".add").click(function(){ 
    var t=$(this).parent().find('input[class*=text_box]'); 
    t.val(parseInt(t.val())+1)
	var id = $(this).parent().find('input[class*=text_box]').attr('id');
	setCookie(t,id);
	setsubtotal();
    setTotal(); 
  }) 
  
  $(".min").click(function(){ 
    var t=$(this).parent().find('input[class*=text_box]');
	var id = $(this).parent().find('input[class*=text_box]').attr('id');
    t.val(parseInt(t.val())-1)
    if(parseInt(t.val())<1){ 
      t.val(1); 
    } 
	setCookie(t,id);
	setsubtotal();
    setTotal(); 
  }) 
  
  function setCookie(t,id){
	  var num  = t.val().toString();
	  var id = id;
	  var name = "itemcount["+ id.toString() +"]" ;
	  document.cookie = name+"="+num;
	  
  }
  
  $(".del").click(function(){
	  var t=$(this).parent().parent().find('input.text_box');
	  var id = t.attr('id');
	  var count = "itemcount["+ id.toString() +"]" ;
	  var name = "item["+id.toString() +"]" ;
	  document.cookie = name+"="+"";
	  document.cookie = count+"="+"";
	  location.reload();
	  
  })
  
  function setsubtotal(){
	  
    $('tr.start').each(function(){ 
		var s=0; 
      s=parseInt($(this).find('input.text_box').val())
   *parseInt($(this).find('span.price').text()); 
      var z = $(this).find('span.subtotal');
	  z.html(s.toFixed(0)); 
    }); 
      
  }
  
  function setTotal(){ 
    var s=0; 
    $('tr.start').each(function(){ 
      s+=parseInt($(this).find('input.text_box').val())
   *parseInt($(this).find('span.price').text()); 
    }); 
	var to = s+30;
	$("span.total0").html(s.toFixed(0));
	$("span.total").html(to.toFixed(0));
	
	var name = "subtotal" ;
	document.cookie = name+"="+s;
	
	var name2 = "total" ;
	document.cookie = name2+"="+to;
	
  } 
  setTotal();
}) 
</script>
	
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
	
	
	<!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">購物車</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">首頁</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">購物車</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

<!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0" >
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>產品名稱</th>
                            <th>價格</th>
                            <th>數量</th>
                            <th>總額</th>
                            <th>刪除</th>
                        </tr>
                    </thead>
					
					
                    <tbody class="align-middle">
					
					<?php
						for ($i=1;$i<19;$i++){
							if ($buyitemid[$i]!=""){
					?>
                    
                        <tr class="start">
				
                            <td class="align-middle" ><?= $buyitemname[$i]; ?></td>
                            <td class="tdprice"><span name="<?= $buyitemid[$i]."price" ?>" class="price" ><?= $buyitemprice[$i]; ?></span></td>
							<td class="align-middle">
							<input class="min" name="" type="button" value="-" />
							<input class="text_box" id="<?= $buyitemid[$i] ?>" name="<?= $buyitemid[$i] ?>" type="text" value="1" />
							<input class="add" name="" type="button" value="+" />
							</td>							
							<td class="tdsubtotal"><span name="<?= $buyitemid[$i]."subtotal"?>" class="subtotal"><?= $buyitemprice[$i] ?></span></td>
                            <td class="align-middle">
							<input class="del" name="" type="button" value="x" />
							</td>
                       
						</tr>
						<?php }} ?> 
						
                    </tbody>
					
                </table>
            </div>
			<div class="col-lg-4">
                
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">購物車總額計算</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h5 class="font-weight-medium">小計</h5>
							<td class="align-middle"><span class="total0">0</span></td>
                            
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="font-weight-medium">運費</h5>
                            <h6 class="font-weight-medium">30</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">總額</h5>
                            <td class="align-middle"><span class="total">0</span></td>
                        </div>
                
                        <a href="checkout.php"><button class="btn btn-block btn-primary font-weight-bold">送出訂單</button></a>
                    </div>
				</div>	
            </div>
        </div>
		
    </div>
    <!-- Cart End -->


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