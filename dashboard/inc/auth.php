<?php
    include("../task.php");
    include("../connect.php");

    @session_start();

    $username = "";

    //check user session
    if (!isset($_SESSION["user"])) {
        header("location:../logout.php");
        die;
    }
    else {
        $user = json_decode(decrypt($_SESSION["user"]));
        if (!isset($user->email)) {
            header("location:../logout.php");
            die;
        }
    }
?>
<style>
    .tab-inn {
        background-repeat:no-repeat;
        background-size:contain;
        background-position:center;
        height:60vh;
        cursor:pointer
    }
    .responsive-img {
        background-image:url('./images/preview.png');
        background-repeat:no-repeat;
        background-size:contain;
        background-position:center;
        cursor:pointer;
    }
    #upload-img {
        visibility:hidden;
    }
    .page-back {
        cursor:pointer
    }
    #drawing-board {
        height:60vh;
        width:100%
    }
    a[href="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"] {
		display:none;
	}
</style>