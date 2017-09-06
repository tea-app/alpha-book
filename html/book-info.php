<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>add book</title>
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width,user-scalable=0">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div id="header">
        alpha-book
    </div>
    
    <div class="main">
    
        <img src="https://books.google.com/books/content?id=wTP6sgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api" width="200px">
        
        <?php
        require_once(__DIR__.'/api/get-book-info.php');
        echo 'タイトル: '.$data['title'] . '<br>';
        echo '著者: '.$data['author'] . '<br>';
        echo 'カテゴリ: '.$cate_name . '<br>';
        echo 'BookID: '.$data['book_id'] . '<br>';
        ?>
        <br>
        =======================
        <br>
        <?php if (empty($histories)) : ?>
            貸出なし
        <?php else : ?>
            貸出履歴あり<br><br>
            <?php
                foreach ($histories as $history) {
                    echo '日付: ' . $history['regist_at'] . '<br>';
                    echo '名前: ' . getUserName($user, $history['user_id']) . '<br>';
                    echo '貸出or返却: ' . $history['status'] . '<br>';
                    echo '<br><br>';
                }
            ?>
        <?php endif; ?>
        <br><br><br>

        <?php if ($data['status'] == 0) : ?>
        <form action="api/lend-book.php" method="post">
            <input type="text" name="user_id">
            <?php
            echo "<input type='hidden' name='book_id' value={$book_id}>";
            ?>
            <input type="submit">
        </form>
        <?php else : ?>
            貸出中
        <?php endif; ?>
        
    </div>
    
</body>
</html>