<?php

if($_FILES['files']['name'][0]!="")
{
	$total = count($_FILES['files']['name']);

	// Loop through each file
	for($i=0; $i<$total; $i++) 
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png");

		$temp = explode(".", $_FILES["files"]["name"][$i]);
		$extension = end($temp);
		if ((($_FILES["files"]["type"][$i] == "image/gif")
		|| ($_FILES["files"]["type"][$i] == "image/jpeg")
		|| ($_FILES["files"]["type"][$i] == "image/jpg")
		|| ($_FILES["files"]["type"][$i] == "image/pjpeg")
		|| ($_FILES["files"]["type"][$i] == "image/x-png")
		|| ($_FILES["files"]["type"][$i] == "image/png"))		
		&& in_array($extension, $allowedExts))
		{
		if ($_FILES["files"]["error"][$i] > 0)
		{
			echo "Return Code: " . $_FILES["files"]["error"][$i] . "<br>";
			exit();
		}
		else
		{		
			if (file_exists("upload/" . $_FILES["files"]["name"][$i]))
			{
				echo $_FILES["files"]["name"][$i] . " already exists. ";
			}
			else
			{
				
				//FIX RESIZING
				$maxDimWidth = 400;
				$maxDimHeight = 400;
				
				list($width, $height, $type, $attr) = getimagesize( $_FILES['files']['tmp_name'][$i] );
				
				
				
				if ( $width > $maxDimWidth || $height > $maxDimHeight ) {
					$target_filename = $_FILES['files']['tmp_name'][$i];
					$fn = $_FILES['files']['tmp_name'][$i];
					$size = getimagesize( $fn );
					$ratio = $size[0]/$size[1]; // width/height
					if( $ratio > 1) {
						$width = $maxDimWidth;
						$height = $maxDimHeight/($ratio);
					} else {
						$width = $maxDimWidth*$ratio;
						$height = $maxDimHeight;
					}
					$src = imagecreatefromstring( file_get_contents( $fn ) );
					$dst = imagecreatetruecolor( $width, $height );
					imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
					imagedestroy( $src );
					
					$picname = md5(time() . rand()). $i . "____". str_replace(' ', '_', $_FILES["files"]["name"][$i]);
					
					imagejpeg( $dst, "upload/" . $picname ); // adjust format as needed
					
					imagedestroy( $dst );
					
				}
				else
				{
					$picname = md5(time() . rand()). $i . "____". str_replace(' ', '_', $_FILES["files"]["name"][$i]);
					move_uploaded_file($_FILES["files"]["tmp_name"][$i], "upload/" . $picname);
				}
				
				$attachments .= $picname . ",";
			}
		}
		}
		else
		{
			echo "Invalid file";
			exit();
		}
	}
}
?>