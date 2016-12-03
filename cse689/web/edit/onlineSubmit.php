<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$content = $_POST["editor"];

$_SESSION["buildType"] = 'singleJavaFile';
$_SESSION["analysisOptions"] = 'summary';
$_SESSION["analysisOptions"] = $_POST["analysisOptions"];
$_SESSION["arguments"] = '';

$target_dir = "../uploads/112233online/";
exec("mkdir ".$target_dir);

$_SESSION["fileName"] = "Stream.java";
$_SESSION["projectName"] = "112233online";


$myfile = fopen($target_dir."/Stream.java", "w") or die("Unable to open file!");
fwrite($myfile, $content);
fclose($myfile);

header('Location: ../analyse.php');

?>
