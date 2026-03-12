<?php
$title='お問い合わせ内容の確認 ';

?>
<?php
$user=$_REQUEST['user'];
$furigana=$_REQUEST['furigana'];
$tel=$_REQUEST['tel'];
$email=$_REQUEST['email'];
$address=$_REQUEST['address'];
$item=$_REQUEST['item'];
$textarea=$_REQUEST['textarea'];

?>
<?php require 'header.php'; ?>
<div class="confirm2">
    <h3>以下の内容で送信します</h3>
    <p><span class="naiyou">お名前：</span>　<?=$user?></p>
    <p><span class="naiyou">フリガナ：</span>　<?=$furigana?></p>
    <p><span class="naiyou">電話番号：</span>　<?=$tel?></p>
    <p><span class="naiyou">メールアドレス：</span>　<?=$email?></p>
    <p><span class="naiyou">住所：</span>　<?=$address?></p>
    <p><span class="naiyoiu">お問い合わせ種別：</span>　<?=$item?></p>
    <p><span class="naiyou">お問い合わせ内容：</span>　<?=$textarea?></p>
</div>


<div class=confirm>
    <form action="inquiry.php" method="post">
                <input type="hidden" name="user" value="<?=$user?>">
                <input type="hidden" name="furigana" value="<?=$furigana?>">
                <input type="hidden" name="tel" value="<?=$tel?>">
                <input type="hidden" name="email" value="<?=$email?>">
                <input type="hidden" name="item" value="<?=$item?>">
                <input type="hidden" name="address" value="<?=$address?>">
                <input type="hidden" name="textarea" value="<?=$textarea?>">
    
                <input type="submit" value="修正" class="shusei">
    </form>
    <form action="insert.php" method="post">
                <input type="hidden" name="user" value="<?=$user?>">
                <input type="hidden" name="furigana" value="<?=$furigana?>">
                <input type="hidden" name="tel" value="<?=$tel?>">
                <input type="hidden" name="email" value="<?=$email?>">
                <input type="hidden" name="item" value="<?=$item?>">
                <input type="hidden" name="address" value="<?=$address?>">
                <input type="hidden" name="textarea" value="<?=$textarea?>">
    
                <input type="submit" value="送信" class="sousin">
    </form>
</div>
<?php require 'footer.php';?>