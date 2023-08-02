<?php
session_start();
$error = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post =  filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  //form送信時にエラーチェック
  if ($post['name'] === '') {
    $error['name'] = 'blank';
  }

  if ($post['kana'] === '') {
    $error['kana'] = 'blank';
  }

  if ($post['email'] === '') {
    $error['email'] = 'blank';
  } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) { //mailのフィルター関数を使いました
    $error['email'] = 'email';
  }

  if ($post['phone'] === '') {
    $error['phone'] = 'blank';
  } elseif (strlen($post['phone']) !== 12 && strlen($post['phone']) !== 13) {
    $error['phone'] = 'invalid';
  }

  if ($post['item'] === '') {
    $error['item'] = 'blank';
  }

  if ($post['content'] === '') {
    $error['content'] = 'blank';
  }

  if (!isset($_POST['privacy_policy'])) {
    $error['privacy_policy'] = 'blank';
  }

  if (count($error) === 0) {
    // エラーがない→確認画面(task8-1.php)に移動する
    $_SESSION['form'] = $post;
    // checkboxをチェックしたままtask8-1.phpに反映させる
    $_SESSION['form']['privacy_policy'] = !empty($_POST['privacy_policy']) ? true : false;
    header('location: task8-1.php');
    exit();
  }
}

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
        <p class="main_title_p">
          お問い合わせや業務内容に関するご質問は、電話またはこちらのお問い合わせフォームより承っております。
          <br>
          後ほど担当者よりご連絡させていただきます。
        </p>
      </div>
    </div>
    <div class="contact_form">
      <div class="wrapper">
        <form action="" method="POST">
        <div class="form_item">
            <p class="form_item_label">お名前<span class="form_item_Label_Required">必須</span></p>
            <input type="text" name="name" class="form_item_input" placeholder="山田太郎"
            value="<?php echo htmlspecialchars($post['name']); ?>">
            <?php if ($error['name'] === 'blank'): ?>
             <p class="error_msg">※お名前を入力してください。</p>
          <?php endif; ?>
        </div>
        <div class="form_item">
            <p class="form_item_label">フリガナ<span class="form_item_Label_Required">必須</span></p>
            <input type="text" name="kana" class="form_item_input" placeholder="ヤマダタロウ"
            value="<?php echo htmlspecialchars($post['kana']); ?>">
            <?php if ($error['kana'] === 'blank'): ?>
             <p class="error_msg">※フリガナを入力してください</p>
            <?php endif; ?>
        </div>
        <div class="form_item">
            <p class="form_item_label">メールアドレス<span class="form_item_Label_Required">必須</span></p>
            <input type="text" name="email" class="form_item_input" placeholder="info@fast-creademy.jp"
            value="<?php echo htmlspecialchars($post['email']); ?>">
            <?php if ($error['email'] === 'blank'): ?>
             <p class="error_msg">※メールアドレスを入力してください</p>
            <?php endif; ?>
            <?php if ($error['email'] === 'email'): ?>
             <p class="error_msg">※メールアドレスを正しく入力してください</p>
            <?php endif; ?>
        </div>
        <div class="form_item">
            <p class="form_item_label">電話番号<span class="form_item_Label_Required">必須</span></p>
            <input type="text" name="phone" class="form_item_input" placeholder="000-0000-0000"
            value="<?php echo htmlspecialchars($post['phone']); ?>">
            <?php if ($error['phone'] === 'blank'): ?>
              <p class="error_msg">※電話番号を入力してください</p>
              <?php endif; ?>
              <!-- ↓この部分を入れないとエラー文が反映されない -->
              <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $error['phone'] === 'invalid'): ?>
               <p class="error_msg">※電話番号は12桁または13桁で入力してください</p>
            <?php endif; ?>
        </div>
        <div class="form_item">
            <p class="form_item_label">問い合わせ項目<span class="form_item_Label_Required">必須</span></p>
            <select name="item" class="form_item_select">
              <option value="">選択してください</option>
              <option value="質問" <?php if ($post['item'] === "質問"){ echo "selected";}?>>質問</option>
              <option value="疑問" <?php if ($post['item'] === '疑問'){ echo 'selected'; }?>>疑問</option>
            </select>
            <!-- ↓この部分を入れないとエラー文が反映されない -->
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $error['item'] === 'blank'): ?>
               <p class="error_msg">※項目を選択してください</p>
             <?php endif; ?>
        </div>
        <div class="form_item">
            <p class="form_item_label">お問い合わせ内容<span class="form_item_Label_Required">必須</span></p>
            <textarea name="content" class="form_item_textarea" placeholder="こちらにお問い合わせ内容をご記入ください"><?php echo htmlspecialchars($post['content']); ?></textarea>
            <?php if ($error['content'] === 'blank'): ?>
             <p class="error_msg">※問い合わせ内容を入力してください</p>
            <?php endif; ?>
        </div>
        <div class="form_item">
            <p class="form_item_label">個人情報保護方針<span class="form_item_Label_Required">必須</span></p>
            <input type="checkbox" name="privacy_policy" class="form_item_checkbox"
            value="agree" <?php if (!empty($_POST['privacy_policy'])) echo 'checked'; ?>>
            <a href="link" class="underline" target="_blank">個人情報保護方針<span class="fa-solid fa-paperclip"></span>
            </a>に同意します。
            <!-- ↓この部分を入れないとエラー文が反映されない -->
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $error['privacy_policy'] === 'blank'): ?>
                 <p class="error_msg">※チェックを入れててください</p>
            <?php endif; ?>
        </div>
          <div class="contact_btn">
            <button type="submit" class="contact_btn_submit">確認</button>
          </div>
        </form>
      </div>
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