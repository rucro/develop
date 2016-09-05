<?php
//データファイルの読み込み
    $data_file = 'keijiban.txt';
    $ext = file_exists($data_file);
    $lines = $ext ? file($data_file) : array();
    
//「書き込む」ボタンが押された時

    //エラーチェック
    if($_POST['submit']){
        if(!$_POST['name']){
            $errMsg = '名前を入力してください<br>';
        }elseif(!$_POST['free']){
            $errMsg .= '記事を入力してください';
        }
        
        //エラーメッセージが設定されなかったら新規データを追加
        //更新部分
        if(!$errMsg){
            function convert_str($str){
                $str = htmlspecialchars($str); //HTMLタグを無効化
                $str = ereg_replace("\n|\r|\r\n","<br>",$str);
                return $str;
            }
            
            $ln = explode(",", $lines[0]);
            $no = $ext ? sprintf("%03d", $ln[0]+1) : "001";
            $name = convert_str($_POST['name']);
            $free = convert_str($_POST['free']);
            $delkey = $_POST['delkey'] ? convert_str($_POST['delkey']) : '#####';
            
            $time = date("Y/m/d H:i:s");
            
            //新規データをカンマ区切りテキストとし、配列の先頭に追加
            $data = "$no,$name,$free,$delkey,$time\n";
            array_unshift($lines, $data); //array_unshift()←配列の最初に指定した要素を加える
        }
    
    }
    
    //[削除]ボタンが押されたら、指定のNOと削除キーが
    //既存データとそれぞれ一致したものを探して削除
    if($_POST['delbtn'] && $ext){
        for($i = 0; $i < count($lines); $i++){
            $ln = explode(",", $lines[$i]);
            if($ln[0] == $_POST['no'] && $ln[3] == $_POST['Rdkey']){
                array_splice($lines, $i, 1);
                break;
            }
        }
    }
    
    //[書き込む]または[削除]いずれかのボタンが押されていたら
    //上記配列をファイルに書き込む
    if($_POST['submit'] || $_POST['delbtn']){
        $fk = fopen($data_file, 'w');
            foreach($lines as $line){
                fputs($fk, $line);
            }
        fclose($fk);
    }
    ?>
    
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <title>絵本の掲示板</title>
        </head>
        <body>
            <form METHOD="POST" ACTION="keijiban.php">
                <CENTER>
                    <h1>絵本の掲示板</h1>
                    No:<input type="TEXT" name="no" size="5">
                    削除キー:<input type="TEXT" name="Rdkey" size="27">
                    <input type="submit" name="delbtn" value="削除"><br>
                    
                    <?php
                    //エラーメッセージが設定された時に表示
                    if($errMsg)
                    echo "<FONT COLOR = 'RED'>".$errMsg."</FONT>";
                    
                    ?>
                    
                    
                    <table border = "1" ALIGN = "CENTER"><tr><td>
                        名前:<input type="text" name="name" size="27">
                        削除キー:<input type="text" name="delkey" size="27"><br>
                        記事<br>
                        <textarea name="free" cols="60" rows="8"></textarea><br>
                        <br><CENTER>
                            <input type="SUBMIT" name="submit" value="書き込む">
                            <input type="reset" value="取り消す">
                        </CENTER></td></tr><br>
                        
                        <?php
                            //ファイルから1行ずつ読み込みテーブルにセットしていく
                            foreach($lines as $line){
                                $ln = explode(",", $line);
                                echo "<table cellspacing=3 rules='ROWS' WIDTH='500'><tr>";
                                echo "<th align='left'>[No.".$ln[0]."]名前:".$ln[1]."</th>";
                                echo "<th align='right'>書き込み日付:".$ln[4]."</th>";
                                echo "</tr><tr>";
                                echo "<td align='left' colspan='2'>".$ln[2]."</td>";
                                echo "</tr></table><br>";
                            }
                        ?>
                </CENTER>
            </form>
        </body>
    </html>