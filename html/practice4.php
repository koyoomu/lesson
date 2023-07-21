<h1>確認</h1>
<?php
  session_start();
  echo "セッションID:" . session_id() . "<br>";
  echo "状況：{$_SESSION["date"]}<br><br>";
?>
<a href="practice3.php">元のページへ</a>