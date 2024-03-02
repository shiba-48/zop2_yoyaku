<?php

try {
    $dbh = db_open();
    $sql = 'SELECT * FROM yoyaku WHERE date LIKE :date AND ';

    $timeSlot = ''; // 午前、午後、夜のいずれかを保持する変数

    if ($_POST['morning'] == 0 || $_POST['morning'] == 1) {
        $sql .= 'morning LIKE :morning ';
        $timeSlot = 'morning';
    } elseif ($_POST['afternoon'] == 0 || $_POST['afternoon'] == 1) {
        $sql .= 'afternoon LIKE :afternoon ';
        $timeSlot = 'afternoon';
    } elseif ($_POST['night'] == 0 || $_POST['night'] == 1) {
        $sql .= 'night LIKE :night ';
        $timeSlot = 'night';
    }

    $stmt = $dbh->prepare($sql);
    $date = $_POST['date'];
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);

    // $timeSlot が空でない場合だけバインド
    if (!empty($timeSlot)) {
        $stmt->bindParam(':' . $timeSlot, $_POST[$timeSlot], PDO::PARAM_INT);
    }

    $stmt->execute();

    $stmt_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($stmt_list)) {
        echo 'すでに予約済みの日時です' . '<br>' . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
        exit;
    }
} catch (PDOException $e) {
    echo 'アクセスエラー' . "<br>" . '<input class="btn list-btn" type="button" value="戻る" onclick="history.back(-1)">';
    exit;
}

?>
