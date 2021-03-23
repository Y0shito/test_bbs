<?php
require('function.php');

setToken();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>記事作成</title>
  </head>
  <body>
  <h3>記事作成</h3>

  <?php if(isset($_SESSION['error'])): ?>
    <ul>
      <?php foreach($_SESSION['error'] as $error): ?>
        <il style="color:red"><?php echo h($error) ?></il>
        <br>
      <?php endforeach ?>
    </ul>
  <?php endif ?>


  <form action="preview.php" method="post">
    <input type="text" name="title" value="<?php if(!empty($_SESSION['title'])){ echo mbTrim(h($_SESSION['title']));} ?>">
    <br>
    <textarea name="body" rows="10" cols="50"><?php if(!empty($_SESSION['body'])){ echo h($_SESSION['body']);} ?></textarea>
    <br>
    <input type="hidden" name="token" value="<?php echo h($_SESSION['token']) ?>">
    <input type="submit" value="プレビュー">
  </form>

  <button id="back">戻る</button>

  <script>
    var btn = document.getElementById('back');

    back.addEventListener('click', function() {
      var result = window.confirm('メニューへ戻ると、入力内容が破棄されます。よろしいですか？');
      if(result){
        location.href = "http://localhost:8080/plactis/site/index.php";
      }
    })
  </script>

  </body>
</html>