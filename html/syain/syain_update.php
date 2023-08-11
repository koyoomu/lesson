<?php
require_once('common.php');

$id = $_GET['id'];
$member = $db->getsyain($id);

show_top("社員情報の更新");
show_update($member['id'], $member['name'], $member['age'], $member['work'], $id);
show_down(true);
?>