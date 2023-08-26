<body>
    <form action = "" method = "post">
        <input type = "text" name = "str" value = "コメント">
        <input type = "submit" name = "submit">
    </form>
    <?php
    if(!empty($_POST["str"])){
        $str = $_POST["str"];
        if(!empty($str)){
            echo $str . "を受け付けました<br>";
        }else{
        }
    }else{
    }
    if(empty($str)){
    }else{
        $filename="mission_2-3.txt";
        $fp = fopen($filename,"a");
        fwrite($fp, $str.PHP_EOL);
        fclose($fp);
    }
    $filename="mission_2-2.txt";
    if(file_exists($filename)){
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $str){
            echo $str . "<br>";
        }    
    }
    ?>
</body>