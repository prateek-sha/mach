
<?php
	$allowedExts = array("gif", "jpeg", "jpg", "png");

	$temp = explode(".", $_FILES["file1"]["name"]);
	$extension = end($temp);
	if ((($_FILES["file1"]["type"] == "image/gif")
	|| ($_FILES["file1"]["type"] == "image/jpeg")
	|| ($_FILES["file1"]["type"] == "image/jpg")
	|| ($_FILES["file1"]["type"] == "image/pjpeg")
	|| ($_FILES["file1"]["type"] == "image/x-png")
	|| ($_FILES["file1"]["type"] == "image/png"))
	&& ($_FILES["file1"]["size"] < 20000000)
	&& in_array($extension, $allowedExts))
	{
	if ($_FILES["file1"]["error"] > 0)
	{
		echo "Return Code: " . $_FILES["file1"]["error"] . "<br>";
		exit();
	}
	else
	{		
		
		if (file_exists("upload/" . $_FILES["file1"]["name"]))
		{
			echo $_FILES["file1"]["name"] . " already exists. ";
			exit();
		}
		else
		{

				$maxDimWidth = 1280;
				$maxDimHeight = 1280;	
			
			list($width, $height, $type, $attr) = getimagesize( $_FILES['file1']['tmp_name'] );
	
						
			// if ( $width > $maxDimWidth || $height > $maxDimHeight ) {
			// 	$target_filename = $_FILES['file1']['tmp_name'];
			// 	$fn = $_FILES['file1']['tmp_name'];
			// 	$size = getimagesize( $fn );
			// 	$ratio = $size[0]/$size[1]; // width/height
			// 	if( $ratio > 1) {
			// 		$width = $maxDimWidth;
			// 		$height = $maxDimHeight/($ratio);
			// 	} else {
			// 		$width = $maxDimWidth*$ratio;
			// 		$height = $maxDimHeight;
			// 	}
			// 	// $src = imagecreatefromstring( file_get_contents( $fn ) );
			// 	// $dst = imagecreatetruecolor( $width, $height );
			// 	// imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
			// 	// imagedestroy( $src );
				
			// 	$picname = md5(time() . rand()). "1____". str_replace(' ', '_', $_FILES["file1"]["name"]);
				
			// 	// imagejpeg( $dst, "upload/" . $picname ); // adjust format as needed
				
			// 	// imagedestroy( $dst );
				
			// }
			// else
			// {
				$picname = md5(time() . rand()). "1____". str_replace(' ', '_', $_FILES["file1"]["name"]);

				move_uploaded_file($_FILES["file1"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/mech/admin/upload1/" . $picname);
			//}
			
			$attachment = $picname ;
	
		}
	}
	}
	else
	{
		echo "Invalid file";
		exit();
	}	
?>