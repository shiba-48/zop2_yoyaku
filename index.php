<?php include __DIR__ . '/header.php';?>

  <p>予約をしたい年月日を入力してください</p>
    <form action="search.php" method="post">
        <input id="datepicker" type="text" name="date" placeholder='例) 2024-01-01'>
        <input type="submit" value="確認する">
    </form>

    <section id="info" class="info-area">
      <h2>〇〇市公民館 大会議室 <br calss="sp-only">施設概要</h2>
      <div class="info-content">
        <div class="info-txt">

          <p>最大利用人数: 80人</p>
          <p>設備:<br>
          ワイヤレスマイク: 6本<br>
          スクリーン、プロジェクターセット: 2セット<br>
          机: 40台   椅子: 80脚<br>
          演台: 2台</p>
          <p>利用時間区分:<br>
          09:00~13:00(午前区分)<br>
          13:00~18:00(午後区分)<br>
          19:00~22:00(夜間区分)</p>
          <p>利用料金(〇〇市内の方):<br>
          ご住まいが〇〇市の方は基本無料</p>
          利用料金(〇〇市外の方):<br>
          09:00~13:00(午前区分) :500円(税込)<br>
          13:00~18:00(午後区分) :700円(税込)<br>
          19:00~22:00(夜間区分) :1000円(税込)</p>
        </div>
        <img src="img/hero.jpg" alt="大会議室の写真">
      </div>
        
    </section>

<?php include __DIR__ . '/footer.php'; ?>