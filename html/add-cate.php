<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>add cate</title>
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width,user-scalable=0">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div id="header">
        alpha-book
    </div>
    
    <form action="api/add-cate.php" method="post">
    
        カテゴリ名: <input type="text" name="cate_name"><br>
        <input type="submit">
    
    </form>
    
</body>
</html>