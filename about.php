<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=0.8 maximum-scale=0.8 user-scalable=0">
    <title>關於我們</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/colorbox.css" />
    <link rel="stylesheet" href="about.css">
</head>
<body>
<header class=" banner area01 ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12  col-sm-12">
                <img src=""  alt="">
            </div>
        </div>
    </div>
</header>
<?php include __DIR__ . '/_navbar.php' ?>
<div class="container">
    <div class="row">

        <div class="area02 col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
            <div class="title01"></div>
        </div> <!--area02-->

        <div class="area03 col-lg-8  col-sm-8 col-sm-offset-2">
            <div class="we ">
                <img src="images/noimg01.jpg" style="width: 80%;" alt="">
                <p class="we-a">享受喝茶氛圍、注重茶類品質、重視茶的「鐵粉」，是我們堅持理念，透過在地台灣茶優秀品質，我們希望和您一起從舌尖味蕾至情氛圍，去感受到茶所帶給我們的滋味。

                    品茶之趣，在於「發酵」與「烘焙」造就的千變萬化茶香滋味。鐵茶搜羅俱全，清楚呈現「茶的二三事」，每次品茗都是練習，喝好茶，是一趟回不去的味覺旅行。</p>
            </div>
        </div> <!--area03-->

        <div class="area04 col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
            <div class="title02"></div>
        </div> <!--area04-->

        <div class="area05 col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2">
            <div class="we ">
                <p>一.註冊會員並填寫完整資訊，可享免運優惠。</p><br>
            </div>
        </div> <!--area05-->

        <div class="area06 col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
            <div class="title03 "></div>
        </div> <!--area06-->

        <div class="area07 col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2">
            <div class="we ">
                <p>Tastea鐵茶 絕對不會向其他公司、團體、個人透露或販售您因填寫訂購單所留下的個人資料，如姓名、電子信箱、電話、地址.等，資料僅限提供良好服務品質及客戶通知之用。</p>
            </div>
        </div> <!--area07-->

        <div class="area08 col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
            <div class="title04 "></div>
        </div> <!--area08-->

        <div class="area09 col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2">
            <div class="we ">
                <p>電話: 02-27123456</p><br>
                <p>EMAIL:tastea@gmail.com</p>
            </div>
        </div> <!--area09-->


    </div><!--row-->
</div><!--container-->

<div class="area10 container-fluid">
    <div class="row">
        <iframe class="col-lg-12 col-xs-12" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1074.7494620511154!2d121.54341670491364!3d25.033670906555486!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xedc006d25a9e35df!2z6LOH562W5pyDIOaVuOS9jeaVmeiCsueglOeptuaJgCDos4foqIrmioDooZPoqJPnt7TkuK3lv4M!5e0!3m2!1szh-TW!2stw!4v1491118802207" width="1660" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div> <!--area10-->
<br><br><br>
<?php include __DIR__ . '/footer.html'; ?>



<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>-->

<!--<script src="http://code.jquery.com/jquery.min.js"></script>-->
<!--<script src="http://zeptojs.com/zepto.min.js"></script>-->
<!--<script src="bootstrap/js/bootstrap.js"></script>-->
<script src="lib/jquery.colorbox.js"></script>


<!-- <script src="slider_js/initslider-1.js"></script> -->

<script>

    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        // console.log(st);
        if(st>200){
            $(".navbar .navbar-nav > li > a").css("color","#1C1C1C");
            $(".navbar-brand img").attr("src","images/logo_b.png");
            $(".carticon img").attr("src","images/cart-b.png");
            $(".navbar").addClass("navbar-default");

            $(".navbar .navbar-brand-min img").attr("src","images/logo-b-min.png");

        }else{
            $(".navbar .navbar-nav > li > a").css("color","#FCFAF2");
            $(".carticon img").attr("src","images/cart-w.png");
            $(".navbar-brand img").attr("src","images/logo_w.png");
            $(".navbar").removeClass("navbar-default");

            $(".navbar .navbar-brand-min img").attr("src","images/logo-w-min.png");

        }
    });



</script>


</body>
</html>