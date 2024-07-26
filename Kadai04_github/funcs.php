<?php

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn()
{
   
   


   
   
   
   
    try {

        // 本番環境では以下をコメントアウト
        $db_name = 'gs_db_4';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト


            //  本番環境で以下記入しコメントアウト解除
            //  $db_name = "";
            //  $db_host = "";
            //  $db_id = "";
            //  $db_pw = "";


        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()

function loginCheck(){

if( !isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid']!== session_id()){
    exit('LOGIN ERROR'); //これは（）内は出力内容なのでなんでもOK
    }
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();

}
