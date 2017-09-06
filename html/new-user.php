<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>alpha-book</title>
        <link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
    <body>
        <?php require_once('api/get-users.php'); ?>
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
        <div class="register">
            <div class="label">ユーザー登録</div>
            <form action="api/add-user.php" method="post">
                <div class="register-list">
                    <input type="text" name="name" placeholder="ユーザー名">
                </br>
                    <input type="text" name="user_id" placeholder="ユーザーID">
                </br>
                </div>
                <div class="register-botan">
                    <input type="submit" value="Enter">
                </div>
            </form>
    
        <br><br>
        <table>
            <tr>
                <td>ユーザID</td>
                <td>ユーザ名</td>
            </tr>
            <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['user_id']; ?></td>
                <td><?php echo $user['name']; ?></td>
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