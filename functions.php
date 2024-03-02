<?php

// 特殊な文字列をHTMLエンティティに変換する関数
function str2html(string $string) :string {
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// データベース接続の関数
function db_open() :PDO {
    $user = "";
    $password = "";
    $opt = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_EMULATE_PREPARES => false,
      PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    
    $dbh = new PDO('mysql:host=;dbname=', $user, $password, $opt);
    return $dbh;
}

// タイムゾーンの設定
date_default_timezone_set('Asia/Tokyo');