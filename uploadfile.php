<?php
// Define the upload directory
$upload_dir = "uploads/";

// Get the uploaded file information
$uploadedFile = $_FILES["copyright_file"];
$filename = basename($uploadedFile["name"]);
$target_file = $upload_dir . $filename;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if the uploaded file is an image
$allowedExtensions = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
    window.location.href = 'signup.php';</script>";
    exit;
}

// Check if the file already exists
if (file_exists($target_file)) {
   
    echo "<script>alert('Sorry, file already exists');
    window.location.href = 'signup.php';</script>";
    exit;
}

// Check if the upload was successful
if (move_uploaded_file($uploadedFile["tmp_name"], $target_file)) {
    echo "<script>
             alert('The file " . htmlspecialchars($filename) . " has been uploaded.');
            window.location.href = 'signup.php';
          </script>";
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
