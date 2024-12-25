<?php

include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/load.php';

// Fetch image details from the database
$result = Imagefiles::getImages();

?>

<div class="container">
    <div class="row">
        <?php
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $photoName = htmlspecialchars($row['photoName']);
                $photoType = htmlspecialchars($row['photoType']);
                $photoSize = htmlspecialchars($row['photoSize']);
                $uploaded_at = htmlspecialchars($row['uploaded_at']);
                $photoData = $row['photoData']; // Encode binary data to base64
                // $src = 'data:' . $photoType . ';base64,' . $photoData; // Create base64 image source
                $src = $photoName;
        ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top img-thumbnail" src="../../photogram/__Photogram_Images/<?php echo $photoName ?>" alt="Image for <?php echo $photoName ?>" width="50" height="50">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-info">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                </div>
                                <small class="text-muted"><?php echo $uploaded_at ?></small>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No images available.</p>';
        }
        ?>
    </div>
</div>