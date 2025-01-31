<?php
include 'db.php';
include 'layout.php';

$sql = "SELECT * FROM videos";
$result = $conn->query($sql);
?>

<div class="container">
    <h1 class="my-4">Videos</h1>
    <ul class="list-group">
        <?php while($row = $result->fetch_assoc()) { ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Title:</h5>
                        <p><?php echo htmlspecialchars($row['title']); ?></p>
                    </div>
                    <div class="col-md-4">
                        <h5>Description:</h5>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                    </div>
                    <div class="col-md-4">
                        <h5>Video:</h5>
                        <video class="img-fluid" controls>
                            <source src="videos/<?php echo htmlspecialchars($row['file_name']); ?>" type="video/<?php echo htmlspecialchars(pathinfo($row['file_name'], PATHINFO_EXTENSION)); ?>">
                        </video>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="edit.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-secondary btn-sm">Edit</a>
                    <a href="delete.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
