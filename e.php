<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-20</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="str" placeholder="名前">
        <input type="text" name="str2" placeholder="コメント">
        <input type="submit" name="submit">
    </form>
    <?php 
    if( !empty( $_POST["str"] )&& !empty( $_POST["str2"] )){
        $name = $_POST["str"];
        $comment= $_POST["str2"];
        $date = date("Y年m月d日 H時i分s秒");
        $data = file_get_contents('mission_e.txt');/*mission_3-2.txtを読み込む*/
        $element = explode( "\n",$data);/*mission_3-2.txtを各行で分割する。*/
        $cnt = count( $element ); /*分割した要素の数（行数）をカウントする*/
     
        for( $i=0;$i<=$cnt;$i++ ){/*行末までループする*/
            $num = count( file('mission_e.txt')); 
            $num++;
        }
        $filename="mission_e.txt";
          
        $fp = fopen($filename,"a");
      
        fwrite($fp, $num.'<>'.$name.'<>'. $comment.'<>'.$date .PHP_EOL);
        fclose($fp);
        $data = file('mission_e.txt',FILE_IGNORE_NEW_LINES);/*mission_3-2.txtを読み込む*/
        foreach($data as $datas){
            $word = explode( "<>",$datas);
            foreach($word as $part){
            echo  $part;
            }
        echo "<br>";
        }
        
    }
?>
</body>
</html>