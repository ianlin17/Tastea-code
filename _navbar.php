<?php
require __DIR__ . '/__connect_db.php';

$yea = isset($_GET['$yea']) ? intval($_GET['$yea']) : 0;
$gory = isset($_GET['gory']) ? intval($_GET['gory']) : 0;
$d_sql = "SELECT * FROM `locations` WHERE `location_id` IN (1, 2, 3) ";
$d_rs = $mysqli->query($d_sql);
$g_sql = "SELECT * FROM `types` WHERE `type_id` IN (2, 3)";
$g_rs = $mysqli->query($g_sql);
$ere = " ";
$here = "  ";

if ($gory) {$ere .= " AND `location_id`=$gory ";}
if ($yea) {$here .= " AND `type_id` = $yea ";}
?>

<link rel="stylesheet" href="_navbar.css">

<nav class="navbar  navbar-fixed-top ">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-xs hidden-sm" href="./" style="padding: 0;margin: 5px 0 0 15px;">
                <img src="images/logo_w.png">
            </a>
            <!--RWD navbar logo-->
            <a class="navbar-brand-min hidden-lg" href="#">
                <img src="images/logo-w-min.png">
            </a>
            <!--RWD navbar logo-->
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hover_line"><a href="about.php">關於我們</a></li>
                <li class="dropdown hover_line">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">商品列表 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php while ($nrow = $d_rs->fetch_assoc()): ?>
                            <li class="menu"><a href="productlist.php?gory=<?= $nrow['location_id'] ?>">
                                    <?= $nrow['name'] ?></a></li>
                        <?php endwhile; ?>
                        <?php while ($nrow = $g_rs->fetch_assoc()): ?>
                            <li class="menu"><a href="productlist.php?$yea=<?= $nrow['type_id'] ?>">
                                    <?= $nrow['name'] ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <li class="hover_line"><a href="knowledge-index.php">茶知識</a></li>
                <li class="hover_line"><a href="howtobuy.php">如何購買</a></li>
                <li class="hover_line"><a href="#">廠商列表</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><?= $_SESSION['user']['name'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="memberlist.php">我的最愛</a></li>
                            <li><a href="logout.php">登出</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="hover_line"><a class="logi" href="login.php">登入</a></li>
                    <li class="hover_line"><a class="register" href="register.php">註冊</a></li>
                <?php endif ?>
                <li><a href="cartlist01.php" class="carticon"><img src="images/cart-w.png" alt=""></a></li>
            </ul>
        </div> <!--.navbar-collapse-->
    </div>
 </nav>

<script src="lib/jquery-3.1.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="lib/jquery.colorbox.js"></script>

<script>
    $(".logi").colorbox({iframe:true, innerWidth:450, innerHeight:600});
    $(".register").colorbox({iframe:true, innerWidth:450, innerHeight:600});
</script>

