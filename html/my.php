<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>alpha-book</title>
        <link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
    <body>
        <?php require_once(__DIR__.'/api/get-user-data.php');?>
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
    <div class="MyPage">
        <form action="my.php" method="get" class="myid">
               ユーザID: <input type="text" name="user_id" placeholder="ユーザID">
               <input type="submit" class="but">
           </form>
        <div class="MyPage-title">My Page</div>
            <div class="display">
                <p>ユーザー名:  <?php echo $user_name['name']; ?></p>　
                <p>ユーザーID:  <?php echo $user_name['user_id']; ?></p>
            </div>
            <div class="rireki">貸出・返却履歴</div>
        
        
        <table>
			<tbody>
                <tr>
                    <td>日付</td>
                    <td>タイトル</td>
                    <td>貸出or返却</td>
                </tr>
                <?php foreach ($histories as $history) : ?>
                <tr>
                    <td><?php echo $history['regist_at']; ?></td>
                    <td><a href="single.php?book_id=<?php echo $history['book_id']; ?>"><?php echo getBookName($book, $history['book_id']); ?></a></td>
                    <td><?php
                        if($history['status'] == 1){
                            echo "<font color='green'>貸出</font>";
                        } else{
                            echo "<font color='red'>返却</font>";
                        }
                        ?></td>
                </tr>
                <?php endforeach; ?>
			</tbody>
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