<?php

if($_FILES['files']['name'][0]!="")
{
	$total = count($_FILES['files']['name']);

	// Loop through each file
	for($i=0; $i<$total; $i++) 
	{
				
			if (file_exists("upload/" . $_FILES["files"]["name"][$i]))
			{
				echo $_FILES["files"]["name"][$i] . " already exists. ";
			}
			else
			{
				
					$picname = md5(time() . rand()). $i . "____". str_replace(' ', '_', $_FILES["files"]["name"][$i]);
					move_uploaded_file($_FILES["files"]["tmp_name"][$i], "upload/" . $picname);
				
				
				$attachments .= $picname . ",";
			}
		}
		}
		else
		{
			echo "Invalid file";
			exit();
		}
	
?>