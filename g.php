<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-20</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="abc" placeholder= "お名前" value = "<?php echo $data1;?>"><br>
        <input type="text" name="str" placeholder= "コメント" value = "<?php echo $data2;?>">
        <input type="submit" name="submit"><br><br>
        <input type="text" name="num" placeholder= "削除対象番号">
        <input type="submit" name="remove" value= "削除"><br><br>
        <input type="text" name="ednum" placeholder= "編集対象番号">
        <input type="submit" name="edit" value= "編集"><br><br>
    </form>
</body>
</html>

<?php
if(!empty($_POST["abc"])){
    $a=$_POST["abc"];

    if(!empty($_POST["str"])){
        $b=$_POST["str"];

        $date = date("Y年m月d日 H時i分s秒");
        
            $c=1;
            $filename="m3-1.txt"; 
            $lines=file($filename,FILE_IGNORE_NEW_LINES); 
            foreach($lines as $line){ 
                if(!empty($line)){
                    $c++;
                }
            }
            
                
        
        $d=$c."<>".$a."<>".$b."<>".$date;
        
        if(file_exists("m3-1.txt")){
            $file=fopen("m3-1.txt","a");
            fwrite($file,$d.PHP_EOL);
            fclose($file);
            $f=file("m3-1.txt",FILE_IGNORE_NEW_LINES);
            foreach($f as $g){
               $str=explode("<>", $g);
               foreach($str as $strr){
                   echo $strr." ";
                
               }
             echo "<br>" ;
            }
        }
    }
}


if(!empty($_POST["num"])){
    $n=$_POST["num"] ;
   
    if(file_exists("m3-1.txt")){
        $file=fopen("m3-1.txt","a");
        $f=file("m3-1.txt",FILE_IGNORE_NEW_LINES);
        foreach($f as $g){
           $str=explode("<>",$g);
           if($str[0]!=$n){
               fwrite($file,$g.PHP_EOL);
               echo $str[0]." ".$str[1]." ".$str[2]." ".$str[3]."<br>";
           }
        }
           
        fclose($file);
        
    }
}

if(!empty($_POST["ednum"])){
    $en=$_POST["ednum"];
    
    if(file_exists("m3-1.txt")){
        $file=file("m3-1.txt",FILE_IGNORE_NEW_LINES);
        $file=fopen("m3-1.txt","a");
        foreach($file as $g){
            $str=explode("<>",$g);
            if($str[0]==$en){
                echo $data1;
                echo$data2;
            }
        }
    }
}

?>