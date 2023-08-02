<?php
session_start();

// 入力画面からのアクセスがないと戻す
if (!isset($_SESSION['form'])) {
    header('Location: contact.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

// データベースにデータを保存
require_once 'contact_db.php';

try {
    $stmt = $pdo->prepare('INSERT INTO contact (name, kana, email, phone, item, content, privacy_policy, created_at) 
    VALUES (:name, :kana, :email, :phone, :item, :content, :privacy_policy, NOW())');

    $stmt->bindParam(':name', $post['name'], PDO::PARAM_STR);
    $stmt->bindParam(':kana', $post['kana'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $post['email']);
    $stmt->bindParam(':phone', $post['phone'],PDO::PARAM_INT);
    $stmt->bindParam(':item', $post['item'], PDO::PARAM_STR);
    $stmt->bindParam(':content', $post['content'], PDO::PARAM_STR);
    $stmt->bindParam(':privacy_policy', $privacy_policy, PDO::PARAM_INT);

    $privacy_policy = !empty($post['privacy_policy']) ? 1 : 0;

    $stmt->execute();

    $stmt = $pdo->query("SELECT * FROM contact");
    $results = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'datebase error' . $e->getMessage(). '<br>';
    exit;
}

// フォームデータを削除して送信完了ページを表示
unset($_SESSION['form']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contactページ｜作成用</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="task9-1.css">
  <script src="https://kit.fontawesome.com/5f641c531c.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <div class="header_title">
      <div class="header_left">
        <h1>ここには会社名が入ります</h1>
      </div>
      <div class="header_right">
        <a href="#" class="header_btn01">ボタン01</a>
        <a href="#" class="header_btn02">ボタン02</a>
      </div>
    </div>
    <div class="header02">
      <ul>
        <li><a href="#">メニュー01</a></li>
        <li><a href="#">メニュー02</a></li>
        <li><a href="#">メニュー03</a></li>
      </ul>
    </div>
  </header>
  <div class="img_mv">
    <img src="mv.png">
  </div>
  <main>
    <div class="main_title">
      <div class="wrapper">
        <h1>お問い合わせ</h1>
        <p class="sent_complete_p">
          送信完了しました。
        </p>
        
    </div>
    <div class="main_footer">
      <div class="wrapper">
        <div class="main_footer_box">
          <div class="btn_box1">
            <h2>こちらからご購入ください</h2>
            <a href="#" class="btn1">ネットショップ</a>
          </div>
          <div class="btn_box2">
            <h2>お気軽に問い合わせください</h2>
            <a href="#" class="btn2">お問い合わせ</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <ul>
        <li class="title">ここには会社名が入ります</li>
        <li>住所が入ります</li>
        <li>03-1234-5678</li>
        <li>営業時間：9:00〜18:00</li>
      </ul>
    </div>
    <div class="border">
      <div class="wrapper">
        <ul>
          <li><a href="#">リンク01</a></li>
          <li><a href="#">リンク02</a></li>
          <li><a href="#">リンク03</a></li>
          <li><a href="#">リンク04</a></li>
          <li><a href="#">リンク05</a></li>
          <li class="list-space">
            <div class="block1">
              <a href="#">リンク06</a><br>
            </div>
              <a href="#">リンク07</a>
          </li>
        </ul>
      </div>
    </div>
  </main>
  <footer>
    <p>ここには会社名が入ります©️copyright</p>
  </footer>
  </main>
</body>
</html>