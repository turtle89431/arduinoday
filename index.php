<!doctype html>
<?php
if($_POST) {
    $txt;
    if($_POST){
        $txt =($_POST['dir'])?$_POST['dir']:0 .",".($_POST['ang'])?$_POST['ang']:0;
        $myfile = file_put_contents("data.txt", $txt);
    }
    //$myfile = file_put_contents("data.txt", $txt);
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
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="navbar-brand">نقل الروبوت</a></li>
            </ul>
        </div>
    </nav>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div><?=file_get_contents("data.txt")?></div>
        <div id="page">
            <div class="container-fluid">
                <div class="panel panel-default col-md-8">
                    <div class="panel-body">
            <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" >
                <div class="col-md-4">
                    <h4><input type="radio" name="dir" value="l" onclick="document.getElementById('degPanel').style.display='block'"><br>Left - يسار</h4>
                </div>
                <div class="col-md-4">
                    <h4><input type="radio" name="dir" id="" value="f" onclick="document.getElementById('degPanel').style.display='none'"><br>Forward -  أمام</h4>
                </div>
                <div class="col-md-4">
                    <h4><input type="radio" name="dir" value="r" onclick="document.getElementById('degPanel').style.display='block'"><br>Right -  يمين</h4>
                </div>
                <div class="row" id="degPanel">
                <div class="col-md-2"><input type="radio" name="ang" value="83">15&deg;</div>
                <div class="col-md-2"><input type="radio" name="ang" value="166">30&deg;</div>
                <div class="col-md-2"><input type="radio" name="ang" value="249">45&deg;</div>
                <div class="col-md-2"><input type="radio" name="ang" value="332">60&deg;</div>
                <div class="col-md-2"><input type="radio" name="ang" value="415">75&deg;</div>
                <div class="col-md-2"><input type="radio" name="ang" value="498">90&deg;</div>
                </div>
                <div class="fb">
                <div class="col-md-12"><input type="submit" value="Make Bot Go!"></div>
                </div>
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
