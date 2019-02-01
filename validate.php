<?php
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Desculpa, seu arquivo é muito grande para processarmos.";
}else{
    if ($_FILES['fileToUpload'] != NULL){
        $email = file_get_contents($_FILES['fileToUpload']['tmp_name']);
        // $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     echo("VALID");
        // } else {
        //     echo("NOT VALID");
        // }
        function multiexplode ($delimiters,$string) {
            $ready = str_replace($delimiters, $delimiters[0], $string);
            $launch = explode($delimiters[0], $ready);
            return  $launch;
        }
        
        // $text = 'item1&&item2&item3';
        // $email = '&Lorem@sunt.com ';
        $words = multiexplode(array('&','&&','&&&','&&&&','&&&&&','&&&&&&','&&&&&&&','&&&&&&&&','&&&&&&&&&',' ','  ','   ',), $email);
        
        // $words = str_replace('&', '', $email);
        // echo $words.'<br/>';

        $contwords = count($words);
        echo $contwords.'<br/>';
        for ($num = 0; $num  != $contwords; $num++){
            echo $words[$num].'<br/>';
        }
    }else{
        echo 'Null';
    }
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


// if ($_FILES['fileToUpload'] != NULL){
//     // echo file_get_contents($_FILES['fileToUpload']);
//     $title = file_get_contents($_FILES['fileToUpload']['tmp_name']);
//     $file = fopen('upload.txt', 'w+'); //Open your .txt file
//     ftruncate($file, 0); //Clear the file to 0bit
//     $content = $title. PHP_EOL .$gain. PHP_EOL .$offset;
//     fwrite($file , $content); //Now lets write it in there
//     fclose($file ); //Finally close our .txt
//     // die(header("Location: ".$_SERVER["HTTP_REFERER"]));
// }else{
//     echo 'Null';
// }

// function multiexplode ($delimiters,$string) {
//     $ready = str_replace($delimiters, $delimiters[0], $string);
//     $launch = explode($delimiters[0], $ready);
//     return  $launch;
// }

// $text = 'item1&&item2&item3';
// $words = multiexplode(array("&","&&","&&&","&&&&","&&&&&","&&&&&&","&&&&&&&","&&&&&&&&","&&&&&&&&&"), $text);

// for ($num = 0; $words["$num"] == TRUE; $num++){
//     echo $words["$num"].'<br/>';
// }

echo '<br/><br/><br/><a href="seeEmails.php">lista de emails</a>';
?> 