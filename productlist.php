<?php
require __DIR__ . '/__connect_db.php';
$pname = 'productlist';

$per_page = 12;
$yea = isset($_GET['$yea']) ? intval($_GET['$yea']) : 0;
$gory = isset($_GET['gory']) ? intval($_GET['gory']) : 0;
$wow = isset($_GET['wow']) ? intval($_GET['wow']) : 0;
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$search = isset($_GET['search']) ? $_GET['search'] : '';

$c_sql = "SELECT * FROM `locations` WHERE `location_id` IN (1, 2, 3) ";
$c_rs = $mysqli->query($c_sql);
//
$f_sql = "SELECT * FROM `types` WHERE `type_id` IN (2, 3)";
$f_rs = $mysqli->query($f_sql);

///以下是nav連結的資料

$d_sql = "SELECT * FROM `locations` WHERE `location_id` IN (1, 2, 3) ";
$d_rs = $mysqli->query($d_sql);
//
$g_sql = "SELECT * FROM `types` WHERE `type_id` IN (2, 3)";
$g_rs = $mysqli->query($g_sql);

///以下是nav連結的資料

$where = " WHERE 1";
$there = "  ";
$ere = " ";
$here = "  ";

if ($cate) {
    $where .= " AND `location_id`=$cate ";
}
if ($gory) {
    $ere .= " AND `location_id`=$gory ";
}
if ($wow) {
    $there .= " AND `type_id` = $wow ";
}
if ($yea) {
    $here .= " AND `type_id` = $yea ";
}

if ($search) {
    $search2 = $mysqli->escape_string("%{$search}%");
    $where .= sprintf(" AND (`brand_name` LIKE '%s' OR `product_name` LIKE '%s' ) ", $search2, $search2);
}
// 總共有幾筆
$total_sql = "SELECT COUNT(1) FROM `product` $where $there $ere $here";
$total_rs = $mysqli->query($total_sql);
$total_num = $total_rs->fetch_row()[0];
// 總共有幾頁
$total_pages = ceil($total_num / $per_page);
$p_sql = sprintf("SELECT * FROM `product` %s $there $ere $here LIMIT %s, %s", $where, ($page - 1) * $per_page, $per_page);
$p_rs = $mysqli->query($p_sql);
?>

<head>
    <meta name="viewport" content="width=device-width initial-scale=0.8 maximum-scale=0.8 user-scalable=0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="productlist.css">
    <link rel="stylesheet" href="css/colorbox.css">

</head>

<body>
<?php include __DIR__ . '/_navbar.php' ?>
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

        <div class="area02">
            <div class="classmenu col-lg-2 hidden-sm hidden-xs">
                <div class="title02">
                    <img src="images/title-rechange_03.png" style="width: 200px; margin-top: 10px;" alt="">
                </div>
                <div class="menulist">
                    <div class="menu"><a href="productlist.php"><p>所有商品</p></a></div>
                    <?php while ($row = $c_rs->fetch_assoc()): ?>
                        <p class="menu"><a href="?cate=<?= $row['location_id'] ?>">
                                <?= $row['name'] ?></a></p>
                    <?php endwhile; ?>
                    <?php while ($row = $f_rs->fetch_assoc()): ?>
                        <p class="menu"><a href="?wow=<?= $row['type_id'] ?>">
                                <?= $row['name'] ?></a></p>
                    <?php endwhile; ?>
                </div>
            </div> <!--classmenu-->
        </div> <!--area02-->

        <div class="area03">

            <div class="title01 col-lg-10 col-sm-12 ">
                <div class="pull-right hidden-sm hidden-xs" style="padding: 20px 0 50px 0; margin-top: 20px;margin-right: 40px;">
                    <form class="navbar-form navbar-left" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="想找什麼茶喝呢?"
                                   value="<?= empty($search) ? '' : $search ?>">  </div>
                        <button type="submit" class="btn btn-default">找茶囉!</button>
                    </form>
                </div>
            <!--RWD 搜尋列-->
                <div class="pull-center hidden-lg" style="padding: 30px 0 0 0; margin-top: 20px;">
                    <form class="navbar-form navbar-left" method="get" style="text-align: center; padding-top: 30px;">
                        <div class="form-group" style="display: inline-block; width: 70%;">
                            <input style="height: 50px;" type="text" class="form-control" name="search" placeholder="想找什麼茶喝呢?"
                                   value="<?= empty($search) ? '' : $search ?>">  </div>
                        <button style="height: 50px; width: 20%;" type="submit" class="btn btn-default">找茶囉!</button>
                    </form>
                </div>
            <!--RWD 搜尋列-->
            </div>


                
            <div class="classitem" >
                <div class=" col-lg-10 col-sm-12" style="z-index: 1;">
                    <?php while ($row = $p_rs->fetch_assoc()): ?>
                        <div class="col-lg-3 col-sm-6 col-xs-6 eachtea" style="font-size:18px; padding: 0 0 20px 0; text-align: center;"  >
                            <a href="single-product.php?sid=<?= $row['sid'] ?>">
                                <img src="imgs/small/<?= $row['product_id'] ?>.jpg" alt=""></a>
                            <div class="size01"><a href="single-product.php?sid=<?= $row['sid'] ?>"><?= $row['product_name'] ?></a></div>
                            <div class="size02"><a href="single-product.php?sid=<?= $row['sid'] ?>">NT$<?= $row['price'] ?></a></div>
                        </div>
                    <?php endwhile; ?>
                    <br> <br> <br>
                </div>


                <div class="col-lg-12 col-sm-12;" >
                    <nav style="text-align: center;">
                        <ul class="pagination pagination-lg ">
<!--                            <li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>-->
                            <?php for ($i = 1; $i <= $total_pages; $i++):
                                $ar = array('page' => $i);
                                if ($cate) {
                                    $ar['cate'] = $cate;
                                }
                                if ($wow) {
                                    $ar['wow'] = $wow;
                                }
                                if ($yea) {
                                    $ar['yea'] = $yea;
                                }
                                if ($gory) {
                                    $ar['gory'] = $gory;
                                }
                                ?>
                                <li class="<?= $page == $i ? 'active' : '' ?>"><a
                                            href="?<?= http_build_query($ar) ?>"><?= $i ?></a></li>
                            <?php endfor ?>
<!--                            <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>-->
                        </ul>
                    </nav>
                </div>
            </div> <!--classitem-->
        </div> <!--area03-->

    </div> <!--row-->




</div> <!--container-->

<br>
<br>
<br>
<?php include __DIR__ . '/footer.html'; ?>

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


    $(function () {
        $('.buy_btn').click(function () {

            var sid = $(this).attr('data-sid');
            var qty = $(this).closest('.caption').find('.qty').val();
            var product_name = $(this).closest('.caption').find('h5').eq(0).text();

            $.get('add_to_cart.php', {sid: sid, qty: qty}, function (data) {
                //alert('商品已加入購物車');
                show_info(product_name + ' 已加入購物車');

                calc_items(data);
            }, 'json');

        });
    });



</script>
</body>
</html>



