<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>


こちらはHTMLです
<h2>変数と定数</h2>
<?php


echo('test');
echo('こちらはphpです');

echo('こんば”あああ”んわ');

// データ型は児童的に判別してくれる
$test = 124;

echo $test;
var_dump($test);

$test = 'テストです';

echo $test;
var_dump($test);

$test_1 = 123;
$test_2 = 456;

$test = $test_1 . $test_2;
var_dump($test);

$test = $test_1 + $test_2;
var_dump($test);


// 定数は基本大文字
const MAX = 'テスト';
var_dump(MAX);
?>
<h2>配列</h2>
<?php

// 配列1行
$array = [1,2,3,'aaa'];

echo $array;
echo $array[0];
echo '<pre>';
var_dump($array);
echo('</pre>');
// 配列に行
$array_2 = [
  ['赤','青','黄色'],
  [3,2,1,3]
];

echo '<pre>';
var_dump($array_2);
echo('</pre>');
?>

<h2>連想配列</h2>
<?php
$array_member =[
  'name' => 'ホンダ',
  'height' => 170,
  'hobby' => 'サッカー'
];
echo $array_member[hobby];
echo $array_member['hobby'];

echo '<pre>';
var_dump($array_member);
echo('</pre>');

$members = [
  '本田' => [
    'height'=> 170,
    'hobby' => 'サッカー'
  ],
  '香川' => [
    'height'=> 170,
    'hobby' => 'サッカー'
  ],
  '長友' => $array_member
];
echo '<pre>';
var_dump($members);
echo('</pre>');

echo $members['長友']['name']; 


?>

<h2>条件分岐</h2>
<?php
$a = 92;
// $a = 90;

if ($a == 90){
  echo 'aは' . $a . 'になります';
}else{
  echo 'aは' . 90 . 'ではありません';
};


// $a = 90;
$a = 90;
if ($a !== '90'){
  echo('型はintの90');
}else if($a !== 90){
  echo('型はstringの90');
}

$test = '2';

if(empty($test)){
  echo '変数はからです。';
}else{
  echo '変数は空ではありません';
}

// !でnot
if(!empty($test)){
  echo 'not(変数はからです。)';
}else{
  echo 'not(変数は空ではありません)';
}
echo '<br>';

$signal_1 = 'red';
$signal_2 = 'yellow';

if($signal_1 == 'red' && $signal_2 == 'blue'){
  echo '赤と青です。';
}
if($signal_1 == 'red' || $signal_2 == 'blue'){
  echo '赤か青です。';
}

$math = 80;

$comment = $math >80 ? 'good' : 'not good';
echo $comment;
?>

<h2>foreach</h2>

<?php
$members =[
  'name'=> '本田',
  'height' => 170,
  'hobby' => 'soccer'
];

foreach($members as $member){
  echo $member;
}
echo '<br>';

foreach($members as$key => $member){
  echo $key . 'は' .$member;
}

$members =[
  '本田' => [
  'height' => 170,
  'hobby' => 'soccer'
  ],
  '香川'=>[
    'height' => 178,
    'hobby'=> 'tennis'
  ]
];
foreach($members as $key => $member_1){
  echo '<br>';
  echo  $key . 'の';
  foreach($member_1 as $member => $content){
    echo $member . 'は' . $content;
  };
};
?>

<h2>for とwhile</h2>

<?php
for($i=0;$i<10;$i++){
  echo $i;
};
for($i=1;$i<10;$i++){
  if($i%3 == 0){
    echo '<br>';
    break;
  }
  echo $i;
};
echo '<br>';
$j = 0;
while($j <5){
  echo($j);
  $j++;
}

?>

<h2>switch</h2>

<?php
$data = '2';
switch($data){
  case 1:
    echo '1です';
    break;
  case 2:
    echo '2です';
    break;
  default:
    echo '1,2ではありません';
};
?>

<h2>関数</h2>
<?php
// インプットなしアウトプットなし
function test(){
  echo 'test';
};
test();

// インプットありアウトプットなし
function getComment($string){
   echo $string;
};
getComment('test');

// インプットなしアウトプットあり
function getNumberOfComment(){
  return 5;
};

$number = getNumberOfComment();
echo $number;


// インプットありアウトプットあり
function sumPrice($int1,$int2){
  $int3 = $int1 + $int2;
  return $int3;
};
$total = sumPrice(3,5);
echo '<br>';
echo $total;


// 組み込み関数を活用して関数を自作する

$postalcode = '123-4567';

function checkPostakCode($str){
  $replaced = str_replace('-','',$str);
  $length = strlen($replaced);
  if ($length === 7){
    return true;
  };
  return false;
}
echo '<br>';
echo checkPostakCode($postalcode);
?>
</body>
</html>
