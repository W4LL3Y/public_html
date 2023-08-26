<body>
    <?php
    $dsn = 'mysql:dbname=データベース名;host=localhost';
    $user = 'ユーザ名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    if(empty($_POST["num2"])){
    ?>
    <form method="POST" action="" name="送信用">
        <input type="text" name="name" placeholder = "名前"><br>
        <input type="text" name="comment" placeholder = "コメント"><br>
        <input type="text" name="password" placeholder = "パスワード">
        <input type="submit" name="submit" value="送信"><br>
    </form>
    <form method="POST" action="">
        <input type="number" name="num" placeholder = "削除対象番号"><br>
        <input type="text" name="password2" placeholder = "パスワード">
        <input type="submit" name="submit" value="削除">
    </form>
    <form method="POST" action="">
        <input type="number" name="num2" placeholder = "編集対象番号"><br>
        <input type="text" name="password2" placeholder = "パスワード">
        <input type="submit" name="submit" value="編集">
    </form>
    <?php
    }elseif(!empty($_POST["num2"] && $_POST["password2"])){
        $id = $_POST["num2"];
        $password2 = $_POST["password2"];
        $sql = 'SELECT * FROM mission5 WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(); 
        foreach ($results as $row){
            if($password2 == $row['password']){
                $name2 = $row['name'];
                $comment2 = $row['comment'];
            }else{
                $name2 = "";
                $comment2 = "";
            }
        }
    ?>
    <form method="POST" action="" name="送信用">
        <input type="text" name="name" value = "<?php echo $name2;?>"><br>
        <input type="text" name="comment" value = "<?php echo $comment2;?>"><br>
        <input type="text" name="password2" placeholder = "パスワード"><br>
        <input type="hidden" name="num3" value = "<?php echo $id;?>">
        <input type="submit" name="submit" value="送信"><br>
    </form>
    <form method="POST" action="">
        <input type="number" name="num" placeholder = "削除対象番号"><br>
        <input type="text" name="password2" placeholder = "パスワード">
        <input type="submit" name="submit" value="削除">
    </form>
    <form method="POST" action="">
        <input type="number" name="num2" placeholder = "編集対象番号"><br>
        <input type="text" name="password2" placeholder = "パスワード">
        <input type="submit" name="submit" value="編集">
    </form>
    <?php
    }else{
    ?>
    <form method="POST" action="" name="送信用">
        <input type="text" name="name" placeholder = "名前"><br>
        <input type="text" name="comment" placeholder = "コメント"><br>
        <input type="text" name="password" placeholder = "パスワード">
        <input type="submit" name="submit" value="送信"><br>
    </form>
    <form method="POST" action="">
        <input type="number" name="num" placeholder = "削除対象番号"><br>
        <input type="text" name="password2" placeholder = "パスワード">
        <input type="submit" name="submit" value="削除">
    </form>
    <form method="POST" action="">
        <input type="number" name="num2" placeholder = "編集対象番号"><br>
        <input type="text" name="password2" placeholder = "パスワード">
        <input type="submit" name="submit" value="編集">
    </form>
    <?php
    }
    $sql = "CREATE TABLE IF NOT EXISTS mission5"." (". "id INT AUTO_INCREMENT PRIMARY KEY,". "name char(32),". "comment TEXT,"."password TEXT,"."date TEXT" . ");";
    $stmt = $pdo->query($sql);
    $sql ='SHOW TABLES';
    $result = $pdo -> query($sql);
    foreach ($result as $row){
        echo $row[0];
        echo '<br>';
    }
    echo "<hr>";
    $sql ='SHOW CREATE TABLE mission5';
    $result = $pdo -> query($sql);
    foreach ($result as $row){
        echo $row[1];
    }
    echo "<hr>";
    if(!empty($_POST["num3"])){
        $id = $_POST["num3"]; //変更する投稿番号
        $name = $_POST["name"];
        $comment = $_POST["comment"]; //変更したい名前、変更したいコメント
        $password2 = $_POST["password2"];
        $date = date("Y/m/d H:i:s");
        $sql = 'SELECT * FROM mission5 WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(); 
        foreach ($results as $row){
            if($password2 == $row['password']){
            $sql = 'UPDATE mission5 SET name=:name,comment=:comment,date=:date,password=:password WHERE id=:id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt -> bindParam(':date', $date, PDO::PARAM_STR);
            $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            }else{
            }
        }
    }elseif(!empty($_POST["name"])){
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $password = $_POST["password"];
        $date = date("Y/m/d H:i:s");
        $sql = $pdo -> prepare("INSERT INTO mission5 (name, comment, date, password) VALUES (:name, :comment, :date, :password)");
        $sql -> bindParam(':name', $name, PDO::PARAM_STR);
        $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
        $sql -> bindParam(':date', $date, PDO::PARAM_STR);
        $sql -> bindParam(':password', $password, PDO::PARAM_STR);
        $sql -> execute();
    }elseif(!empty($_POST["num"])){
        $id = $_POST["num"];
        $password2 = $_POST["password2"];
        $sql = 'SELECT * FROM mission5 WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(); 
        foreach ($results as $row){
            if(!empty($password2) && $row['password'] == $password2){
                $sql = 'delete from mission5 where id=:id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
            }
        }
    }
    $sql = 'SELECT * FROM mission5';
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
    foreach ($results as $row){
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].',';
        echo $row['date'].'<br>';
        echo "<hr>";
    }
    ?>
</body>