<?php include __DIR__. '/__connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

if(empty($sid)){
    header("Location: productlist.php");
    exit;
}

$sql = "SELECT * FROM `products` WHERE `sid`= $sid";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/colorbox.css" />
    <link rel="stylesheet" href="product.css">
</head>
<body>
<header class="container-fluid banner area01">
    <div class="bannerimg"><img class="col-lg-12 col-sm-12" src="images/banner-product.png"  alt=""></div>
</header>
<?php include __DIR__. '/_navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="area02 col-lg-12">
            <ol class="breadcrumb" style="background-color: rgba(255,255,255,0.1); margin-top: 20px;">
                <li><a href="file:///C:/Users/Student/Desktop/%E5%95%86%E5%93%81%E5%B0%88%E9%A1%8C/productlist.html">商品列表</a></li>
                <li class="active"><?=$row['product_name']?></li>
            </ol>
        </div>
        <div class="area03 col-lg-6">
            <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:500px;margin:0px auto 86px;">
                <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                    <ul class="amazingslider-slides" style="display:none;">
                        <li><img src="sliderimg/%E5%9A%B4%E9%81%B8%E8%8B%97%E6%A0%97%E6%9D%B1%E6%96%B9%E7%BE%8E%E4%BA%BA%E8%8C%B6.jpg" alt="嚴選苗栗東方美人茶"  title="嚴選苗栗東方美人茶" />
                        </li>
                        <li><img src="sliderimg/STASB111_1.jpg" alt="茶葉"  title="茶葉" />
                        </li>
                        <li><img src="sliderimg/%E6%97%A5%E6%9C%88%E6%BD%AD%E7%B4%85%E7%8E%89.jpg" alt="茶色"  title="茶色" />
                        </li>
                    </ul>
                    <ul class="amazingslider-thumbnails" style="display:none;">
                        <li><img src="sliderimg/%E5%9A%B4%E9%81%B8%E8%8B%97%E6%A0%97%E6%9D%B1%E6%96%B9%E7%BE%8E%E4%BA%BA%E8%8C%B6-tn.jpg" alt="嚴選苗栗東方美人茶" title="嚴選苗栗東方美人茶" /></li>
                        <li><img src="sliderimg/STASB111_1-tn.jpg" alt="茶葉" title="茶葉" /></li>
                        <li><img src="sliderimg/%E6%97%A5%E6%9C%88%E6%BD%AD%E7%B4%85%E7%8E%89-tn.jpg" alt="茶色" title="茶色" /></li>
                    </ul>
                    <div class="amazingslider-engine"><a href="http://amazingslider.com" title="Slider jQuery"></a></div>
                </div>
            </div>
        </div>
        <div class="area04 col-lg-6">
            <div class="inform">
                <div>
                    <p>商品名稱:&nbsp;<?= $row['product_name']?>/<?=$row['weight']?></p>
                    <p>價格:&nbsp;NT$<?= $row['price']?></p>
                    <p>包裝方式:&nbsp;<?= $row['package']?></p>
                    <p>產地:&nbsp;<?= $row['location']?></p>
                    <p>
                        <span>發酵程度:▲ ▲ ▲</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>烘培程度:▲ ▲</span>
                    </p>
                </div>
                <div class="">
                    <div class="gotoqty">
                        <span>數量</span>
                        <select name="qty" class="qty">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                    <div >
                        <button class="gotocart buy_btn" data-sid="<?= $row['sid'] ?>"><img class="cart" src="images/cart-w.png" alt="">加入購物車</button>
                    </div>
                </div>
                <div class="detail">
                    <p>|口感說明|</p>
                    <p>台灣農林用心經營天然生態茶園，吸引小綠葉蟬群聚著涎，再以傳統技法精製成優質東方美人茶，將小綠葉蟬著涎的幼嫩芽葉，焙製出獨特的蜜果甜香，入口溫潤，後韻淡雅而甘醇。</p>
                </div>
                <div class="detail">
                    <p>|廠商資訊|</p>
                    <p>台灣農林融入百年製茶工藝，用心揉捻、真心烘焙，源自台灣自產自銷的茶葉，有著我們對這片土地的摯熱情愛，誠意奉上實‧實‧在‧在的正港台灣茶。</p>
                </div>
                <div class="detail">
                    <p>|推薦茶點|</p>
                    <p><a href="">棗泥核桃糕</a>，這樣的點心與東方美人茶堪稱絕配，除了在食用的時候不會覺得太過甜膩之外，茶水也幫助解滯消化，哪怕再多吃幾塊都不怕。</p>
                </div>
            </div> <!--inform-->
        </div>
    </div> <!--row-->
</div> <!--container-->