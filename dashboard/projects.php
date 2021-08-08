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
                        <li class="active-bre"><a href="./projects.php"> Projects</a>
                        </li>
                        <li class="page-back"><a onclick="history.back()"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
                </div>
                <div class="inn_title">
                    <h4 style="margin-top:40px">My artworks</h4>
                </div>
                <div class="sb2-2-3">
                    <div class="row">
                    <?php
                        $arts = mysqli_query($db, "SELECT * FROM artworks WHERE username = '$user->username' ORDER BY id DESC LIMIT 10");
                        while ($r = mysqli_fetch_array($arts)) {
                            ?>
                            <div class="col-md-6">
                                <div class="box-inn-sp">
                                    <div class="inn-title">
                                        <h4><?php echo $r["title"]; ?></h4>
                                        <a class='dropdown-button drop-down-meta' href='#' data-activates='dropdown1'><i class="material-icons">more_vert</i></a>
                                        <!-- Dropdown Structure -->
                                        <ul id='dropdown1' class='dropdown-content'>
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
                    <?php
                        if (mysqli_num_rows($arts) == 0) {
                            ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <center>
                                        <div style="height:70vh">
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
</body>
</html>