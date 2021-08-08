<?php
	@session_start();

	include("../task.php");
	include("../connect.php");

	if (!isset($_SESSION["user"])) {
		echo json_encode([
			"status"=>"error",
			"message"=>"Invalid request"
		]);
		die;
	}
	$user = json_decode(decrypt($_SESSION["user"]));
	$username = $user->username;

	if (isset($_POST['magikart-upload'])) {
		function filename($name) {
			global $username;
			return "./images/".md5($name.time().$username).".".strtolower(pathinfo($name, PATHINFO_EXTENSION));
		}
		if ($_FILES['file']['error'] > 0 ){
			echo json_encode([
				"status"=>"error",
				"message"=>"There is problem in file upload"
			]);
			switch($_FILES['file']['error'])
			{
				case 1: echo json_encode([
					"status"=>"error",
					"message"=>"Max file size exceeeded"
				]); break;
				case 2: echo json_encode([
					"status"=>"error",
					"message"=>"Max file size exceeded"
				]); break;
				case 3: echo json_encode([
					"status"=>"error",
					"message"=>"File partially uploaded"
				]); break;
				case 4: echo json_encode([
					"status"=>"error",
					"message"=>"No file specified"
				]); break;
			}
			exit;
		}
		// Check for valid image
		$file = $_FILES['file']['tmp_name'];
		if (file_exists($file))
		{
			$imagesizedata = getimagesize($file);
			if ($imagesizedata === FALSE)
			{
				echo json_encode([
					"status"=>"error",
					"message"=>"Invalid image file"
				]);
				exit;
			}
		}
		else
		{
			echo json_encode([
				"status"=>"error",
				"message"=>"Invalid file"
			]);
			exit;
		}
		
		//Set file location
		$uploadedfile = filename($_FILES["file"]["name"]);
		
		if(is_uploaded_file($_FILES['file']['tmp_name']))
		{
			if(!move_uploaded_file($_FILES['file']['tmp_name'], $uploadedfile))
			{
				echo json_encode([
					"status"=>"error",
					"message"=>"Upload failed!"
				]);
			}
		}
		else {
			echo json_encode([
				"status"=>"error",
				"message"=>"Upload failed!"
			]);
			exit;
		}

		$art_photo = $uploadedfile;
		$art_title = mysqli_real_escape_string($db, trim($_POST["title"]));

		mysqli_query($db, "INSERT INTO artworks (title, photo, username) VALUES ('$art_title','$art_photo','$username')");

		echo json_encode([
			"status"=>"success",
			"message"=>"File uploaded successfully!"
		]);
	}
	else if (isset($_GET["delete_art"])) {
		$id = mysqli_real_escape_string($db, $_GET["delete_art"]);
		$data = mysqli_query($db, "SELECT * FROM artworks WHERE id = '$id' AND username = '$username'");
		if (mysqli_num_rows($data) == 0) {?>
		<script>
			history.back();
		</script>
		<?php
		}
		else {
			$file = mysqli_fetch_array($data)["photo"];
			unlink($file);
			mysqli_query($db, "DELETE FROM artworks WHERE id = '$id'");
			header("location:./projects.php");
		}
	}
?>