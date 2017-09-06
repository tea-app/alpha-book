<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>mypage</title>
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width,user-scalable=0">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <?php require_once(__DIR__.'/api/get-user-data.php');
    
        echo '名前: '. $user_name['name']. '<br>';
        echo 'ユーザID: '. $user_name['user_id']. '<br><br>';

        echo '<br><br>';
        foreach($histories as $history){
            echo '日付: '. $history['regist_at'].'<br>';
            echo 'タイトル: '. getBookName($book, $history['book_id']).'<br>';
            echo '貸出or返却: '. $history['status'].'<br><br>';
        }
        
    ?>
    
</body>
</html>