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
       <div class="category">
           <p>カテゴリ登録</p>
           <form action="api/add-cate.php" method="post">
               <div class="category-list">
                    <input type="text" name="cate_name"
                    placeholder="カテゴリ名">
               </div>
                <div class="category-botan">
                    <input type="submit" value="Enter">
               </div>
           </form>
           <br><br>
           <table>
               <tr>
                   <td>カテゴリID</td>
                   <td>カテゴリ名</td>
               </tr>
               <?php foreach ($category as $cate) : ?>
               <tr>
                   <td><?php echo $cate['id']; ?></td>
                   <td><?php echo $cate['cate_name']; ?></td>
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