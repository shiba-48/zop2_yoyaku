<?php 
include __DIR__ . '/header.php';
require_once __DIR__ . '/functions.php';
?>

<?php
$morning = $_POST["m_int"];
$afternoon = $_POST["a_int"];
$night = $_POST["n_int"];
?>

<section id="info" class="info-area">
<form action="confirm.php" method="post">
    <p>
        <label for="name">代表者名(必須):</label><br>
        <input id="name" type="text" name="name" placeholder='例) 山田太郎'>
    </p>
    <p>
        <label for="tel">連絡先電話番号(必須):</label><br>
        <input id="tel" type="tel" name="tel" placeholder='例) 090-0000-0000'>
    </p>
    <p>
        <label for="mail">メールアドレス:</label><br>
        <input id="mail" type="mail" name="mail" placeholder='例) test@testmail.com'>
    </p>
    <p>
        <label for="address">住所(必須):</label><br>
        <input id="address" type="text" name="address" placeholder='例) ⚪︎⚪︎県⚪︎⚪︎市⚪︎⚪︎字⚪︎⚪︎⚪︎'>
    </p>
    <p>
        利用年月日:
        <?php $date = $_POST["date"];
        echo "<label class='font'>" . $date . "</label>" ?> 
        <input type="hidden" name="date" value="<?php echo $date;?>">
    </p>
    <p>
        希望利用区分:
    </p>
    <?php
    if ($morning == 0) {
        echo "<label class='font' for='morning'>9:00~13:00</label>
             <input type='hidden' name='morning' value=0>
             <input id='morning' type='checkbox' name='morning' value=1>" . "<br>";
    } else {
        echo "<input type='hidden' name='morning' value=2>" . "<div class='font-red'>" . '午前区分はすでに借りられています。' . '</div>';
    };
    if ($afternoon == 0) {
        echo "<label class='font' for='afternoon'>13:00~18:00</label>
             <input type='hidden' name='afternoon' value=0>
             <input id='afternoon' type='checkbox' name='afternoon' value=1>" . "<br>";
    } else {
        echo "<input type='hidden' name='afternoon' value=2>" . "<div class='font-red'>" . '午後区分はすでに借りられています。' . '</div>';
    };
    if ($night == 0) {
        echo "<label class='font' for='night'>18:00~22:00</label>
             <input type='hidden' name='night' value=0>
             <input id='night' type='checkbox' name='night' value=1>" . "<br>";
    } else {
        echo "<input type='hidden' name='night' value=2>" . "<div class='font-red'>" . '夜間区分はすでに借りられています。' . '</div>';
    };
    ?>
    <p>
        <label for="people">利用人数(必須):</label><br>
        <input id="people" type="text" name="people" placeholder='例) 80(上限80まで)'>
    </p>
    <p>
        <label for="youto">催し物名、または利用用途(必須):</label><br>
        <input id="youto" type="text" name="youto" placeholder='例) 会議や講演会など'>
    </p>
    <p>
        <input type="submit" value="予約を確認する">
    </p>
</form>
</section>

<?php include  __DIR__ . '/footer.php';?>