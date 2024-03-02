<?php
include __DIR__ . '/header.php';
require_once __DIR__ . "/functions.php";
require_once __DIR__ . "/validation.php";
require_once __DIR__ . "/dbcheck.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = str2html($_POST["name"]);
    $tel = str2html($_POST["tel"]);
    $mail = str2html($_POST["mail"]);
    $address = str2html($_POST["address"]);
    $date = str2html($_POST["date"]);
    $morning = $_POST["morning"];
    $afternoon = $_POST["afternoon"];
    $night = $_POST["night"];
    $people = str2html($_POST["people"]);
    $youto = str2html($_POST["youto"]);
}
?>
<h2>予約内容確認</h2>
<p>
    予約内容はこちらで宜しいでしょうか？<br>
    よろしければ「この内容で予約する」ボタンを押してください。
</p>

<form action="insert.php" method="post">
    <p>
      <label>代表者名:</label>
      <input type="hidden" name="name" value="<?php echo $name;?>">
      <?php echo $name;?><br>
    </p>
    <p>
      <label>連絡先電話番号:</label>
      <input type="hidden" name="tel" value="<?php echo $tel;?>">
      <?php echo $tel;?><br>
    </p>
    <p>
      <label>メールアドレス:</label>
      <input type="hidden" name="mail" value="<?php echo $mail;?>">
      <?php echo $mail;?><br>
    </p>
    <p>
    <label>住所:</label>
    <input type="hidden" name="address" value="<?php echo $address;?>">
    <?php echo $address;?><br>
    </p>
    <p>
    <label>利用年月日:</label>
    <input type="hidden" name="date" value="<?php echo $date;?>">
    <?php echo $date . "<br>"; ?>
    </p>
    <p>
      <label>希望利用区分:</label><br>
      <input type="hidden" name="morning" value="<?php echo $morning;?>">
      <input type="hidden" name="afternoon" value="<?php echo $afternoon;?>">
      <input type="hidden" name="night" value="<?php echo $night;?>">
      <?php
        if ($morning == 1) {
            echo '9:00~13:00' . "<br>";
        }
        if ($afternoon == 1) {
            echo '13:00~18:00' . "<br>";
        }
        if ($night == 1) {
            echo '18:00~22:00' . "<br>";
        }
      ?>
    </p>
    <p>
      <label>利用人数:</label>
      <input type="hidden" name="people" value="<?php echo $people;?>">
      <?php echo $people . "<br>"?>
    </p>
    <p>
      <label>催し物名、または利用用途:</label><br>
      <input type="hidden" name="youto" value="<?php echo $youto;?>">
      <?php echo $youto . "<br>";?>
    </p>
    <input type="button" value="内容を修正する" onclick="history.back(-1)">
    <input type="submit" value="この内容で予約する">

</form>

<?php include  __DIR__ . '/footer.php';?>