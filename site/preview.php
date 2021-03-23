<?php
require('function.php');

$_SESSION['error'] = [];

$emptyTitle = 'タイトルを入力してください';
$emptyBody = '本文を入力してください';
$countErrTitle = 'タイトルは５文字以上、２０文字以内で入力してください';
$countErrBody = '本文は３０文字以上、１０００文字以内で入力してください';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>プレビュー</title>
  </head>
  <body>

  <?php if(empty($_SESSION['token']) or $_SESSION['token'] !== filter_input(INPUT_POST, 'token')): ?>
    <?php exit('不正なアクセスです') ?>
  <?php else: ?>

    <h3>確認</h3>

    <h4>タイトル：</h4>
        <?php if(!isset($_POST['title']) or !mb_strlen($_POST['title'])){
          $_SESSION['title'] = $_POST['title'];
          $_SESSION['error'][] = $emptyTitle;
        }else if(mb_strlen($_POST['title']) < 5 or mb_strlen($_POST['title']) > 20){
          $_SESSION['title'] = $_POST['title'];
          $_SESSION['error'][] = $countErrTitle;
        }else{
          $_SESSION['title'] = $_POST['title'];
          echo '<h4>'.mbTrim(h($_POST['title'])).'</h4>';
        }
      ?>

    <p>本文：</p>
      <?php if(!isset($_POST['body']) or !mb_strlen($_POST['body'])){
          $_SESSION['body'] = $_POST['body'];
          $_SESSION['error'][] = $emptyBody;
        }else if(mb_strlen($_POST['body']) < 30 or mb_strlen($_POST['body']) > 1000){
          $_SESSION['body'] = $_POST['body'];
          $_SESSION['error'][] = $countErrBody;
        }else{
          $_SESSION['body'] = $_POST['body'];
          echo '<p>'. nl2br(h($_POST['body'])).'</p>';
        }
      ?>

    <?php if(!empty($_SESSION['error'])){
      header('Location:http://localhost:8080/plactis/site/write.php');
      exit();
    }
    ?>
    <?php endif ?>

    <form action="confirm.php" method="post">
      <input type="submit" value="投稿">
    </form>

  <br>

  <button type=“back” onclick="location.href='http://localhost:8080/plactis/site/write.php'">戻る</button>

  </body>
</html>