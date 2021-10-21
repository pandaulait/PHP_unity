
<?php
session_start();


// if(!empty($_POST['your_name'])){
//   echo $_POST['your_name'];
// };
if(!empty($_SESSION)){
  echo '<pre>';
  var_dump($_SESSION);
  echo '</pre>';
};

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


// 入力、確認、完了　input.php,confirm,thanks.php
// CSRF にせもののページ -> input.php
// sessionを用いて対策
$pageFlag =0;
if(!empty($_POST['btn_confirm'])){
  $pageFlag = 1;
};
if(!empty($_POST['btn_submit'])){
  $pageFlag = 2;
};


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

<?php if($pageFlag=== 0) : ?>
  <?php
  if(!isset($_SESSION['csrfToken'])){
    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrfToken'] = $csrfToken;
  }
  $token = $_SESSION['csrfToken']
  ?>
  <form method = "POST" action="input.php">
    氏名
    <input type="text" name = "your_name" value="<?php if(!empty($_POST['your_name'])){ echo h($_POST['your_name']);}; ?>">
    メールアドレス
    <input type="email" name = "email" value="<?php if(!empty($_POST['email'])){ echo h($_POST['email']);}; ?>">
    <input type="hidden" name="csrf" value="<?php echo $token; ?>">
    <input type="submit" value="確認する" name="btn_confirm">
    
  </form>
<?php endif; ?>


<?php if($pageFlag === 1) : ?>
  <?php if($_POST['csrf'] === $_SESSION['csrfToken']) :?>
    <form method = "POST" action="input.php">
      氏名
      <?php echo h($_POST['your_name']); ?>
      メールアドレス
      <?php echo h($_POST['email']); ?>
      <input type="hidden" name = "your_name" value="<?php echo h($_POST['your_name']); ?>">
      <input type="hidden" name = "email" value="<?php echo h($_POST['email']); ?>">
      <input type="hidden" name = "csrf" value="<?php echo h($_POST['csrf']); ?>">
      <input type="submit" name="back" value="戻る">
      <input type="submit" value="送信する" name="btn_submit">
    </form>
  <?php endif; ?>
<?php endif; ?>

<?php if($pageFlag === 2) : ?>
  <?php if($_POST['csrf'] === $_SESSION['csrfToken']) :?>
    完了画面
    確認しました。
    <?php unset($_SESSION['csrfToken']); ?>
  <?php endif; ?>
<?php endif; ?>



</body>
</html>