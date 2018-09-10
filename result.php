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
    $k=count($nominal);
    $F=Array();
    $F[0]=0;
    $INF=PHP_INT_MAX;

    $sum = filter_input(INPUT_POST, 'suma') ? filter_input(INPUT_POST, 'suma') : 0;

    echo "Ваша сума:   $sum <br>";
    $ost = $sum%100;
    if ($sum < 100){
        echo "<strong>Ви ввели недостатню суму!!!</strong> <br><br>";
    }
    else if ($sum > 1000000){
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

         echo "Ви отримали наступні банкноти  <br>";
            while ($sum > 0) {
                for ($i = 0; $i < $k; ++$i) {
                    if ($F[$sum - $nominal[$i]] == $F[$sum] - 1) {
                        echo $nominal[$i] . "<br>";
                        $sum -= $nominal[$i];
                        break;
                    }
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


