<?php
    include("./inc/auth.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Magikart | Dashboard</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--== FAV ICON ==-->
    <link rel="shortcut icon" href="images/logo.png">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Quicksand:300,400,500" rel="stylesheet">

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mob.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/materialize.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php
        include("./inc/nav.php");
    ?>
    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <?php
                    include("./inc/user.php");
                ?>
                <!--== LEFT MENU ==-->
                <?php
                    include("./inc/sidebar.php");
                ?>
            </div>

            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="./"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="./"> Dashboard</a>
                        </li>
                        <li class="page-back"><a onclick="history.back()"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
                </div>
                <!--== DASHBOARD INFO ==-->
                <div class="ad-v2-hom-info">
					<div class="ad-v2-hom-info-inn">
						<ul>
							<li>
								<div class="ad-hom-box ad-hom-box-3" style="width:450px;max-width:80vw">
									<span class="ad-hom-col-com ad-hom-col-3"><i class="fa fa-paint-brush"></i></span>
									<div class="ad-hom-view-com">
									<p><i class="fa  fa-arrow-up up"></i> Artworks</p>
									<h3>
                                        <?php
                                            echo mysqli_num_rows(mysqli_query($db, "SELECT * FROM artworks WHERE username = '$user->username'"));
                                        ?>
                                    </h3>
									</div>
								</div>
							</li>
						</ul>
					</div>
                </div>
                <div class="inn_title">
                    <h4 style="margin-top:40px">Recent arts</h4>
                </div>
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="owl-carousel owl-theme owl-loaded" id="arts">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage">
                                        <?php
                                            $arts = mysqli_query($db, "SELECT * FROM artworks WHERE username = '$user->username' ORDER BY id DESC LIMIT 10");
                                            while ($r = mysqli_fetch_array($arts)) {
                                                ?>
                                                <div class="owl-item">
                                                    <div class="box-inn-sp">
                                                        <div class="inn-title">
                                                            <h4><?php echo $r["title"]; ?></h4>
                                                            <a class='dropdown-button drop-down-meta' href='#' data-activates='dropdown<?php echo $r['id']; ?>'><i class="material-icons">more_vert</i></a>
                                                            <!-- Dropdown Structure -->
                                                            <ul id='dropdown<?php echo $r['id']; ?>' class='dropdown-content'>
                                                                <li><a href="<?php echo $r["photo"]; ?>">View</a>
                                                                </li>
                                                                <li><a href="./config.php?delete_art=<?php echo $r['id']; ?>">Delete</a>
                                                                </li>
                                                                <li><a href="<?php echo $r['photo']; ?>" download><i class="fa fa-download"></i> Download</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-inn" style="background-image:url('<?php echo $r['photo']; ?>')">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if (mysqli_num_rows($arts) == 0) {
                            ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <center>
                                        <div style="height:60vh">
                                            <i class="fa fa-search"></i> No artwork available yet!
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>

        </div>
    </div>

    <!--== BOTTOM FLOAT ICON ==-->
    <?php
        include("./inc/float.php");
    ?>

    <!--======== SCRIPT FILES =========-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        owl = $('#arts').owlCarousel({
            margin:10,
            nav:true,
            dots:true,
            loop:false,
            responsiveClass:true,
            autoplay:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                2000:{
                    items:3
                }
            }
        });
    </script>
</body>
</html>