<h1>セッションを生成</h1>
<?php
  session_start();
  $_SESSION["date"] = "TEST中";
  echo "セッションID：" . session_id() . "<br>";
  echo "状況：{$_SESSION["date"]}<br><br>";
 ?>
 <a href="practice4.php">別のページへ</a>