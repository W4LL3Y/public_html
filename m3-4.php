<body>
    <?php
    if(empty($_POST["num2"])){
    ?>
    <form method="POST" action="" name="送信用">
        <input type="text" name="name" placeholder = "名前"><br>
        <input type="text" name="comment" placeholder = "コメント"><br>
        <input type="submit" name="submit" value="送信"><br>
    </form>
    <form method="POST" action="">
        <input type="number" name="num" placeholder = "削除対象番号"><br>
        <input type="submit" name="submit" value="削除">
    </form>
    <form method="POST" action="">
        <input type="number" name="num2" placeholder = "編集対象番号"><br>
        <input type="submit" name="submit" value="編集">
    </form>
    <?php
    }elseif(!empty($_POST["num2"])){
        $num2 = $_POST["num2"];
        $filename="mission_3-4.txt";
        if(file_exists($filename)){
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                if(!empty($line)){
                    $part = explode("<>", "$line");
                    if($num2 == $part[0]){
                        $name2 = $part[1];
                        $comment2 = $part[2];
                    }else{
                    }
                }
            }
        }
    ?>
    <form method="POST" action="" name="送信用">
        <input type="text" name="name" value = "<?php echo $name2;?>"><br>
        <input type="text" name="comment" value = "<?php echo $comment2;?>"><br>
        <input type="hidden" name="num3" value = "<?php echo $num2;?>"><br>
        <input type="submit" name="submit" value="送信"><br>
    </form>
    <form method="POST" action="">
        <input type="number" name="num" placeholder = "削除対象番号"><br>
        <input type="submit" name="submit" value="削除">
    </form>
    <form method="POST" action="">
        <input type="number" name="num2" placeholder = "編集対象番号"><br>
        <input type="submit" name="submit" value="編集">
    </form>
    <?php
    }
    $a = 1;
    if(!empty($_POST["num3"])){
        $num3 = $_POST["num3"];
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $date = date("Y/m/d H:i:s");
        $filename="mission_3-4.txt";
        if(file_exists($filename)){
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            $fp = fopen($filename,"w");
            foreach($lines as $line){
                $part = explode("<>", "$line");
                if($part[0]==$num3){
                    $line = $num3 . "<>" . $name . "<>" . $comment . "<>" . $date ;
                    $fp = fopen($filename,"a");
                    fwrite($fp, $line.PHP_EOL);
                    fclose($fp);
                }else{
                $fp = fopen($filename,"a");
                fwrite($fp, $line.PHP_EOL);
                fclose($fp);
                }
            }
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                $part = explode("<>", "$line");
                foreach($part as $words){
                    echo $words ;
                }
                echo "<br>";
            }
        }
    }elseif(!empty($_POST["name"])){
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $date = date("Y/m/d H:i:s");
        $filename="mission_3-4.txt";
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
        $filename="mission_3-4.txt";
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