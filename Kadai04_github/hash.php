<?php

//”TEST”をハッシュ化する
// 通常は、PWを登録するときにハッシュ化して登録するようなフォームを作る。基本、手作りはしない。めちゃくちゃ危険なので。フレームワーク、ユーザー登録のライブラリなどを使う。
$password = 'test1';

$hashed_pw = password_hash($password, PASSWORD_DEFAULT);

// 'test'がハッシュ化された↓
// ハッシュ値は毎回違う（更新すると表示が変わる。）
// ↓から、元の値（今回は'test'）という文字を導き出すことはできない。
echo $hashed_pw;

// password_verify()で認証ができる。
// password_verify('ハッシュ化の値', `ハッシュ化された値'));
// password_verify(この文字が, ハッシュ化されたものと同じかどうか)　bool(true)だと同じ

echo '<pre>';
var_dump(password_verify('test', $hashed_pw));
echo '</pre>';
