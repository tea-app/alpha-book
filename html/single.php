<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>alpha-book</title>
        <link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
    <body>
        <?php require_once(__DIR__.'/api/get-book-info.php'); ?>
        <header id="top-head">
            <div class="inner">
                <div class="header_title">
                    <h1>alpha-book</h1>
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
    <div class="book2">
        <div class="left">
            <img src="<?php echo $data['image']; ?>" width="250px;">
        </div>
        <div class="right">
            <div class="title"><?php echo $data['title']; ?></div>
            <div class="author">著者　<?php echo $data['author']; ?></div>
            <div class="cate">カテゴリ　<?php echo $cate_name; ?></div>
            <div class="book-id">Book ID　<?php echo $data['book_id']; ?></div>
            
            <?php if($data['status'] == 0) : ?>
                <div class="lend-button">
                    <form action="api/lend-book.php" method="post">
                        <input type="text" name="user_id" placeholder="User ID">
                        <input type="hidden" name="book_id" value="<?php echo $data['book_id']; ?>">
                        <input type="submit" value="貸出" class="but">
                    </form>
                </div>
            <?php else : ?>
                <div class="lend-button">
                    <?php echo getUserName($user, $data['status']); ?> <font color="red">さんが貸出中です</font><br>
                    
                    <form action="api/return-book.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $data['status']; ?>">
                        <input type="hidden" name="book_id" value="<?php echo $data['book_id']; ?>">
                        <input type="submit" value="返却">
                    </form>
                    
                </div>
            <?php endif; ?>
            
            
            
            
        </div>
        
        <div class="table">
            <div class="label">貸出・返却履歴</div>
            <table>
                <tr>
                    <td>日付</td>
                    <td>名前</td>
                    <td>貸出or返却</td>
                </tr>
                <?php foreach ($histories as $history) : ?>
                <tr>
                    <td><?php echo $history['regist_at']; ?></td>
                    <td><?php echo getUserName($user, $history['user_id']); ?></td>
                    <td>
                        <?php if($history['status'] == 0) : ?>
                            <font color="red">返却</font>
                        <?php else : ?>
                            <font color="green">貸出</font>
                        <?php endif ; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                
            </table>
        </div>
        
    </div>
    </body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/dropdown.js"></script>
    
    
    <script>
        var items = document.getElementsByClassName('submenu-item');
        Array.prototype.forEach.call(items, function (item) {
            item.addEventListener('click', function (e) {
                window.location = e.target.getAttribute('href');
            });
        });
    </script>
    
    
</html>