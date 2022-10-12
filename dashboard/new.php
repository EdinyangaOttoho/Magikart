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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawingboard.js/0.4.2/drawingboard.min.css" integrity="sha512-i9me41KrMmgXNou9vOrHWLy4AreAteQwY99znSilnK70eGOoeQNyErDd7Ktjq/CeZ1SEnK2wVOj0erxSBIjGOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/mob.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/materialize.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<img id="preview" style="position:absolute;top:0px;left:0px;z-index:1;visibility:hidden">
<body style="position:absolute;overflow-x:hidden;z-index:1000;width:100vw;height:100vh">
    <?php
        include("./inc/nav.php");
    ?>
    <!--== BODY CONTAINER ==-->
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
                        <li class="active-bre"><a href="./new.php"> New</a>
                        </li>
                        <li class="page-back"><a onclick="history.back()"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
                </div>
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <canvas id="frame" height="500" width="500" style="display:none"></canvas>
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>New art</h4>
                                </div>
                                <div class="tab-inn" style="height:auto;cursor:default">
                                    <div class="row">
                                        <div class="col-sm-7 p-3">
                                            <img style="width:100%;height:60vh" id="img-preview" class="responsive-img">
                                        </div>
                                        <div class="col-sm-5" style="margin-top:20px">
                                            <h4 style="margin-bottom:10px">Label art</h4>
                                            <div class="input-field col s12" style="padding-left:0px">
                                                <input id="art-title" type="text" value="" maxlength="50">
                                                <label for="art-title">Art title <span style="color:tomato">*</span></label>
                                            </div>
                                            <br/>
                                            <button class="btn btn-primary" id="upload-btn" disabled onclick="document.getElementById('upload-img').click()"><i class="fa fa-file-image-o"></i> Choose Image</button>
                                            <input type="file" id="upload-img" accept="images/*" onchange="try { previewimg(this) } catch(error) {}">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:20px" id="finish">
                                        <div class="col-sm-12">
                                            <div id="loader" style="display:none">
                                                <center><i class="fa fa-spinner fa-spin text-primary fa-2x"></i></center>
                                                <br/>
                                            </div>
                                            <h4 style="margin-bottom:10px">Converted work</h4>
                                            <div id="render" style="overflow-x:auto">
                                                <div id="drawing-board">
                                                    <img style="width:100%;height:100%" class="responsive-img">
                                                </div>
                                            </div>
                                            <br/>
                                            <center>
                                                <button onclick="finished()" id="finish-btn" class="btn btn-primary" style="display:none">Finish and Save!</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--======== SCRIPT FILES =========-->
    <script src="js/jquery.min.js"></script>    
    <script src="js/materialize.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawingboard.js/0.4.2/drawingboard.min.js" integrity="sha512-nX6X5qhGv+uYu9+oBbsySdI+KKzNL8vlCge8/SJ+wbcvnrxk3Su4OuUM6uwY/tRAZASaApnJmhouHMU5oFGzHg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.getElementById("art-title").oninput = function() {
            this.value = this.value.trim();
            let val = this.value;
            let len = val.length;
            if (len == 0 || val == "") {
                document.getElementById("upload-btn").setAttribute("disabled", "disabled");
            }
            else {
                document.getElementById("upload-btn").removeAttribute("disabled");
            }
        }
        var result  = "";

		let previewimg = (x)=> {
			document.getElementById("preview").src = window.URL.createObjectURL(x.files[0]);
            document.getElementById("img-preview").style.backgroundImage = `url('${window.URL.createObjectURL(x.files[0])}')`;
            document.getElementById("loader").style.display = "block";
            document.getElementById("render").innerHTML = `
            <div id="drawing-board">

            </div>
            `;
            var board_styles = window.getComputedStyle(document.getElementById("drawing-board"));
            let board_w = parseFloat(board_styles.getPropertyValue("width").replace(/[a-z]+/, ""));

            document.getElementById("preview").style.width = `${board_w}px`;

            fix(document.getElementById("preview"), document.getElementById("frame"));
		}

		let fix = (img, can)=> {
			img.onload = function() {

                let preview_h = document.getElementById("preview").getBoundingClientRect().height + 40;

                document.getElementById("drawing-board").style.height = `${preview_h}px`;
                
				var styles = window.getComputedStyle(document.getElementById("preview"));

				let w = parseFloat(styles.getPropertyValue("width").replace(/[a-z]+/, ""));
				let h = parseFloat(styles.getPropertyValue("height").replace(/[a-z]+/, ""));

				can.height = h;
				can.width = w;

				var ctx = can.getContext("2d");
				ctx.drawImage(img, 0, 0, w, h);

				var rgb = ctx.getImageData(0, 0, w, h);
				var dat = rgb.data;
				
				for (let i = 0, n = dat.length; i < n; i +=4) {
					var arr = new Array();
					arr[0] = dat[i];
					arr[1] = dat[i + 1];
					arr[2] = dat[i + 2];
					let mean = Math.round((arr[0]+arr[1]+arr[2])/3);
					if (mean >= 132) {
						arr[0] = 255;
						arr[1] = 255;
						arr[2] = 255;
					}
					else {
						arr[0] = 0;
						arr[1] = 0;
						arr[2] = 0;	
					}
					dat[i] = arr[0];
					dat[i + 1] = arr[0];
					dat[i + 2] = arr[0];
				}

				ctx.putImageData(rgb, 0, 0);
                can.toBlob(function(blob){
                    finishImage(blob);
                }, 'image/png', 1);
			}
		}

        let formdata_title = "";
        let formdata_file = "";

		let finishImage = (blob)=> {
            document.getElementById("loader").style.display = "none";
            document.getElementById("finish-btn").style.display = "inline";
            let url = window.URL.createObjectURL(blob);
			var imageBoard = new DrawingBoard.Board('drawing-board', {
                background: url,
                color: '#ffffff',
                webStorage: false
            });
		}
        let finished = ()=> {
            let canvas = document.querySelector(".drawing-board-canvas");
            formdata_title = document.getElementById("art-title").value;
            canvas.toBlob(function(blob){
                formdata_blob = blob;
                submitData();
            }, 'image/png', 1);
        }
        let submitData = function() {
            let formdata = new FormData();
            formdata.append("file", formdata_blob, new Date().toString()+".png");
            formdata.append("title", formdata_title);
            formdata.append("magikart-upload", new Date().toString());
            let xhttp;
            if (XMLHttpRequest) {
                xhttp = new XMLHttpRequest();
            }
            else {
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    let json = JSON.parse(xhttp.responseText);
                    if (json.status == "error") {
                        toastr.error(json.message, {progressBar:true});
                    }
                    else {
                        toastr.success("Artwork created successfully!", {progressBar:true});
                        setTimeout(function() {
                            location.href = "./projects.php";
                        }, 3000);
                    }
                }
            }
            xhttp.open("POST", "config.php", true);
            xhttp.send(formdata);
        }
    </script>
</body>
</html>