
<?php
session_start();


require 'validation.php';




// if(!empty($_POST['your_name'])){
//   echo $_POST['your_name'];
// };
if(!empty($_POST)){
  echo '<pre>';
  var_dump($_POST);
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
$errors = validation($_POST);
if(!empty($_POST['btn_confirm']) && empty($errors)){
  $pageFlag = 1;
};
if(!empty($_POST['btn_submit'])){
  $pageFlag = 2;
};


?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<body class="container">

<?php if($pageFlag=== 0) : ?>
  <?php
  if(!isset($_SESSION['csrfToken'])){
    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrfToken'] = $csrfToken;
  }
  $token = $_SESSION['csrfToken']
  ?>

  <?php if(!empty($errors) && !empty($_POST['btn_confirm'])) :?>
    <?php
    echo '<ul>';
    foreach ($errors as $error) {
        echo '<li>' . $error . '</li>';
      }
    echo '</ul>';
    ?>
  <?php endif; ?>
  <form method = "POST" action="input.php">
    <div class="form-group">
      <label for="your_name">氏名</label>
      <input type="text" name = "your_name" value="<?php if(!empty($_POST['your_name'])){ echo h($_POST['your_name']);}; ?>" class="form-control"></br>
    </div>
    <div class="form-group">
      <label for="email">メールアドレス</label>
      <input type="email" name = "email" value="<?php if(!empty($_POST['email'])){ echo h($_POST['email']);}; ?>" class="form-control"></br>
    </div>
    
    <div class="form-group">
      <label for="url">ホームページ</label>
      <input type="url"  name = "url" value="<?php if(!empty($_POST['url'])){ echo h($_POST['url']);}; ?>" class="form-control"></br>
    </div>
    性別
    <div class="form-check form-check-inline">
      <input type="radio" name="gender" value="0" 
        <?php
          if(isset($_POST['gender'])){
            if($_POST['gender'] === '0'){
              echo 'checked';
            };
          };
        ?>><label for="gender" class="form-check-label">男性</label>
      <input type="radio" name="gender" value="1" <?php if(isset($_POST['gender']) && $_POST['gender'] === '1'){echo 'checked';}?>><label for="gender" class="form-check-label">女性　</label>
    </div>

    
    <div class="form-group">
      <label for="age">年齢</label>
        <select name="age" class="form-control">
          <option value="0">選択してください</option>
          <option value="1">~19歳</option>
          <option value="2">20歳〜29歳</option>
          <option value="3">30歳〜39歳</option>
          <option value="4">40歳〜49歳</option>
          <option value="5">50歳〜59歳</option>
          <option value="6">60歳〜</option>
        </select><br>
    </div>


    <div class="form-group">
      <label for="contact">お問い合わせ内容</label>
        <textarea name="contact" id="" class="form-control"><?php if(!empty($_POST['contact'])){ echo h($_POST['contact']);}; ?></textarea><br>
    </div>

    注意事項のチェック<br>
    <input type="checkbox" name="caution" value="1">注意事項にチェックする。<br>
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
      ホームページ
      <?php echo h($_POST['url']); ?>
      性別
      <?php
        if($_POST['gender']=== '0'){echo '男性';}
        if($_POST['gender']=== '1'){echo '女性';}
      ?>
      年齢
      <?php
        if($_POST['age']=== '0'){echo '未選択';}
        if($_POST['age']=== '1'){echo '~19歳';}
        if($_POST['age']=== '2'){echo '20~29歳';}
        if($_POST['age']=== '3'){echo '30~39歳';}
        if($_POST['age']=== '4'){echo '40~49歳';}
        if($_POST['age']=== '5'){echo '50~59歳';}
        if($_POST['age']=== '6'){echo '60~69歳';}
      ?>
      お問い合わせ番号
      <?php echo h($_POST['contact']); ?>
      <input type="hidden" name = "your_name" value="<?php echo h($_POST['your_name']); ?>">
      <input type="hidden" name = "email" value="<?php echo h($_POST['email']); ?>">
      <input type="hidden" name = "url" value="<?php echo h($_POST['url']); ?>">
      <input type="hidden" name = "gender" value="<?php echo h($_POST['gender']); ?>">
      <input type="hidden" name = "age" value="<?php echo h($_POST['age']); ?>">
      <input type="hidden" name = "contact" value="<?php echo h($_POST['contact']); ?>">
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