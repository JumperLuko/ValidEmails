<?php
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Desculpa, seu arquivo é muito grande para processarmos.";
    $uploadOk = 0;
}

// $_FILES['fileToUpload']
if ($_FILES['fileToUpload'] != NULL){
    // echo file_get_contents($_FILES['fileToUpload']);
    $title = $_FILES['fileToUpload']['size'];
    $file = fopen('upload.txt', 'w+'); //Open your .txt file
    ftruncate($file, 0); //Clear the file to 0bit
    $content = $title. PHP_EOL .$gain. PHP_EOL .$offset;
    fwrite($file , $content); //Now lets write it in there
    fclose($file ); //Finally close our .txt
    // die(header("Location: ".$_SERVER["HTTP_REFERER"]));
}else{
    echo 'Null';
}

// $email = "john.doe@example.com";
// // Remove all illegal characters from email
// $email = filter_var($email, FILTER_SANITIZE_EMAIL);

// // Validate e-mail
// if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     echo("$email is a valid email address");
// } else {
//     echo("$email is not a valid email address");
// }


echo '<br/><br/><br/><a href="seeEmails.php">lista de emails</a>';
?> 