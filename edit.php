<?php
include 'db.php';

$allowed_extensions = array("webm", "mp4", "ogv");

$id = $_GET['id'];
$sql = "SELECT * FROM videos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $target_dir = "videos/";
    $new_file_name = basename($_FILES["video"]["name"]);
    
    if ($new_file_name) {
        $new_target_file = $target_dir . $new_file_name;
        $video_extension = pathinfo($new_target_file, PATHINFO_EXTENSION);

        if (in_array($video_extension, $allowed_extensions)) {
            if (move_uploaded_file($_FILES["video"]["tmp_name"], $new_target_file)) {
               
                unlink($target_dir . $row['file_name']);
                $file_name_to_save = $new_file_name;
            } else {
                $error_message = "Error uploading the new video file.";
            }
        } else {
            $error_message = "Invalid file type. Only MP4, WEBM, and OGV files are allowed.";
        }
    } else {
        $file_name_to_save = $row['file_name'];
    }

    if (empty($error_message)) {
        $sql = "UPDATE videos SET title='$title', description='$description', file_name='$file_name_to_save' WHERE id=$id";
        if ($conn->query($sql)) {
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Error updating video: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Video</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Edit Video</h1>
        <?php if ($error_message): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo htmlspecialchars($row['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="video">Current Video:</label><br>
                <video width="320" controls>
                    <source src="videos/<?php echo htmlspecialchars($row['file_name']); ?>" type="video/<?php echo htmlspecialchars(pathinfo($row['file_name'], PATHINFO_EXTENSION)); ?>">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="form-group">
                <label for="video">Select new video (optional):</label>
                <input type="file" class="form-control-file" name="video" accept="video/*">
            </div>
            <button type="submit" class="btn btn-primary">Update Video</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
