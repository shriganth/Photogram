<?php

include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/load.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $photoName = basename($_FILES['photo']['name']);
        $photoType = $_FILES['photo']['type'];
        $photoSize = $_FILES['photo']['size'];
        $photoTmpName = $_FILES['photo']['tmp_name'];

        // Validate file type
        if (in_array($photoType, ['image/jpeg', 'image/png', 'image/gif'])) {
            $targetDir = '/var/labsstorage/home/shriganth87/htdocs/photogram/__Photogram_Images/';
            $targetFile = $targetDir . $photoName;

            // Debugging information
            if (!is_dir($targetDir)) {
                echo "Error: Target directory does not exist.";
            } elseif (!is_writable($targetDir)) {
                echo "Error: Target directory is not writable.";
            } else {
                if (move_uploaded_file($photoTmpName, $targetFile)) {
                    $uploaded_at = date('Y-m-d H:i:s');
                    // Call Imagefiles::uploadImage for metadata
                    $result = Imagefiles::uploadImage($photoName, $photoType, $photoSize, $targetFile, $uploaded_at);
                    echo "File uploaded successfully.";
                } else {
                    echo "Error: Failed to move uploaded file.";
                }
            }
        } else {
            echo "Error: Invalid file type.";
        }
    } else {
        echo "Error uploading file.";
    }
}

?>

<div class="container mb-3">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3"> 
            <label class="input-group-text" for="customFile"> 
                <i class="bi bi-file-earmark-image"></i> 
            </label> 
            <input type="file" class="form-control visually-hidden photo"
                id="photo" name="photo" accept="image/*" required> 
            <button class="btn btn-success" type="submit"> 
                Upload 
            </button> 
        </div>
    </form>
</div>
