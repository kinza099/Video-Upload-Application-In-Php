<?php
include 'db.php';
include 'layout.php';

$allowed_extensions = array("webm", "mp4", "ogv");

$titleErr = $descriptionErr = $fileErr = "";
$title = $description = $file_name = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valid = true;

    if (empty($_POST['title'])) {
        $titleErr = "Title is required";
        $valid = false;
    } else {
        $title = test_input($_POST['title']);
    }

    if (empty($_POST['description'])) {
        $descriptionErr = "Description is required";
        $valid = false;
    } else {
        $description = test_input($_POST['description']);
    }

    if (empty($_FILES["video"]["name"])) {
        $fileErr = "Video file is required";
        $valid = false;
    } else {
        $file_name = basename($_FILES["video"]["name"]);
        $target_dir = "videos/";
        $video_extension = pathinfo($file_name, PATHINFO_EXTENSION);

        if (!in_array($video_extension, $allowed_extensions)) {
            $fileErr = "Only MP4, WEBM, and OGV files are allowed.";
            $valid = false;
        } else {
         
            $new_file_name = time() . "." . $video_extension;
            $target_file = $target_dir . $new_file_name;
        }
    }

    if ($valid) {
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO videos (title, description, file_name) VALUES ('$title', '$description', '$new_file_name')";
            if ($conn->query($sql)) {
                header("Location: index.php");
                exit();
            } else {
                
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
           
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="container">
    <h1 class="my-4">Upload Video</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
            <?php if ($titleErr) echo "<span class='text-danger'>* $titleErr</span>"; ?>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description"><?php echo $description; ?></textarea>
            <?php if ($descriptionErr) echo "<span class='text-danger'>* $descriptionErr</span>"; ?>
        </div>
        <div class="form-group">
            <label for="video">Select video:</label>
            <input type="file" class="form-control-file" name="video">
            <?php if ($fileErr) echo "<span class='text-danger'>* $fileErr</span>"; ?>
        </div>
        <button type="submit" class="btn btn-primary">Upload Video</button>
    </form>
</div>
