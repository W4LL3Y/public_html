 <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    $filename="mi3-4.txt";
    $lines=file($filename,FILE_IGNORE_NEW_LINES);
    
    //編集用フォーム準備
    
    
    ?>
    
    <!-- フォーム作成 -->
    <form action="" method="post">
        <input type="text" name="ename" placeholder="名前" value=
        "<?php 
        if(!empty($ename)){
            echo $ename;
        }
        ?>"
        ><br>
        <input type="text" name="ecomment" placeholder="コメント" value=
        "<?php 
        if(!empty($ecomment)){
            echo $ecomment;
        }
        ?>"
        ><br>
        <input type="number" name="enumberp" placeholder="編集番号" value=
        "<?php 
        if(!empty($enum)){
            echo $enum;
        }
        ?>"
        >
        <input type="submit" name="submit"><br><br>
        <input type="number" name="number"><br>
        <input type="submit" name="submit" value="削除"><br><br>
        <input type="number" name="enumber"><br>
        <input type="submit" name="submit" value="編集">
    </form>
    
    <?php
    if(!empty($_POST["enumber"])){
        $enum=$_POST["enumber"];
        $enum = $_POST["enumber"];
        $ename = $_POST["ename"];
        $ecooment = $_POST["ecomment"];
        foreach($lines as $line){
            $lineb=explode("<>","$line");
            if($lineb[0]==$enum){
                $line = $enum . "<>" . $ename . "<>" . $ecomment . "<>" . $date ;
            }
        }
    }
    //削除フォーム準備
    if(!empty($_POST["number"])){
        $dnum=$_POST["number"];
        $fp = fopen($filename,"w");
        foreach($lines as $line){
            $linea=explode("<>",$line);
            if($linea[0]!=$dnum){
                fwrite($fp, $line.PHP_EOL);
            }
        }
        fclose($fp);
        $lines=file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
            $linea=explode("<>",$line);
            for($i=0;$i<=3;$i++){
                echo $linea[$i]." ";
            }
            echo "<br>";
        }
    }
    
    //投稿フォーム準備
    if(!empty($_POST["name"]) && !empty($_POST["comment"])){
        $name = $_POST["name"];
        $comment=$_POST["comment"];
        if(!empty($lines)){
            foreach($lines as $line){
                $linea=explode("<>",$line);
                $num=$linea[0]+1;
            }    
        }
        else{
            $num=1;
        }
        //編集モード
        if(!empty($_POST["enumberp"])){
            $enump=$_POST["enumberp"];
            $fp = fopen($filename,"w");
            foreach($lines as $line){
                if($linea[0]==$enump){
                    $result=$linea[0]."<>".$__POST["name"]."<>".$__POST["comment"]."<>".date("Y/m/d H:i:s");
                    fwrite($fp, $result.PHP_EOL);
                }
                else{
                    $result=$num."<>".$name."<>".$comment."<>".date("Y/m/d H:i:s");
                    fwrite($fp, $result.PHP_EOL);
                }
            }    
        fclose($fp);
        }
        //新規投稿モード
        else{
            $result=$num."<>".$name."<>".$comment."<>".date("Y/m/d H:i:s");
            $fp = fopen($filename,"a");
            fwrite($fp, $result.PHP_EOL);
            fclose($fp);
        }
        //テキストファイル表示
        $lines=file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
            for($i=0;$i<=3;$i++){
                $linea = explode("<>","$line");
                echo $linea[$i]." ";
            }
            echo "<br>";
        }
    }
    
    //編集フォーム投稿時表示
    if(!empty($_POST["enumber"])){
        foreach($lines as $line){
            $linea=explode("<>","$line");
            for($i=0;$i<=3;$i++){
                echo $linea[$i]." ";
            }
            echo "<br>";
        }   
    }
    ?>
</body>