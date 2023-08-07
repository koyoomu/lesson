<?php

function show_top($heading = "社員一覧")
{
  echo <<<TOP
  <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>社員管理</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>{$heading}</h1>
TOP;
}

function show_down($return = false)
{
  if ($return == true) {
    echo '<button><a href="index.php">社員一覧へ戻る</a></button>';
  }
  echo <<<BOTTOM
  </body>
  </html>
BOTTOM;
}

// function show_syainlist($members)
// {
//   var_dump($members);
//   echo <<<TABLE1
//     <table>
//       <tr>
//         <th>社員番号</th>
//         <th>名前</th>
//       </tr>
// TABLE1;
//   foreach ($members as $member) {
//     echo <<<TABLE2
//       <tr>
//         <th>{$member['id']}</th>
//         <td><a href="syain_edit.php?id={$member['id']}">{$member["name"]}</a></td>
//       </tr>
// TABLE2;
//   }
//   echo <<<TABLE3
//      </table>
//      <button><a href="syain_create.php">社員情報の追加</a></button>
// TABLE3;
// }
?>