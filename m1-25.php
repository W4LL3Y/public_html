<body>
    <?php
    $str = "thank you";
    $filename="mission_1-25.txt";
    $fp = fopen($filename,"a");
    fwrite($fp, $str.PHP_EOL);
    fclose($fp);
    echo "書き込み成功！";
    ?>
</body>