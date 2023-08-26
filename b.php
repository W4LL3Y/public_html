 <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-27</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="num" placeholder="数字を入力してください">
        <input type="submit" name="submit">
    </form>
    
    <?php
    
        if(isset($_POST[‘num’])){
            $num = $_POST[‘num’];
            echo $num;
            }
        $filename="mission_1-27.txt";
        
        $fp = fopen($filename,"a");
        fwrite($fp, $num.PHP_EOL);
        fclose($fp);
        echo "書き込み成功！<br>";
    
        if(is_file($file)){
            $array = file($file, FILE_IGNORE_NEW_LINES);
        foreach($array as $value){
            echo $value;
        }
        }else{
        //ファイルがない場合
            echo "";
        }
        
        
        $num = $_POST["num"];
            if ($num % 3 == 0 && $num % 5 == 0) {
            echo "FizzBuzz<br>";
        } elseif ($num % 3 == 0) {
            echo "Fizz<br>";
        } elseif ($num % 5 == 0) {
            echo "Buzz<br>";
        } else {
            echo $num . "<br>";
        }
    ?>
    
</body>
</html>