<?php 
include __DIR__ . '/header.php';
require_once __DIR__ . '/functions.php';
?>

<?php
if(!preg_match('/\A\d{4}-\d{2}-\d{2}\z/u', $_POST['date'])) {
    echo "年月日のフォーマットが間違っています" . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
    exit;
}

$date = explode('-', $_POST['date']);
  if(!checkdate($date[1], $date[2], $date[0])) {
   echo "正しい年月日を入力してください" . '<br>' .  '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
   exit;
  }

  $today = date('Y-m-d');
  if ($today >= $_POST['date']) {
    echo '当日及び、当日より前の年月日には予約できません' . '<br>' .  '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
    exit;
  }

try {
    $dbh = db_open();
    $s_date = $_POST['date'];
    $sql = 'SELECT * FROM `yoyaku` WHERE date LIKE :s_date';
    $stmt =$dbh->prepare($sql);
    $stmt->bindParam(':s_date',$s_date, PDO::PARAM_STR);
    $stmt->execute();
    $stmt_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $morning = array_column($stmt_list, 'morning');
    $afternoon = array_column($stmt_list, 'afternoon');
    $night = array_column($stmt_list, 'night');



} catch (PDOException $e) {
    echo 'アクセスエラー' . "<br>" . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
    exit;
}
?>

<h2 style="text-align: center;"><?php echo "$s_date" . 'の予約状況' ?></h2>

<table border="5" style="margin: auto;">
  <tr>
      <th>09:00~13:00<br>(午前区分)</th>
      <th>13:00~18:00<br>(午後区分)</th>
      <th>18:00~22:00<br>(夜間区分)</th>
  </tr>

  <th>
    <?php if (in_array(1, $morning)) {
              $m_int = 2;
              echo '<div class="font-red">' . '予約済み' . '</div>';
          } else {
              $m_int = 0;
              echo '空き'; 
          }?>
  </th>
  <th>
    <?php if (in_array(1, $afternoon)) {
              $a_int = 2;
              echo "<div class='font-red'>" . '予約済み' . "</div>";
          } else {
              $a_int = 0;
              echo '空き';
          }?>
  </th>
  <th>
    <?php if (in_array(1, $night)) {
             $n_int = 2;
             echo "<div class='font-red'>" . '予約済み' . "</div>";
          } else {
             $n_int = 0;
             echo '空き';
          }?>
  </th>
</table>

<form action="input.php" method="post">
    <input type="hidden" name="date" value="<?php echo $s_date;?>">
    <input type="hidden" name="m_int" value="<?php echo $m_int;?>">
    <input type="hidden" name="a_int" value="<?php echo $a_int;?>">
    <input type="hidden" name="n_int" value="<?php echo $n_int;?>">
    <input type="button" value="戻る" onclick="history.back(-1)">
    <input type="submit" value="予約画面に進む">
</form>

<?php include  __DIR__ . '/footer.php';?>