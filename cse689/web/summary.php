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

    <title>CSE 689 : Analysis</title>

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
    <h1> Analysis</h1>
    </div>
    <div class="container">
        <h1> Summary </h1>
        <hr>
    </div>
    <div class="container">
    <?php
// $json = '[{"bug_class":"PROVER","kind":"ERROR","bug_type":"NULL_DEREFERENCE","qualifier":"object s last assigned on line 3 could be null and is dereferenced at line 4","severity":"HIGH","visibility":"user","line":4,"column":-1,"procedure":"int Hello.test()","procedure_id":"Hello.test():int.f29186d5ad11b249f5fc253b06597e08","procedure_start_line":2,"file":"Hello.java","bug_trace":[{"level":0,"filename":"Hello.java","line_number":2,"description":"start of procedure test()","node_tags":[{"tag":"kind","value":"procedure_start"},{"tag":"name","value":"int Hello.test()"},{"tag":"name_id","value":"Hello.test():int.f29186d5ad11b249f5fc253b06597e08"}]},{"level":0,"filename":"Hello.java","line_number":3,"description":"","node_tags":[]},{"level":0,"filename":"Hello.java","line_number":4,"description":"","node_tags":[]}],"key":348644843,"qualifier_tags":[{"tag":"bucket","value":"B1"},{"tag":"line","value":"4"},{"tag":"assigned_line","value":"3"},{"tag":"value","value":"s"}],"hash":651439030},{"bug_class":"PROVER","kind":"ERROR","bug_type":"NULL_DEREFERENCE","qualifier":"object q last assigned on line 8 could be null and is dereferenced at line 9","severity":"HIGH","visibility":"user","line":9,"column":-1,"procedure":"int Hello.test2()","procedure_id":"Hello.test2():int.e01b27b959f1fe5dd821bec29d94c3be","procedure_start_line":7,"file":"Hello.java","bug_trace":[{"level":0,"filename":"Hello.java","line_number":7,"description":"start of procedure test2()","node_tags":[{"tag":"kind","value":"procedure_start"},{"tag":"name","value":"int Hello.test2()"},{"tag":"name_id","value":"Hello.test2():int.e01b27b959f1fe5dd821bec29d94c3be"}]},{"level":0,"filename":"Hello.java","line_number":8,"description":"","node_tags":[]},{"level":0,"filename":"Hello.java","line_number":9,"description":"","node_tags":[]}],"key":348644843,"qualifier_tags":[{"tag":"bucket","value":"B1"},{"tag":"line","value":"9"},{"tag":"assigned_line","value":"8"},{"tag":"value","value":"q"}],"hash":55291039},{"bug_class":"PROVER","kind":"ERROR","bug_type":"NULL_DEREFERENCE","qualifier":"object w last assigned on line 14 could be null and is dereferenced at line 15","severity":"HIGH","visibility":"user","line":15,"column":-1,"procedure":"int Hello.test3()","procedure_id":"Hello.test3():int.2c7e37fe4460fb47d33231a5ad4ec596","procedure_start_line":13,"file":"Hello.java","bug_trace":[{"level":0,"filename":"Hello.java","line_number":13,"description":"start of procedure test3()","node_tags":[{"tag":"kind","value":"procedure_start"},{"tag":"name","value":"int Hello.test3()"},{"tag":"name_id","value":"Hello.test3():int.2c7e37fe4460fb47d33231a5ad4ec596"}]},{"level":0,"filename":"Hello.java","line_number":14,"description":"","node_tags":[]},{"level":0,"filename":"Hello.java","line_number":15,"description":"","node_tags":[]}],"key":348644843,"qualifier_tags":[{"tag":"bucket","value":"B1"},{"tag":"line","value":"15"},{"tag":"assigned_line","value":"14"},{"tag":"value","value":"w"}],"hash":634398432}]';

$target_dir = "uploads/".$_SESSION["projectName"]."/infer-out/report.json";
$json = file_get_contents($target_dir, "r");
//var_dump($json);

$code = "String s = null;
    return s.length();";
$json = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t](//).*)#", '', $json); 

$arr_list = json_decode($json, true);
//var_dump($arr_list);

echo '<h3 class="bg-warning"> Errors : <span>'.sizeof($arr_list).'</span></h3>';
foreach ($arr_list as $arr) {
    # code...
echo '<blockquote class="blockquote">';
echo '<div class="alert alert-danger" role="alert">'.$arr['bug_type'].'</div>';
echo '<dl class="row">
  <dt class="col-sm-3 ">Description</dt>
  <dd class="col-sm-9 text-danger">'.$arr['qualifier'].'</dd>

  <dt class="col-sm-3">Line Number</dt>
  <dd class="col-sm-9">'.$arr['line'].'</dd>

  <dt class="col-sm-3">File Name</dt>
  <dd class="col-sm-9">'.$arr['file'].'</dd>

  <dt class="col-sm-3">Severity</dt>
  <dd class="col-sm-9">'.$arr['severity'].'</dd>
  </dl>';
  echo '<samp>';
  echo $code;
  echo '</samp>';
echo '</blockquote>';
}


?>
        
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
