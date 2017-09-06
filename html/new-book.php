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
    <?php
    require_once(__DIR__.'/api/get-categories.php');
    var_dump($category);
    ?>
    
    <div id="header">
        alpha-book
    </div>
    
    <form action="api/add-book.php" method="post">
    
        isbn: <input type="text" name="isbn"><br>
        book_id: <input type="text" name="book_id"><br>
        title: <input type="text" name="title"><br>
        author: <input type="text" name="author"><br>
        image: <input type="text" name="image"><br>
        cate: <input type="text" name="cate"><br>
        <input type="submit">
        
        <div id="books"></div>
    
    </form>
    
    <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="js/sample.js"></script>
</body>
</html>