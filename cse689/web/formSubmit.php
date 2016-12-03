<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// var_dump($_POST);
// if (!isset($_POST["ProjectName"])) {
//     echo "Not Set ProjectName";
// }
// exit();
if(!isset($_POST["submit"])) {
    $_SESSION["formSubmit"]["error"] = "Please fill out the mandatory fields.";
    header( 'Location: step1_upload.php' ) ;
}

if (!isset($_POST["ProjectName"])) {
    $_SESSION["formSubmit"]["error"] = "Please Enter a Project Name";
    header( 'Location: step1_upload.php' ) ;
}
$_SESSION["projectName"] = str_replace(' ', '_', $_POST["ProjectName"]);


if (!isset($_POST["BuildType"])) {
    $_SESSION["buildType"] = 'singleJavaFile';
}
$_SESSION["buildType"] = $_POST["BuildType"];


if (!isset($_POST["AnlaysisOptions"])) {
   $_SESSION["analysisOptions"] = 'summary';
}
else{
    $_SESSION["analysisOptions"] = $_POST["analysisOptions"];
}

if (!isset($_POST["Arguments"])) {
  $_SESSION["arguments"] = '';
}
else{
    $_SESSION["arguments"] = $_POST["Arguments"];  
}


$target_dir = "uploads/".$_SESSION["projectName"]."/";
// Make target dir
exec("mkdir ".$target_dir);

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if ($uploadOk == 0) {
    $_SESSION["formSubmit"]["error"] = "Upload Failed! Plese check input.";
    header( 'Location: step1_upload.php' ) ;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $_SESSION["fileName"] = $_FILES["fileToUpload"]["name"];
        exec("chmod -R 777 *");
        header('Location: analyse.php');
    } else {
        echo "500 Internal Framework Error Error Code FSMV";
    }
}
?>