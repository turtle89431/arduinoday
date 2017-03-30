<!doctype html>
<?php
if($_POST) {
    $i;
    $l = $_POST['Left'];
    $r = $_POST['Right'];
    $txt['i'] = $i;
    $txt['l']=$l;
    $txt['r']=$r;
    $myfile = file_put_contents("data.txt", $txt);
}
?>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">MoveBot</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
        </div>
    </nav>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div id="page">
            <div class="container-fluid">
                <div class="panel panel-default col-md-8">
                    <div class="panel-body">
            <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" class="col-md-8">
                <div class="col-md-5">
                    <h2>Left Wheel</h2>
                    <input type="range" name="Left" id="" step="5"></div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <h2>Right Wheel</h2>
                    <input type="range" name="Right" id="" step="5"></div>
                <input type="submit" value="Make Bot Go!">
            </form>
                    </div></div>
                <div class="col-md-4">
                    <div class="embed-responsive embed-responsive-16by9">
                    <video controls>
                        <source src="video.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
