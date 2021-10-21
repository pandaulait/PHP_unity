<?php

if(!empty($_GET['your_name'])){
  echo $_GET['your_name'];
};
if(!empty($_GET)){
  echo '<pre>';
  var_dump($_GET);
  echo '</pre>';
};

// スーパーグローバル変数

?>
<?php

if(!empty($_POST['your_name'])){
  echo $_POST['your_name'];
};
if(!empty($_POST)){
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';
};

// 入力、確認、完了　input.php,confirm,thanks.php





?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method = "GET" action="input.php">
    氏名
    <input type="text" name = "your_name">
    <input type="checkbox" name="sports[]" value="野球">野球
    <input type="checkbox" name="sports[]" value="サッカー">サッカー
    <input type="checkbox" name="sports[]" value="バスケ">バスケ
    <input type="submit" value="送信">
  </form>
  <form method = "POST" action="input.php">
    氏名
    <input type="text" name = "your_name">
    <input type="checkbox" name="sports[]" value="野球">野球
    <input type="checkbox" name="sports[]" value="サッカー">サッカー
    <input type="checkbox" name="sports[]" value="バスケ">バスケ
    <input type="submit" value="送信">
  </form>
</body>
</html>