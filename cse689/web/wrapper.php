<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


sleep(2);
$target_dir = "uploads/".$_SESSION["projectName"]."/";
$filename = $_SESSION["fileName"];
$build_type = $_SESSION["buildType"];

// $target_dir = "uploads/sid/";
// $filename = "tomcat.tar.gz";
// $build_type = "ant";

// Touch a file to write logs
//$Header = "##### CSE 689 TERM PROJECT ... sid@tamu.edu  STEP 1"
//$cmd = "cd $target_dir && touch allout.txt";
$cmd = "cd $target_dir && echo '##### CSE 689 TERM PROJECT ... sid@tamu.edu  STEP 1 BUILD TYPE = ".$build_type." ' > allout.txt";
exec($cmd);
sleep(5);

// Run commands based on build type

switch ($build_type) {

	case "singleJavaFile":
	$cmd = "cd $target_dir && /usr/local/bin/infer -- javac $filename >> allout.txt 2>&1";
	exec($cmd);
	break;

	case "ant":
	// Untar file
	//Set Permissions
	//exec("cd $target_dir && chmod -R 777 *");
	echo "starting";
	$cmd = "echo '#### STEP 2 WILL UNTAR FILE' >> allout.txt";
	echo exec($cmd);
	sleep(2);	

	echo "taring";
	$cmd = "cd $target_dir && tar -xvzf $filename >> allout.txt 2>&1";
	echo exec($cmd);

	echo "permissions";
	//Set Permissions
	echo exec("cd $target_dir && mkdir infer-out && chmod -R 777 *");
	// Infer with ant builder
	$cmd = "echo '#### STEP 3 Startying Analysis with ant' >> allout.txt";
	echo exec($cmd);
	sleep(2);


	$cmd = " cd $target_dir && ant clean >> allout.txt 2>&1";
	echo exec($cmd);

	sleep (2);
	$cmd = "cd $target_dir && /usr/local/bin/infer -- ant >> allout.txt 2>&1";
	echo exec($cmd);



	break;

	default:
	$cmd = "cd $target_dir && /usr/local/bin/infer -- javac $filename >> allout.txt 2>&1";
	exec($cmd);

}



//Blank out outputfile
$cmd = "cd $target_dir && echo '###### Booting up Container...' > allout.txt";
#exec($cmd);

 ?>