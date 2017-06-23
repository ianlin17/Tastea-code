<html lang="en">
<?php include __DIR__ . '/__connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

if (empty($sid)) {
    header("Location: productlist.php");
    exit;
}

$sql = "SELECT * FROM `product` WHERE `sid`= $sid";
$sqls = "SELECT * FROM `product` WHERE `sid` BETWEEN 63 AND 77";
$rs = $mysqli->query($sql);
$row = $rs->fetch_assoc();
$s_rs = $mysqli->query($sqls);
$s_row = $s_rs->fetch_assoc();
$ferment = $row['ferment'];
$roast = $row['roast'];


//$sids = array_keys($_SESSION['cart']);
//$f_sql = sprintf("SELECT * FROM `fav` WHERE `member_sid`=%s AND `product_id` IN (%s)", intval($_SESSION['user']['id']), implode(',', $sids));
//$f_rs = $mysqli->query($f_sql);
//$fav_data = array();
//while ($frow = $f_rs->fetch_assoc()) {
////    $row['qty'] = $_SESSION['cart'][$row['sid']];
//
//    $fav_data[$frow['sid']] = 1;}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=0.8 maximum-scale=0.8 user-scalable=0">
    <title>商品</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="slider-forproduct/amazingslider-1.css">
    <link rel="stylesheet" href="css/colorbox.css">
    <link rel="stylesheet" href="single-product.css">


</head>
<body>
<?php include __DIR__ . '/_navbar.php' ?>

<?php if ($sid > 62): ?>
<header class=" banner area01 ">
    <img src="images/F1-banner.png" style="background-size: cover; height: 300px; padding: 0; " alt="">
</header>
<div class="container">
    <div class="row">
        <div class="area02 col-lg-12">
            <ol class="breadcrumb" style="background-color: rgba(255,255,255,0.1); margin-top: 20px;">
                <li><a href="productlist.php">商品列表</a></li>
                <li class="active"><?= $row['brand_name'], $row['product_name'] ?></li>
            </ol>
        </div>

        <div class="area03 col-lg-6">
            <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:400px;margin:0px auto 138px;">

                <div id="my-favorite" class="favorite"> <button class="fav_btn" data-sid="<?= $row['sid'] ?>">
                        <?php if (! isset($_SESSION['fav']['sid'])): ?><img id="favorite-icon"
                                                                           src="images/favorite-before.png">  <?php else: ?>
                            <img id="favorite-icon" src="images/favorite-after.png"> <?php endif ?> </div>

                <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                    <ul class="amazingslider-slides" style="display:none;">
                        <li><img src="imgs/big/<?= $row['product_id'] ?>.jpg" />
                        </li>
                        <li><img src="imgs/big/<?= $row['product_id2'] ?>.jpg" />
                        </li>
                        <li><img src="imgs/big/<?= $row['product_id3'] ?>.jpg" />
                        </li>
                    </ul>
                    <ul class="amazingslider-thumbnails" style="display:none;">
                        <li><img src="imgs/small/<?= $row['product_id'] ?>.jpg"/></li>
                        <li><img src="imgs/small/<?= $row['product_id2'] ?>.jpg" /></li>
                        <li><img src="imgs/small/<?= $row['product_id3'] ?>.jpg" /></li>
                    </ul>
                    <div class="amazingslider-engine"><a href="http://amazingslider.com" title="Responsive jQuery Slideshow"></a></div>
                </div>
            </div>
        </div> <!--area03-->

        <div class="area04 col-lg-6">
            <div class="inform ">
                <div>
                    <p>商品名稱:&nbsp;<?= $row['product_name'] ?> / <?= $row['weight'] ?></p>
                    <p>價格:&nbsp;NT$<?= $row['price'] ?></p>
                    <p>尺寸/淨重:&nbsp;<?= $row['package'] ?></p>
                    <p>保存方式:&nbsp;<?= $row['safedate'] ?>(有效期限請依外盒標示為主)</p>
                    <p>注意事項:&nbsp;請避免日光直射，高溫潮濕。
                        請於保存期限內食用完，以確保食品之鮮度。</p>
                </div>
                <div class="wanttobuy caption">

                    <div class="qty hidden-sm hidden-xs">
                        <div class="input-group number-spinner" style="display: inline-block;width: auto;border: 2px solid #C0A264;border-radius: 5px;">
              <span class="input-group-btn" style="float: left;width: auto;">
                <button class="btn btn-default" data-dir="dwn" style="height: 50px;"><span class="glyphicon glyphicon-minus"></span></button>
              </span>
                            <input name="buy_num" id="buy_num" type="text" class="form-control text-center qtyinput" value="1" >
                            <span class="input-group-btn" style="display: inline-block;">
                <button class="btn btn-default" data-dir="up" style="height: 50px;"><span class="glyphicon glyphicon-plus"></span></button>
              </span>
                        </div>
                    </div>
                    <!--RWD qty-min-->
                    <div class="qty-min hidden-lg">
                        <div class="input-group number-spinner" style="display: inline-block;width: auto;border: 2px solid #C0A264; border-radius: 5px;">
              <span class="input-group-btn" style="float: left;width: auto;">
                <button class="btn btn-default" data-dir="dwn" ><span class="glyphicon glyphicon-minus"></span></button>
              </span>
                            <input name="buy_num" id="buy_num" type="text" class="form-control text-center qtyinput" value="1" >
                            <span class="input-group-btn" style="display: inline-block;">
                <button class="btn btn-default" data-dir="up" ><span class="glyphicon glyphicon-plus"></span></button>
              </span>
                        </div>
                    </div>
                    <!--RWD qty-min-->
                    <div class=" buy-btn hidden-sm hidden-xs">
                        <button class="buy_btn gotocart" data-sid="<?= $row['sid'] ?>"><img class="cart" src="images/cart-b.png" style="padding-right: 10px;" alt="">加入購物車</button>
                    </div>

                    <!--RWD buy-btn-min-->
                    <div class="buy-btn-min hidden-lg">
                            <button class="buy_btn gotocart" data-sid="<?= $row['sid'] ?>"><img class="cart" src="images/cart-b.png" style="padding-right: 10px;" alt="">加入購物車</button>
                    </div>
                    <!--RWD buy-btn-min-->

                </div> <!--wanttobuy-->
                <div class="detail">
                    <p>|產品介紹|</p>
                    <p><?= $row['intro'] ?></p>
                </div>
                <div class="detail">
                    <p>|廠商資訊|</p>
                    <p><?= $row['brand_intro'] ?> </p>
                </div>

            </div> <!--inform-->
        </div>

    </div><!--row-->
</div> <!--container-->

<?php else: ?>

<header class=" banner area01 ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12  col-sm-12">
                <img src=""  alt="">
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="area02 col-lg-12">
            <ol class="breadcrumb" style="background-color: rgba(255,255,255,0.1); margin-top: 20px;">
                <li><a href="productlist.php">商品列表</a></li>
                <li class="active"><?= $row['brand_name'], $row['product_name'] ?></li>
            </ol>
        </div>
        <div class="area03 col-lg-6">
            <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:400px;margin:0px auto 138px;">

                <div id="my-favorite" class="favorite"> <button class="fav_btn" data-sid="<?= $row['sid'] ?>">
                        <?php if (! isset($_SESSION['fav'][$sid])): ?><img id="favorite-icon"
                                                                           src="images/favorite-before.png">  <?php else: ?>
                            <img id="favorite-icon" src="images/favorite-after.png"> <?php endif ?> </button></div>

                <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                    <ul class="amazingslider-slides" style="display:none;">
                        <li><img src="imgs/big/<?= $row['product_id'] ?>.jpg" />
                        </li>
                        <li><img src="imgs/big/<?= $row['product_id2'] ?>.jpg" />
                        </li>
                        <li><img src="imgs/big/<?= $row['product_id3'] ?>.png" />
                        </li>
                    </ul>
                    <ul class="amazingslider-thumbnails" style="display:none;">
                        <li><img src="imgs/small/<?= $row['product_id'] ?>.jpg" /></li>
                        <li><img src="imgs/small/<?= $row['product_id2'] ?>.jpg" /></li>
                        <li><img src="imgs/small/<?= $row['product_id3'] ?>.png" /></li>
                    </ul>
                    <div class="amazingslider-engine"><a href="http://amazingslider.com" title="Responsive jQuery Slideshow"></a></div>
                </div>
            </div>
        </div> <!--area03-->

        <div class="area04 col-lg-6">
            <div class="inform">
                <div>
                    <p>商品名稱:&nbsp;<?= $row['product_name'] ?> / <?= $row['weight'] ?> </p>
                    <p>價格:&nbsp;NT$<?= $row['price'] ?></p>
                    <p>包裝方式:&nbsp;<?= $row['package'] ?></p>
                    <p>產地:&nbsp;<?= $row['location'] ?></p>
                    <p>
                        <span>發酵程度:<?php echo "<img src=\"$ferment\">";
                            ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>烘培程度:<?php echo "<img src=\"$roast\">";
                            ?></span>
                    </p>
                </div>
                <div class="wanttobuy caption">

                    <div class="qty hidden-sm hidden-xs">
                        <div class="input-group number-spinner" style="display: inline-block;width: auto;border: 2px solid #C0A264;border-radius: 5px;">
              <span class="input-group-btn" style="float: left;width: auto;">
                <button class="btn btn-default" data-dir="dwn" style="height: 50px;"><span class="glyphicon glyphicon-minus"></span></button>
              </span>
                            <input name="buy_num" id="buy_num" type="text" class="form-control text-center qtyinput" value="1" >
                            <span class="input-group-btn" style="display: inline-block;">
                <button class="btn btn-default" data-dir="up" style="height: 50px;"><span class="glyphicon glyphicon-plus"></span></button>
              </span>
                        </div>
                    </div>

                    <!--RWD qty-min-->
                    <div class="qty-min hidden-lg">
                        <div class="input-group number-spinner" style="display: inline-block;width: auto;border: 2px solid #C0A264; border-radius: 5px;">
              <span class="input-group-btn" style="float: left;width: auto;">
                <button class="btn btn-default" data-dir="dwn" style="height: 50px;"><span class="glyphicon glyphicon-minus"></span></button>
              </span>
                            <input name="buy_num" id="buy_num" type="text" class="text-center qtyinput" value="1" >
                            <span class="input-group-btn" style="display: inline-block;">
                <button class="btn btn-default" data-dir="up" style="height: 50px;"><span class="glyphicon glyphicon-plus"></span></button>
              </span>
                        </div>
                    </div>
                    <!--RWD qty-min-->

                    <div class="buy-btn hidden-sm hidden-xs">
                        <button class="buy_btn gotocart" data-sid="<?= $row['sid'] ?>"><img class="cart" src="images/cart-b.png" style="padding-right: 10px;" alt="">加入購物車</button>
                    </div>

                    <!--RWD buy-btn-min-->
                    <div class="buy-btn-min hidden-lg">
                        <button class="buy_btn gotocart" data-sid="<?= $row['sid'] ?>"><img class="cart" src="images/cart-b.png" style="padding-right: 10px;" alt="">加入購物車</button>
                    </div>
                    <!--RWD buy-btn-min-->


                </div> <!--wanttobuy-->
                <div class="detail">
                    <p>|產品介紹|</p>
                    <p><?= $row['intro'] ?></p>
                </div>
                <div class="detail">
                    <p>|廠商資訊|</p>
                    <p><?= $row['brand_intro'] ?></p>
                </div>
                <div class="detail ">
                    <p>|推薦茶點|</p>
                    <p><a href="http://localhost/tastea/single-product.php?sid=64">棗泥核桃糕</a>，這樣的點心與東方美人茶堪稱絕配，除了在食用的時候不會覺得太過甜膩之外，茶水也幫助解滯消化，哪怕再多吃幾塊都不怕。</p>
                </div>
            </div> <!--inform-->
        </div>
    </div> <!--row-->
</div> <!--container-->
<?php endif ?>

<?php include __DIR__ . '/footer.html' ?>

<script src="lib/jquery-3.1.1.js"></script>
<!--<script src="bootstrap/js/bootstrap.js"></script>-->
<script src="slider-forproduct/jquery.js"></script>
<script src="slider-forproduct/amazingslider.js"></script>
<script src="slider-forproduct/initslider-1.js"></script>
        <script>
            $(window).scroll(function(event){
                var st = $(this).scrollTop();
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

            $(document).on('click', '.number-spinner button', function () {
                var btn = $(this),
                    oldValue = btn.closest('.number-spinner').find('input').val().trim(),
                    newVal = 0;

                if (btn.attr('data-dir') == 'up') {
                    newVal = parseInt(oldValue) + 1;
                } else {
                    if (oldValue > 1) {
                        newVal = parseInt(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
                btn.closest('.number-spinner').find('input').val(newVal);
            });

            $(function () {
                $('.buy_btn').click(function () {
                    var sid = $(this).attr('data-sid');
                    var qty = $(this).closest('.caption').find('.qtyinput').val();
//                    var $favbtn = $('#favorite-icon');
                    $.get('add_to_cart.php', {sid: sid, qty: qty}, function () {
                        alert('商品已加入購物車');
                    }, 'json')
                })
            });


//            $(".fav_btn").click(function(){
//                if($(love.attr("src","images/favorite-after.png")){
//                    $(love.attr("src","images/favorite-before.png"));
//                    $(love.attr("src","images/favorite-after.png"));
//                }else{
//                    $(love.attr("src","images/favorite-after.png"));
//                    $(love.attr("src","images/favorite-before.png"));
//                }
//            });


//            $('.fav_btn').click( function() {
////                console.log("123");
//                <?php //if (! isset($_SESSION['user'])): ?>
//                alert('請先登入會員!');
//                return;
//                <?php //endif; ?>
////                var love =  $('#favorite-icon');
//                var pid = $(this).attr('data-sid');
//                $.get("aj_add_to_fav.php", {pid: pid, c:1}, function () {
////                    love.attr("src","images/favorite-after.png");
//                    return false;
//                },  "json");
//
//            });



            $('.fav_btn').click( function() {
                <?php if (! isset($_SESSION['user'])): ?>
                alert('請先登入會員!');
                <?php else: ?>
                var sid = $('.fav_btn').attr('data-sid');
                var love =  $('#favorite-icon');
                <?php if (! isset($_SESSION['fav'][$sid])): ?> {
                    $.get("add_to_fav1.php", {sid: sid}, function () {
                        love.attr("src","images/favorite-after.png");
//                        history.go(0);
                        return false;
                    },  "json");
                }  <?php else: ?> {
                    alert('此產品已加入到我的最愛');
                    return false;
                  }
                    <?php endif ?>
<?php endif ?>
//
            })

        </script>
