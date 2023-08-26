<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-21</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="num">
        <input type="submit" name="submit">
    </form>
    <?php
    $i = $_POST["num"];
    if($i % 3 == 0 && $i % 5 == 0){
            echo "FizzBuzz <br>";
        }elseif($i % 3 == 0){
            echo "Fizz <br>";
        }elseif($i % 5 == 0){
            echo "Buzz <br>";
        }else{
        echo $i . "<br>";
    }
    ?>
</body>