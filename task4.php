<h2>Task 4</h2>
<br>
<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError= $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileExtActual = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileExtActual, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1024*1024) {
                $fileNameNew = uniqid('', true) . "." . $fileExtActual;
                $fileDestination = 'images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: index.php?imageuploaded");
            } else {
                echo "Your picture is too big!<sub>Cannot upload files bigger than 1mb</sub>";
            }
        }else {
            echo 'Error uploading your file.';
        }
    } else {
        echo 'Cannot upload file with that extension!';
    }
}
var_dump($_FILES);
?>

<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit">UPLOAD IMAGE</button>
</form>
