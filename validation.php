<?php
if(empty($_POST['name'])) {
    echo '名前の入力は必須です。' . "<br>" .
    "<input type='button' value='戻る' onclick='history.back(-1)'>";
    exit;
}

if(!preg_match('/\A[[:^cntrl:]]{1,20}\z/u', $_POST['name'])) {
  echo "名前は20文字までです" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}

if(empty($_POST['tel'])) {
  echo "電話番号の入力は必須です" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}

if (!preg_match('/^0[0-9]{1,4}-[0-9]{1,4}-[0-9]{3,4}$/', $_POST['tel'])) {
  echo "電話番号をお確かめの上、入力し直してください" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}

if  (!empty($_POST['mail'])) {
  if(!preg_match('/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/', $_POST['mail'])) {
    echo "このメールアドレスは使用できません" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
    exit;
  }
}

if(empty($_POST['address'])) {
  echo "住所の入力は必須です" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}

if(!preg_match('/\A[[:^cntrl:]]{1,50}\z/u', $_POST['address'])) {
  echo "住所は50文字までです" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}

if ($_POST['morning'] == 0 && $_POST['afternoon'] == 0 && $_POST['night'] == 0) {
  echo 'いずれかの利用時間区分を指定してください' . '<br>' .  '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}

if (
    ($_POST['morning'] == 0 || $_POST['morning'] == 2) &&
    ($_POST['afternoon'] == 0 || $_POST['afternoon'] ==2) &&
    ($_POST['night'] == 0 || $_POST['night'] == 2)
) {
    echo '空いている時間を指定してください。' . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
    exit;
}

if(empty($_POST['people'])) {
  echo "利用人数の入力は必須です" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}

if (!is_numeric($_POST['people'])) {
  echo "利用人数を半角英数で入力してください" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}

if ((($_POST['people']) > 80) || (($_POST['people']) < 1)) {
  echo "利用人数は１～８０人までです" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}

if(empty($_POST['youto'])) {
  echo "利用用途の入力は必須です" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}

if(!preg_match('/\A[[:^cntrl:]]{1,20}\z/u', $_POST['youto'])) {
  echo "利用用途は20文字に納めてください" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
  exit;
}