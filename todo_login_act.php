<?php
// データ受け取り


// DB接続





// セッション使うからセッションスタート
session_start();
// DBにアクセスするからfunction呼び出す
include('functions.php');

// login.phpからきたデータを受け取る
$username = $_POST['username'];
$password = $_POST['password'];

// DBにアクセス
$pdo = connect_to_db();


// SQL実行
// username，password，is_deletedの3項目全てを満たすデータを抽出する．　　　　　　　　　　　　　　↓論理削除のための記述「１」は死んでるユーザ
$sql = 'SELECT * FROM users_table WHERE username=:username AND password=:password AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $val = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$val) {
    echo "<p>ログイン情報に誤りがあります</p>";
    echo "<a href=todo_login.php>ログイン</a>";
    exit();
  } else {
    $_SESSION = array();
    $_SESSION['session_id'] = session_id();
    $_SESSION['is_admin'] = $val['is_admin'];
    $_SESSION['username'] = $val['username'];
    $_SESSION['id']=$val['id'];
    header("Location:todo_read.php");
    exit();
  }
}