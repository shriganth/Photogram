
<?php

include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/load.php';

// Fetch image details from the database
$result = Imagefiles::getImages();
// print_r($result);

if ($result && $row = $result->fetch_assoc()) {
    $photoName = htmlspecialchars($row['photoName']);
    $photoType = htmlspecialchars($row['photoType']);
    $photoSize = htmlspecialchars($row['photoSize']);
    $uploaded_at = htmlspecialchars($row['uploaded_at']);
    $photoData = base64_encode($row['photoData']); // Encode binary data to base64
    $src = $row['photoData'];
    print_r($src);
} else {
    $photoName = '';
    $src = '';
    $uploaded_at = 'No upload date available';
}
?>

<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src=<?php echo $src ?> alt="Card image cap">
        <div class="card-body">
            <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
                This content is a little bit longer.</p> -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                </div>
                <small class="text-muted"><?php echo $uploaded_at ?></small>
            </div>
        </div>
    </div>
</div>