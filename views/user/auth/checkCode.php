<!doctype html>
<html class="no-js" lang="en">

<!-- login.html  03:24:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Drophut - Single Product eCommerce Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/user/img/favicon.ico">
    
    <!-- CSS 
    ========================= -->
   

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/user/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/user/css/style.css">
    <link rel="stylesheet" href="assets/user/css/custom.css">

</head>

<body>


    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="?page=home">home</a></li>
                            <li>code</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

	<section class="account">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="account-contents" style="background: url('assets/user/img/about/about1.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Get Code</h2>
                                    <p>Please, for your safty , check code from your Gmail</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                    <form action="?page=checkCodeController&typeAuth=<?php echo $_GET['typeAuth']?>" method="POST">
                                        <div class="single-acc-field">
                                            <label for="email">code</label>
                                            <input type="text" id="email" name="code" placeholder="Enter your code">
                                        </div>
                                        <div class="single-acc-field">
                                            <button type="submit">Submite</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- JS
============================================ -->


<!-- Plugins JS -->
<script src="assets/user/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/user/js/main.js"></script>



</body>

<!-- login.html  03:24:52 GMT -->
</html>