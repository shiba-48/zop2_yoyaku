<?php
include __DIR__ . '/header.php';
require_once __DIR__ . '/functions.php';

try {
    $dbh = db_open();
    $sql = "INSERT INTO `yoyaku` (`name`, `tel`, `mail`, `address`,`date`, `morning`, `afternoon`, `night`, `people`, `youto`)
    VALUES (:name, :tel, :mail, :address, :date, :morning, :afternoon, :night, :people, :youto)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':tel', $_POST['tel'], PDO::PARAM_STR);
    $stmt->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
    $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
    $stmt->bindParam(':date', $_POST['date'], PDO::PARAM_STR);
    $stmt->bindParam(':morning', $_POST['morning'], PDO::PARAM_INT);
    $stmt->bindParam(':afternoon', $_POST['afternoon'], PDO::PARAM_INT);
    $stmt->bindParam(':night', $_POST['night'], PDO::PARAM_INT);
    $stmt->bindParam(':people', $_POST['people'], PDO::PARAM_INT);
    $stmt->bindParam(':youto', $_POST['youto'], PDO::PARAM_STR);
    $stmt->execute();

    $stmt_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<p>予約されました。</p>" .
    "<a href='index.php'>
        <input type='button' value='戻る'>
    </a>";

} catch(PDOException $e) {
    echo 'アクセスエラー' . "<br>" . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
    exit;
}

include __DIR__ . '/footer.php';
?>
