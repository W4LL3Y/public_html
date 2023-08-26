 <body>
     <form action="" method="post"> 
          <input type="number" name="num" >
          <input type="submit" name="submit">
     </form>
    <?php
    $filename="mission1-27-3.txt";
    if( !empty( $_POST["num"] ) ){
         $num = $_POST["num"];
         $fp = fopen($filename,"a");
         fwrite($fp, $num.PHP_EOL);
         fclose($fp);
         echo "書き込み成功！<br>";
    }

    
    if(file_exists($filename)){
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $num){ 
            if(empty($num)) {
            } elseif ($num % 3 == 0 && $num % 5 == 0) {
                 echo "FizzBuzz"; " <br> " ;
            } elseif ($num % 3 == 0) {
                 echo "Fizz"; " <br> " ;
            } elseif ($num % 5 == 0) {
                 echo "Buzz"; " <br> " ;
            } else {
                echo $num . " <br> " ;
            }
        }
    }
    ?>
</body>
