<?php setcookie('val', 100); ?>

<html>
    <body>
        <?php
            $getval = $_COOKIE['val'];
            print "ページ1の値は $getval です。<br>\n";
        
        ?>
        <a href='cookie2.php'>ページ２へ</a>
    </body>
</html>