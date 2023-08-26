<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" value="名前"><br>
        <input type="text" name="comment" value="コメント"><br>
        <input type="submit" name="submit"><br>
    </form>
    
    <?php
    $num=1;
    $filename="m3-2.txt";
    $lines=file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
            $num++;
    }
    if(!empty($_POST["name"]) && !empty($_POST["comment"])){
            $name = $_POST["name"];
            $comment=$_POST["comment"];
            $result=$num."<>".$name."<>".$comment."<>".date("Y/m/d H:i:s");
            $fp = fopen($filename,"a");
            fwrite($fp, $result.PHP_EOL);
            fclose($fp);
    }
    $lines=file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
        $linea=explode("<>",$line);
        for($i=0;$i<=3;$i++){
            echo $linea[$i]." ";
        }
        echo "<br>";
    }
    ?>