<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUICE login</title>
    <meta name="description" content="juice のSiteです。">
    <!--↑↑↑↑検索エンジンでどぉ見られるか↑↑↑↑-->

    <!--↓↓↓↓SNS上でシェアされた時にどぉ見られるか↓↓↓↓-->
    <meta property="og:title" content="juice">
    <meta property="og:type" content="website">
    <meta property="og:url" content="#">
    <meta property="og:image" content="images/common/ogimage.png">
    <meta property="og:site_name" content="juice Site">
    <meta property="og:description" content="juice のSiteです">

    <meta name="format-detection" content="telephone=no">

    <!--<link href="https：//fonts.googleapis.com/css？family =Open+Sans：400,700" rel="stylesheet">-->
    <!--<link href="https：//fonts.googleapis.com/css2？family=Open+Sans：wght@300＆display=swap" rel="stylesheet">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!--↓↓↓↓ブックマークした時にどぉ見られるか↓↓↓↓-->
    <link rel="apple-touch-icon" href="images/common/touch-icon.png">
    <link rel="shortcut icon" href="images/commn/favicon.icon">
    <!--↑↑↑↑ブックマークした時にどぉ見られるか↑↑↑↑-->


    <!-- <link rel="stylesheet" href="css/reset.css"> -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div>
        <div class="position0">
            <h1>JUICE</h1>
        </div>
        <form action="todo_login_act.php" method="POST">
            <ul>
                <li class="input1"><input type="text" size="30" name="username" placeholder="UserID"></li>
                <li class="input1"><input type="text" size="30" name="password" placeholder="Password"></li>
            </ul>
            <button>Login</button>
            <a class="reg" href="todo_register.php">New member registration</a>
        </form>
    </div>

</body>


</html>