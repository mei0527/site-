<!-- <?php 
if (!isset($wp)) {
    $wp='';
}
?> -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="埼玉県越谷市のいちご農園「Strawberry Farm Koshigaya」では、いちご狩り、いちごの直売を行っております。">
    <title><?=$title?>Strawberry Farm Koshigaya</title>

    <!-- reset css -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <!-- original css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- font
    ここにフォント  url入れる -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" href="images/fav.png" type="image/png">
</head>
<!-- php $wp 使うなら class="a <?=$wp?>"にしておく
 今回はbodyじゃなくてproduct とeventのheader.phpより下部分にbgiを効かせたいのでそれぞれにdiv.wpをくっつけた -->
<body class="a">
<header class="common">
    <h1>
        <a href="index.php"><img src="images/logo.svg" alt="" id="logo"></a>
    </h1>
</header><!-- common -->
 <section id="open-nav">
           <img src="images/dd2.svg" alt="" class="icon">
</section>
<nav id="nav">
    <ul>
    <li><a href="index.php">TOP</a></li>
    <li><a href="event.php">いちご狩り</a></li>
    <li><a href="product.php">直売</a></li>
    <li><a href="inquiry.php">問い合わせ</a></li>
    </ul>
</nav>
<div id="mask"></div>
<section class="sns">
    <img src="images/fb.png" alt="" id="fb">
    <img src="images/insta.png" alt="" id="insta">
    <img src="images/x.png" alt="" id="x">
</section>
<p><a href="#" id="page-top"></a></p>