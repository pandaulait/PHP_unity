<?php
// パスワードを記録したファイルの場所

echo __FILE__;
// /Applications/MAMP/htdocs/php_test/mainte/test.phpsss


echo '<br>';
// 実際のパスワード
// パスワードの暗号化
echo(password_hash('password123', PASSWORD_BCRYPT));


echo '<br>';
$contactFile = '.contact.dat';
// ファイル丸ごと読み込み
// $fileContents = file_get_contents($contactFile);
// // echo $fileContents;

// // ファイル書き込み(上書き)
// // file_put_contents($contactFile, 'テストです');
// $addText =  "\n".'テストです';
// // ファイル書き込み(追記)
// file_put_contents($contactFile, $addText, FILE_APPEND);


$allDate = file($contactFile);

foreach($allDate as $lineDate){
  $lines = explode(',',$lineDate);
  echo $lines[0]. '<br>';
  echo $lines[1]. '<br>';
  echo $lines[2]. '<br>';
}