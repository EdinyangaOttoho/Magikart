<!--== MAIN CONTRAINER ==-->
<div class="container-fluid sb1">
    <div class="row">
        <!--== LOGO ==-->
        <div class="col-md-4 col-sm-3 col-xs-6 sb1-1" style="vertical-align:middle!important">
            <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
            <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
            <a href="./" class="logo"><img src="images/favicon.png" alt=""style="margin-left:10px"/>
            </a>
            
        </div>
        <!--== MY ACCCOUNT ==-->
        <div class="col-md-8">
            <!-- Dropdown Trigger -->
            <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="<?php echo $user->profile_picture; ?>" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
            <!-- Dropdown Structure -->
            <ul id='top-menu' class='dropdown-content top-menu-sty' style="margin-top:50px">
                <li><a href="/logout.php" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>