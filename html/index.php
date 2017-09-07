<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>alpha-book</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/main.css">
	</head>
    <body>
        <?php require_once('api/get-history-num.php'); ?>
        <?php
//        echo '<pre>';
//        var_dump($histories);
//        echo '</pre>';
        ?>
        <header id="top-head">
            <div class="inner">
                <div class="header_title">
                    <h1><a href="index.php">alpha-book</a></h1>
                </div>
                <nav role="navigation" class="nav">
                    <ul class="nav-items">
                        <li class="nav-item">
                            <a href="search.php" class="nav-link"><span>Search</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link"><span>Add</span></a>
                            <nav class="submenu">
                                <ul class="submenu-items">
                                    <li class="submenu-item"><a href="newbook.php" class="submenu-link">書籍</a></li>
                                    <li class="submenu-item"><a href="new-user.php" class="submenu-link">ユーザー</a></li>
                                    <li class="submenu-item"><a href="new-cate.php" class="submenu-link">カテゴリ</a></li>
                                </ul>
                            </nav>
                        </li>
                        <li class="nav-item">
                            <a href="my.php" class="nav-link"><span>MyPage</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <div id="index">
            <div class="table">
                <div class="left">
                    <div class="label">最近の貸出履歴</div>
                    <div class="table">
                        <div class="line">
                            <div class="cell">日付</div>
                            <div class="cell">ユーザ名</div>
                            <div class="cell">本タイトル</div>
                        </div>
                        <?php foreach ($histories as $history) : ?>
                        <div class="line">
                            <div class="cell"><?php echo $history['regist_at']; ?></div>
                            <div class="cell"><a href="my.php?user_id=<?php echo $history['user_id']; ?>"><?php echo getUserName($user, $history['user_id']) ?></a></div>
                            <div class="cell"><a href="single.php?book_id=<?php echo $history['book_id']; ?>"><?php echo getBookName($book, $history['book_id']) ?></a></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="right">
                    <div class="label">オススメの本</div>
                    
                    <div class="book-table">
                        <?php foreach ($histories as $history) : ?>
                        <div class="book-cell">
                            <a href="single.php?book_id=<?php echo $history['book_id']; ?>"><img src="<?php echo getBookImage($book, $history['book_id']); ?>"></a>
                        </div>
                        <?php endforeach; ?>
<!--                        <div class="none"></div>-->
                    </div>
                    
                </div>
            </div>
        </div>
        
    </body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/dropdown.js"></script>
    <script type="text/javascript" src="js/get-book-data.js"></script>

    <script>
        var items = document.getElementsByClassName('submenu-item');
        Array.prototype.forEach.call(items, function (item) {
            item.addEventListener('click', function (e) {
                window.location = e.target.getAttribute('href');
            });
        });
    </script>
    
</html>