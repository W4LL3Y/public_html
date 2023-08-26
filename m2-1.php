<body>
    <form action = "" method = "post">
        <input type = "text" name = "str" value = "コメント">
        <input type = "submit" name = "submit">
    </form>
    <?php
    $str = $_POST["str"];
    if(empty($str)){
    }else{
        echo $str . "を受け付けました";
    }
    ?>
</body>