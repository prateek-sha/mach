<?php
$target_dir = $_SERVER['DOCUMENT_ROOT']."/mech/admin/uploadpdf/";
$target_file = $target_dir . basename($_FILES["cadfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["cadfile"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["cadfile"]["tmp_name"], $target_file)) {
        $cadfile = basename( $_FILES["cadfile"]["name"]);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>