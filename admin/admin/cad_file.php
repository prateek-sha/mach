<?php
if($_FILES['files']['name'][0]!="")
{
	$total = count($_FILES['files']['name']);

	// Loop through each file
	for($i=0; $i<$total; $i++) 
	{
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/mech/admin/upload/";
        $target_file = $target_dir . basename($_FILES["files"]["name"][$i]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["files"]["size"][$i] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file)) {
                $cadfile .= basename( $_FILES["files"]["name"][$i]) . ", ";

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
else
{
 echo "invalid file";
 exit();
}
?>