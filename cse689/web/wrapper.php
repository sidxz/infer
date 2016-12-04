<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//$cmd = system('find .');
//echo $cmd;
//echo getcwd();
//echo exec('cd test && /usr/local/bin/infer -- javac Hello.java ');
//echo exec('cd test && /usr/local/bin/infer -- javac Hello.java && pwd');

sleep(2);
$target_dir = "uploads/".$_SESSION["projectName"]."/";
$filename = $_SESSION["fileName"];
//exec ("cd $target_dir && chown daemon:staff *")

// Touch a file to write logs
//$Header = "##### CSE 689 TERM PROJECT ... sid@tamu.edu  STEP 1"
//$cmd = "cd $target_dir && touch allout.txt";
$cmd = "cd $target_dir && echo '##### CSE 689 TERM PROJECT ... sid@tamu.edu  STEP 1' > allout.txt";
exec($cmd);
sleep(5);
//Run infer 
$cmd = "cd $target_dir && /usr/local/bin/infer -- javac $filename >> allout.txt 2>&1";
//var_dump($cmd);
exec($cmd);

//Blank out outputfile
$cmd = "cd $target_dir && echo '###### Booting up Container...' > allout.txt";
exec($cmd);

 ?>