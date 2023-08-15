<?php
// require_once('common.php');

// $id = $_GET['id'];

// $member = $db->getsyain($id);
// show_top("社員情報の削除");
// show_delete($member['id'], $member['name'], $member['age'], $member['work'], $id);
// // show_delete($id);
// show_down(true);

require_once('common.php');

$id = $_GET['id'];
$member = $db->getsyain($id);

show_top("社員情報の更新");
show_delete($member['id'], $member['name'], $member['age'], $member['work'], $id);
show_down(true);
?>