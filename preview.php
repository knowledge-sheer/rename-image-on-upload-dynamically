<?php 
if (isset($_POST['generate'])) {
	// Get image thorugh POST requert
	$image 		= $_FILES['image']['name'];
	$image_temp	= $_FILES['image']['tmp_name'];
	
	$date = date('m-d-Y');
	$microtime = round(microtime(true));

	$actual_name = pathinfo($image, PATHINFO_FILENAME);
	$ext = pathinfo($image, PATHINFO_EXTENSION);

	$image_path = "assets/images/";
	$prepend_name = 'Img_' . $date . "_" . $microtime;
	$full_img_name = $prepend_name . '_' . $actual_name . '.' . $ext;
	$dest_file = $image_path . $full_img_name;

	if (move_uploaded_file($image_temp, $dest_file)) {
		// echo $dest_file;
	} else {
		echo "Image was not uploaded!";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<?php echo $prepend_name . '_' . $actual_name . '.' . $ext; ?>
	</div>
</body>
</html>

<?php } ?>