<!-- 

// Sessionp01 を開いてから０２を開く（でないとうまく動かない）

// session_start();



// $name = 'Sasaki';
// $age = 45;

// echo $name . $age; 


// $_SESSION['name'] = $name;
// $_SESSION['age'] = $age;

// IDを可視化する（Session Startでサーバーで作成されたIDが、ブラウザにきてブラウザの中のストレージに保存される)
// session_id(); ←これをsidというところに格納する
// 発行されたIDに紐づく情報は、生成される添付ファイルに記載されている。

// $sid = session_id();

// // sidを呼び出す
// echo $sid;

// ブラウザの検証＞アプリケーション＞Cookie＞http://localhost~~~でも確認できる

// 利用したら再発行、利用したら再発行を繰り返している($session_regenerate_id();で再発行する)

// $old_session_id = session_id();


// ⇩何か処理を行う

// session_regenerate_id(true); 　//新しいIDが発行される

// session_id();が変わった後の鍵。これがNew Session IDに格納される
// $new_session_id = session_id();

// echo $old_session_id;
// echo '<br>';
// echo $new_session_id; -->


<?php
session_start();

$old_session_id = session_id();
// 何か処理,,,,,,,,
session_regenerate_id(true); // 新しいIDが発行

$new_session_id = session_id();

echo $old_session_id;
echo '<br>';
echo $new_session_id;
