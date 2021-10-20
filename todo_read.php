<?php
session_start();
include("functions.php");
check_session_id();

$pdo = connect_to_db();

$user_id = $_SESSION['id'];



$sql = 'SELECT * FROM todo_table LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS like_count FROM like_table GROUP BY todo_id) AS result_table ON todo_table.id = result_table.todo_id';


$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "
      <tr>
        <td>{$record["deadline"]}</td>
        <td>{$record["todo"]}</td>
        <td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>like{$record["like_count"]}</a></td>
        <td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>
        <td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>
      </tr>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUICE list</title>
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
  <fieldset>
    <legend>DB連携型todoリスト（一覧画面）</legend>
    <a href="todo_input.php">入力画面</a>
    <a href="todo_logout.php">logout</a>
    <table>
      <thead>
        <tr>
          <th>deadline</th>
          <th>todo</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>