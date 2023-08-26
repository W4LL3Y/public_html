<body>
   <form method="POST" action="">
        <input type="text" name="name" placeholder = "名前"><br>
        <input type="text" name="comment" placeholder = "コメント"><br>
        <input type="submit" name="submit" value="送信">
    </form>
    <?php
    $a = 1;
    if(!empty($_POST["name"])){
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $date = date("Y/m/d H:i:s");
        $filename="mission_3-2.txt";
        if(file_exists($filename)){
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                if(empty($line)){
                }else{
                    $a = $a + 1;
                    $part = explode("<>", "$line");
                    foreach($part as $words){
                        echo $words ;
                    }
                    echo "<br>";
                }
            }
        }
        $whole = $a ."<>" . $name . "<>" . $comment . "<>" . $date ;
        $fp = fopen($filename,"a");
        fwrite($fp, $whole.PHP_EOL);
        fclose($fp);
        echo $a . $name . $comment . $date;
    }else{
    }
    ?>
</body>
