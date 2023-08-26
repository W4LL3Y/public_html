<body>
   <form method="POST" action="">
        <input type="text" name="name" placeholder = "名前"><br>
        <input type="text" name="comment" placeholder = "コメント"><br>
        <input type="submit" name="submit" value="送信"><br>
    </form>
    <form method="POST" action="">
        <input type="number" name="num" placeholder = "削除対象番号"><br>
        <input type="submit" name="submit" value="削除">
    </form>
    <?php
    $a = 1;
    if(!empty($_POST["name"])){
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $date = date("Y/m/d H:i:s");
        $filename="mission_3-3.txt";
        if(file_exists($filename)){
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                if(empty($line)){
                }else{
                    $part = explode("<>", "$line");
                    $a = $part[0];
                    foreach($part as $words){
                        echo $words ;
                    }
                    echo "<br>";
                    $a = $a + 1;
                }
            }
        }
        $whole = $a ."<>" . $name . "<>" . $comment . "<>" . $date ;
        $fp = fopen($filename,"a");
        fwrite($fp, $whole.PHP_EOL);
        fclose($fp);
        echo $a . $name . $comment . $date;
    }elseif(!empty($_POST["num"])){
        $num = $_POST["num"];
        $filename="mission_3-3.txt";
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
        $fp = fopen($filename,"w");
        foreach($lines as $line){
            $part = explode("<>", "$line");
            if($part[0]==$num){
            }else{
                $fp = fopen($filename,"a");
                fwrite($fp, $line.PHP_EOL);
                fclose($fp);
                foreach($part as $words){
                    echo $words ;
                }
                echo "<br>";
            }
        }
    }
    ?>
</body>
