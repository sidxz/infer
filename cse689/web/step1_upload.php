<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSE 689 : Step 1</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top" onclick=$("#menu-close").click();>Start Bootstrap</a>
            </li>
            <li>
                <a href="#top" onclick=$("#menu-close").click();>Home</a>
            </li>
            <li>
                <a href="#about" onclick=$("#menu-close").click();>About</a>
            </li>
            <li>
                <a href="#services" onclick=$("#menu-close").click();>Services</a>
            </li>
            <li>
                <a href="#portfolio" onclick=$("#menu-close").click();>Portfolio</a>
            </li>
            <li>
                <a href="#contact" onclick=$("#menu-close").click();>Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    
    <div class="container-fluid infer-background white-text">
    <h1> STEP 1</h1>
    </div>
    <div class="container">
        <h1> Upload Project </h1>
        <h5> Supported: Gradle / Maven / Javac
        <hr>
    </div>
    <?php
    if (isset($_SESSION["formSubmit"]["error"])) {
        echo '<div class="container">
        <div class="alert alert-danger">
            <strong>Error!</strong>'.$_SESSION["formSubmit"]["error"].'
        </div>
        </div>';
        unset($_SESSION["formSubmit"]["error"]);
    }
    ?>
    <div class="container">
        <form action="formSubmit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label for="Project Name">Project Name</label>
            <input type="text" class="form-control" name="ProjectName" id="ProjectName" aria-describedby="ProjectHelp" placeholder="Your Project Name">
            <small id="ProjectHelp" class="form-text text-muted">This project name will be used to access results later.</small>
            </div>

            <div class="form-group">
            <label for="BuildType">Build Type</label>
            <select class="form-control" id="BuildType" name="BuildType">
                <option value="singleJavaFile">Single Java File</option>
                <option value="maven">Maven Project</option>
                <option value="gradle">Gradle Project</option>
            </select>
            </div>

            <div class="form-group">
            <label for="AnlaysisOptions">Analysis Options</label>
            <select multiple class="form-control" id="exampleSelect2" name="AnlaysisOptions">
              <option value="summary">Generate Analysis Report</option>
              <option>Generate Control Flow Graph</option>
              <option>Download Report in CSV</option>
              <option>Debug Mode</option>
            </select>
             </div>

              <div class="form-group">
                <label for="ProjectFile">File input</label>
                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">Upload a single .java file or input a tar.gz file. Tar balls will automatically be decompressed and will be compiled using the selected build type.</small>
             </div>

             <div class="form-group">
            <label for="Arguments">Arguments</label>
            <input type="text" class="form-control" id="Arguments" name="Arguments" aria-describedby="ArgumentsHelp" placeholder="Arguments">
            <small id="ArgumentsHelp" class="form-text text-muted">Pass any additional arguments that is needed to compile this project. Leave this blank if additional arguments are not required.</small>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary infer-background">Submit</button>


        </form>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>

</body>

</html>
