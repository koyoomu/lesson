<?php
ini_set('display_errors', 1);
abstract class MainPost {
  abstract public function show();
  protected $text;
  
  public function __construct($text) {
    $this -> text = $text;
  }
}
// 親クラス
class Post extends MainPost {

  public function show() {
    printf('%s <br/>', $this -> text);
  }
}
// 子クラス
class SponserPost extends Post {
  private $sponser;

  public function __construct($text, $sponser) {
    parent::__construct($text);
    $this -> sponser = $sponser;
  }
  
  public function show() {
    printf('%s by %s<br/>', $this -> text, $this -> sponser);
  }
}

$posts = [];
$posts[0] = new Post('Hello');
$posts[1] = new Post('Hi!');
$posts[2] = new sponserPost('Good Morning', 'WingNoah');

function AllPost(MainPost $post){
  $post -> show();
}
foreach ($posts as $post) {
  AllPost($post);
} 
?>