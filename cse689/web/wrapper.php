<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//$cmd = system('find .');
//echo $cmd;
//echo getcwd();
//echo exec('cd test && /usr/local/bin/infer -- javac Hello.java ');
//echo exec('cd test && /usr/local/bin/infer -- javac Hello.java && pwd');

sleep(6);
$target_dir = "uploads/".$_SESSION["projectName"]."/";
$filename = $_SESSION["fileName"];
//exec ("cd $target_dir && chown daemon:staff *")
$cmd = "cd $target_dir && /usr/local/bin/infer -- javac $filename ";
var_dump($cmd);
echo exec($cmd);

 ?>