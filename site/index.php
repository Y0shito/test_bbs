<?php
require('function.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>メインページ</title>
  </head>
  <body>
  <h1>記事検索</h1>
    <?php if(isset($_GET['error'])): ?>
      <p style="color:red"><?= h($_GET['error']) ?></p>
    <?php endif ?>
    <form action="search_result.php" method="post">
      <input type="text" name="search">
      <input type="submit" value="検索">
    </form>

  <h1><a href="write.php">記事を書く</a></h1>

  <h1>記事一覧</h1>
    <?php foreach($pdo->query('select * from articles order by date desc') as $article): ?>
      <hr color="blue">
      <h3><?php echo h($article['title']) ?></h3>
      <i><?php echo "閲覧数：{$article['TotalViews']} / GOOD：{$article['TotalLikes']} / ブックマーク：{$article['TotalBookmark']} / 投稿日：{$article['date']}"?></i>
      <p><?php echo mb_strimwidth(h($article['body']), 0, 100, '...') ?></p>
    <?php endforeach ?>

  </body>
</html>