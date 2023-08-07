<?php
require_once('app/Database.php');
require_once('app/html_func.php');

$members = $db->getallsyain();
exit;
show_top();
// show_syainlist($members);
show_down();
?>
