<?php 
require('function.php');

$content = mbTrim(h($_POST['search']));
$search = $pdo->prepare('select * from articles where title like ?');
$search->execute(['%'. $content. '%']);
$count = $pdo->prepare('select count(title) from articles where title like ?');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>検索結果</title>
  </head>
  <body>
    <?php
    if(empty($content)){
      $emptySearch = '検索内容を入力してください';
      header('Location:http://localhost:8080/plactis/site/index.php?error='.$emptySearch);
      exit();
    }
    ?>

    <h1>"<?= $content ?>"の検索結果（<?= $count->execute(['%'. $content. '%']) ?>件）</h1>
      <form action="search_result.php" method="post">
        <input type="text" name="search" value="<?php if(!empty($_POST['search'])){ echo $content;} ?>">
        <input type="submit" value="検索">
      </form>


      <?php foreach($search as $article): ?>
        <hr color="blue">
        <h3><?php echo h($article['title']) ?></h3>
        <i><?php echo "閲覧数：{$article['TotalViews']} / GOOD：{$article['TotalLikes']} / ブックマーク：{$article['TotalBookmark']} / 投稿日：{$article['date']}"?></i>
      <?php endforeach ?>
    
  </body>
</html>