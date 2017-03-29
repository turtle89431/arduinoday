<?php
/**
 * Created by PhpStorm.
 * User: walterwinser
 * Date: 3/28/17
 * Time: 9:22 PM
 */
$lights = [16,5,4,0,2,14,12,13,15,3,1];
$useron=($_GET['on'])?$_GET['on']:null;
$pins;
$useron=explode(',',$useron);
foreach ($useron as $p){
    $pins[]=$lights[$p];
}
var_dump($pins);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php var_dump($_GET['on']);?>
    <div>0<input type="checkbox" name="on" value="0"/>1<input type="checkbox" name="on" value="1"/>2<input type="checkbox" name="on"
                                                                                              value="2"/></div>
    <div>3<input type="checkbox" name="on" value="3"/>4<input type="checkbox" name="on" value="4"/>5<input type="checkbox" name="on"
                                                                                              value="5"/></div>
    <div>6<input type="checkbox" name="on" value="6"/>7<input type="checkbox" name="on" value="7"/>8<input type="checkbox" name="on"
                                                                                              value="8"/></div>
    <button>go</button>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("button").click(function(){
            var favorite = [];
            $.each($("input[name='on']:checked"), function(){
                favorite.push($(this).val());
            });
            window.location = "http://arduinoday.azurewebsites.net/lights.php?on=" + favorite.join(",")
        });
    });
</script>
</body>
</html>
