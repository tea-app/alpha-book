<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>alpha-book</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/main.css">
	</head>
    <body>
        <?php require_once('api/get-categories.php'); ?>
        <header id="top-head">
            <div class="inner">
                <div class="header_title">
                    <h1>alpha-book</h1>
                </div>
                <nav role="navigation" class="nav">
                    <ul class="nav-items">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><span>Search</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="search.php" class="nav-link"><span>Add</span></a>
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
        
        <div id ="add-books" class="content">
            <div class="add-books">
                <h2>書籍追加</h2>
                <form class="add-books-form" action="api/add-book.php" method="post">
                    <input type="text" name="isbn" placeholder="ISBN" id="isbn">
                    <button type="submit" class="button search">Search</button>
                    <input type="text" name="title" placeholder="タイトル" id="title">
                    <input type="text" name="author" placeholder="著者" id="author">
                    <input type="text" name="book_id" placeholder="BookID" id="book-id">
                    <input type="text" name="image" placeholder="サムネイル" id="thumnail">
                    <select name="cate" palaceholder="カテゴリ" id="category">
                        <option disabled selected>カテゴリ</option>
                        <?php foreach ($category as $cate) : ?>
                        <option value="<?php echo $cate['id']; ?>"><?php echo $cate['cate_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="button add">Add</button>
                </form>
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
    
    
    
<!--
    <script type="text/javascript">
        $.ajax({
            type: "GET",
            url: 'https://www.googleapis.com/books/v1/volumes?q=isbn:4797311126',
            dataType: 'json'
        }).done(function (json){
            window.console.log(json);
        });
    </script>
-->
    
    
</html>