<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>add user</title>
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width,user-scalable=0">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div id="header">
        alpha-book
    </div>
    
    <form action="api/add-user.php" method="post">
        
        name: <input type="text" name="name"><br>
        user_id: <input type="text" name="user_id"><br>
        <input type="submit">
    
    </form>
    
</body>
</html>