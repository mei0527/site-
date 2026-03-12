<?php
$title='お問い合わせ ';

$user=$furigana=$tel=$email=$address=$textarea="";

if (isset($_REQUEST['user'])) {
    $user=$_REQUEST['user'];
    $furigana=$_REQUEST['furigana'];
    $tel=$_REQUEST['tel'];
    $email=$_REQUEST['email'];
    $address=$_REQUEST['address'];
    $textarea=$_REQUEST['textarea'];
    $item=$_REQUEST['item'];
}

$option=["農園について","いちご狩りの予約","いちごの直売について","ご意見・ご感想","その他"];
?>
<?php require 'header.php'; ?>
    <div class="toiawase">
        <h3>お問い合わせフォーム</h3>
        <form action="confirm.php" method="post">
            <p>お問い合わせないようをご入力いただき、<br>「確認画面へ」ボタンをクリックしてください</p>
            <p id="yoyaku">&#8251;いちご狩りのご予約は「お問い合わせ種別」から「いちご狩りの予約」をお選びください <br>&#8251;いちご狩りのご予約は希望日、希望時間、参加人数（大人・子供・幼児それぞれの人数）をご記入お願いします。</p>
            <div class="form">
                <div>
                    <label>お名前<span>必須</span></label><br>
                    <input type="text" name="user" id="" placeholder="越谷　苺" value="<?=$user?>"  required>
                </div>
                <div>
                    <label>フリガナ<span>必須</span></label><br>
                    <input type="text" name="furigana" id="" placeholder="コシガヤ　イチゴ" value="<?=$furigana?>" required>
                </div>
                <div>
                    <label>電話番号<span>必須</span></label><br>
                    <input type="tel" name="tel" id="" placeholder="012-345-6789" value="<?=$tel?>" required>
                </div>
                <div>
                    <label>メールアドレス<span>必須</span></label><br>
                    <input type="email" name="email" id="" placeholder="sf-koshigaya@example.com" value="<?=$email?>" required>
                </div>
                <div>
                    <label>住所</label><br>
                    <input type="text" name="address" id="" placeholder="埼玉県越谷市xxx―xxx" value="<?=$address?>">
                </div>
                <div>
                    <label>お問い合わせ種別<span>必須</span></label><br>
                    <select name="item" required>
                        <option value="" disabled selected>選択してください</option>
                        <?php 
                        $select='';
                        foreach ($option as $o) {
                            if ($o==$item) {
                                $select='selected';
                            } else {
                                 $select='';
                            }
                            ?>
                            <option value="<?=$o?>" <?=$select?>><?=$o?></option>
                            <?php
                        }//foreach
                        ?>
                    </select><br>
                </div>
                    <div>
                        <label>お問い合わせ内容<span>必須</span></label><br>
                        <textarea name="textarea" id="text" placeholder="ここにお問合せ内容をご記入ください" required><?=$textarea?></textarea>
                    </div>
            </div>
            <input type="submit" value="確認画面へ" id="submit">
    </div>
    </form>

<?php require 'footer.php';?>
