<?php
$title='いちご狩り ';
// $wp='wp';

$event=[
    // '2026-02-01'=>'〇',
    // '2026-02-02'=>'休',
    // '2026-02-03'=>'〇',
    // '2026-02-04'=>'〇',
    // '2026-02-05'=>'〇',
    // '2026-02-06'=>'〇',
    // '2026-02-07'=>'〇',
    // '2026-02-08'=>'〇',
    // '2026-02-09'=>'休',
    // '2026-02-10'=>'〇',
    // '2026-02-11'=>'休',
    // '2026-02-12'=>'〇',
    // '2026-02-13'=>'〇',
    // '2026-02-14'=>'〇',
    // '2026-02-15'=>'〇',
    // '2026-02-16'=>'休',
    // '2026-02-17'=>'〇',
    // '2026-02-18'=>'〇',
    // '2026-02-19'=>'〇',
    // '2026-02-20'=>'〇',
    // '2026-02-21'=>'〇',
    // '2026-02-22'=>'〇',
    // '2026-02-23'=>'休',
    '2026-02-24'=>'休',
    '2026-02-25'=>'◎',
    '2026-02-26'=>'◎',
    '2026-02-27'=>'△',
    '2026-02-28'=>'×',
    '2026-03-01'=>'△',
    '2026-03-02'=>'休',
    '2026-03-03'=>'休',
    '2026-03-04'=>'◎',
    '2026-03-05'=>'◎',
    '2026-03-06'=>'◎',
    '2026-03-07'=>'△',
    '2026-03-08'=>'◎',
    '2026-03-09'=>'休',
    '2026-03-10'=>'休',
    '2026-03-11'=>'◎',
    '2026-03-12'=>'◎',
    '2026-03-13'=>'◎',
    '2026-03-14'=>'×',
    '2026-03-15'=>'△',
    '2026-03-16'=>'休',
    '2026-03-17'=>'休',
    '2026-03-18'=>'△',
    '2026-03-19'=>'◎',
    '2026-03-20'=>'休',
    '2026-03-21'=>'◎',
    '2026-03-22'=>'△',
    '2026-03-23'=>'休',
    '2026-03-24'=>'休',
    '2026-03-25'=>'◎',
    '2026-03-26'=>'◎',
    '2026-03-27'=>'◎',
    '2026-03-28'=>'×',
    '2026-03-29'=>'◎',
    '2026-03-30'=>'休',
    '2026-03-31'=>'休',
    // '2026-04-01'=>'',

];
?>

<?php require 'header.php'; ?>
<div class="wp">
    
    <section class="introduce">
        <div id="bgi-itigo">
            <h3 class="itigo" id="itigogari">いちご狩り</h3>
        </div>
        <p>30分食べ放題！ <br>ぜひご参加ください！</p>
        <p>料金 <br>大人　&#165;3,800 <br>子供　&#165;1,900 <br>幼児　　無料 <br><span class="caution">&#8251;中学生以上は大人料金 <br>3歳以上は子供料金になります</span></p>
        <p id="waribiki">当日ページ下の <br>チラシをご提示いただくことにより <br>上記の値段から大人200円子供100円を <br>割引させていただきます！</p>
        <p>お支払いの際にチラシの画面を <br>ご提示ください</p>
        <p>お支払いは現金 <br>PayPayからお選びいただけます</p>
        <p>ご予約は<a href="inquiry.php">こちら</a>からお願いいたします</p>
        <p id="tirashi">チラシはこちら&#x21CA;</p>
        <section id="flyer">
            <!-- lightbox  a=実物　img=サムネ -->
            <a href="images/flyer.png" data-lightbox="flyer"><img src="images/lightbox.jpg" alt=""></a>
        </section>
    
    
    
    
    </section><!-- .introduce -->
    <section class="calendar">
        <h4 id="next-month">予約の空き状況</h4>
        <?php
            session_start();
            // unset($_SESSION);
            //日付の設定
            if (!isset($_SESSION['yy'])) {
            $today=new DateTime();
            $_SESSION['yy']=intval($today->format('Y'));
            $_SESSION['mm']=intval($today->format('n'));
            }
            // var_dump($_SESSION);
    
            //前の月・次の月を変更する処理
            if (isset($_REQUEST['lt'])) {
            if ($_SESSION['mm']===1) {
                $_SESSION['yy']--;
                $_SESSION['mm']=12;
            } else {
                $_SESSION['mm']--;
            }
            } else if (isset($_REQUEST['gt'])) {
            if ($_SESSION['mm']===12) {
                $_SESSION['yy']++;
                $_SESSION['mm']=1;
            } else {
                $_SESSION['mm']++;
            }
            } else if (isset($_REQUEST['setYM'])) {
            $_SESSION['yy']=intval(substr($_REQUEST['yymm'],0,4));
            $_SESSION['mm']=intval(substr($_REQUEST['yymm'],-2));
            // echo $mm;
            }//if isset lt
    
            $yy=$_SESSION['yy'];
            $mm=$_SESSION['mm'];
            //jsでinputのvalueに入れるデータ月は2桁に調整
            $ym=$yy.'-'.str_pad($mm,2,0,STR_PAD_LEFT);
            // echo $ym;
            // $mm=6;
            //〇月1日の作成
            $firstDay=new DateTime("$yy-$mm-1");
            //1日の曜日
            $w=$firstDay->format('w');
            // echo $w;
            //最初の日曜
            $firstSun=$current=$firstDay->modify("-$w day");
            // echo $firstSun->format('Y-m-d');
            ?>
    
        <h5 id="ym"><?=$yy.'年'.$mm.'月'?></h5>
    
    
        <form action="event.php#next-month" class="flex">
            <input type="submit" value="前の月" name="lt" class="width-small">
            <input type="submit" value="次の月" name="gt" class="width-small">
            <input type="month" name="yymm" id="" class="width-calendar">
            <input type="submit" value="表示" name="setYM" class="width-small">
        </form>
    
        <table>
        <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
        </tr>
        <?php
    //現在月current month
    $cm=intval($current->format('n'));
    // var_dump($mm);
    //現在月が指定月より大きくなるまで(以下の間)処理する
    $flgM=true;
    while ($flgM) {
        ?>
        <tr>
        <?php
        //日から土までの7日分のセルを作成
        for ($i=0; $i < 7; $i++) {
            //現在月が指定月と同じ場合は日付を作成
            $cm=intval($current->format('n'));
            $dd='';
            if ($cm===$mm) {
            $dd=$current->format('j');
            }
            $kigou='ー';
            foreach ($event as $key => $value) {
            if ($current->format('Y-m-d')==$key) {
                $kigou='<br>'.$value;
            }
            }
            ?>
            <td><?=$dd?><span class="iro"><?=$kigou?></span></td>
            <?php
            //現在日を1日増加
            $current->modify("+1 day");
            $cm=intval($current->format('n'));
            // echo 'cm:'.$cm.' mm:'.$mm.'; ';
            if (($mm!==1&&$cm>$mm)||($mm===1 && $cm===2)||($mm===12 && $cm===1)) {
            $flgM=false;
            }
        }//for i=0-6
        ?>
        </tr>
        <?php
    }//while $cm>$mm
    ?>
    </table>
    
    <p id="reservation">◎余裕あり<br>△残り僅か<br>×予約不可<br>※月・火・祝日は定休日です</p>
    
    
    </section><!-- .calendar -->
    
        <section class="introduce">
            <div id="notice" class="item">
                <h4>注意事項</h4>
                <p>予約の方は10分前にお越しください<br>当日の予約は14:00まで可能です<br>いちごの育成状況によりとさせていただきます</p>
                <p>3月下旬まで開催予定ですがいちごの育成状況により前後する可能性があります</p>
                <p>予約枠が埋まった後でも <br>キャンセルが出た場合は随時更新され <br>予約可能になります</p>
            </div>
        </section>
    
    <?php
    $script=<<<END
    <script>
    'use strict';
    
    $(document).ready(function(){
    $('input[type="month"]').attr('value','$ym');
    });//document ready
    </script>
    END
    ?>
    
    
</div>

<?php require 'footer.php';?>