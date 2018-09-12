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
<?php

    $nominal = array(5000, 2000, 1000, 500, 200, 100);
    $kilkist = array(20, 20, 20, 20, 20, 20);
    $k=count($nominal);
    $maxSum = 0;

    for($j = 0; $j < $k; ++$j){
        $maxSum = $maxSum +($kilkist[$j] * $nominal[$j]);
    }


    $sum = filter_input(INPUT_POST, 'suma') ? filter_input(INPUT_POST, 'suma') : 0;

    echo "Ваша сума:   $sum <br><hr>";
    $ost = $sum%100;
    if ($sum < 100){
        echo "<strong>Ви ввели недостатню суму!!!</strong> <br><br>";
    }
    else if ($sum > $maxSum){
        echo "<strong>Ти шо, олігарх, тут таких грощей нема!!!</strong> <br><br>";
    }
    else if ($ost != 0){
        echo "<strong>Сума повинна бути кратна 100!!!</strong> <br><br>";
}
    else {

        while ($sum > 0) {
            for ($i = 0; $i < $k; ++$i) {
                $delenie = intval($sum / $nominal[$i]);
                if($delenie <= $kilkist[$i]){
                    $kilkist[$i] = $kilkist[$i] - $delenie;
                    $sum = $sum - $delenie * $nominal[$i];
                }
                else{
                    $kilkist[$i] = 0;
                    $sum = $sum - ($nominal[$i] * 20);
                }
            }
            echo "Ви отримали наступні банкноти  <br>";
            for ($s = 0; $s < $k; ++$s) {
                $ban = 20 - $kilkist[$s];
                if ($ban != 0) {
                    echo($nominal[$s] . " x " . $ban . "<br>");
                }
            }

            echo "<hr><br> В банкоматі залишилось купюр за номіналами <br>";

            for ($s = 0; $s < $k; ++$s) {
                echo($nominal[$s] . " - " . $kilkist[$s] . "<br>");
            }

        }
    }

?>

<div>
    <br>
    <a href="index.php"><input type="button" value="&lt Back"</a>
</div>
</body>
</html>


