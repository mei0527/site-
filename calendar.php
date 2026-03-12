<?php
session_start();

//日付の設定
if (!isset($_SESSION['yy'])) {
  $today=new DateTime();
  $_SESSION['yy']=intval($today->format('Y'));
  $_SESSION['mm']=intval($today->format('n'));
}

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
<!-- <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>calendar</title> -->
  <!-- <style>
    table {
      border-collapse: collapse;
    }
    th,td {
      border: 1px solid #666;
      padding: 5px;
    }
    td {
      text-align: right;
    }
    form {
      margin-bottom: 1.5rem;
    }
  </style> -->
</head>
<body>
  <!-- <p id="ym"><?=$yy.'年'.$mm.'月'?></p>

  <form action="event.php#ym">
    <input type="submit" value="前の月" name="lt">　
    <input type="month" name="yymm" id=""><input type="submit" value="表示" name="setYM">　
    <input type="submit" value="次の月" name="gt">
  </form>

  <table id="calendar">
    <tr>
      <th>日</th>
      <th>月</th>
      <th>火</th>
      <th>水</th>
      <th>木</th>
      <th>金</th>
      <th>土</th>
    </tr> -->
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
          ?>
          <td><?=$dd?></td>
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

  <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
  <!-- <script>
    'use strict';

    $(document).ready(function(){
      $('input[type="month"]').attr('value','<?=$ym?>');
    });//document ready
  </script> -->
</body>
</html>