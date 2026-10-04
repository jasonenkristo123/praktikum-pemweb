<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form enctype="multipart/form-data" action="upload.php" method="post">
        Choose a file to upload:
        <input name="uploadedfile" type="file" /> <br>
        <input type="submit" value="Upload File" />
    </form>
    <?php
    echo "File : ". $_FILES['uploadedfile']['name']."<br>";
    echo "Type : ". $_FILES['uploadedfile']['type']."<br>";
    echo "Size : ". $_FILES['uploadedfile']['size']."<br>";
    echo "Name : ". $_FILES['uploadedfile']['tmp_name']."<br>";
    ?>
</body>
</html>