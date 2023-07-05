<?php
ini_set('display_errors', 1);


abstract class MainStaff {
  abstract public function show();
  protected $name;
  protected $age;
  protected $sex;
  static $count = 1;
  protected $id;
  
  public function __construct($name, $age, $sex) {
    $this->name = $name;
    $this->age = $age;
    $this->sex = $sex;
    $this->number();
  }
  protected function number() {
    $this -> id = self::$count++;
  }
}

class Staff extends MainStaff {
  public function show() {
    printf('(S%04d) ', $this->id);
    printf('%s ', $this->name);
    printf('%d歳 ', $this->age);
    printf('%s<br>', $this->sex);
  }
}

class PartStaff extends Staff {
   private $jikyu;

   public function __construct($name, $age, $sex, $jikyu) {
    parent::__construct($name, $age, $sex);
    $this->jikyu = $jikyu;
   }

   public function show(){
    printf('(P%04d) ', $this->id);
    printf('%s ', $this->name);
    printf('%d歳 ', $this->age);
    printf('%s 時給:%d円<br>', $this->sex, $this->jikyu);
   }
}

$staff[0] = new Staff('佐藤　一郎', 31, '男性');
$staff[1] = new Staff('山田　花子', 25, '女性');
$staff[2] = new Staff('鈴木　次郎', 27, '男性');
$staff[3] = new PartStaff('田中　友子', 24, '女性', 900);
$staff[4] = new Staff('中村　三郎', 27, '男性');

foreach ($staff as $member) {
  $member->show();
}
?>