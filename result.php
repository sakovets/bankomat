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

    $nominal = array(100, 200, 500, 1000, 2000, 5000);
    $kilkist = array(20, 20, 20, 20, 20, 20);
    $k=count($nominal);
    $F=Array();
    $F[0]=0;
    $INF=PHP_INT_MAX;

    $sum = filter_input(INPUT_POST, 'suma') ? filter_input(INPUT_POST, 'suma') : 0;

    echo "Ваша сума:   $sum <br><br>";
    $ost = $sum%100;
    if ($sum < 100){
        echo "<strong>Ви ввели недостатню суму!!!</strong> <br><br>";
    }
    else if ($sum > 100000){
        echo "<strong>Ти шо, олігарх, тут таких грощей нема!!!</strong> <br><br>";
    }
    else if ($ost != 0){
        echo "<strong>Сума повинна бути кратна 100!!!</strong> <br><br>";
    }
    else {
        for ($m = 1; $m <= $sum; ++$m) {
            $F[$m] = $INF;
            for ($i = 0; $i < $k; ++$i) {
                if ($m >= $nominal[$i] && $F[$m - $nominal[$i]] + 1 < $F[$m]) {
                    $F[$m] = $F[$m - $nominal[$i]] + 1;
                }
            }
        }

        while ($sum > 0) {
             for ($i = 0; $i < $k; ++$i) {
                 if ($F[$sum - $nominal[$i]] == $F[$sum] - 1) {
                    $kilkist[$i] = $kilkist[$i]-1;
                    $sum -= $nominal[$i];
                    break;
                 }
             }
        }

        echo "Ви отримали наступні банкноти  <br>";

        for ($s = 0; $s < $k; ++$s) {
              $ban = 20 - $kilkist[$s];
              if($ban != 0){
                   echo($nominal[$s] . " x " . $ban . "<br>");
              }
                 
        }

        echo "<br> В банкоматі залишилось купюр за номіналами <br>";

        for ($s = 0; $s < $k; ++$s) {
             echo ($nominal[$s] . " - " . $kilkist[$s]  . "<br>");
        }

    }

    ?>

    <div>
        <br>
        <a href="index.php"><input type="button" value="&lt Back"</a>
    </div>
</body>
</html>


