
<?php
include '../model/article.php';
include '../controller/articleC.php';
$error = "";
/*var_dump($_POST['contact'],
            $_POST['date_cre'],
           $_POST['date_res'],
            $_POST['status'],
            $_POST['description'],
            $_POST['nbr_rec'],
            $_POST['type']);*/
    // create adherent
    $article = null;
    $articleC = new articleC();
    if (
    //isset($_POST["id"]) && 
	isset($_POST["reference"]) &&
    isset($_POST["name"]) &&
    isset($_POST["description"])&&
    isset($_POST["price"])
   
    ) {
        if (
            !empty($_POST["reference"]) &&
            !empty($_POST["name"]) &&
            !empty($_POST["description"])&&
            !empty($_POST["price"])
            
        ) {
            $article = new articleC(
                null,
                $_POST['reference'],
                $_POST['name'],
                $_POST['description'],
                $_POST['price']
               
            );
            $articleC->ajouteArticle($article);
            header('Location:afficherListeArticle.php');
            
        }
        else
            $error = "Missing information";
    }
?>


<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>ZeroWaste</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/icon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		
		
	
		<!--welcome-hero start -->
		<header id="home" class="welcome-hero">

			<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
				<!--/.carousel-indicator -->
				 <ol class="carousel-indicators">
					<li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span></li>
					<li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
					<li data-target="#header-carousel" data-slide-to="2"><span class="small-circle"></span></li>
				</ol><!-- /ol-->
				<!--/.carousel-indicator -->

				<!--/.carousel-inner -->
				<div class="carousel-inner" role="listbox">
					<!-- .item -->
					<div class="item active">
						<div class="single-slide-item slide1">
							<div class="container">
								<div class="welcome-hero-content">
									<div class="row">
										<div class="col-sm-7">
											<div class="single-welcome-hero">
												<div class="welcome-hero-txt">
													<h4>great design collection</h4>
													<h2>chair with metal barrel</h2>
													<p>
													transform meeting barrels into a garden chair
													</p>
													<div class="packages-price">
														<p>
															DT 69.00
															<del>DT 99.00</del>
														</p>
													</div>
													<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
														<span class="lnr lnr-plus-circle"></span>
														add <span>to</span> cart
													</button>
													<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
														more info
													</button>
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										<div class="col-sm-5">
											<div class="single-welcome-hero">
												<div class="welcome-hero-img">
													<img src="assets/images/slider/chair1.png" alt="slider image">
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
									</div><!--/.row-->
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->

					</div><!-- /.item .active-->

					<div class="item">
						<div class="single-slide-item slide2">
							<div class="container">
								<div class="welcome-hero-content">
									<div class="row">
										<div class="col-sm-7">
											<div class="single-welcome-hero">
												<div class="welcome-hero-txt">
													<h4>great design collection</h4>
													<h2>mapple wood accent chair</h2>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiuiana smod tempor  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. 
													</p>
													<div class="packages-price">
														<p>
															$ 199.00
															<del>$ 299.00</del>
														</p>
													</div>
													<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
														<span class="lnr lnr-plus-circle"></span>
														add <span>to</span> cart
													</button>
													<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
														more info
													</button>
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										<div class="col-sm-5">
											<div class="single-welcome-hero">
												<div class="welcome-hero-img">
													<img src="assets/images/slider/slider2.png" alt="slider image">
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
									</div><!--/.row-->
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->

					</div><!-- /.item .active-->

					<div class="item">
						<div class="single-slide-item slide3">
							<div class="container">
								<div class="welcome-hero-content">
									<div class="row">
										<div class="col-sm-7">
											<div class="single-welcome-hero">
												<div class="welcome-hero-txt">
													<h4>great design collection</h4>
													<h2>valvet accent arm chair</h2>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiuiana smod tempor  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. 
													</p>
													<div class="packages-price">
														<p>
															$ 299.00
															<del>$ 399.00</del>
														</p>
													</div>
													<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
														<span class="lnr lnr-plus-circle"></span>
														add <span>to</span> cart
													</button>
													<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
														more info
													</button>
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										<div class="col-sm-5">
											<div class="single-welcome-hero">
												<div class="welcome-hero-img">
													<img src="assets/images/slider/slider3.png" alt="slider image">
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
									</div><!--/.row-->
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->
						
					</div><!-- /.item .active-->
				</div><!-- /.carousel-inner-->

			</div><!--/#header-carousel-->

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				        <!-- Start Top Search -->
				        <div class="top-search">
				            <div class="container">
				                <div class="input-group">
				                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
				                    <input type="text" class="form-control" placeholder="Search">
				                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
				                </div>
				            </div>
				        </div>
				        <!-- End Top Search -->

				        <div class="container">            
				            <!-- Start Atribute Navigation -->
				            <div class="attr-nav">
				                <ul>
				                	<li class="search">
				                		<a href="#"><span class="lnr lnr-magnifier"></span></a>
				                	</li><!--/.search-->
				                	<li class="nav-setting">
				                		<a href="#"><span class="lnr lnr-cog"></span></a>
				                	</li><!--/.search-->
				                    <li class="dropdown">
				                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
				                            <span class="lnr lnr-cart"></span>
											<span class="badge badge-bg-1">2</span>
				                        </a>
				                        <ul class="dropdown-menu cart-list s-cate">
				                            <li class="single-cart-list">
				                                <a href="#" class="photo"><img src="assets/images/collection/a.png" class="cart-thumb" alt="image" /></a>
				                                <div class="cart-list-txt">
				                                	<h6><a href="#">arm <br> chair</a></h6>
				                                	<p>1 x - <span class="price">$180.00</span></p>
				                                </div><!--/.cart-list-txt-->
				                                <div class="cart-close">
				                                	<span class="lnr lnr-cross"></span>
				                                </div><!--/.cart-close-->
				                            </li><!--/.single-cart-list -->
				                            <li class="single-cart-list">
				                                <a href="#" class="photo"><img src="assets/images/collection/arriv.png" class="cart-thumb" alt="image" /></a>
				                                <div class="cart-list-txt">
				                                	<h6><a href="#">single <br> armchair</a></h6>
				                                	<p>1 x - <span class="price">$180.00</span></p>
				                                </div><!--/.cart-list-txt-->
				                                <div class="cart-close">
				                                	<span class="lnr lnr-cross"></span>
				                                </div><!--/.cart-close-->
				                            </li><!--/.single-cart-list -->
				                            <li class="single-cart-list">
				                                <a href="#" class="photo"><img src="assets/images/collection/arrivals3.png" class="cart-thumb" alt="image" /></a>
				                                <div class="cart-list-txt">
				                                	<h6><a href="#">wooden arn <br> chair</a></h6>
				                                	<p>1 x - <span class="price">$180.00</span></p>
				                                </div><!--/.cart-list-txt-->
				                                <div class="cart-close">
				                                	<span class="lnr lnr-cross"></span>
				                                </div><!--/.cart-close-->
				                            </li><!--/.single-cart-list -->
				                            <li class="total">
				                                <span>Total: $0.00</span>
				                                <button class="btn-cart pull-right" onclick="window.location.href='#'">view cart</button>
				                            </li>
				                        </ul>
				                    </li><!--/.dropdown-->
				                </ul>
				            </div><!--/.attr-nav-->
				            <!-- End Atribute Navigation -->

				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="index.html">Zero<span>Waste</span></a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class=" scroll active"><a href="#home">home</a></li>
				                    <li class="scroll"><a href="#new-arrivals">new arrival</a></li>
				                    <li class="scroll"><a href="#feature">features</a></li>
				                    <li class="scroll"><a href="#blog">blog</a></li>
				                    <li class="scroll"><a href="#newsletter">contact</a></li>
				                </ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>

			</div><!-- /.top-area-->
			<!-- top-area End -->

		</header><!--/.welcome-hero-->
		<!--welcome-hero end -->

		
<div class="container" >											
			<button class="btn-cart welcome-add-cart " style="displayjustify-content: center;" onclick="window.location.href='afficherListeArticle.php'">Retour à la liste des articles</button>
</div>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                 <tr>
                    <td>
                        <label for="reference ">reference :
                        </label>
                    </td>
                    <td><input type="number" name="reference " id="reference " maxlength="20" ></td>
                </tr> 
				<tr>
                    <td>
                        <label for="name">name:
                        </label>
                    </td>
                   <td> <input type="text" name="name" id="name"  > </td>

                </tr>
            
                    <td>
                        <label for="description">Description:
                        </label>
                    </td>
                    <td><input type="text" name="description" id="description" ></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="price">price:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="price" id="price" maxlength="255">
                    </td>
                </tr>
                
                       
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer" > 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body></div>



        <footer id="footer"  class="footer">
			<div class="container">
				<div class="hm-footer-copyright text-center">
					<div class="footer-social">
						<a href="#"><i class="fa fa-facebook"></i></a>	
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>	
					</div>
					<p>
						&copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a>
					</p><!--/p-->
				</div><!--/.text-center-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		
        
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
    </body>
	
</html>