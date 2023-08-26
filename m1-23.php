<body>
    <?php
    $people = 
    array("Ken","Alice","Judy","Boss","Bob");
    foreach($people as $name){
        if($name == "Boss"){
            echo "Good morning " . $name . "!<br>";
        }else{
            echo "Hi! " . $name . "<br>";
        }
    }
    ?>
</body>