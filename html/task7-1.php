<?php
ini_set('display_errors', 1);

class Staff {
  private $name;
  private $age;
  private $sex;
  // ここにpublic static $count = 1;をいれるとエラーがおきてしまいます。
  static $count =1;
  private $id;

  public function __construct($name, $age, $sex) {
    $this -> name = $name;
    $this -> age = $age; 
    $this -> sex = $sex;
    // $this -> number();
  }
  public function number() {
    // static $count = 1;   //ここで書くとエラーがないです。その理由を伺いしたいです。
    $this -> id = self::$count++;
  }
  public function show() {
    printf('(S%04d) ', $this->id);
    printf('%s ', $this->name);
    printf('%d歳 ', $this->age);
    printf('%s<br>', $this->sex);
  }
}

$staff[0] = new Staff('佐藤　一郎', 31, '男性');
$staff[1] = new Staff('山田　花子', 25, '女性');
$staff[2] = new Staff('鈴木　次郎', 27, '男性');

// $staff[0]->number();
// $staff[1]->number();
// $staff[2]->number();
// $staff[0]->show();
// $staff[1]->show();
// $staff[2]->show();
foreach ($staff as $member) {
 $member -> number();
 $member -> show();
}
?>