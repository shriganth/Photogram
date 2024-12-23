
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
    $src = $row['photoName'];
    print_r($src);
} else {
    $photoName = '';
    $src = '';
    $uploaded_at = 'No upload date available';
}
?>

<div class="card mb-4 box-shadow">
    <?php if ($src): ?>
        <img class="card-img-top img-thumbnail" src="<?php echo $src ?>" alt="Image for <?php echo $photoName ?>">
    <?php else: ?>
        <div class="card-img-top text-center" style="height: 200px; line-height: 200px; background-color: #f8f9fa;">
            No Image Available
        </div>
    <?php endif; ?>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                </div>
                <small class="text-muted"><?php echo $uploaded_at ?></small>
            </div>
        </div>
</div>