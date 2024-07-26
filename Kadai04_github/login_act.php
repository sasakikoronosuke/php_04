<?php

//最初にSESSIONを開始！！ココ大事！！

session_start();


//POST値を受け取る
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];


//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//2. データ登録SQL作成
// gs_user_tableに、IDとWPがあるか確認する。
// ログインされた人のIDがここで判断される
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE lid = :lid AND lpw= :lpw');  //ここでいきなりID入れると危ないので、一旦退避させる
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status === false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

//if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使う
    // Valで、ログインした人のIDのDB情報を一旦全部持ってくる
if( $val['id'] != ''){
    //Login成功時 該当レコードがあればSESSIONに値を代入

  $_SESSION['chk_ssid'] = session_id();

//   ここで、ログインIDの人のKanri Flgを引っ張ってきて、SESSIONに格納する。
  $_SESSION['kanri'] = $val['kanri_flg']; //SQLのテーブルラベルのKanri＿flgに１が入っている人、０が入っている人の判別をする



    header('Location: select.php');
}else{
    //Login失敗時(Logout経由)
    header('Location: login.php');
}

exit();
