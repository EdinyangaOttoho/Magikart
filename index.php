<?php
	include("./task.php");
?>
<!DOCTYPE html>
<html lang="zxx">
	
<head>
<title>Magikart | Home</title>
<meta charset="UTF-8">
<meta name="keywords" content="art, design, drawing, magikart">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="img/logo.png" rel="shortcut icon"/>

<meta name="description" content="Magikart is an online platform that converts paper art to digital art"/>

<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/bootstrap.min.css%2bfont-awesome.min.css%2bowl.carousel.min.css%2bslicknav.min.css%2bstyle.css.pagespeed.cc.Caon0wkg6W.css" />

</head>
<body>

<div id="preloder">
<div class="loader"></div>
</div>

<header class="header-section clearfix">
<a href="index-2.html" class="site-logo">
<img src="img/favicon.png" alt="" style="height:30px">
</a>
<div class="header-right">
<div class="user-panel">
<a href="./login.php" class="register">Get started</a>
</div>
</div>
<ul class="main-menu">
<li><a href="./">Home</a></li>
</ul>
</header>


<section class="hero-section">
<div class="hero-slider owl-carousel">
<div class="hs-item">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="hs-text">
<h2><span>Art</span> for everyone!</h2>
<p>Convert your paper arts to digital formats which can be editable on any computer anywhere. You musn't buy a drawing pad or lightpen anymore!</p>
<a href="./login.php" class="site-btn">Get started</a>
</div>
</div>
<div class="col-lg-6">
<div class="hr-img">
<img src="img/hero-bg.svg" alt="">
</div>
</div>
</div>
</div>
</div>
<div class="hs-item">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="hs-text">
<h2><span>Smart </span> outline filter.</h2>
<p>Magikart makes all outlines stand out and clears unnecessary ambient fills and backgrounds, making your work easier on PC</p>
<a href="./login.php" class="site-btn sb-c2">Get started</a></div>
</div>
<div class="col-lg-6">
<div class="hr-img">
<img src="img/hero-bg.svg" alt="">
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="intro-section spad">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="section-title">
<h2>Unlimited art Conversions</h2>
</div>
</div>
<div class="col-lg-6">
<p>On Magikart, you can convert as much art as possible. There are no limits attached to our platform. It's as simple to use as possible. It's a tool made by artists, for artists.</p>
<a href="./login.php" class="site-btn">Try it now</a>
</div>
</div>
</div>
</section>


<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg">
<div class="container text-white">
<div class="section-title">
<h2>How it works</h2>
</div>
<div class="row">
<div class="col-md-4">
<div class="how-item">
<div class="hi-icon">
<img src="img/icons/xbrain.png.pagespeed.ic.hNKaW3Z77a.png" alt="">
</div>
<h4>Create an account</h4>
<p>Create an account now on the platform and access your dashboard, where you can view your projects.</p>
</div>
</div>
<div class="col-md-4">
<div class="how-item">
<div class="hi-icon">
<img src="img/icons/pointer.png" alt="">
</div>
<h4>Select an artwork</h4>
<p>Choose an artwork as an image file which you want to be worked on in a file format not limited to .jpg, .png or.jpeg</p>
</div>
</div>
<div class="col-md-4">
<div class="how-item">
<div class="hi-icon">
<img src="img/icons/xsmartphone.png.pagespeed.ic.Hf6_3khJbp.png" alt="">
</div>
<h4>Voila! Done!</h4>
<p>Your artwork will be converted and ready for download. You can also share to your friends on social media the good deed Magikart did!</p>
</div>
</div>
</div>
</div>
</section>


<section class="concept-section spad">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="section-title">
<h2>About<br/>Magikart</h2>
</div>
</div>
<div class="col-lg-6">
<p>Magikart is an online tool that enables people to convert pencil or pen drawn arts made on paper into digital forms which can be edited and modified easily, because it filters the outlines and makes it stress free.<br/>It almost eliminates the need to make use of a lightpen or digital drawing pad.</p>
</div>
</div>
</div>
</div>
</section>


<footer class="footer-section">
<div class="container">
<div class="row">
<div class="col-xl-6 col-lg-5 order-lg-1">
<img src="img/favicon.png" style="height:30px" alt="">
<div class="copyright">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> MagikArt
</div>
</div>
</div>
</div>
</footer>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js%2bjquery.slicknav.min.js.pagespeed.jc.TEhxTNXYgJ.js"></script><script>eval(mod_pagespeed_A0_FcMhLSk);</script>
<script>eval(mod_pagespeed_pCwMCSN3pf);</script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script>

'use strict';

$(window).on('load', function() {
	$(".loader").fadeOut();
	$("#preloder").delay(400).fadeOut("slow");
});

(function($) {
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});
	
	$('.hero-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		mouseDrag: false,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		items: 1,
		autoplay: true
	});
})(jQuery);
</script>
</body>

</html>
