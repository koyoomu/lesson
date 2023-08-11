<?php
require_once('common.php');

$id = $_GET['id'];

$member = $db->getsyain($id);
show_top("社員情報の削除");
show_syain($member);
show_down(true);
?>