<?php


function validation($request){
  $errors =[];

  if(empty($request['your_name']) || 20 < mb_strlen($request['your_name'])){
    // DBの設定に合わせて文字数制限もかけなければならない
    $errors[]= '氏名は必須です。20文字以内です。';
  };

  if (empty($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'メールアドレスは必須です。正しい形式で入力してください。';
  }

  if(!empty($request['url'])){
    if(!filter_var($request['url'], FILTER_VALIDATE_URL)){
      $errors[] = 'urlは必須です。正しい形式で入力してください。';
    };
  }

  if(empty($request['contact']) || 200 < mb_strlen($request['contact'])){
    // DBの設定に合わせて文字数制限もかけなければならない
    $errors[]= 'お問合せ内容はは必須です。200文字以内で書いてください。';
  };

  if (empty($request['caution'])) {
    $errors[]= '注意事項をお読みください。';
  }

  if(!isset($request['gender'])){
    $errors[]= '性別を選択してください。';
  }

  if(empty($request['age']) || 6 < $request['age']){
    $errors[]= '年齢を選択してください。';
  }
  return $errors;
}
?>