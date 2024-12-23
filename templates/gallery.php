<?php

include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/load.php';

// Fetch all image details from the database
$result = Imagefiles::getImages();

if ($result && $result->num_rows > 0): ?>
    <div class="container">
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): 
                $photoName = htmlspecialchars($row['photoName']);
                $photoType = htmlspecialchars($row['photoType']);
                $uploaded_at = htmlspecialchars($row['uploaded_at']);
                $photoData = base64_encode($row['photoData']); // Encode binary data
                $src = "data:{$photoType};base64,{$photoData}"; // Prepare data URI
            ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="<?php echo $src ?>" alt="Image for <?php echo $photoName ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $photoName; ?></h5>
                            <p class="card-text">Uploaded on: <?php echo $uploaded_at; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- <div class="btn-group"> -->
                                    <button type="button" class="btn btn-sm btn-outline-info">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                <!-- </div> -->
                                <small class="text-muted"><?php echo $uploaded_at; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php else: ?>
    <p>No images found.</p>
<?php endif; ?>
