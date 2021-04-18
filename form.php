<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){ 
    $uploadDir = 'public/uploads/';
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $extensions_ok = ['jpg', 'png', 'webp'];
    $maxFileSize = 1000000;

    if( (!in_array($extension, $extensions_ok ))){
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
    }

    $fileTmpName = $_FILES['avatar']['tmp_name'];
    if( file_exists($fileTmpName) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
    {
    $errors[] = "Votre fichier doit faire moins de 1M !";
    }

    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
}
?>



<form method="post" enctype="multipart/form-data">
    <div>
    <label for="name">Name :</label>
    <input type="text" id="name" name="name">
    </div>
    <div>
    <label for="firstname">Firstname:</label>
    <input type="text" id="firstname" name="firstname">
    </div>
    <label for="age">Age :</label>
    <input type="number" id="age" name="age">
    <div>
    <label for="imageUpload">Upload a profile image</label>    
    <input type="file" name="avatar" id="imageUpload" />
    <button name="send">Send</button>
    </div>

</form>

<img src="public/uploads/homer.png"></br>

<?php
if(array_key_exists("name", $_POST)) {
?>
Name: <?php echo $_POST["name"];?></br>
Firstname: <?php echo $_POST["firstname"];?></br>
Age: <?php echo $_POST["age"];?> </br>
<?php } ?>


