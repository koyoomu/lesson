<?php
  try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=consumer;charset=utf8mb4',
        'root',
        'root'
    );

    // $pdo->query("DROP TABLE IF EXISTS contact");
    // $pdo->query(
    //     "CREATE TABLE contact(
    //     id    INT AUTO_INCREMENT PRIMARY KEY,
    //     name  VARCHAR(128),
    //     kana  VARCHAR(128),
    //     email VARCHAR(128),
    //     phone VARCHAR(128),
    //     item  VARCHAR(128),
    //     content TEXT,
    //     privacy_policy TINYINT(1),
    //     created_at DATETIME
    //     )"
    // );

} catch (PDOException $e) {
    echo 'database error' . $e->getMessage() . '<br>';
    exit;
}
?>