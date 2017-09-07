<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>alpha-book</title>
        <link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
    <body>
        <?php require_once('api/get-all-book.php'); ?>
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
        <div class="register">
            <div class="search-button">
                    <form action="search.php" method="get">
                        <input type="text" name="book_name" placeholder="タイトル">
                        <input type="submit" value="検索" class="but">
                    </form>
            </div>
            
            <table class="book">
                <tr>
                    <td>タイトル</td>
                    <td>著者</td>
                    <td>Book ID</td>
                </tr>
                <?php foreach ($books as $data) : ?>
                <tr>
                    <td><a href="single.php?book_id=<?php echo $data['book_id']; ?>"><?php echo $data['title']; ?></a></td>
                    <td><?php echo $data['author']; ?></td>
                    <td><?php echo $data['book_id']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
    
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