<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>確認ページ</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="sheet.css">
</head>
<body>
  <div class="checkpage">
    <h1>確認ページ</h1>
  </div>
  <?php
   if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $kana = $_POST['kana'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $item = $_POST['item'];
    $content = $_POST['content'];

    $errors = [];

    if (empty($name)) {
      $errors[] = "お名前を入力してください。";
    }
    if (empty($kana)) {
      $errors[] = "フリガナを入力してください。";
    }
    if (empty($email)) {
      $errors[] = "メールアドレスを入力してください。";
    } elseif (!strpos($email,'@')) {
      $errors[] = "メールアドレスを正しく訂正してください。";
    }
    if (empty($phone)) {
      $errors[] = "電話番号を入力してください。";
    } elseif (strlen($phone) !== 10 && strlen($phone) !== 11) {
      $errors[] = "電話番号10桁または11桁で入力してください。";
    }
    if (empty($item)) {
      $errors[] = "項目を選択してください。";
    }
    if (empty($content)) {
      $errors[] = "お問い合わせ内容を記入してください。";
    }
    // if (!isset($_POST['privacy_policy'])) {
    //   $errors[] = "個人情報保護方針に同意してください。";
    // checkboxのほうも設定してみたかったのですが、チェックを入れても赤字がでるようになっていますので、理由を伺いたいです。
    // }

    if (!empty($errors)) {
      echo "<div class='error_message'>";
      foreach ($errors as $error) {
        echo "<p>".$error."</p>";
      }
      echo "</div>";
    } else {
      echo "<div class='clear_contents'>";
      echo "<p>お名前：".$name."</p>";
      echo "<p>フリガナ：".$kana."</p>";
      echo "<p>メールアドレス：".$email."</p>";
      echo "<p>電話番号：".$phone."</p>";
      echo "<p>問い合わせ項目：".$item."</p>";
      echo "<p>お問い合わせ内容：".$content."</p>";
      echo "</div>";
      echo "
           <div class='submit_to_post'>
           <form action='task8-2.php' method='post'>
           <input type='submit' value='送信する'>
           </form>
           </div>
           ";
    }
   }
   ?>
</body>
</html>