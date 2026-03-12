<?php
$title='お問い合わせありがとうございました ';

require_once 'db.php';
$str="INSERT INTO inquiry values(null, ?, ?, ?, ?, ?, ?, ?)";
$arr=[
    $_REQUEST['user'],
    $_REQUEST['furigana'],
    $_REQUEST['tel'],
    $_REQUEST['email'],
    $_REQUEST['address'],
    $_REQUEST['item'],
    $_REQUEST['textarea']
];
$sql=$pdo->prepare($str);


if ($sql->execute($arr)) {
    header('Location:thanks.php');
    exit;
}else{
    header('Location:error.php');
    exit;
}

//問合せ完了メールの実装
//サーバーないと確認不可

//日本語使用する場合
mb_language("Japanese");
mb_internal_encoding("UTF-8");

// 変数とタイムゾーンを初期化
$auto_reply_subject = null;
$auto_reply_text = null;
date_default_timezone_set('Asia/Tokyo');

// 件名を設定
$auto_reply_subject = 'お問い合わせありがとうございます（SFKoshigaya）';

//時間を取得して設定
$date=date("Y-m-d H:i");

//変数を定義
$user=$_REQUEST['user'];
$furigana=$_REQUEST['furigana'];
$tel=$_REQUEST['tel'];
$email=$_REQUEST['email'];
$address=$_REQUEST['address'];
$item=$_REQUEST['item'];
$textarea=$_REQUEST['textarea'];

// 本文を設定
$auto_reply_text =<<<END
$user 様
この度は、お問い合わせ頂き誠にありがとうございます。
下記の内容でお問い合わせを受け付けました。
改めて担当者より３営業日以内にご連絡を差し上げます。
お急ぎの場合は恐れ入りますがお電話にてご連絡いただけますと幸いです。


お問い合わせ日時：$date

お名前：$user
フリガナ：$furigana
電話番号：$tel
メールアドレス：$email
住所：$address
お問い合わせ種別：$item
お問い合わせ内容：$text


※本メールは送信専用のため、返信いただくことはできません。
END;

mb_send_mail( $_REQUEST['email'], $auto_reply_subject, $auto_reply_text);


// $auto_reply_text = "この度は、お問い合わせ頂き誠にありがとうございます。
// 下記の内容でお問い合わせを受け付けました。\n\n";
// $auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
// $auto_reply_text .= "氏名：" . $_POST['your_name'] . "\n";
// $auto_reply_text .= "メールアドレス：" . $_POST['email'] . "\n\n";
// $auto_reply_text .= "GRAYCODE 事務局";

// メール送信

?>
