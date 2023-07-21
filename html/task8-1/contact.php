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
    if (empty($_POST['privacy_policy'])) {
      $errors[] = "個人情報保護方針に同意してください。";
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
  <link rel="stylesheet" href="sheet.css">
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
        <?php
         if (!empty($errors)) {
             echo "<div class='error_message'>";
         foreach ($errors as $error) {
             echo "<p>".$error."</p>";
           }
             echo "</div>";
          } 
            // else {
            //   echo "<p>お名前：".$name."</p>";
            //   echo "<div class='clear_contents'>";
            //   echo "<p>メールアドレス：".$email."</p>";
            //   echo "<p>フリガナ：".$kana."</p>";
            //   echo "<p>問い合わせ項目：".$item."</p>";
            //   echo "<p>電話番号：".$phone."</p>";
            //   echo "<p>お問い合わせ内容：".$content."</p>";
            //   echo "</div>";
            //   echo "
            //        <div class='submit_to_post'>
            //        <form action='task8-2.php' method='post'>
            //        <input type='submit' value='送信する'>
            //        </form>
            //        </div>";
            //       }
    ?>
      </div>
    </div>
    <div class="contact_form">
      <div class="wrapper">
        <form action="<?php 
        if (empty($errors)) {
          echo "task8-2.php";
        } else {
          echo "contact.php";
        } 
        ?>" method="post">
        <div class="form_item">
            <p class="form_item_label">お名前<span class="form_item_Label_Required">必須</span></p>
            <input type="text" class="form_item_input" name="name" placeholder="山田太郎" value="<?=$name;?>">
        </div>
        <div class="form_item">
            <p class="form_item_label">フリガナ<span class="form_item_Label_Required">必須</span></p>
            <input type="text" class="form_item_input" name="kana" placeholder="ヤマダタロウ" value="<?=$kana; ?>">
        </div>
        <div class="form_item">
            <p class="form_item_label">メールアドレス<span class="form_item_Label_Required">必須</span></p>
            <input type="text" class="form_item_input" name="email" placeholder="info@fast-creademy.jp" value="<?=$email; ?>">
        </div>
        <div class="form_item">
            <p class="form_item_label">電話番号<span class="form_item_Label_Required">必須</span></p>
            <input type="text" class="form_item_input" name="phone" placeholder="000-0000-0000" value="<?=$phone; ?>">
        </div>
        <div class="form_item">
            <p class="form_item_label">問い合わせ項目<span class="form_item_Label_Required">必須</span></p>
            <select name="item" class="form_item_select">
              <option value="">選択してください</option>
              <option value="質問">質問</option>
              <option value="疑問">疑問</option>
            </select>
        </div>
        <div class="form_item">
            <p class="form_item_label">お問い合わせ内容<span class="form_item_Label_Required">必須</span></p>
            <textarea name="content" class="form_item_textarea" placeholder="こちらにお問い合わせ内容をご記入ください" value="<?=$content; ?>"></textarea>
        </div>
        <div class="form_item">
            <p class="form_item_label">個人情報保護方針<span class="form_item_Label_Required">必須</span></p>
            <input type="checkbox" name="privacy_policy" class="form_item_checkbox">
            <a href="link" class="underline" target="_blank">個人情報保護方針<span class="fa-solid fa-paperclip"></span>
            </a>に同意します。
        </div>
          <div class="contact_btn">
            <?php
            if (!empty($errors)) {
              echo "<input type='submit' name = 'submit' value='確認'>";
            } elseif (empty($errors)) {
              echo "<input type='submit' name = 'submit' value='送信'>";
            }
            ?>
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